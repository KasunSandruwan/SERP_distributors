<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/31/2018
 * Time: 4:37 PM
 */

class Order_management_controller extends CI_Controller{

    function load_order_type(){

        $this->load->model('order_management/order_type_models');
        $order_type = $this->order_type_models->all_search_order_type();

        $data = [];

        foreach ($order_type as $row) {

            array_push($data, [
                'id' => $row->idorder_type,
                'order_type' => $row->order_type,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function  order_insert(){


        $data = $_POST['datatable'];
        $json = json_decode($data, true);

        $branch = $this->input->post('branch');
        $id = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $branch_result = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch, $id);

        if($branch_result !==false){

            $branch_ID = $branch_result->idbranch;

        }else{
            $branch_ID =0;
        }

        $supplier_code = $this->input->post('supplier');
        $this->load->model('profile_management/supplier_models');
        $supplier = $this->supplier_models->where_search_supplier_pass_supplier_code($supplier_code);

        $idsupplier = $supplier->idsupplier;

        $order_type = $this->input->post('order_type');
        $this->load->model('order_management/order_type_models');
        $order_type_result = $this->order_type_models->where_search_order_type($order_type);

        $idorder_type = $order_type_result->idorder_type;

        $this->load->model('order_management/purchase_order_models');
        $purchase_order_ID = $this->purchase_order_models->insert_purchase_order($idsupplier,$idorder_type,$branch_ID);

        foreach ($json as $item) {

            $this->load->model('stock/stock_description_models');
            $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item['item_code']);

            $this->load->model('order_management/grn_has_purchase_order_models');
            $response = $this->grn_has_purchase_order_models->insert_grn_has_purchase_order($purchase_order_ID,$stock->idstock,$item);

            echo $response;

        }


    }


    function load_order_has_branch(){


        $branch = $this->input->post('branch');
        $id = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $branch_result = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch, $id);

        if($branch_result !==false){

            $branch_ID = $branch_result->idbranch;

        }else{
            $branch_ID =0;
        }

        $this->load->model('order_management/purchase_order_models');
        $purchase_result= $this->purchase_order_models->where_search_purchase_order_pass_branch_id($branch_ID);


        if($purchase_result !==false){

            $data = [];

            foreach ($purchase_result as $row) {

                array_push($data, [
                    'order_code' => $row->order_code,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }else{

            echo 'No_Order';

        }

    }

    function purchase_order_stock_load_for_table(){

        $order_id = $this->input->post('order_id');

        $this->load->model('order_management/purchase_order_models');
        $pass_order_id= $this->purchase_order_models->where_search_purchase_order_pass_order_code($order_id);

        if($pass_order_id !==false){

            $this->load->model('order_management/grn_has_purchase_order_models');
            $response = $this->grn_has_purchase_order_models->where_search_grn_has_purchase_order_pass_purchase_id($pass_order_id->idorder);

            if($response !==false){

                $data = [];

                foreach ($response as $row){

                    $order_qty=$row->ordered_qty;
                    $recived_qty=$row->recived_qty;

                    $quantity=$order_qty *1 - $recived_qty*1;

                    $this->load->model('stock/stock_description_models');
                    $stock_description= $this->stock_description_models->where_search_stock_description_pass_stock_id($row->stock_description_idstock);


                    $this->load->model('stock/stock_description_has_branch_models');
                    $stock_description_has_branch = $this->stock_description_has_branch_models->where_search_stock_description_has_branch($row->stock_description_idstock);

                    // get category.............................................................................................

                    $this->load->model('stock/sub_category_models');
                    $sub_category = $this->sub_category_models->where_search_sub_category_pass_category_ID($stock_description->sub_category_idsub_category);

                    // get Bill name ...........................................................................................

                    $this->load->model('stock/item_models');
                    $bill_name = $this->item_models->where_search_item_category($row->stock_description_idstock);

                    array_push($data, [

                        'item_code' => $stock_description->item_code,
                        'description' => $stock_description->description,
                        'quantity' => $quantity,
                        'cost_price' => $stock_description_has_branch->cost_price,
                        'wholesale_price' => $stock_description_has_branch->wholesale_price,
                        'retail_price' => $stock_description_has_branch->selling_price,
                        'bill_name' => $bill_name->bill_name,

                    ]);

                }
                header('Content-Type: application/json');
                $encode_data = json_encode($data);
                echo $encode_data;

                }

            }

        }

    function load_grn_type(){

        $this->load->model('grn/grn_type_models');
        $grn_type = $this->grn_type_models->all_search_grn_type();

        $data = [];

        foreach ($grn_type as $row) {

            array_push($data, [
                'id' => $row->idgrn_type,
                'grn_type' => $row->grn_type_name,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }



}