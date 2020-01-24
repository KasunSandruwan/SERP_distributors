<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/16/2018
 * Time: 10:57 AM
 */

class stock_description_has_delivery_note_models extends CI_Model
{


    function insert_stock_description_has_delivery_note($idstock,$iddelivery_note,$item){

        $data = array(

            'stock_description_idstock' =>$idstock,
            'delivery_note_iddelivery_note' =>$iddelivery_note,
            'qty' =>$item['quantity'],
            'unit_price' => $item['price'],

        );

        $this->db->insert('stock_description_has_delivery_note', $data);
        return 'true';

    }

}