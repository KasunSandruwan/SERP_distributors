<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/21/2018
 * Time: 1:18 PM
 */

class Delivery_management_controller extends CI_Controller
{


    function insert_delivery_note(){

        $data = $_POST['datatable'];
        $json = json_decode($data, true);

        foreach ($json as $item) {

            $asset=$this->input->post('asset');

            $this->load->model('assets_management/asset_models');
            $result = $this->asset_models->where_search_asset_pass_asset_name($asset);

            $idasset=$result->idasset;

            //get driver id.............................................................................................

            $driver_code=$this->input->post('driver_code');

            $this->load->model('profile_management/driver_models');
            $result_driver_code = $this->asset_models->where_search_driver_pass_driver_code($driver_code);

            $iddriver=$result_driver_code->iddriver;

            $this->load->model('delivery_management/delivery_models');
            $id_delivery = $this->delivery_models->insert_delivery_models($idasset,$iddriver);

            $this->load->model('delivery_management/delivery_note_models');
            $delivery_note = $this->delivery_note_models->insert_delivery_note_models($id_delivery);

            // get delivery note models ................................................................................

            $this->load->model('stock/stock_description_models');
            $stock = $this->stock_description_models->where_search_stock_description_pass_item_code($item['item_code']);

            $this->load->model('delivery_management/stock_description_has_delivery_note_models');
            $result = $this->stock_description_has_delivery_note_models->insert_stock_description_has_delivery_note($stock->idstock,$delivery_note,$item);

            // invoice Code ............................................................................................

            $invoice_code=$this->input->post('invoice_id');

            $this->load->model('invoice/invoice_models');
            $result_invoice_id = $this->invoice_models->where_search_invoice_code($invoice_code);

            $invoice_id=$result_invoice_id->idInvoice;

            $this->load->model('invoice/invoice_has_stock_description_models');
            $result_invoice_has_stock_description = $this->invoice_has_stock_description_models->where_search_invoice_has_stock_description_pass_invoice_id_and_stock_description($invoice_id,$stock->idstock);

            if($result_invoice_has_stock_description !==false){

                $order_qty=$result_invoice_has_stock_description->quantity;
                $delivered_qty=$item['quantity'];

                if($order_qty*1 <= $delivered_qty*1){
                    $status="susses";
                }else{
                    $status="pending";
                }

                $idinvoice_item_list=$result_invoice_has_stock_description->invoice_item_list;

                $this->load->model('invoice/invoice_has_stock_description_models');
                $result = $this->invoice_has_stock_description_models->update_invoice_has_stock_description_delivery_qty_and_status($idinvoice_item_list,$delivered_qty,$status);


            }



        }


    }




}