<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/6/2018
 * Time: 10:05 AM
 */

class transaction_type_model extends CI_Model
{

    function insert_transaction_type_model()
    {

        $data = array(

            'transaction_type' => $this->input->post('transaction_type', true),
        );

        $this->db->insert('transaction_type', $data);

        return true;

    }

    function all_search_transaction_type(){

        $query = $this->db->get('transaction_type');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_transaction_type_id($value)
    {

        $this->db->where('transaction_type', $value);
        $query = $this->db->get('transaction_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}