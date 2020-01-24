<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/8/2018
 * Time: 9:52 AM
 */

class User_sessions_activities_models extends CI_Model
{

    function setsession($value ,$description){

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $data = array(
            'user_sessions_iduser_sessions' => $this->session->userdata('sessionID'),
            'user_activities_iduser_activities' =>$value,
            'description'  =>$description,
            'time'=>mdate($format),
        );

        $this->db->insert('user_sessions_has_user_activities',$data);

    }

}