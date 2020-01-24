<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/8/2018
 * Time: 11:05 AM
 */

class service_category_models extends CI_Model
{

    function insert_service_category(){

        $data = array(
            'service_category' => $this->input->post('service_category', true),
        );

        $this->db->insert('service_category', $data);

        return true;

    }

    function all_search_service_category(){

        $query = $this->db->get('service_category');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }

    }

    function where_search_service_category($value){

        $this->db->where('service_category', $value);
        $query = $this->db->get('service_category');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }


}