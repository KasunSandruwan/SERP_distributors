<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 6:03 PM
 */

class main_cate extends CI_Model
{
    function insert_main_cate(){

        $data = array(

            'main_c' => $this->input->post('branch-code', true),


        );

        $this->db->insert('main_cate', $data);

        return true;

    }

}