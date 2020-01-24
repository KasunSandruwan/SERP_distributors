<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/13/2018
 * Time: 3:46 PM
 */

class Order_invoice_controller extends CI_Controller
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

        $borrow_amount = $this->input->post('total_due');
        $distributor = $this->input->post('distributor');

        $order_code = $this->input->post('order_code');

        $this->load->model('customer_order_management/ref_order_models');
        $ref_oder_ID = $this->ref_order_models->where_search_ref_oder_pass_order_code($order_code);

        $idref_order = null;

        if ($ref_oder_ID !== false) {

            $idref_order = $ref_oder_ID->idref_order;

        }

        $this->load->model('profile_management/distributor_models');
        $distributor_result = $this->distributor_models->where_search_distributor_pass_distributor_code($distributor);

        $iddistributor = null;

        if ($distributor_result !== false) {

            $iddistributor = $distributor_result->iddistributor;

        }

        $customer_id = $this->input->post('Customer_id');

        $this->load->model('profile_management/customer_models');
        $customer_result = $this->customer_models->where_search_customer_pass_customer_id($customer_id);

        $idcustomer = null;

        if ($customer_result !== false) {

            $idcustomer = $customer_result->idcustomer;

        }
        if ($borrow_amount > 0) {

            $payment_status = 'pending';

            $this->load->model('invoice/invoice_models');
            $invoice_id = $this->invoice_models->insert_invoice($full_discount, $payment_status, $borrow_amount, $iddistributor, $idcustomer);

            $this->load->model('invoice/borrow_invoice_models');
            $borrow_invoice = $this->borrow_invoice_models->insert_borrow_invoice($invoice_id);

        } else {

            $payment_status = 'Susses';

            $this->load->model('invoice/invoice_models');
            $invoice_id = $this->invoice_models->insert_invoice($full_discount, $payment_status, 0, $iddistributor, $idcustomer);

        }

        $ref_order_status = true;
        $print_status=true;

        foreach ($json as $item) {

            $quantity = $item['quantity'];

            $this->load->model('stock/stock_description_models');
            $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item['item_code']);

            $this->load->model('customer_order_management/ref_order_has_stock_description_models');
            $response_ref_order_has_stock_description = $this->ref_order_has_stock_description_models->where_search_ref_order_has_stock_description_for_get_data($idref_order, $stock->idstock);

            if ($response_ref_order_has_stock_description !== false) {

                $issued_qty = $response_ref_order_has_stock_description->issued_qty;
                $p_quantity = $response_ref_order_has_stock_description->order_qty;

                $d_quantity = $p_quantity * 1 - $issued_qty * 1;

                if ($d_quantity * 1 <= $quantity * 1) {

                    $status = "Susses";

                    $new_issued_qty = $issued_qty * 1 + $quantity * 1;

                    $this->load->model('customer_order_management/ref_order_has_stock_description_models');
                    $this->ref_order_has_stock_description_models->update_ref_order_has_stock_description_status($response_ref_order_has_stock_description->ref_order_has_stock_descriptionid, $status, $new_issued_qty);

                } else {

                    $status = "pending";
                    $new_issued_qty = $issued_qty * 1 + $quantity * 1;

                    $this->load->model('customer_order_management/ref_order_has_stock_description_models');
                    $this->ref_order_has_stock_description_models->update_ref_order_has_stock_description_status($response_ref_order_has_stock_description->ref_order_has_stock_descriptionid, $status, $new_issued_qty);

                    $ref_order_status = false;

                }

            }

            // update stock value.....................................................................................

            // get branch login time create...........................................................................

            $branchid = $this->session->userdata('user_branch');

            $this->load->model('stock/stock_description_has_branch_models');
            $stock_description_has_branch_result = $this->stock_description_has_branch_models->where_search_stock_branch_and_stock_description_has_branch($stock->idstock, $branchid);

//            $physical_qty = $stock_description_has_branch_result->physical_qty;

            $available_qty = $stock_description_has_branch_result->available_qty;

//            $pending_qty = $physical_qty * 1 - $available_qty * 1;

            if ($quantity <= $available_qty) {

                $new_available_qty = $available_qty * 1 - $quantity * 1;

                $new_pending_qty = 0;

                $this->load->model('stock/stock_description_has_branch_models');
                $this->stock_description_has_branch_models->update_stock_qunty_invoice_stock_description_has_branch($stock->idstock, $branchid, $new_available_qty, $new_pending_qty);

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
                $this->invoice_has_stock_description_models->insert_invoice_has_stock_description($stock->idstock, null, $item, $invoice_id, $grn_price, $idref_order);



            } else {

                echo "Stock_Not";
                $print_status=false;
                break;


            }

        }

        if ($ref_order_status) {

            $status = "Susses";

            $this->load->model('customer_order_management/ref_order_models');
            $this->ref_order_models->updete_ref_oder_status($idref_order, $status);

        }


        if($print_status){

//        get print view data for invoice order........................................................................
//
        $this->load->model('invoice/invoice_models');
        $invoice_code = $this->invoice_models->where_search_invice_ID($invoice_id);
//
        $id = $this->session->userdata('companyID');

        $this->load->model('Company_models');
        $company_name = $this->Company_models->where_search_company($id);

        $this->load->model('User_profile_models');
        $user_profile = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($company_name->user_profile_iduser_profile);

        $data_value = [];
        array_push($data_value, [

            'company_name' => $company_name->company_name,
            'address' => $user_profile->p_address,
            'email' => $user_profile->email,
            'phone_number' => $user_profile->primary_contact_number,

            'distributor' => $distributor,
            'order_id' => $order_code,

//            'date_and_time' =>$invoice_code->date." ".$invoice_code->time,
//            'invoice_id' => $invoice_code->invoice_code,

        ]);

        header('Content-Type: application/json');
        $encode_data = json_encode($data_value);
        echo $encode_data;

        }

        }

    function update_issued_quntity()
    {

        $item_code = $this->input->post('item_code');
        $quantity = $this->input->post('quantity');

        $order_code = $this->input->post('order_code');

        $this->load->model('stock/stock_description_models');
        $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item_code);

        $physical_qty = $stock->physical_qty;
        $available_qty = $stock->available_qty;

        //..............................................................................................................

        $this->load->model('customer_order_management/ref_order_models');
        $ref_order_ID = $this->ref_order_models->where_search_ref_oder_pass_order_code($order_code);

        $this->load->model('customer_order_management/ref_order_has_stock_description_models');
        $ref_order_has_stock_description = $this->ref_order_has_stock_description_models->where_search_ref_order_has_stock_description_for_get_data($ref_order_ID->idref_order, $stock->idstock);

        if ($ref_order_has_stock_description !== false) {

            $issued_qty = $ref_order_has_stock_description->issued_qty;
            $order_qty = $ref_order_has_stock_description->order_qty;

            $order_pending_qty = $order_qty * 1 - $issued_qty * 1;

            $new_pending_qty = $order_pending_qty * 1 - $quantity * 1;

            $new_available_qty = $physical_qty * 1 - $order_qty * 1;

            $this->load->model('stock/stock_description_models');
            $this->stock_description_models->update_stock_description_quantity($stock->idstock, $new_pending_qty, $new_available_qty);

            $issued_qty = $issued_qty * 1 + $quantity * 1;

            $this->load->model('customer_order_management/ref_order_has_stock_description_models');
            $this->ref_order_has_stock_description_models->update_ref_order_has_stock_description($ref_order_ID->idref_order, $stock->idstock, $issued_qty);

        }

    }


}