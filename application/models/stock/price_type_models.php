<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 6:15 PM
 */

class price_type_models extends CI_Model
{

    function insert_price_type(){

        $data = array(

            'price_type' => $this->input->post('branch-code', true),

        );

        $this->db->insert('price_type', $data);

        return true;


    }


}