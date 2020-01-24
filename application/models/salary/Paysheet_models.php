<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/12/2018
 * Time: 2:10 PM
 */

class Paysheet_models extends CI_Model
{

    // insert Pay sheet data............................................................................................

    function insert_paysheet($payment_circle,$employee_id,$employee_user_branch){

        $result = $this->get_paysheet_maxid();
        $Max_ID = $result->idpaysheet + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $data = array(

            'paysheet_code'=>'P - '.$formatnumber,
            'genarated_time'=>mdate($format),
//            'approved_by' =>foreign key user branch id,
            'payment_circle_payment_circle'=>$payment_circle,
            'employee_idemployee'=>$employee_id,
            'employee_user_branch_user_has_branchid'=>$employee_user_branch,
            'status'=>"pending",


        );

        $this->db->insert('paysheet', $data);

        $get_id = $this->db->insert_id();

        return $get_id;

    }

    //All Search pay_sheet .............................................................................................

    function  all_search_pay_sheet(){

        $query = $this->db->get('paysheet');
        return $query->result();

    }

    // where Search pay_sheet pass paysheet code........................................................................

    function where_search_paysheet_pass_paysheet_code($value){

        $this->db->where('paysheet_code', $value);
        $query = $this->db->get('paysheet');

        return $query->result();

    }

    // where Search pay_sheet pass year ................................................................................

    function where_search_paysheet_pass_year($value){

        $this->db->where('year', $value);
        $query = $this->db->get('paysheet');

        return $query->result();

    }

    // where Search pay_sheet pass month ...............................................................................

    function where_search_paysheet_pass_month($value){

        $this->db->where('month', $value);
        $query = $this->db->get('paysheet');

        return $query->result();

    }

    // where Search pay_sheet pass approved by..........................................................................

    function where_search_paysheet_pass_approved_by_id($value){

        $this->db->where('approved_by', $value);
        $query = $this->db->get('paysheet');

        return $query->result();

    }

    // where Search pay_sheet pass employee ID and payment circle ID ...................................................

    function where_search_paysheet_pass_employee_id_and_payment_circle($payment_circle_id,$employee_id){

        $this->db->where('payment_circle_payment_circle', $payment_circle_id);
        $this->db->where('employee_idemployee', $employee_id);

        $query = $this->db->get('paysheet');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        }else{

            return false;
        }

    }


    // where search pay sheet pass employee ID and status ..............................................................

    function where_search_paysheet_pass_employee_id_and_status($employee_id ,$status,$payment_circle_id){

        $this->db->where('status', $status);
        $this->db->where('payment_circle_payment_circle', $payment_circle_id);
        $this->db->where('employee_idemployee', $employee_id);

        $query = $this->db->get('paysheet');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        }else{

            return false;
        }

    }
    function update_paysheet_status($paysheet_id){

        $status="success";

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $this->db->set('total', $this->input->post('net_salary'));
        $this->db->set('status', $status);
         $this->db->set('genarated_time', mdate($format));

        $this->db->where('idpaysheet', $paysheet_id);

        $this->db->update('paysheet');

        return true;

    }


    function get_paysheet_maxid()
    {

        $this->db->select_max('idpaysheet');
        $query = $this->db->get('paysheet');

        return $query->row(0);
    }






}