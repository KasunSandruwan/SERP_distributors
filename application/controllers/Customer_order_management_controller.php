<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/7/2018
 * Time: 5:13 PM
 */

class Customer_order_management_controller extends CI_Controller
{

    function Customer_order_management_insert()
    {

        $data = $_POST['datatable'];
        $json = json_decode($data, true);

        $Customer = $this->input->post('Customer');

        $this->load->model('profile_management/customer_models');
        $customer_result = $this->customer_models->where_search_customer_pass_customer_id($Customer);

        if ($customer_result !== false) {

            $idcustomer = $customer_result->idcustomer;

        }

        $distributor = $this->input->post('distributor');

        $this->load->model('profile_management/distributor_models');
        $distributor_result = $this->distributor_models->where_search_distributor_pass_distributor_code($distributor);

        if ($distributor_result !== false) {

            $iddistributor = $distributor_result->iddistributor;

        }

        $this->load->model('customer_order_management/ref_order_models');
        $ref_order_ID = $this->ref_order_models->insert_ref_order($idcustomer, $iddistributor);

        foreach ($json as $item) {

            $this->load->model('stock/stock_description_models');
            $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item['item_code']);

            $this->load->model('customer_order_management/ref_order_has_stock_description_models');
            $response = $this->ref_order_has_stock_description_models->insert_ref_order($stock->idstock, $ref_order_ID, $item);

            echo $response;

        }

    }

    function load_discount_customer()
    {

        $Customer = $this->input->post('Customer');

        $this->load->model('profile_management/customer_models');
        $customer_result = $this->customer_models->where_search_customer_pass_customer_id($Customer);

        if ($customer_result !== false) {

            $idcustomer_type = $customer_result->customer_type_idcustomer_type;

            $this->load->model('profile_management/customer_type_models');
            $respons_customer_type = $this->customer_type_models->where_search_customer_type_pass_id($idcustomer_type);

            if ($respons_customer_type !== false) {

                $data = [];

                $idcustomer_type = $respons_customer_type->idcustomer_type;

                $this->load->model('profile_management/discount_range_models');
                $respons_discount_range = $this->discount_range_models->where_search_discount_range($idcustomer_type);

                array_push($data, [

                    'discount_difault' => $respons_discount_range->discount_difault,
                    'discount_max' => $respons_discount_range->discount_max,
                    'discount_min' => $respons_discount_range->discount_min,

                ]);

                header('Content-Type: application/json');
                $encode_data = json_encode($data);
                echo $encode_data;

            }

        } else {

            echo 'No_Data';
        }

    }

    // get Log in user Typ..............................................................................

    function load_distributor_code()
    {

        $userprofileID = $this->session->userdata('profileID');

        $this->load->model('profile_management/distributor_models');
        $result_distributor = $this->distributor_models->where_search_distributor_pass_user_profile_id($userprofileID);

        $distributor_code = "";

        if ($result_distributor !== false) {

            $distributor_code = $result_distributor->distributor;

        }

        echo $distributor_code;

    }

    function distributor_has_order()
    {

        $distributor = $this->input->post('distributor');

        $this->load->model('profile_management/distributor_models');
        $distributor_result = $this->distributor_models->where_search_distributor_pass_distributor_code($distributor);

        $data = [];

        if ($distributor_result !== false) {

            $iddistributor = $distributor_result->iddistributor;

            $this->load->model('customer_order_management/ref_order_models');
            $distributor_result = $this->ref_order_models->where_search_ref_order($iddistributor);

            if($distributor_result !==false) {

                foreach ($distributor_result as $row) {

                    $this->load->model('User_profile_models');
                    $respons_user_profile = $this->User_profile_models->where_search_customer($row->customer_idcustomer);

                    foreach ($respons_user_profile as $result_userprofile) {

                        $fname = $result_userprofile->fname;
                        $lname = $result_userprofile->lname;
                    }

                    array_push($data, [

                        'ref_order_code' => $row->ref_order_code,
                        'ref_order_date' => $row->ref_order_date,
                        'fname' => $fname,
                        'lname' => $lname,

                    ]);

                }

                header('Content-Type: application/json');
                $encode_data = json_encode($data);
                echo $encode_data;

            }else{

                echo 'No_Data';

            }

        } else {

            echo 'No_Data';

        }

    }

    function get_order_code_has_order()
    {

        $order_code = $this->input->post('order_code');

        $this->load->model('customer_order_management/ref_order_models');
        $ref_oder_ID = $this->ref_order_models->where_search_ref_oder_pass_order_code($order_code);

        if ($ref_oder_ID !== false) {

            $idref_order = $ref_oder_ID->idref_order;

            $this->load->model('customer_order_management/ref_order_has_stock_description_models');
            $result_order = $this->ref_order_has_stock_description_models->where_search_ref_order_has_stock_description($idref_order);

            $data = [];

            if ($result_order !== false) {

                foreach ($result_order as $row) {

                    $this->load->model('stock/stock_description_models');
                    $result_order = $this->stock_description_models->where_search_stock_description_pass_stock_id($row->stock_description_idstock);

                    $this->load->model('stock/item_models');
                    $bill_name = $this->item_models->where_search_item_category($row->stock_description_idstock);

                    $unit_price = $row->unit_price;

                    $total = $row->total;
                    $discount = $row->discount;

                    $order_qty = $row->order_qty;
                    $issued_qty = $row->issued_qty;

                    // Issued Quantity  ...................................

                    $qty = $order_qty * 1 - $issued_qty * 1;

                    // discount percentage ..............................

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
                        'total_amount' => $Total,
                        'customer_id' => $ref_oder_ID->customer_idcustomer,

                    ]);

                }
                header('Content-Type: application/json');
                $encode_data = json_encode($data);
                echo $encode_data;

            } else {

                echo 'No_Data';

            }


        }

    }

    function load_asset(){

        $this->load->model('assets_management/asset_models');
        $result_asset_active = $this->asset_models->all_search_asset_active();

        $data = [];

        foreach ($result_asset_active as $row){

            array_push($data, [

                'asset_name' => $row->asset_name,
//                'bill_name' => $bill_name->bill_name,

            ]);


        }
        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }

}