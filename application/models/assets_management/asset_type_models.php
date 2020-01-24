<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/21/2018
 * Time: 4:01 PM
 */

class asset_type_models extends CI_Model
{

    function insert_asset_type()
    {

        $data = array(

            'asset_type' => $this->input->post('asset_type', true),

        );

        $this->db->insert('asset_type', $data);
        return true;

    }

    function all_search_asset_type()
    {

        $query = $this->db->get('asset_type');
        return $query->result();

    }

    function where_search_asset_type($value)
    {
        $this->db->where('asset_type', $value);
        $query = $this->db->get('asset_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;

        }
    }
    function where_search_asset_type_pass_asset_id($value)
    {

        $this->db->where('idasset_type', $value);
        $query = $this->db->get('asset_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

}