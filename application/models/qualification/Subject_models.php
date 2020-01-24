<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/27/2018
 * Time: 12:38 PM
 */

class Subject_models extends CI_Model
{

    // Subject insert return true ....................................
    // * warning * use input tag name for qualification_subject
    // ( Ex- name="qualification_subject")....

    function insert_subject()
    {

        $data = array(

            'subject' => $this->input->post('qualification_subject', true),

        );

        $this->db->insert('subject', $data);

        return $this->db->insert_id();

    }

    // All Search subject  return result......................................................

    function all_search_subject()
    {

        $query = $this->db->get('subject');
        return $query->result();


    }

    // Where Search subject pass ID return result.............................................

    function where_search_subject_pass_id($value)
    {

        $this->db->where('idsubject', $value);
        $query = $this->db->get('subject');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search subject pass Name return result.............................................

    function where_search_subject_pass_name($value)
    {

        $this->db->where('subject', $value);
        $query = $this->db->get('subject');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function all_ready_add_subject($value){

        $this->db->where('subject', $value);
        $query = $this->db->get('subject');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }


}