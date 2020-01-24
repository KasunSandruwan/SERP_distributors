<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/13/2018
 * Time: 2:29 PM
 */

class Stock_controller extends CI_Controller
{

    function get_item_code()
    {

        $this->load->model('Get_max_id_models');
        $result = $this->Get_max_id_models->get_stock_item_max_id();

        $MaxID = $result->idstock;

        $formatnumber = sprintf('%04u', $MaxID + 1);

        echo 'IT-' . $formatnumber;

    }


    function load_item_category()
    {

        $this->load->model('stock/sub_category_models');
        $result = $this->sub_category_models->search_items_category();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idsub_category,
                'category' => $row->sub_c,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function mesure_type_load()
    {

        $this->load->model('stock/mesure_models');
        $result = $this->mesure_models->search_mesure();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idmesure,
                'mesure' => $row->sub_mesure_typ,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function save_stock_item()
    {
        // get mesure ID................................................................................................

        $mesure_type = $this->input->post('type');

        $this->load->model('stock/mesure_models');
        $result_mesure_id = $this->mesure_models->where_search_mesure_pass_mesre_name($mesure_type);

        $mesure_id = $result_mesure_id->idmesure;

        // get sub_category ID .........................................................................................

        $item_category = $this->input->post('item_category');

        $this->load->model('stock/sub_category_models');
        $result_sub_category_ID = $this->sub_category_models->where_search_sub_category_pass_category($item_category);

        $sub_category_ID = $result_sub_category_ID->idsub_category;

        // get branch...................................................................................................

        $branch = $this->input->post('branch');

        $this->load->model('Branch_models');
        $branch_result = $this->Branch_models->get_branch_id($branch);

        $branch_id = $branch_result->idbranch;

        // check all ready add value....................................................................................

        $item_name = $this->input->post('item_name');

        $this->load->model('stock/stock_description_models');
        $stock_description = $this->stock_description_models->all_ready_add_items($item_name);

        if ($stock_description == false) {

            $this->load->model('stock/stock_description_models');
            $stock_description_ID = $this->stock_description_models->insert_stock_description($sub_category_ID, $mesure_id);

            $this->load->model('stock/item_models');
            $result = $this->item_models->insert_item($stock_description_ID);

            $this->load->model('stock/stock_description_has_branch_models');
            $stock_description_has_branch = $this->stock_description_has_branch_models->insert_stock_description_has_branch($stock_description_ID, $branch_id);

        }


    }


    function service_load_for_table()
    {


        $this->load->model('stock/service_type_models');
        $service_type = $this->service_type_models->search_service_type();


        $data = [];

        foreach ($service_type as $row) {

            array_push($data, [
                'Services' => $row->Services,
                'service_type' => $row->service_type,
                'price' => $row->price,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }

    function stock_load_for_table()
    {

        $this->load->model('stock/stock_description_models');
        $stock_description = $this->stock_description_models->all_search_stock_description();

        $data = [];

        if ($stock_description !== false) {

            foreach ($stock_description as $row) {

                $this->load->model('stock/stock_description_has_branch_models');
                $stock_description_has_branch = $this->stock_description_has_branch_models->where_search_stock_description_has_branch($row->idstock);

                // get mesure type..........................................................................................

                $this->load->model('stock/mesure_models');
                $mesure_models = $this->mesure_models->where_search_mesure_pass_mesre_name_id($row->mesure_idmesure);


                // get category.............................................................................................

                $this->load->model('stock/sub_category_models');
                $sub_category = $this->sub_category_models->where_search_sub_category_pass_category_ID($row->sub_category_idsub_category);

                // get Bill name ...........................................................................................

                $this->load->model('stock/item_models');
                $bill_name = $this->item_models->where_search_item_category($row->idstock);

                array_push($data, [

                    'item_code' => $row->item_code,
                    'description' => $row->description,
                    'quantity' => $row->available_qty,
                    'cost_price' => $stock_description_has_branch->cost_price,
                    'wholesale_price' => $stock_description_has_branch->wholesale_price,
                    'retail_price' => $stock_description_has_branch->selling_price,
                    'barcode' => $row->barcode,
                    'category' => $sub_category->sub_c,
                    'type' => $mesure_models->mesure_typ,
                    'bill_name' => $bill_name->bill_name,

                ]);

            }
            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "No-data";
        }


    }


    function update_stock()
    {

        // get mesure ID................................................................................................

        $mesure_type = $this->input->post('type');

        $this->load->model('stock/mesure_models');
        $result_mesure_id = $this->mesure_models->where_search_mesure_pass_mesre_name($mesure_type);

        $mesure_id = $result_mesure_id->idmesure;

        // get sub_category ID .........................................................................................

        $item_category = $this->input->post('item_category');

        $this->load->model('stock/sub_category_models');
        $result_sub_category_ID = $this->sub_category_models->where_search_sub_category_pass_category($item_category);

        $sub_category_ID = $result_sub_category_ID->idsub_category;


        $item_code = $this->input->post('item_code');

        $this->load->model('stock/stock_description_models');
        $this->stock_description_models->update_stock_description($item_code, $sub_category_ID, $mesure_id);


        $this->load->model('stock/stock_description_models');
        $result_stock_description_ID = $this->stock_description_models->where_search_stock_description_pass_item_code($item_code);


        $this->load->model('stock/stock_description_has_branch_models');
        $this->stock_description_has_branch_models->update_search_stock_description_has_branch($result_stock_description_ID->idstock);

        $this->load->model('stock/item_models');
        $result = $this->item_models->update_item($result_stock_description_ID->idstock);

        if ($result == true) {
            echo "true";
        }

    }

    function search_service_type()
    {

        $service_type = $this->input->post('service');

        $this->load->model('stock/service_type_models');
        $result = $this->service_type_models->like_search_service_type($service_type);


        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'service_type' => $row->service_type,
                'price' => $row->price,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }


    function where_search_service_type()
    {

        $service_type = $this->input->post('service');

        $this->load->model('stock/service_type_models');
        $result_service_type = $this->service_type_models->where_search_service_type_pass_service_type($service_type);

        $data = [];

        if ($result_service_type == false) {

            echo "false";

        } else if ($result_service_type) {

            $this->load->model('stock/stock_description_has_service_type_models');
            $result = $this->stock_description_has_service_type_models->where_search_stock_description_has_service_type_pass_service_id($result_service_type->Services);

            foreach ($result as $row) {

                $this->load->model('stock/item_models');
                $bill_name = $this->item_models->where_search_item_category($row->stock_description_idstock);

                $this->load->model('stock/stock_description_models');
                $stock_id = $this->stock_description_models->where_search_stock_description_pass_stock_id($row->stock_description_idstock);

                array_push($data, [

                    'item_code' => $stock_id->item_code,
                    'bill_name' => $bill_name->bill_name,
                    'qty' => $row->Qty,
                    'service' => $result_service_type->service_type,
                    'price' => $result_service_type->price,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }

    }

    function add_items_for_service()
    {


        $service_type = $this->input->post('service');

        $this->load->model('stock/service_type_models');
        $result = $this->service_type_models->where_search_service_type_pass_service_type($service_type);

        $item_code = $this->input->post('item_code_modal');

        $this->load->model('stock/stock_description_models');
        $result_stock_description_ID = $this->stock_description_models->where_search_stock_description_pass_item_code($item_code);

        $service_category=$this->input->post('service_category');

        $this->load->model('stock/service_category_models');
        $result_service_category = $this->service_category_models->where_search_service_category($service_category);

        $unit_type=$this->input->post('unit_type');

        $this->load->model('stock/mesure_models');
        $result_unit_type = $this->mesure_models->where_search_mesure_pass_mesre_name($unit_type);

         $idmesure=$result_unit_type->idmesure;


        if ($result == false) {

            $this->load->model('stock/service_type_models');
            $service_type_ID = $this->service_type_models->insert_service_type($result_service_category->idservice_category);

            $stock_description_id = $result_stock_description_ID->idstock;

            $this->load->model('stock/stock_description_has_service_type_models');
            $result_stock_has_description = $this->stock_description_has_service_type_models->insert_stock_description_has_service_type($service_type_ID, $stock_description_id,$idmesure);

        } else {

            $service_type_ID = $result->Services;

            $stock_description_id = $result_stock_description_ID->idstock;

            $this->load->model('stock/stock_description_has_service_type_models');
            $result_stock_has_description = $this->stock_description_has_service_type_models->insert_stock_description_has_service_type($service_type_ID, $stock_description_id,$idmesure);

        }

    }


    function load_payment_mode()
    {

        $this->load->model('invoice/payment_mode_models');
        $respons = $this->payment_mode_models->search_payment_mode();

        $data = [];

        foreach ($respons as $row) {

            array_push($data, [

                'payment_mode' => $row->payment_mode,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function load_sub_mesure_for_item()
    {

        $item_code = $this->input->post('item_code');

        $this->load->model('stock/stock_description_models');
        $result_stock_description_ID = $this->stock_description_models->where_search_stock_description_pass_item_code($item_code);

        if ($result_stock_description_ID !== false) {

            $this->load->model('stock/mesure_models');
            $result_mesure = $this->mesure_models->where_search_mesure_pass_mesre_name_id($result_stock_description_ID->mesure_idmesure);

            $this->load->model('stock/mesure_models');
            $respons = $this->mesure_models->where_search_mesure_pass_mesure_type_main($result_mesure->mesure_typ);

            $data = [];

            foreach ($respons as $row) {

                array_push($data, [

                    'mesure_type' => $row->sub_mesure_typ,
                    'mesure_value' => $row->mesure_value,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }

    }

    function get_mesure_value()
    {

        $mesure_type = $this->input->post('unit_type');

        $this->load->model('stock/mesure_models');
        $result_mesure_id = $this->mesure_models->where_search_mesure_pass_mesre_name($mesure_type);

        echo $result_mesure_id->mesure_value;

    }


    function get_stock_has_available()
    {
        $type = $this->input->post('type');
        $item_code = $this->input->post('item_code');

        $quantity = $this->input->post('mesure_quantity');

        switch ($type) {

            case "Item":

                $this->load->model('stock/stock_description_models');
                $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item_code);

                $branchid = $this->session->userdata('user_branch');

                $this->load->model('stock/stock_description_has_branch_models');
                $stock_description_has_branch_result = $this->stock_description_has_branch_models->where_search_stock_branch_and_stock_description_has_branch($stock->idstock, $branchid);

                $physical_qty = $stock_description_has_branch_result->physical_qty;
                $pending_qty = $stock_description_has_branch_result->pending_qty;

                $available_qty = $physical_qty * 1 - $pending_qty * 1;

                if ($quantity > $available_qty) {

                    echo "Not enough";

                } else {

                    $physical_qty = $stock_description_has_branch_result->physical_qty;

                    $pending_qty = $stock_description_has_branch_result->pending_qty;

                    $new_pending_qty = $pending_qty * 1 + $quantity * 1;

                    $available_qty = $physical_qty * 1 - $new_pending_qty * 1;

                    $this->load->model('stock/stock_description_has_branch_models');
                    $this->stock_description_has_branch_models->update_stock_pending_qty_stock_description_has_branch($stock_description_has_branch_result->stock_description_has_branchid, $new_pending_qty, $available_qty);

                }

                break;


            case "Service":

                $this->load->model('stock/service_type_models');
                $service_type = $this->service_type_models->where_search_service_type_pass_service_id($item_code);

                $this->load->model('stock/stock_description_has_service_type_models');
                $result_service_type = $this->stock_description_has_service_type_models->where_search_stock_description_has_service_type_pass_service_id($service_type->Services);

                $branchid = $this->session->userdata('user_branch');

                foreach ($result_service_type as $row_service_type) {

                    $service_quantity = $quantity * 1 * $row_service_type->Qty * 1;

                    $this->load->model('stock/stock_description_has_branch_models');
                    $stock_description_has_branch_result = $this->stock_description_has_branch_models->where_search_stock_branch_and_stock_description_has_branch($row_service_type->stock_description_idstock, $branchid);

                    $physical_qty = $stock_description_has_branch_result->physical_qty;

                    $pending_qty = $stock_description_has_branch_result->pending_qty;

                    $new_pending_qty = $pending_qty * 1 + $service_quantity * 1;

                    $available_qty = $physical_qty * 1 - $new_pending_qty * 1;

                    $this->load->model('stock/stock_description_has_branch_models');
                    $this->stock_description_has_branch_models->update_stock_pending_qty_stock_description_has_branch($stock_description_has_branch_result->stock_description_has_branchid, $new_pending_qty, $available_qty);

                }

                break;

            default :

                break;

        }

    }


    function cheque_payment()
    {

        $this->load->model('expensess/cheque_models');
        $this->cheque_models->insert_cheque();

    }

    function get_stock_has_available_for_order_invoice()
    {

        $item_code = $this->input->post('item_code');
        $quantity = $this->input->post('mesure_quantity');

        $this->load->model('stock/stock_description_models');
        $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item_code);

        $physical_qty = $stock->physical_qty;
        $pending_qty = $stock->pending_qty;

//        $available_qty = $physical_qty * 1 - $pending_qty * 1;

        if ($quantity > $pending_qty) {

            echo "Not enough";

        } else {

            $physical_qty = $stock->physical_qty;
            $pending_qty = $stock->pending_qty;

            $new_pending_qty = $pending_qty * 1 + $quantity * 1;
            $available_qty = $physical_qty * 1 - $new_pending_qty * 1;

            $this->load->model('stock/stock_description_models');
            $this->stock_description_models->update_stock_description_quantity($stock->idstock, $new_pending_qty, $available_qty);

        }

    }

    function remove_item_update_stock_has_available_quantity()
    {

        $item_code = $this->input->post('item_code');
        $quantity = $this->input->post('quantity');

        $this->load->model('stock/stock_description_models');
        $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item_code);

        $available_qty = $stock->available_qty;
        $pending_qty = $stock->pending_qty;

        $new_pending_qty = $pending_qty * 1 - $quantity * 1;
        $new_available_qty = $available_qty * 1 + $quantity * 1;

        $this->load->model('stock/stock_description_models');
        $this->stock_description_models->update_stock_description_quantity($stock->idstock, $new_pending_qty, $new_available_qty);


    }


    function service_category_save()
    {

        $this->load->model('stock/service_category_models');
        $result = $this->service_category_models->insert_service_category();

    }

    function all_search_service_category()
    {

        $this->load->model('stock/service_category_models');
        $respons = $this->service_category_models->all_search_service_category();

        $data = [];

        if ($respons !== false) {

            foreach ($respons as $row) {

                array_push($data, [

                    'idservice_category' => $row->idservice_category,
                    'service_category' => $row->service_category,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo 'No_Data';
        }

    }

    function get_sub_mesure(){

       $unit_typ= $this->input->post('unit_typ');

        $this->load->model('stock/mesure_models');
        $result = $this->mesure_models->where_search_mesure_pass_mesure_type_main($unit_typ);

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idmesure,
                'mesure' => $row->sub_mesure_typ,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }



}