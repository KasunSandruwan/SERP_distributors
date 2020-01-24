<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/13/2018
 * Time: 9:53 AM
 */

class stock_description_has_service_type_models extends CI_Model
{

    function insert_stock_description_has_service_type($service_type_ID,$stock_description_id,$idmesure){

        $data = array(

            'Qty' => $this->input->post('Quantity_modal', true),
            'is_delete' =>'Active',

            'service_type_Services' => $service_type_ID,
            'stock_description_idstock' =>$stock_description_id,
            'mesure_idmesure' =>$idmesure,

        );

        $this->db->insert('stock_description_has_service_type', $data);

        return true;

    }


    function where_search_stock_description_has_service_type_pass_service_id($value){

        $this->db->where('service_type_Services', $value);
        $query = $this->db->get('stock_description_has_service_type');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }


    }




}