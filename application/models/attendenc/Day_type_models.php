<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/5/2018
 * Time: 2:54 PM
 */

class Day_type_models extends CI_Model
{

    // Day Type insert ...pleas use name for day_typ Ex name="day_type";

    function insert_day_type(){

        $data = array(

            'day_typ' => $this->input->post('day_type', true),

        );

        $this->db->insert('day_type', $data);

        return true;

    }

    // All Search Day type ...................................

    function  all_search_data_type(){

        $query = $this->db->get('day_type');
        return $query->result();

    }

    // Where Sear Day type pass day_type ..................

    function where_search_pass_name($value){

        $this->db->where('day_typ', $value);
        $query = $this->db->get('day_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where Search Day Type pass day type ID ................

    function where_search_pass_ID($value){

        $this->db->where('idday_type', $value);
        $query = $this->db->get('day_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function allredy_add($value){

        $this->db->where('day_typ', $value);
        $query = $this->db->get('day_type');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }



}