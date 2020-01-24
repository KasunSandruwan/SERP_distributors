<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 6:07 PM
 */

class sub_category_models extends CI_Model
{

    function insert_sub_category()
    {

        $data = array(

            'sub_c' => $this->input->post('branch-code', true),
//            'main_cate_idmain_cate' => //Foreing Key

        );

        $this->db->insert('sub_category', $data);

        return true;

    }

    function search_items_category(){

        $query = $this->db->get('sub_category');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_sub_category_pass_category($value){

        $this->db->where('sub_c', $value);
        $query = $this->db->get('sub_category');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }

    function where_search_sub_category_pass_category_ID($value){

        $this->db->where('idsub_category', $value);
        $query = $this->db->get('sub_category');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }



}