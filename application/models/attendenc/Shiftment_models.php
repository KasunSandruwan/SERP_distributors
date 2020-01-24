<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/5/2018
 * Time: 3:49 PM
 */

class Shiftment_models extends CI_Model
{
    // insert Shiftment ..........................

    function insert_Shiftment($status)
    {

        $data = array(

            'shiftment_name' => $this->input->post('shiftment_name', true),
            'start_time' => $this->input->post('start_time', true),
            'end_time' => $this->input->post('end_time', true),
            'status_idstatus' => $status,
            'hours_count' => $this->input->post('hours_count', true),

        );

        $this->db->insert('shiftment', $data);

        return $this->db->insert_id();

    }

    // All Search Shiftment.....................................

    function all_search_Shiftment()
    {

        $query = $this->db->get('shiftment');
        return $query->result();
    }

    // Where Search Shiftment pass Shiftment_name........

    function where_search_Shiftment_pass_shiftment_name($value)
    {

        $this->db->where('shiftment_name', $value);
        $query = $this->db->get('shiftment');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Where search  Shiftment pass Shiftment_ID.......................

    function where_search_Shiftment_pass_shiftment_ID($value)
    {

        $this->db->where('idshiftment', $value);
        $query = $this->db->get('shiftment');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }
    function allready_add($value){

        $this->db->where('shiftment_name', $value);
        $query = $this->db->get('shiftment');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }


    }


}