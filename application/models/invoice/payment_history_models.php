<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/18/2018
 * Time: 5:09 PM
 */

class payment_history_models extends CI_Model
{

    function insert_payment_history(){

        $data = array(

            'payment_date' => $this->input->post('item_name', true),
            'payment_amount' => $this->input->post('item_name', true),
            'status' => $this->input->post('item_name', true),
            'remark' => $this->input->post('item_name', true),

         //   'invoice_idInvoice1' => Foreign key,
         //   'payment_mode_idpayment_mode' => Foreign key,
         //   'user_login_iduser_login1' => Foreign key,

        );

        $this->db->insert('payment_history', $data);

        return true;


    }


}