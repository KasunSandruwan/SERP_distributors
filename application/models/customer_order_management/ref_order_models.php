<?php

class ref_order_models extends CI_Model{

    function insert_ref_order($idcustomer,$iddistributor){

        $date = "%Y-%m-%d";
//        $time = "%h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $result = $this->get_ref_order_maxid();
        $Max_ID = $result->idref_order + 1;
        $formatnumber = sprintf('%04u', $Max_ID);

        $data = array(

            'ref_order_code' =>'REF-'.$formatnumber,
            'ref_order_date' =>mdate($date),
            'order_status' =>'pending',

            'customer_idcustomer' =>$idcustomer,
            'distributor_iddistributor' =>$iddistributor,

            'order_total' =>$this->input->post('net_total', true),

        );

        $this->db->insert('ref_order', $data);
        return $this->db->insert_id();

    }

    function get_ref_order_maxid()
    {

        $this->db->select_max('idref_order');
        $query = $this->db->get('ref_order');

        return $query->row(0);
    }


    function where_search_ref_order($iddistributor){

        $this->db->where('distributor_iddistributor', $iddistributor);
        $this->db->where('order_status', 'pending');
        $query = $this->db->get('ref_order');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_ref_oder_pass_order_code($order_code){

        $this->db->where('ref_order_code', $order_code);
        $query = $this->db->get('ref_order');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }

    function updete_ref_oder_status($idref_order_stock,$status){

        $this->db->set('order_status', $status);

        $this->db->where('idref_order', $idref_order_stock);
        $this->db->update('ref_order');

    }



}