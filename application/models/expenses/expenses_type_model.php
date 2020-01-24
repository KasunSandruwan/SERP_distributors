<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/5/2018
 * Time: 9:57 AM
 */

class expenses_type_model extends CI_Model
{

    function insert_expenses_type()
    {

        $data = array(

            'expenses_type' => $this->input->post('expenses_type', true),
        );

        $this->db->insert('expenses_type', $data);

        return true;


    }

    function all_search_expenses_type()
    {

        $query = $this->db->get('expenses_type');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }

    function where_search_expenses_type_id($value)
    {

        $this->db->where('expenses_type', $value);
        $query = $this->db->get('expenses_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }



}