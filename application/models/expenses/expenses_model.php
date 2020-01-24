<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/5/2018
 * Time: 2:19 PM
 */

class expenses_model extends CI_Model
{

    function insert_expenses($expenses_type_id)
    {

        $data = array(

            'expenses_type_idexpenses_type' =>$expenses_type_id,
            'expense' => $this->input->post('expenses', true),
        );

        $this->db->insert('expenses', $data);

        return $this->db->insert_id();


    }



}