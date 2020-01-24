<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 5/17/2018
 * Time: 10:50 AM
 */

class notification_models extends CI_Model
{

    function insert_notification($user_profile_id,$table_name,$table_id,$description){

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $data = array(

            'notification_category_idnotification_category' =>1,
            'user_profile_iduser_profile' => $user_profile_id,
            'notification_table' =>$table_name,
            'notificationco_table_id' =>$table_id ,
            'description'=>$description,
            'notification_time' => mdate($format),
            'Status' =>"pending",

        );

        $this->db->insert('notification', $data);

        return true;

    }

    function get_user_has_notification(){

        $profile_id=$this->session->userdata("profileID");
        $status="pending";

        $this->db->where("user_profile_iduser_profile", $profile_id);
        $this->db->where("Status", $status);
        $query = $this->db->get('notification');

        if ($query->result()) {

            return $query->result();

        } else {

            return false;

        }

    }




}