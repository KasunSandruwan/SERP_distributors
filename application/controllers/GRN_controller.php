<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/28/2018
 * Time: 10:19 AM
 */

class GRN_controller extends CI_Controller
{

    function grn_insert()
    {

        $data = $_POST['datatable'];
        $json = json_decode($data, true);

        $full_discount = 0;

        foreach ($json as $item) {

            $discount = $item['discount'];

            $full_discount = $full_discount * 1 + $discount * 1;

        }

        $supplier_code = $this->input->post('supplier');

        $this->load->model('profile_management/supplier_models');
        $supplier = $this->supplier_models->where_search_supplier_pass_supplier_code($supplier_code);

        $grn_type = $this->input->post('grn_type');

        $this->load->model('grn/grn_type_models');
        $grn_type = $this->grn_type_models->where_search_grn_type($grn_type);

        if ($supplier !== false) {

            $branch = $this->input->post('branch');
            $id = $this->session->userdata('companyID');

            $this->load->model('Branch_models');
            $branch_result = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch, $id);

            if($branch_result !==false){

                $branch_ID = $branch_result->idbranch;

            }else{
                $branch_ID =0;
            }

            $idsupplier = $supplier->idsupplier;

            $this->load->model('grn/grn_models');
            $grn_id = $this->grn_models->inset_grn($full_discount, $idsupplier, $grn_type->idgrn_type,$branch_ID);

        }

        $count = 0;
        $switch = true;

        foreach ($json as $item) {

            $count++;

            $quantity = $item['Received_quantity'];

            $this->load->model('stock/stock_description_models');
            $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item['item_code']);

            $stock_quantity = $stock->quantity;
            $full_quantity = $stock_quantity * 1 + $quantity * 1;

            $this->load->model('stock/stock_description_models');
            $this->stock_description_models->update_stock_description_quantity($item['item_code'], $full_quantity);

            // get branch login time create.............................................................................

            $branchid =$this->session->userdata('user_branch');

            $this->load->model('stock/stock_description_has_branch_models');
            $stock_description_has_branch_result = $this->stock_description_has_branch_models->where_search_stock_branch_and_stock_description_has_branch($stock->idstock, $branchid);

            $physical_qty = $stock_description_has_branch_result->physical_qty;

            $pending_qty = $stock_description_has_branch_result->pending_qty;

            $available_qty = $physical_qty * 1 - $pending_qty * 1;

            $new_physical_qty = $physical_qty * 1 + $quantity * 1;

            $new_available_qty = $available_qty * 1 + $quantity * 1;

            $this->load->model('stock/stock_description_has_branch_models');
            $this->stock_description_has_branch_models->update_stock_Qunty_stock_description_has_branch($stock->idstock, $branchid, $new_physical_qty, $new_available_qty, $item);

            if($item['order_id'] ==="" || $item['order_id']===null || $item['order_id']==='No' ){

                $this->load->model('grn/grn_has_stock_description_models');
                $this->grn_has_stock_description_models->insert_grn_has_stock_description($grn_id, $stock->idstock, $item,null);

            }else{

                $this->load->model('order_management/purchase_order_models');
                $pass_order_id = $this->purchase_order_models->where_search_purchase_order_pass_order_code($item['order_id']);

                if ($pass_order_id !== false) {

                    $this->load->model('grn/grn_has_stock_description_models');
                    $result = $this->grn_has_stock_description_models->insert_grn_has_stock_description($grn_id, $stock->idstock, $item, $pass_order_id->idorder);


                    $this->load->model('order_management/grn_has_purchase_order_models');
                    $result_grn_has_stock_description = $this->grn_has_purchase_order_models->where_grn_has_purchase_order_pass_purchase_order_id_and_stock_description_id($stock->idstock, $pass_order_id->idorder);

                    if ($result_grn_has_stock_description !== false) {

                        $ordered_qty = $result_grn_has_stock_description->ordered_qty;

                        if ($ordered_qty > $quantity) {

                            $item_Status = "pending";
                            $switch = false;

                        } else {

                            $item_Status = "Susses";

                        }

                        $this->load->model('order_management/grn_has_purchase_order_models');
                        $response = $this->grn_has_purchase_order_models->update_grn_has_purchase_order($result_grn_has_stock_description->grn_has_purchase_orderid, $quantity, $item_Status);

                        if (sizeof($json) === $count - 1) {
                            if ($switch) {
                                $order_Status = "Susses";

                                $this->load->model('order_management/purchase_order_models');
                                $this->purchase_order_models->update_purchase_order($pass_order_id->idorder, $order_Status);

                            }

                        }

                    }

                }

            }

        }


        $borrow_amount = $this->input->post('total_due');
        $borrow_amount = $borrow_amount * 1;

        if ($borrow_amount > 0) {

            $supplier_borrow = $supplier->borrow_amount;
            $supplier_borrow_amount = $supplier_borrow * 1 + $borrow_amount * 1;

            $this->load->model('profile_management/supplier_models');
            $result = $this->supplier_models->update_supplier_borrow_amount($supplier_borrow_amount, $idsupplier);

            echo $full_discount . " Supplier Borrow Rs- " . $result;

        }

    }


}