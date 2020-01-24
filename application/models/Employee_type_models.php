<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/22/2018
 * Time: 4:39 PM
 */

class Employee_type_models extends CI_Model
{

    function insert_employee_type()
    {

        $data = array(
            'type' => $this->input->post('employee_type', true),
        );

        $this->db->insert('employee_type', $data);
        return true;

    }

    function allredy_add_employee_type($value)
    {

        $this->db->where('type', $value);
        $query = $this->db->get('employee_type');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }

    function serch_employee_type()
    {

        $query = $this->db->get('employee_type');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }


    function get_employee_type_id($value)
    {

        $this->db->where('type', $value);
        $query = $this->db->get('employee_type');
        return $query->row(0);

    }


}