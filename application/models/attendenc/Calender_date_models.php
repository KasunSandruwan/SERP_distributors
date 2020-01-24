<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/5/2018
 * Time: 3:08 PM
 */

class Calender_date_models extends CI_Model
{

    // insert Calender Date Models....................................

    function insert_Calender_date($data_type){

        $data = array(

            'calender_date' => $this->input->post('calender_date', true),
            'week_day' => $this->input->post('week_day', true),
            'day_type_idday_type'=>$data_type,

        );

        $this->db->insert('calender_date', $data);

        return true;

    }
    // All Search calender date ..................................

    function all_search_Calender_date(){

        $query = $this->db->get('calender_date');
        return $query->result();

    }

    // Where Search Calender date  pass calender_date.................

    function where_Calender_date_pass_calender_date($value){

        $this->db->where('calender_date', $value);
        $query = $this->db->get('calender_date');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // where Search Calender date pass week_day......................

    function where_Calender_date_pass_week_day($value){

        $this->db->where('week_day', $value);
        $query = $this->db->get('calender_date');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // where Search Calender date pass calender date ID............

    function where_Calender_date_pass_calender_date_ID($value){

        $this->db->where('idcalender_date', $value);
        $query = $this->db->get('calender_date');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }



}