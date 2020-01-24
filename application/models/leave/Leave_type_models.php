<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/12/2018
 * Time: 2:58 PM
 */

class Leave_type_models extends CI_Model
{


    // insert Leave type...............................

    function insert_leave_type()
    {


        $data = array(

            'leave_type' => $this->input->post('leave_type', true),
        );

        $this->db->insert('leave_type', $data);

        return true;

    }

    //All Search Leave type ............................

    function all_search_leave_type()
    {

        $query = $this->db->get('leave_type');
        return $query->result();

    }


    // where Search leave_type pass leave_type...

    function where_search_leave_type_pass_leave_type($value)
    {

        $this->db->where('leave_type', $value);
        $query = $this->db->get('leave_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // where Search leave_type pass idleave_type...

    function where_search_leave_type_pass_leave_type_ID($value)
    {

        $this->db->where('idleave_type', $value);
        $query = $this->db->get('leave_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}