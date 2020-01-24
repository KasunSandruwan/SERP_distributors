<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/8/2018
 * Time: 9:24 AM
 */

class User_activities_models extends CI_Model
{

    function getactivities($value)
    {

        $this->db->where('activity', $value);
        $response = $this->db->get('user_activities');


        if ($response->num_rows() == 1) {

            return $response->row(0);

        } else
            return false;

    }
    function setactivities($value){

        $data = array(
            'activity' =>$value,
        );

        $this->db->insert('user_activities',$data);

        return $this->db->insert_id();

    }

}