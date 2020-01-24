<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/18/2018
 * Time: 5:01 PM
 */

class borrow_invoice_models extends CI_Model
{

    function insert_borrow_invoice($invoice_id){

        $data = array(

            'borrow_ammount' => $this->input->post('total_due', true),
            'invoice_idInvoice' =>$invoice_id,

        );

        $this->db->insert('borrow_invoice', $data);

        return true;

    }



}