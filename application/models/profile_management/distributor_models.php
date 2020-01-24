<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/16/2018
 * Time: 2:55 PM
 */

class distributor_models extends CI_Model
{

    function insert_distributor($iduser_profile){

        $result = $this->get_distributor_max_id();
        $Max_ID = $result->iddistributor + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $data = array(

            'distributor' => 'D-'.$formatnumber,
            'user_profile_iduser_profile' => $iduser_profile,

        );

        $this->db->insert('distributor', $data);

        return true;


    }


    function get_distributor_max_id()
    {

        $this->db->select_max('iddistributor');
        $query = $this->db->get('distributor');

        return $query->row(0);

    }


    function all_distributor(){

        $query = $this->db->get('distributor');

        if($query->result()){
            return  $query->result();
        }else{
            return false;
        }

    }

    function where_search_distributor_pass_distributor_code($value){

        $this->db->where('distributor', $value);
        $query = $this->db->get('distributor');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }

    function where_search_distributor_pass_user_profile_id($value){

        $this->db->where('user_profile_iduser_profile', $value);
        $query = $this->db->get('distributor');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }





}