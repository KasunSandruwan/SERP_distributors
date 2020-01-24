<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/15/2018
 * Time: 2:00 PM
 */

class grn_has_stock_description_models extends CI_Model
{

    function insert_grn_has_stock_description($grn_id, $stock_id, $item,$idorder)
    {

        $data = array(

            'quantity' => $item['Received_quantity'],
            'total' => $item['total'],
            'discount' => $item['discount'],
            'expire_date' => $item['expire_date'],
            'available_qty' => $item['Received_quantity'],
            'free_qty' => $item['free_quantity'],
            'unit_price' => $item['cost_price'],
            'grn_status' => 're_change',
            'grn_idGRN' => $grn_id,
            'stock_description_idstock' => $stock_id,
            'purchase_order_idorder' =>$idorder,

        );

        $this->db->insert('grn_has_stock_description', $data);

    }


    function get_grn_price_grn_has_stock_description($grn_id,$idstock){

        $this->db->where('grn_idGRN',$grn_id);

        $this->db->where('stock_description_idstock',$idstock);
        $query = $this->db->get('grn_has_stock_description');

        if($query->result()) {
            return $query->result();
        }else{
           return false;
        }

    }

    function update_available_stock_count($available_qty,$grn_item_list_id){

        $this->db->set('available_qty',$available_qty);

        $this->db->where('grn_item_list_id', $grn_item_list_id);
        $this->db->update('grn_has_stock_description');


    }






}