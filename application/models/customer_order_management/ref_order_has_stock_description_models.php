<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/7/2018
 * Time: 4:14 PM
 */

class ref_order_has_stock_description_models extends CI_Model
{

    function insert_ref_order($idstock, $idref_order, $item)
    {

        $data = array(

            'ref_order_idref_order' => $idref_order,
            'stock_description_idstock' => $idstock,

            'order_qty' => $item['quantity'],
            'unit_price' => $item['price'],
            'discount' => $item['discount'],
            'total' => $item['total'],
            'issued_qty' => '0',
            'status' => 'pending',

            // 'grn_has_purchase_order_grn_has_purchase_orderid' =>'foreign key',

        );

        $this->db->insert('ref_order_has_stock_description', $data);
        return $this->db->insert_id();

    }

    function where_search_ref_order_has_stock_description($idref_order)
    {

        $this->db->where('ref_order_idref_order', $idref_order);
        $this->db->where('status', 'pending');
        $query = $this->db->get('ref_order_has_stock_description');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_ref_order_has_stock_description_for_get_data($idref_order, $idstock)
    {

        $this->db->where('ref_order_idref_order', $idref_order);
        $this->db->where('stock_description_idstock', $idstock);

        $this->db->where('status', 'pending');
        $query = $this->db->get('ref_order_has_stock_description');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }

    function update_ref_order_has_stock_description($idref_order, $idstock, $issued_qty)
    {

        $this->db->set('issued_qty', $issued_qty);

        $this->db->where('ref_order_idref_order', $idref_order);
        $this->db->where('stock_description_idstock', $idstock);

        $this->db->update('ref_order_has_stock_description');

    }


    function update_ref_order_has_stock_description_status($idref_order_stock, $status, $issued_qty)
    {

        $this->db->set('status', $status);
        $this->db->set('issued_qty', $issued_qty);

        $this->db->where('ref_order_has_stock_descriptionid', $idref_order_stock);

        $this->db->update('ref_order_has_stock_description');

    }


}