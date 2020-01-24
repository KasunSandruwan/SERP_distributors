<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/27/2018
 * Time: 12:23 PM
 */

class Qualification_models  extends CI_Model
{

    // qualification insert return true pass qualification-type-id....................................
    // * warning * use input tag name for qualification-type
    // ( Ex- name="qualification-name"
    //       name="description" )....

    function  insert_qualification($qualification_type_id){

        $data = array(

            'qualification_name' =>$this->input->post('qualification_name', true),
            'description' =>$this->input->post('description', true),
            'qualification_type_idqualification_type' =>$qualification_type_id,

        );

        $this->db->insert('qualification', $data);

        return true;

    }

    // All Search qualification  return result......................................................

    function all_search_qualification(){

        $query = $this->db->get('qualification');
        return $query->result();


    }

    // Where Search qualification pass ID return result.............................................

    function where_search_qualification_pass_id($value){

        $this->db->where('idqualification', $value);
        $query = $this->db->get('qualification');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search qualification pass Name return result.............................................

    function where_search_qualification_pass_name($value){

        $this->db->where('qualification_name', $value);
        $query = $this->db->get('qualification');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }



}