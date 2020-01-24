<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 5:54 PM
 */

class stock_history_models extends CI_Model
{

    function insert_stock_history(){

        $data = array(

            'date' => $this->input->post('branch-code', true),
//            'stock_description_idstock' => //Foreing Key

        );

        $this->db->insert('stock_history', $data);

        return true;

    }


}