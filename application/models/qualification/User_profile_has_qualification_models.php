<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/27/2018
 * Time: 12:51 PM
 */

class User_profile_has_qualification_models extends CI_Model
{

    // User_profile_has_qualification insert return true .....................................
    // * warning * use input tag name for
    // ( Ex- name="description"
    //       name="issued_date"
    //       name="status")....

    function insert_User_profile_has_qualification()
    {

        $qualification = $this->input->post('qualification_subject');

        $this->load->model('qualification/Qualification_models');
        $qualification_id = $this->Qualification_models->where_search_qualification_pass_name($qualification);

        $qualification_ID = $qualification_id->idqualification;

        $user_code = $this->input->post('user-code');

        $this->load->model('User_profile_models');
        $user_id = $this->User_profile_models->get_user_id($user_code);


        $data = array(

            'user_profile_iduser_profile' =>$user_id->iduser_profile,
            'qualification_idqualification' => $qualification_ID,
            'description' =>$this->input->post('description_qualification', true),
            'issued_date' =>$this->input->post('issued_date', true),
            'status' =>'value',

        );

        $this->db->insert('user_profile_has_qualification', $data);
        $get_id = $this->db->insert_id();

        return $get_id;

    }

    // All Search User profile has qualification  return result......................................................

    function all_search_User_profile_has_qualification()
    {

        $query = $this->db->get('user_profile_has_qualification');
        return $query->result();


    }

    // Where Search User profile has qualification pass ID return result.............................................

    function where_search_User_profile_has_qualification($value)
    {

        $this->db->where('user_profile_has_qualificationid', $value);
        $query = $this->db->get('user_profile_has_qualification');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    // Where Search User profile has qualification, pass profile ID return result.............................................

    function where_search_User_profile_has_qualification_profile_id($value)
    {

        $this->db->where('user_profile_iduser_profile', $value);
        $query = $this->db->get('user_profile_has_qualification');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }

    // Where Search User profile has qualification , pass qualification ID return result.............................................

    function where_search_User_profile_has_qualification_id($value)
    {

        $this->db->where('qualification_idqualification', $value);
        $query = $this->db->get('user_profile_has_qualification');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}