<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/12/2018
 * Time: 2:47 PM
 */

class Employee_paysheet_models extends CI_Model
{

    // insert Employee paysheet ...............................

    function insert_employee_paysheet($employee_has_desigination_salary_variable_id, $payment_value ,$paysheet_id)
    {

        $data = array(

            'paysheet_idpaysheet' => $paysheet_id,
            'employee_has_designation_salary_variables_id' => $employee_has_desigination_salary_variable_id,
            'payment_value' => $payment_value,
        );

        $this->db->insert('employee_paysheet', $data);

        return true;

    }

    //All Search Employee paysheet .....................................................................................

    function all_search_employee_paysheet()
    {

        $query = $this->db->get('employee_paysheet');
        return $query->result();

    }


    // where Search Employee paysheet pass paysheet_id...

    function where_search_employee_paysheet_pass_paysheet_id($value)
    {

        $this->db->where('paysheet_idpaysheet', $value);
        $query = $this->db->get('employee_paysheet');

        return $query->result();

    }

    // already Add Value ...............................................................................................

    function already_insert_value($paysheet_id ,$employee_has_designation_salary_variables_id){

        $this->db->where('paysheet_idpaysheet', $paysheet_id);
        $this->db->where('employee_has_designation_salary_variables_id', $employee_has_designation_salary_variables_id);

        $query = $this->db->get('employee_paysheet');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }


    }



    function where_search_employee_paysheet($paysheet_id ,$employee_has_designation_salary_variables_id){


        $this->db->where('paysheet_idpaysheet', $paysheet_id);
        $this->db->where('employee_has_designation_salary_variables_id', $employee_has_designation_salary_variables_id);

        $query = $this->db->get('employee_paysheet');

        if ($query->result()) {
            return $query->row(0);
        } else {
            return false;
        }



    }



}