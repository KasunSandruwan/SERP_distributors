<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/22/2018
 * Time: 5:03 PM
 */

class Position_models extends CI_Model
{

    function insert_position(){

        $data = array(
            'position' => $this->input->post('position', true),
            'desciption' => $this->input->post('description', true),
            'sequence' => $this->input->post('sequence', true),
        );

        $this->db->insert('position', $data);
        return true;


    }


    function allredy_add_position($value){

        $this->db->where('position', $value);
        $query = $this->db->get('position');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }



    function serch_position(){

        $query = $this->db->get('position');

        if($query->result()){
            return  $query->result();
        }else{
            return false;
        }


    }

    function get_position_id($value)
    {

        $this->db->where('position', $value);
        $query = $this->db->get('position');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }



    }
function get_position_name_pass_position_id($value){

    $this->db->where('idposition', $value);
    $query = $this->db->get('position');
    return $query->row(0);
}


}