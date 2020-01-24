<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/16/2018
 * Time: 3:51 PM
 */

class Invoice_controller extends CI_Controller
{

    function insert_invoice()
    {

        $data = $_POST['datatable'];
        $json = json_decode($data, true);

        $full_discount = 0;

        foreach ($json as $item) {

            $discount = $item['discount'];
            $full_discount = $full_discount * 1 + $discount * 1;

        }

        $distributor_code = $this->input->post('distributor');
        $borrow_amount = $this->input->post('total_due');

        if ($distributor_code !== "") {

        } else {

            if ($borrow_amount > 0) {

                $payment_status = 'pending';

                $this->load->model('invoice/invoice_models');
                $invoice_id = $this->invoice_models->insert_invoice($full_discount, $payment_status, $borrow_amount);

                $this->load->model('invoice/borrow_invoice_models');
                $borrow_invoice = $this->borrow_invoice_models->insert_borrow_invoice($invoice_id);

            } else {

                $payment_status = 'Susses';

                $this->load->model('invoice/invoice_models');
                $invoice_id = $this->invoice_models->insert_invoice($full_discount, $payment_status, 0);

            }


            foreach ($json as $item) {

                $type = $item['type'];

                switch ($type) {

                    case "Item":

                        $quantity = $item['quantity'];

                        $this->load->model('stock/stock_description_models');
                        $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item['item_code']);

                        // update stock value.............................................................................

                        // get branch login time create.............................................................................

                        $branchid =  $this->session->userdata('user_branch');

                        $this->load->model('stock/stock_description_has_branch_models');
                        $stock_description_has_branch_result = $this->stock_description_has_branch_models->where_search_stock_branch_and_stock_description_has_branch($stock->idstock, $branchid);

                        $physical_qty = $stock_description_has_branch_result->physical_qty;

                        $pending_qty = $stock_description_has_branch_result->pending_qty;

//                        $available_qty = $physical_qty * 1 - $pending_qty * 1;

                        if ($quantity <= $pending_qty) {

                            $new_physical_qty = $physical_qty * 1 - $quantity * 1;

                            $new_pending_qty = $pending_qty * 1 - $quantity * 1;


                            $this->load->model('stock/stock_description_has_branch_models');
                            $this->stock_description_has_branch_models->update_stock_qunty_invoice_stock_description_has_branch($stock->idstock, $branchid, $new_physical_qty, $new_pending_qty);

                            $this->load->model('grn/grn_models');
                            $grn_result = $this->grn_models->get_branch_has_grn($branchid);

                            $array = [];

                            foreach ($grn_result as $row) {

                                $this->load->model('grn/grn_has_stock_description_models');
                                $grn_has_stock_result = $this->grn_has_stock_description_models->get_grn_price_grn_has_stock_description($row->idGRN, $stock->idstock);

                                if ($grn_has_stock_result !== false) {

                                    foreach ($grn_has_stock_result as $row_grn_price) {

                                        $available_quantity = $row_grn_price->available_qty;

                                        if ($available_quantity > 0) {

                                            array_push($array, [

                                                'grn_item_list_id' => $row_grn_price->grn_item_list_id,
                                                'available_qty' => $row_grn_price->available_qty,
                                                'price' => $row_grn_price->unit_price,

                                            ]);

                                        }

                                    }

                                }

                            }

                            $loop_count = 0;
                            $unit_price = 0;

                            $qty_unit = 0;

                            foreach ($array as $obj) {

                                $loop_count++;

                                $stock_description_id = $obj['grn_item_list_id'];
                                $available_qty = $obj['available_qty'];
                                $price = $obj['price'];

                                if ($qty_unit === 0) {

                                    if ($available_qty > $quantity) {

                                        $unit_price = $price * 1 + $unit_price * 1;
                                        $qty_unit = $available_qty * 1 - $quantity * 1;

                                        $this->load->model('grn/grn_has_stock_description_models');
                                        $this->grn_has_stock_description_models->update_available_stock_count($qty_unit, $stock_description_id);

                                        break;

                                    } else {

                                        $unit_price = $price * 1 + $unit_price * 1;
                                        $qty_unit = $quantity * 1 - $available_qty * 1;

                                        $this->load->model('grn/grn_has_stock_description_models');
                                        $this->grn_has_stock_description_models->update_available_stock_count(0, $stock_description_id);

                                        continue;

                                    }

                                } else {

                                    if ($available_qty > $qty_unit) {

                                        $unit_price = $price * 1 + $unit_price * 1;
                                        $qty_unit = $available_qty * 1 - $qty_unit * 1;

                                        $this->load->model('grn/grn_has_stock_description_models');
                                        $this->grn_has_stock_description_models->update_available_stock_count($qty_unit, $stock_description_id);

                                        break;

                                    } else {

                                        $unit_price = $price * 1 + $unit_price * 1;
                                        $qty_unit = $qty_unit * 1 - $available_qty * 1;

                                        $this->load->model('grn/grn_has_stock_description_models');
                                        $this->grn_has_stock_description_models->update_available_stock_count(0, $stock_description_id);

                                        continue;

                                    }

                                }

                            }

                            $grn_price = $unit_price * 1 / $loop_count * 1;

                            $this->load->model('invoice/invoice_has_stock_description_models');
                            $this->invoice_has_stock_description_models->insert_invoice_has_stock_description($stock->idstock, null, $item, $invoice_id, $grn_price);


                        } else {

                            echo "Stock_Not";

                        }


                        break;
                    case "Service":

                        $quantity = $item['quantity'];

                        $this->load->model('stock/service_type_models');
                        $service_type = $this->service_type_models->where_search_service_type_pass_service_id($item['item_code']);

                        $this->load->model('stock/stock_description_has_service_type_models');
                        $result_service_type = $this->stock_description_has_service_type_models->where_search_stock_description_has_service_type_pass_service_id($service_type->Services);


                        foreach ($result_service_type as $row_service_type) {

                            $service_quantity = $quantity * 1 * $row_service_type->Qty * 1;

                            $branchid =  $this->session->userdata('user_branch');

                            $this->load->model('stock/stock_description_has_branch_models');
                            $stock_description_has_branch_result = $this->stock_description_has_branch_models->where_search_stock_branch_and_stock_description_has_branch($row_service_type->stock_description_idstock, $branchid);

                            $physical_qty = $stock_description_has_branch_result->physical_qty;

                            $pending_qty = $stock_description_has_branch_result->pending_qty;

//                            $available_qty = $physical_qty * 1 - $pending_qty * 1;

                            if ($quantity <= $pending_qty) {

                                $new_physical_qty = $physical_qty * 1 - $service_quantity * 1;

                                $new_pending_qty = $pending_qty * 1 - $service_quantity * 1;

                                $this->load->model('stock/stock_description_has_branch_models');
                                $this->stock_description_has_branch_models->update_stock_qunty_invoice_stock_description_has_branch($row_service_type->stock_description_idstock, $branchid, $new_physical_qty, $new_pending_qty);

                                $this->load->model('grn/grn_models');
                                $grn_result = $this->grn_models->get_branch_has_grn($branchid);

                                $array = [];

                                foreach ($grn_result as $row2) {

                                    $this->load->model('grn/grn_has_stock_description_models');
                                    $grn_has_stock_result = $this->grn_has_stock_description_models->get_grn_price_grn_has_stock_description($row2->idGRN, $row_service_type->stock_description_idstock);

                                    if ($grn_has_stock_result !== false) {

                                        foreach ($grn_has_stock_result as $row_grn_price) {

                                            if ($row_grn_price->available_qty > 0) {

                                                array_push($array, [

                                                    'grn_item_list_id' => $row_grn_price->grn_item_list_id,
                                                    'available_qty' => $row_grn_price->available_qty,
                                                    'price' => $row_grn_price->unit_price,

                                                ]);

                                            }

                                        }

                                    }

                                }

                                $loop_count = 0;
                                $unit_price = 0;

                                $qty_unit = 0;

                                foreach ($array as $obj) {

                                    $loop_count++;

                                    $stock_description_id = $obj['grn_item_list_id'];
                                    $available_qty = $obj['available_qty'];
                                    $price = $obj['price'];

                                    if ($qty_unit === 0) {

                                        if ($available_qty > $service_quantity) {

                                            $unit_price = $price * 1 + $unit_price * 1;
                                            $qty_unit = $available_qty * 1 - $service_quantity * 1;

                                            $this->load->model('grn/grn_has_stock_description_models');
                                            $this->grn_has_stock_description_models->update_available_stock_count($qty_unit, $stock_description_id);

                                            break;

                                        } else {

                                            $unit_price = $price * 1 + $unit_price * 1;
                                            $qty_unit = $service_quantity * 1 - $available_qty * 1;

                                            $this->load->model('grn/grn_has_stock_description_models');
                                            $this->grn_has_stock_description_models->update_available_stock_count(0, $stock_description_id);

                                            continue;

                                        }

                                    } else {

                                        if ($available_qty > $qty_unit) {

                                            $unit_price = $price * 1 + $unit_price * 1;
                                            $qty_unit = $available_qty * 1 - $service_quantity * 1;

                                            $this->load->model('grn/grn_has_stock_description_models');
                                            $this->grn_has_stock_description_models->update_available_stock_count($qty_unit, $stock_description_id);

                                            break;

                                        } else {

                                            $unit_price = $price * 1 + $unit_price * 1;
                                            $qty_unit = $service_quantity * 1 - $available_qty * 1;

                                            $this->load->model('grn/grn_has_stock_description_models');
                                            $this->grn_has_stock_description_models->update_available_stock_count(0, $stock_description_id);

                                            continue;

                                        }

                                    }

                                }

                                $grn_price = $unit_price * 1 / $loop_count * 1;

                                $this->load->model('invoice/invoice_has_stock_description_models');
                                $this->invoice_has_stock_description_models->insert_invoice_has_stock_description(null, $service_type->Services, $item, $invoice_id, $grn_price);

                                $loop_count = 0;
                                $unit_price = 0;
                                $qty_unit = 0;

                            } else {

                                echo "Stock Not";

                            }
                            break;

                        }

                    default :

                        break;

                }


            }

        }

    }


    function like_search_invoice()
    {

        $invoice_id = $this->input->post('invoice_id');

        $this->load->model('invoice/invoice_models');
        $result = $this->invoice_models->like_search_invoice_code($invoice_id);

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'invoice_code' => $row->invoice_code,
                'date' => $row->date,
                'time' => $row->time,

            ]);


        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function load_invoice_has_stock_description()
    {

        $invoice_id = $this->input->post('invoice_id');

        $this->load->model('invoice/invoice_models');
        $result = $this->invoice_models->where_search_invoice_code($invoice_id);

        if ($result !== false) {

            $invoice_id=$result->idInvoice;

            $this->load->model('invoice/invoice_has_stock_description_models');
            $result_invoice_has_stock = $this->invoice_has_stock_description_models->where_search_invoice_has_stock_description_delivery_status($invoice_id);

            $data = [];

            if ($result_invoice_has_stock !== false) {

                foreach ($result_invoice_has_stock as $row) {

                    $this->load->model('stock/stock_description_models');
                    $result_order = $this->stock_description_models->where_search_stock_description_pass_stock_id($row->stock_description_idstock);

                    $this->load->model('stock/item_models');
                    $bill_name = $this->item_models->where_search_item_category($row->stock_description_idstock);

                    $quantity=$row->quantity;
                    $delivered_qty=$row->delivered_qty;

                    $qty=$quantity*1 - $delivered_qty*1;

                    $total= $row->subtotal;
                    $discount=$row->discount;

                    $unit_price=$row->unit_price;


                    $f_total = $total * 1 + $discount * 1;
                    $d_dive = $discount * 1 / $f_total * 1;

                    $discount_percentage = $d_dive * 1 * 100;

                    // Total Quantity Price....................................

                    $total_amount = $unit_price * 1 * $qty * 1;

                    $dis_count_dive = $total_amount * 1 / 100;
                    $discount_price = $dis_count_dive * 1 * $discount_percentage * 1;

                    // Final Total Price.......................................

                    $Total = $total_amount * 1 - $discount_price * 1;

                    array_push($data, [

                        'item_code' => $result_order->item_code,
                        'bill_name' => $bill_name->bill_name,
                        'price' => $row->unit_price,
                        'quantity' => $qty,
                        'discount' => $discount_price,
                        'total_amount' =>  $Total,

                    ]);

                }
                header('Content-Type: application/json');
                $encode_data = json_encode($data);
                echo $encode_data;

            } else {

                echo 'No_Data';

            }

        } else {
            echo 'No_Data';
        }

    }


}