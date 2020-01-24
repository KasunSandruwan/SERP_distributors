<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/13/2018
 * Time: 9:37 AM
 */

class price_history_has_stock_description_models extends CI_Model
{
    function insert_price_history_has_stock_description(){


        $data = array(

            'price_value' => $this->input->post('branch-code', true),
            'price_from' => $this->input->post('branch-name', true),
            'price_to' => $this->input->post('branch-contact_number', true),
            'precentage' => $this->input->post('branch-email', true),

//            'price_type_idprice_type' => //Foreing Key
//            'stock_description_idstock' => //Foreing Key

        );

        $this->db->insert('price_history_has_stock_description', $data);

        return true;


    }

}