<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/7/2018
 * Time: 2:08 PM
 */

class User_login_models extends CI_Model
{

    // User Login Controller models Part......................................................................

    function loginuser()
    {

        $uname = $this->input->post('uname');
        $password = sha1($this->input->post('password'));

        $this->db->where('user_name', $uname);
        $this->db->where('password', $password);
        $response = $this->db->get('user_login');


        if ($response->num_rows() == 1) {

            // insert log in data for session db.......................................................................

            $format = "%Y-%m-%d %h:%i %A";
            date_default_timezone_set('Asia/Colombo');


            $data = array(
                'in_time' => mdate($format),
                'ip' => $this->input->ip_address(),
                'user_login_iduser_login' => $response->row(0)->iduser_login,
            );

            $this->db->insert('user_sessions', $data);
            $sessionID = $this->db->insert_id();

            $user_data = array(
                'sessionID' => $sessionID,
            );

            $this->session->set_userdata($user_data);

            return $response->row(0);

        } else {

            return false;
        }

    }

    function get_user_login_ID()
    {

        $uname = $this->input->post('uname');
        $password = sha1($this->input->post('password'));

        $this->db->where('user_name', $uname);
        $this->db->where('password', $password);
        $query = $this->db->get('user_login');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }

    function get_user_login_id_pass_user_profile_id($value)
    {

        $this->db->where('user_profile_iduser_profile', $value);

        $query = $this->db->get('user_login');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function where_search_user_login_id($value)
    {

        $this->db->where('iduser_login', $value);

        $query = $this->db->get('user_login');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


    function search_allredy_has_user_for_account($value)
    {

        $this->db->where('user_profile_iduser_profile', $value);

        $query = $this->db->get('user_login');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }


    }


}