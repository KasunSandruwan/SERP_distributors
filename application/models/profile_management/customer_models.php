<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/30/2018
 * Time: 2:26 PM
 */

class customer_models extends CI_Model
{

    function insert_customer($iduser_profile,$customer_type_id)
    {

        $data = array(

            'customer_points' => '0',
            'user_profile_iduser_profile' => $iduser_profile,
            'credit_limit' =>$this->input->post('credit_limit', true),
            'customer_type_idcustomer_type' =>$customer_type_id,

        );

        $this->db->insert('customer', $data);
        return true;

    }

    function all_search_customer(){

        $query = $this->db->get('customer');

        if($query->result()){
            return  $query->result();
        }else{
            return false;
        }

    }

    function where_search_customer_pass_customer_id($value){

        $this->db->where('idcustomer', $value);
        $query = $this->db->get('customer');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }



}