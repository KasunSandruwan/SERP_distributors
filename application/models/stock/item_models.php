<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 5:50 PM
 */

class item_models extends CI_Model
{

    function  insert_item($idstock){

        $data = array(

            'bill_name' => $this->input->post('bill_name', true),
            'stock_description_idstock' => $idstock,

        );

        $this->db->insert('item', $data);

        return true;

    }


    function where_search_item_category($value){

        $this->db->where('stock_description_idstock',$value);
        $query = $this->db->get('item');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }

    function update_item($value){


        $this->db->set('bill_name',$this->input->post('bill_name', true));

        $this->db->where('stock_description_idstock', $value);
        $this->db->update('item');

        return true;

    }


}