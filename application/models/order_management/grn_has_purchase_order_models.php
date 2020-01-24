<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/31/2018
 * Time: 5:31 PM
 */

class grn_has_purchase_order_models extends CI_Model{

    function insert_grn_has_purchase_order($purchase_order_id,$idstock,$item){


        $data = array(

            'purchase_order_idorder' =>$purchase_order_id,
            'stock_description_idstock' =>$idstock,
            'ordered_qty' =>$item['quantity'],
            'recived_qty' =>'0',
            'item_Status' =>'pending',

        );

        $this->db->insert('grn_has_purchase_order', $data);

        return "true";


    }

    function where_search_grn_has_purchase_order_pass_purchase_id($idorder){

        $this->db->where('purchase_order_idorder', $idorder);
        $this->db->where('item_Status', 'pending');
        $query = $this->db->get('grn_has_purchase_order');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }

    function update_grn_has_purchase_order($grn_has_purchase_orderid,$recived_qty,$item_Status){

        $this->db->set('recived_qty', $recived_qty);
        $this->db->set('item_Status', $item_Status);

        $this->db->where('grn_has_purchase_orderid', $grn_has_purchase_orderid);

        $this->db->update('grn_has_purchase_order');

        return true;

    }

    function where_grn_has_purchase_order_pass_purchase_order_id_and_stock_description_id($idstock,$idorder){

        $this->db->where('purchase_order_idorder', $idorder);
        $this->db->where('stock_description_idstock', $idstock);

        $query = $this->db->get('grn_has_purchase_order');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }









}