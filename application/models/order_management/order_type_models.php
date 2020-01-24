<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/31/2018
 * Time: 4:33 PM
 */

class order_type_models extends CI_Model
{

    function all_search_order_type()
    {

        $query = $this->db->get('order_type');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }


    function where_search_order_type($value){

        $this->db->where('order_type', $value);
        $query = $this->db->get('order_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }


}