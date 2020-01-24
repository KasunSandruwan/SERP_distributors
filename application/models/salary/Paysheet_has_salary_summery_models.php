<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/12/2018
 * Time: 2:34 PM
 */

class Paysheet_has_salary_summery_models extends CI_Model
{

    // insert paysheet has salary summery...............................

    function insert_paysheet_has_salary_summery($paysheet_id,$category_ID, $category_Total, $employee_ID, $employee_user_branch_id)
    {

        $data = array(

            'paysheet_idpaysheet' =>$paysheet_id,
            'salary_category_idsalary_category' => $category_ID,
            'employee_idemployee' => $employee_ID,
            'employee_user_branch_user_has_branchid' => $employee_user_branch_id,
            'valu' => $category_Total,

        );

        $this->db->insert('paysheet_has_salary_summery', $data);

        return true;

    }

    //All Search  paysheet_has_salary_summery............................

    function all_search_paysheet_has_salary_summery()
    {

        $query = $this->db->get('paysheet_has_salary_summery');
        return $query->result();

    }

    // where Search pay_sheet pass pass_paysheet_id...

    function where_search_paysheet_has_salary_summery_pass_paysheet_id($value)
    {

        $this->db->where('paysheet_idpaysheet', $value);
        $query = $this->db->get('paysheet_has_salary_summery');

        return $query->result();

    }

    // where Search pay_sheet pass pass_salary_category ID...

    function where_search_paysheet_has_salary_summery_pass_salary_category($value)
    {

        $this->db->where('salary_category_idsalary_category', $value);
        $query = $this->db->get('paysheet_has_salary_summery');

        return $query->result();

    }

    // where Search pay_sheet pass pass_value...

    function where_search_paysheet_has_salary_summery_pass_value($value)
    {

        $this->db->where('valu', $value);
        $query = $this->db->get('paysheet_has_salary_summery');

        return $query->result();

    }

    // already Add paysheet has salary summery..........................................................................

    function aleardy_add_paysheet_has_salary_summery($paysheet_id,$category_id,$employee_id){

        $this->db->where('paysheet_idpaysheet', $paysheet_id);
        $this->db->where('salary_category_idsalary_category', $category_id);
        $this->db->where('employee_idemployee', $employee_id);

        $query = $this->db->get('paysheet_has_salary_summery');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }


    }


    function where_search_paysheet_has_salary_summery($paysheet_id,$category_id,$employee_id){

        $this->db->where('paysheet_idpaysheet', $paysheet_id);
        $this->db->where('salary_category_idsalary_category', $category_id);
        $this->db->where('employee_idemployee', $employee_id);

        $query = $this->db->get('paysheet_has_salary_summery');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;

        }


    }






}