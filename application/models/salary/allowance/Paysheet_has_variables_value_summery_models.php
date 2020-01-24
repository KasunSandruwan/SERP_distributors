<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 4/5/2018
 * Time: 2:44 PM
 */

class Paysheet_has_variables_value_summery_models extends CI_Model
{

    //insert Paysheet_has_variables_value_summery.......................................................................

    function insert_paysheet_has_variables_value_summery($paysheet_id,$salary_variable_id,$value){

        $data = array(

            'paysheet_idpaysheet'=>$paysheet_id,
            'salary_variable_idsalary_variable_id'=>$salary_variable_id,
            'value'=>$value,
        );

        $this->db->insert('paysheet_has_varibles_value_summary', $data);

        return true;

    }

    // where Search pay sheet has salary variable value summery ........................................................

    function where_search_paysheet_has_variables_value_summery_pass_paysheet_id_and_salary_variable_id($paysheet_id,$salary_variable_id){

        $this->db->where('paysheet_idpaysheet', $paysheet_id);
        $this->db->where('salary_variable_idsalary_variable_id',$salary_variable_id);

        $query = $this->db->get('paysheet_has_varibles_value_summary');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        }else{

            return false;
        }

    }


    // update salary variable pay sheet value ..........................................................................

    function update_paysheet_has_salary_variable_value_summery($paysheet_id,$value){

        $this->db->set('value', $value);

        $this->db->where('paysheet_has_varibles_value_summarycol',$paysheet_id);
        $this->db->update('paysheet_has_varibles_value_summary');


    }







}