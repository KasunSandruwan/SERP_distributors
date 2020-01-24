<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/2/2018
 * Time: 10:31 AM
 */

class salary_variable_models extends CI_Model
{

    // insert salary variable...............................

    function insert_salary_variable($salary_category_id)
    {

        $data = array(

            'salary_category_idsalary_category' => $salary_category_id,
            'salary_variable' => $this->input->post('salary_variable', true),
        );

        $this->db->insert('salary_variable', $data);

        return true;

    }

    //All Search salary_variable ............................

    function all_search_salary_variable()
    {

        $query = $this->db->get('salary_variable');

        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }


    }

    // where Search salary_variable pass salary_variable ID....

    function where_search_salary_variable_pass_salary_category_ID($value)
    {

        $this->db->where('salary_category_idsalary_category', $value);
        $query = $this->db->get('salary_variable');

        if($query->result()){

            return $query->result();
        }
        else{
            return false;
        }


    }




    // where Search salary_variable pass salary_variable...

    function where_search_salary_variable_pass_salary_variable($value)
    {

        $this->db->where('salary_variable', $value);
        $query = $this->db->get('salary_variable');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // where Search salary_variable pass salary_variable ID....

    function where_search_salary_variable_pass_salary_variable_ID($value)
    {

        $this->db->where('idsalary_variable_id', $value);
        $query = $this->db->get('salary_variable');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search all ready add ......................................................................

    function all_ready_add_salary_variable($category_id){

        $salary_variable=$this->input->post('salary_variable');

        $this->db->where('salary_variable', $salary_variable);
        $this->db->where('salary_category_idsalary_category', $category_id);
        $query = $this->db->get('salary_variable');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }


}