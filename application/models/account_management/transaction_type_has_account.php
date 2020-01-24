<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/6/2018
 * Time: 10:08 AM
 */

class transaction_type_has_account extends CI_Model
{

    function insert_transaction_type_has_account($account_id,$idtransaction_type)
    {

        $date = "%Y-%m-%d";
        $time ="%h:%i %A";

        date_default_timezone_set('Asia/Colombo');

        $user_login_id = $this->session->userdata('user_login_ID');

        $data = array(

            'date' =>mdate($date),
            'time' =>mdate($time),
            'value_credit' => $this->input->post('credit_value', true),
            'value_debit' => $this->input->post('debit_value', true),
            'status' => 'pending',
            'account_idaccount' => $account_id,
            'transaction_type_idtransaction_type' => $idtransaction_type,

        );

        $this->db->insert('transaction_type_has_account', $data);

        return true;


    }




}