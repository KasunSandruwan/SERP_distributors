<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/7/2018
 * Time: 10:54 AM
 */

class customer_type_models extends CI_Model{

    function insert_customer_type(){

        $data = array(
            'customer_type' =>$this->input->post('customer_type', true),
        );

        $this->db->insert('customer_type', $data);
        return true;
    }

    function all_search_customer_type(){

        $query = $this->db->get('customer_type');

        if($query->result()){
            return  $query->result();
        }else{
            return false;
        }

    }

    function where_search_customer_type_all_ready_add($value){

        $this->db->where('customer_type', $value);
        $query = $this->db->get('customer_type');

        if($query->result()){
            return true;
        }else{
            return false;
        }

    }

    function where_search_customer_type($value){

        $this->db->where('customer_type', $value);
        $query = $this->db->get('customer_type');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }

    function where_search_customer_type_pass_id($value){

        $this->db->where('idcustomer_type', $value);
        $query = $this->db->get('customer_type');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }




    
}

