<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/16/2018
 * Time: 11:56 AM
 */

class delivery_models extends CI_Model
{

    function insert_delivery_models($idasset,$iddriver){

        $date = strtotime($this->input->post('delivery_date'));
        $newdateformat = date('Y-m-d',$date);

        $data = array(

            'delivery_date' =>$newdateformat,
            'status' =>'pending',
            'asset_idasset' => $idasset,
            'driver_iddriver' => $iddriver,
            'start_millage' =>$this->input->post('start_millage', true),

        );

        $this->db->insert('delivery', $data);
        return $this->db->insert_id();

    }





}