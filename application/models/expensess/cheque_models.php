<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/24/2018
 * Time: 6:22 PM
 */

class cheque_models extends CI_Model
{

    function insert_cheque()
    {

        $data = array(

            'bank' => $this->input->post('bank_name', true),
            'cheque_no' => $this->input->post('cheque_number', true),
            'ammount' => $this->input->post('amount', true),
            'expdate' => $this->input->post('exp_date', true),

//            'stock_description_idstock' => //Foreing Key

        );

        $this->db->insert('cheque', $data);

        return true;

    }


}