<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/5/2018
 * Time: 2:26 PM
 */

class expenses_values_model extends CI_Model
{

    function insert_expenses_values($expenses_id,$iddistributor)
    {

        $date = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $user_login_id = $this->session->userdata('user_login_ID');

        $data = array(

            'voucher' =>$this->input->post('voucher', true),
            'voucher_number' => $this->input->post('voucher_number', true),
            'exp_date' => $this->input->post('exp_date', true),
            'exp_description' => $this->input->post('exp_description', true),
            'exp_value' => $this->input->post('exp_value', true),
            'added_date' => mdate($date),
            'exp_duration' => $this->input->post('exp_duration', true),

            'user_login_iduser_login' => $user_login_id,
            'distributor_iddistributor' => $iddistributor,
            'expenses_idexpenses' => $expenses_id,
        );

        $this->db->insert('expenses_values', $data);

        return true;


    }

}