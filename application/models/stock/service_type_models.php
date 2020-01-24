<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 5:58 PM
 */

class service_type_models extends CI_Model
{

    function insert_service_type($service_category_id)
    {

        $data = array(

            'service_type' => $this->input->post('service', true),
            'price' => $this->input->post('Price', true),
            'service_category_idservice_category' => $service_category_id,

        );

        $this->db->insert('service_type', $data);
        return $this->db->insert_id();

    }

    function like_search_service_type($value)
    {

        $this->db->from('service_type');
        $this->db->like('service_type', $value);

        $query = $this->db->get();

        return $query->result();

    }


    function where_search_service_type_pass_service_type($value)
    {

        $this->db->where('service_type', $value);
        $query = $this->db->get('service_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function where_search_service_type_pass_service_id($value)
    {

        $this->db->where('Services', $value);
        $query = $this->db->get('service_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


    function search_service_type()
    {

        $query = $this->db->get('service_type');
        return $query->result();

    }

}