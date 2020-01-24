<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/16/2018
 * Time: 10:28 AM
 */

class driver_models extends CI_Model
{

    function insert_driver($iduser_profile){

        $result = $this->get_driver_max_id();
        $Max_ID = $result->iddriver + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $data = array(

            'driver_code' => 'DV-'.$formatnumber,
            'user_profile_iduser_profile' => $iduser_profile,

        );

        $this->db->insert('driver', $data);

        return true;


    }


    function get_driver_max_id()
    {

        $this->db->select_max('iddriver');
        $query = $this->db->get('driver');

        return $query->row(0);

    }


    function all_driver(){

        $query = $this->db->get('driver');

        if($query->result()){
            return  $query->result();
        }else{
            return false;
        }

    }

    function where_search_driver_pass_driver_code($value){

        $this->db->where('driver_code', $value);
        $query = $this->db->get('driver');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }




}