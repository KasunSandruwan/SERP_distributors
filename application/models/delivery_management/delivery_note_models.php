<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/16/2018
 * Time: 10:38 AM
 */

class delivery_note_models extends CI_Model
{

    function insert_delivery_note_models($id_delivery){

        $result = $this->get_delivery_note_max_id();
        $Max_ID = $result->iddelivery_note + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $data = array(

            'delivery_note_no' => 'DL-'.$formatnumber,
            'delivery_note_date' => mdate($format),
            'status' =>'pending',
            'delivery_note_total' => $this->input->post('net_total', true),
            'delivery_iddelivery' => $id_delivery,

        );

        $this->db->insert('delivery_note', $data);
        return $this->db->insert_id();

    }

    function get_delivery_note_max_id()
    {

        $this->db->select_max('iddelivery_note');
        $query = $this->db->get('delivery_note');

        return $query->row(0);

    }


}