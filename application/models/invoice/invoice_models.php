<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/18/2018
 * Time: 4:46 PM
 */

class invoice_models extends CI_Model
{

    function insert_invoice($full_discount, $payment_status, $borrow_amount, $iddistributor, $idcustomer)
    {

        $date = "%Y-%m-%d";
        $time = "%h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $result = $this->get_invoice_maxid();
        $Max_ID = $result->idInvoice + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $user_login_id = $this->session->userdata('user_login_ID');
        $branchid =  $this->session->userdata('user_branch');

        $data = array(

            'net_total' => $this->input->post('net_total', true),
//            'payment_mode_ammount' => $this->input->post('item_name', true),
            'discount' => $full_discount,

            'date' => mdate($date),
            'time' => mdate($time),

            'payed_ammount' => $this->input->post('balance', true),
            'cash_payed' => $this->input->post('free', true),
//            'payment_no' => $this->input->post('payment_method', true),
            'payment_mode' => $this->input->post('payment_method', true),

            'invoice_code' => 'IN-' . $formatnumber,
            'payment_status' => $payment_status,
            'borrow_amount' => $borrow_amount,
            'finish' => 'not_delivery',


//            'agreement_no' => $this->input->post('warranty_type', true) . " " . $this->input->post('warranty', true),

            'user_login_iduser_login' => $user_login_id,

            'customer_idcustomer' => $idcustomer,
            'distributor_iddistributor' => $iddistributor,
            'branch_idbranch' =>$branchid,

        );


        $this->db->insert('invoice', $data);

        return $this->db->insert_id();

    }

    function get_invoice_maxid()
    {

        $this->db->select_max('idInvoice');
        $query = $this->db->get('invoice');

        return $query->row(0);
    }


    function like_search_invoice_code($value)
    {

        $this->db->from('invoice');

        $this->db->where('finish', 'not_delivery');
        $this->db->like('invoice_code', $value);

        $query = $this->db->get();

        return $query->result();

    }

    function where_search_invoice_code($value)
    {

        $this->db->where('invoice_code', $value);
        $query = $this->db->get('invoice');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function where_search_invice_ID($value)
    {

        $this->db->where('idInvoice', $value);
        $query = $this->db->get('invoice');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function where_search_invoice_status_susses(){

        $this->db->where('payment_status','Susses');
        $query = $this->db->get('invoice');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }



    function all_search_invoice()
    {

        $query = $this->db->get('invoice');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_invoice_pass_branch_id_payment_status($idbranch){


          $this->db->where('branch_idbranch',$idbranch);
          $this->db->where('payment_status', 'Susses');

        $query = $this->db->get('invoice');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }







}