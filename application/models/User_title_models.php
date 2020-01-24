<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/15/2018
 * Time: 4:32 PM
 */

class User_title_models extends CI_Model
{

    function loadtitle()
    {

        $query = $this->db->get('title');
        return $query->result();

    }


    function gettitleid($value)
    {

        $this->db->where('title', $value);
        $query = $this->db->get('title');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }


}

