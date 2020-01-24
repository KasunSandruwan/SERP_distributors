<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/31/2018
 * Time: 5:04 PM
 */

class purchase_order_models extends CI_Model{


    function insert_purchase_order($idsupplier,$idorder_type,$branch_ID){

        $date = "%Y-%m-%d";
//        $time = "%h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $result = $this->get_purchase_order_maxid();
        $Max_ID = $result->idorder + 1;
        $formatnumber = sprintf('%04u', $Max_ID);


        $user_login_id = $this->session->userdata('user_login_ID');

        $data = array(

            'order_code' =>'PO - '.$formatnumber,
            'order_date' =>mdate($date),
            'order_total' => $this->input->post('net_total', true),
            'order_Status' =>'pending',
            'supplier_idsupplier' =>$idsupplier,
            'request_by'=>$branch_ID,
            'order_type_idorder_type' =>$idorder_type,

        );

        $this->db->insert('purchase_order', $data);
        return $this->db->insert_id();

    }

    function get_purchase_order_maxid()
    {

        $this->db->select_max('idorder');
        $query = $this->db->get('purchase_order');

        return $query->row(0);
    }

    function where_search_purchase_order_pass_branch_id($branch_id){

        $this->db->where('request_by', $branch_id);
        $this->db->where('order_Status', 'pending');
        $query = $this->db->get('purchase_order');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_purchase_order_pass_order_code($value){

        $this->db->where('order_code', $value);
        $query = $this->db->get('purchase_order');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }

    function update_purchase_order($idorder,$order_Status){

        $this->db->set('order_Status', $order_Status);
        $this->db->where('idorder', $idorder);

        $this->db->update('purchase_order');






    }




}