<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/27/2018
 * Time: 12:02 PM
 */

class Qualification_type_models extends CI_Model
{

    // qualification insert return true ....................................
    // * warning * use input tag name for qualification-type (Ex- name="qualification-type" )....

    function  insert_qualificationType(){

        $data = array(

            'qualification_type' =>$this->input->post('data', true),

        );

        $this->db->insert('qualification_type', $data);

        return true;

    }

    // All Search qualification  return result......................................................

    function all_search_qualificationType(){

        $query = $this->db->get('qualification_type');
        return $query->result();


    }

    // Where Search qualification pass ID return result.............................................

    function where_search_qualificationType_pass_id($value){

        $this->db->where('idqualification_type', $value);
        $query = $this->db->get('qualification_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search qualification pass Name return result.............................................

    function where_search_qualificationType_pass_name($value){

        $this->db->where('qualification_type', $value);
        $query = $this->db->get('qualification_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search all ready add ......................................................................

    function all_ready_add_qualificationType($value){

        $this->db->where('qualification_type', $value);
        $query = $this->db->get('qualification_type');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }



}