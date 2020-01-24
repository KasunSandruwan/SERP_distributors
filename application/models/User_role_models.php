<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/7/2018
 * Time: 3:32 PM
 */

class User_role_models extends CI_Model
{

    function getuserrole($userroleid)
    {

        $this->db->where('iduser_role', $userroleid);
        $query = $this->db->get('user_role');

        return $query->result();
    }

    function get_user_role_all()
    {

        $query = $this->db->get('user_role');
        return $query->result();

    }

    function getuserrole_retun_id($userrole)
    {

        $this->db->where('user_role', $userrole);
        $query = $this->db->get('user_role');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}