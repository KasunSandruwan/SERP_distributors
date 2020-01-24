<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/2/2018
 * Time: 10:45 AM
 */

class employee_has_employee_designation extends CI_Model
{

    // employee_has_employee_designation insert return true ....................................
    // * warning * use input tag name for  (Ex- name="value"
    // name="is_currently";
    // )....


    function insert_employee_has_employee_designation($employee_id,$employee_designation,$salary_variable_id){

            $data = array(

                'employee_idemployee' =>$employee_id,
                'employee_designation_employee_designation_id'=>$employee_designation,
                'salary_variable_idsalary_variable'=>$salary_variable_id,
                'value'=>$this->input->post('variables_value', true),
                'is_currently'=>"active",

            );

            $this->db->insert('employee_has_designation_salary_variables', $data);

            return true;

    }

    function already_add_employee_has_employee_designation($employee_id,$employee_designation,$salary_variable_id){

        $this->db->where('employee_idemployee', $employee_id);
        $this->db->where('employee_designation_employee_designation_id',$employee_designation );
        $this->db->where('salary_variable_idsalary_variable', $salary_variable_id);
        $this->db->where('is_currently', "active");
        $query = $this->db->get('employee_has_designation_salary_variables');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }

    function Where_search_employee_designation_salary_variables($employee_id){

        $this->db->where('employee_idemployee', $employee_id);
        $query = $this->db->get('employee_has_designation_salary_variables');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }

    //.................................................................................................

    function where_search_employee_salary_variable($employee_id,$salary_variable_id){

        $this->db->where('employee_idemployee', $employee_id);
        $this->db->where('salary_variable_idsalary_variable', $salary_variable_id);
        $this->db->where('is_currently', "active");
        $query = $this->db->get('employee_has_designation_salary_variables');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function update_employee_salary_variable(){

        $this->db->set('value',$this->input->post('variable_value', true));

        $this->db->where('employee_has_employee_designation_id', $this->input->post('employee_designation_id', true));
        $this->db->update('employee_has_designation_salary_variables');

        return true;


    }


    function where_employee_has_employee_designation_pass_id($id){

        $this->db->where('employee_has_employee_designation_id', $id);
        $query = $this->db->get('employee_has_designation_salary_variables');

        if ($query->result()) {
            return  $query->row(0);
        } else {
            return false;
        }

    }








}