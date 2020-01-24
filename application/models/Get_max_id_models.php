<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/18/2018
 * Time: 3:07 PM
 */

class Get_max_id_models extends CI_Model
{


    function get_company_max_id()
    {

        $this->db->select_max('idcompany');
        $query = $this->db->get('company');

        return $query->row(0);

    }

    function get_branch_max_id()
    {

        $this->db->select_max('idbranch');
        $query = $this->db->get('branch');

        return $query->row(0);

    }


    function get_stock_item_max_id()
    {

        $this->db->select_max('idstock');
        $query = $this->db->get('stock_description');

        return $query->row(0);

    }



}