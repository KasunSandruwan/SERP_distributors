<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/15/2018
 * Time: 11:53 AM
 */

class grn_models extends CI_Model
{

    function inset_grn($full_discount,$idsupplier,$grn_type,$branch_ID){

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $result = $this->get_grn_maxid();
        $Max_ID = $result->idGRN + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $user_login_id = $this->session->userdata('user_login_ID');

        $data = array(

            'net_total' => $this->input->post('net_total', true),
            'discount' => $full_discount,
            'grn_date' =>  mdate($format),

            'grn_code' => "GRN - ".$formatnumber,

            'payment_status' =>'pay',

            'payed_ammount' => $this->input->post('balance', true),
            'payment_mode' => $this->input->post('payment_method', true),

            'borrow_amount' => $this->input->post('total_due', true),

            'Finish' => 'No',
            'remark' =>'No',

            'supplier_idsupplier' =>$idsupplier,
            'user_login_iduser_login' =>$user_login_id,

            'branch_idbranch' =>$branch_ID,
            'grn_type_idgrn_type' =>$grn_type,

        );

        $this->db->insert('grn', $data);

        return $this->db->insert_id();


    }

    function get_grn_maxid()
    {

        $this->db->select_max('idGRN');
        $query = $this->db->get('grn');

        return $query->row(0);
    }

    function get_branch_has_grn($idbranch){

        $this->db->where('branch_idbranch',$idbranch);
        $query = $this->db->get('grn');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }

    }





}