<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/8/2018
 * Time: 10:53 AM
 */

class Status_models extends CI_Model
{

    function loadstatus()
    {

        $query = $this->db->get('status');
        return $query->result();

    }


    function getstatus($value)
    {

        $this->db->where('idstatus', $value);
        $query = $this->db->get('status');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }
    function getstatus_id($value)
    {

        $this->db->where('status_type', $value);
        $query = $this->db->get('status');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }

}