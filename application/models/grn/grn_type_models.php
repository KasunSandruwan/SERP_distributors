<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/2/2018
 * Time: 3:44 PM
 */

class grn_type_models extends CI_Model
{

    function all_search_grn_type(){

        $query = $this->db->get('grn_type');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }


    function where_search_grn_type($value){

        $this->db->where('grn_type_name', $value);
        $query = $this->db->get('grn_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }






}