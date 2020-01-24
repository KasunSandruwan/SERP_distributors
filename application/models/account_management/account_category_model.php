<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/6/2018
 * Time: 10:03 AM
 */

class account_category_model extends CI_Model
{

    function insert_account_category_model(){

        $result = $this->get_account_category_maxid();
        $Max_ID = $result->idaccount_category + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $data = array(

            'account_category_code' =>'AC - '.$formatnumber,
            'account_category' => $this->input->post('account_category', true),
        );

        $this->db->insert('account_category', $data);

        return true;

    }

    function get_account_category_maxid()
    {

        $this->db->select_max('idaccount_category');
        $query = $this->db->get('account_category');

        return $query->row(0);
    }


    function all_search_account_category()
    {

        $query = $this->db->get('account_category');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }

    function where_search_account_category_id($value)
    {

        $this->db->where('account_category', $value);
        $query = $this->db->get('account_category');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}