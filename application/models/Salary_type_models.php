<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/22/2018
 * Time: 4:55 PM
 */

class Salary_type_models extends CI_Model
{

    function insert_salary_type(){

        $data = array(
            'salary_type' => $this->input->post('salary_type', true),
        );

        $this->db->insert('salary_type', $data);
        return true;

    }

    function serch_salary_type(){

        $query = $this->db->get('salary_type');

        if( $query->result()){
            return $query->result();
        }else{
            return false;
        }


    }

    function get_salary_type_id($value)
    {

        $this->db->where('salary_type', $value);
        $query = $this->db->get('salary_type');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }
    function allredy_add_salary_type($value){

        $this->db->where('salary_type', $value);
        $query = $this->db->get('salary_type');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }



}