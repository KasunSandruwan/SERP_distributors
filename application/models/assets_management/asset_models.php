<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/21/2018
 * Time: 4:03 PM
 */

class asset_models extends CI_Model
{

    function insert_asset($idasset_type){

        $date = "%Y-%m-%d / %h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $data = array(

            'asset_name' => $this->input->post('vehicle_number', true),
            'asset_description' => $this->input->post('asset_description', true),
            'reg_date' => mdate($date),
            'status' =>'active',
            'asset_type_idasset_type' =>$idasset_type,

        );

        $this->db->insert('asset', $data);

    }



    function all_search_asset_active(){

        $this->db->where('status','active');
        $query = $this->db->get('asset');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }


    function where_search_asset_pass_asset_name($value){

        $this->db->where('asset_name',$value);
        $query = $this->db->get('asset');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }


}