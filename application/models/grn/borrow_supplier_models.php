<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/15/2018
 * Time: 12:50 PM
 */

class borrow_supplier_models extends CI_Model
{

    function insert_borrow_supplier()
    {


        $data = array(

            'borrow_amount' => $this->input->post('item_code', true),
            'paiyed_date' => $this->input->post('item_name', true),
            'description' => mdate($format),
            'remark' => $test,
            'status' => $this->input->post('Quantity', true),

//            'grn_idGRN' => Foreign key,
//            'payment_mode_idpayment_mode' => Foreign key,

        );

        $this->db->insert('borrow_supplierModels', $data);


    }


}