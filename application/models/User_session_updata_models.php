<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/8/2018
 * Time: 3:00 PM
 */

class User_session_updata_models extends CI_Model
{

    function sessionupdate(){

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $id=$this->session->userdata('sessionID');

        $this->db->set('out_time',mdate($format));
        $this->db->where('iduser_sessions',$id);
        $this->db->update('user_sessions');

        return true;


    }

}