<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/5/2018
 * Time: 3:28 PM
 */

class Attendence_status_models extends CI_Model
{

    // insert Attendence  status ..............
    function insert_attendence_status(){

        $data = array(
            'attendence_status' => $this->input->post('attendence_status', true),
        );

        $this->db->insert('attendence_status', $data);

        return true;

    }

    // All Search Attendence status...........................................

    function  all_search_attendence_status(){

        $query = $this->db->get('attendence_status');
        return $query->result();

    }

    // Where Search  Attendence status pass attendence...........................

    function where_search_Attendence_status_pass_attendence($value){

        $this->db->where('attendence_status', $value);
        $query = $this->db->get('attendence_status');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }

    // Where Search  Attendence status pass attendence ID..................

    function where_search_Attendence_status_pass_attendence_ID($value){

        $this->db->where('idattendenc_status', $value);
        $query = $this->db->get('attendence_status');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function allredy_add_attendenc_status($value){

        $this->db->where('attendence_status', $value);
        $query = $this->db->get('attendence_status');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }









}