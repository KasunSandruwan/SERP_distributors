<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/2/2018
 * Time: 10:35 AM
 */

class salary_category_models extends CI_Model
{

    // salary category insert return true ....................................
    // * warning * use input tag name for salary_category (Ex- name="salary_category" )....

    function insert_salary_category(){

        $data = array(

            'salary_category' =>$this->input->post('salary_category', true),

        );

        $this->db->insert('salary_category', $data);

        return true;
    }

    //all Search   salary category......................................................................

    function all_search_salary_category(){

        $query = $this->db->get('salary_category');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    // Where Search salary category pass Name return result.............................................

    function where_search_salary_category_pass_name($value){

        $this->db->where('salary_category', $value);
        $query = $this->db->get('salary_category');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search all ready add ......................................................................

    function all_ready_add_salary_category($value){

        $this->db->where('salary_category', $value);
        $query = $this->db->get('salary_category');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }


    // Where Search salary category pass ID return result.............................................

    function where_search_salary_category_pass_id($value){

        $this->db->where('idsalary_category', $value);
        $query = $this->db->get('salary_category');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }



}