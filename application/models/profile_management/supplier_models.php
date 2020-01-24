<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/25/2018
 * Time: 11:35 AM
 */

class supplier_models extends CI_Model
{

    function insert_supplier($iduser_profile, $is_local)
    {

        $result = $this->get_supplier_max_id();
        $Max_ID = $result->idsupplier + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $data = array(

            'supplier' => 'SP-'.$formatnumber,
            'user_profile_iduser_profile' => $iduser_profile,
            'islocal' => $is_local,

        );

        $this->db->insert('supplier', $data);

        return true;

    }


    function get_supplier_max_id()
    {

        $this->db->select_max('idsupplier');
        $query = $this->db->get('supplier');

        return $query->row(0);

    }

    function all_search_supplier(){

        $query = $this->db->get('supplier');

        if($query->result()){
            return  $query->result();
        }else{
            return false;
        }

    }

    function where_search_supplier_pass_supplier_code($value){

        $this->db->where('supplier', $value);
        $query = $this->db->get('supplier');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }

    function update_supplier_borrow_amount($borrow_amount,$supplierID){

        $this->db->set('borrow_amount',$borrow_amount);

        $this->db->where('supplier', $supplierID);
        $this->db->update('supplier');

        return $borrow_amount;


    }


}