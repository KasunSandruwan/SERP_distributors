<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/27/2018
 * Time: 1:09 PM
 */

class Qualification_value_models extends CI_Model
{

    // Qualification_value insert return true .....................................
    // * warning * use input tag name for
    // ( Ex- name="qualification-value"
    //       name="is-active")....

    function insert_Qualification_value($user_profile_has_qualification_id)
    {

        $qualification = $this->input->post('qualification_subject');

        $this->load->model('qualification/Qualification_models');
        $qualification_id = $this->Qualification_models->where_search_qualification_pass_name($qualification);

        $qualification_ID = $qualification_id->idqualification;

        $this->load->model('qualification/Qualification_has_subject_models');
        $result = $this->Qualification_has_subject_models->where_search_qualification_has_subject_pass_qualification_id($qualification_ID);

        foreach ($result as $row) {

            $data = array(

                'user_profile_has_qualification_user_profile_has_qualificationid' => $user_profile_has_qualification_id,
                'qualification_has_subject_qualification_has_subjectcol' => $row->qualification_has_subjectcol,
                'qualification_value' => $this->input->post('subject_' . $row->qualification_has_subjectcol, true),
                'is_active' => "active",

            );
            $this->db->insert('qualification_value', $data);

        }

        return true;

    }

    // All Search Qualification_value return result......................................................

    function all_search_Qualification_value()
    {

        $query = $this->db->get('qualification_value');
        return $query->result();


    }

    // Where Search Qualification_value pass ID return result.............................................

    function where_search_Qualification_value_id($value)
    {

        $this->db->where('idqualification_value', $value);
        $query = $this->db->get('qualification_value');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search Qualification_value, pass profile has qualification ID return result.............................................

    function where_search_Qualification_value_profile_has_qualification_id($value)
    {

        $this->db->where('user_profile_has_qualification_user_profile_has_qualificationid', $value);
        $query = $this->db->get('qualification_value');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    // Where Search Qualification_value , pass subject ID return result.............................................

    function where_search_Qualification_value_subject_id($value)
    {

        $this->db->where('subject_idsubject', $value);
        $query = $this->db->get('qualification_value');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}