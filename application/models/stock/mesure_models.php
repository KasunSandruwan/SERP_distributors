<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 6:19 PM
 */

class mesure_models extends CI_Model
{

    function insert_mesure()
    {

        $data = array(

            'mesure_typ' => $this->input->post('branch-code', true),
            'sub_mesure_typ' => $this->input->post('branch-name', true),
            'mesure_value' => $this->input->post('branch-contact_number', true),

//            'stock_description_idstock' => //Foreing Key

        );

        $this->db->insert('mesure', $data);

        return true;

    }

    function search_mesure(){

        $query = $this->db->get('mesure');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_mesure_pass_mesre_name($value){

        $this->db->where('sub_mesure_typ', $value);
        $query = $this->db->get('mesure');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }


    function where_search_mesure_pass_mesre_name_id($value){

        $this->db->where('idmesure', $value);
        $query = $this->db->get('mesure');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }

    function where_search_mesure_pass_mesure_type_main($value){

        $this->db->where('mesure_typ', $value);
        $query = $this->db->get('mesure');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }


    }


}