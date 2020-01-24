<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/18/2018
 * Time: 5:06 PM
 */

class payment_mode_models extends CI_Model
{

    function insert_payment_mode(){

        $data = array(

            'payment_mode' => $this->input->post('item_name', true),

        );

        $this->db->insert('payment_mode', $data);

        return true;

    }

    function search_payment_mode(){


        $query = $this->db->get('payment_mode');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }



    }


}