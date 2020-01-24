<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/18/2018
 * Time: 4:56 PM
 */

class invoice_has_stock_description_models extends CI_Model
{

    function insert_invoice_has_stock_description($stockid,$service_id,$item,$invoice_id,$grn_price,$idref_order){

        $data = array(

            'quantity' =>$item['quantity'],
            'unit_price' =>$item['price'],
            'subtotal' =>$item['total'],
            'discount' =>$item['discount'],

            'grn_price' => $grn_price,

//            'price_type' => $this->input->post('Quantity', true),
        // create warrenty form.........................................................................................

//            'war_period' => $this->input->post('free', true),


            'remark' =>'paid',

            'invoice_idInvoice' =>$invoice_id,
            'stock_description_idstock' =>$stockid,
            'service_type_Services' =>$service_id,
            'ref_order_idref_order' =>$idref_order,
            'delivered_status' =>'pending',

        );

        $this->db->insert('invoice_has_stock_description', $data);

        return true;


    }

    function where_search_invoice_has_stock_description_pass_stock_description_id_and_invoice_id($idstock){

        $this->db->where('stock_description_idstock', $idstock);
        $query = $this->db->get('invoice_has_stock_description');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }

    function where_search_invoice_has_stock_description($value){

        $this->db->where('invoice_idInvoice', $value);
        $query = $this->db->get('invoice_has_stock_description');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }
 function where_search_invoice_has_stock_description_delivery_status($value){

        $this->db->where('invoice_idInvoice', $value);
        $this->db->where('delivered_status', 'pending');
        $query = $this->db->get('invoice_has_stock_description');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_invoice_has_stock_description_pass_invoice_id_and_stock_description($invoice_id,$idstock){

        $this->db->where('invoice_idInvoice', $invoice_id);
        $this->db->where('stock_description_idstock',$idstock);
        $this->db->where('delivered_status', 'pending');
        $query = $this->db->get('invoice_has_stock_description');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }
    function update_invoice_has_stock_description_delivery_qty_and_status($idinvoice_item_list,$delivered_qty,$status){

        $this->db->set('delivered_qty', $delivered_qty);
        $this->db->set('delivered_status', $status);

        $this->db->where('invoice_item_list', $idinvoice_item_list);
        $this->db->update('invoice_has_stock_description');



    }




}