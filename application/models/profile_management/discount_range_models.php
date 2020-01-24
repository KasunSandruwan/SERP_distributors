<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/7/2018
 * Time: 12:15 PM
 */

class discount_range_models extends CI_Model{

    function insert_discount_range($customer_type_id){

        $data = array(
            'discount_max' =>$this->input->post('discount_max', true),
            'discount_min' =>$this->input->post('discount_min', true),
            'discount_difault' =>$this->input->post('default_discount', true),
            'status' =>'active',
            'customer_type_idcustomer_type' =>$customer_type_id,

        );

        $this->db->insert('discount_range', $data);
        return $this->db->insert_id();

    }

    function all_search_discount_range(){

        $query = $this->db->get('discount_range');

        if($query->result()){
            return  $query->result();
        }else{
            return false;
        }

    }


    function where_search_discount_range($idcustomer_type){

        $this->db->where('customer_type_idcustomer_type', $idcustomer_type);
        $this->db->where('status','active');
        $query = $this->db->get('discount_range');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }


    function update_discount_range_status($iddiscount_range){

        $this->db->set('status','de_active');

        $this->db->where('iddiscount_range', $iddiscount_range);
        $this->db->update('discount_range');

        return true;



    }





}