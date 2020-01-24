<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/12/2018
 * Time: 5:31 PM
 */

class stock_description_models extends CI_Model
{

    function insert_stock_description($sub_category_ID, $mesure_id)
    {

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $data = array(

            'item_code' => $this->input->post('item_code_model', true),
            'item_name' => $this->input->post('item_name', true),
            'description' => $this->input->post('Description', true),

            'date' => mdate($format),

            'physical_qty' => $this->input->post('Quantity', true),
            'pending_qty' => '0',
            'available_qty' => $this->input->post('Quantity', true),

            'free_qty' => $this->input->post('free', true),
            'reo_level' => $this->input->post('re_order_level', true),
            'barcode' => $this->input->post('barcode', true),
            'warrenty' => $this->input->post('warranty_type', true) . " " . $this->input->post('warranty', true),


            'precentage' => $this->input->post('branch-address', true),

            'sub_category_idsub_category' => $sub_category_ID,
            'mesure_idmesure' => $mesure_id,

        );

        $this->db->insert('stock_description', $data);

        return $this->db->insert_id();
    }


    // Where search all ready add items ................................................................................

    function all_ready_add_items($value)
    {

        $this->db->where('item_name', $value);
        $query = $this->db->get('stock_description');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }


    }


    // All Search.......................................................................................................

    function all_search_stock_description()
    {

        $query = $this->db->get('stock_description');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }


    }


    function update_stock_description($item_code, $category_id, $mesure)
    {


        $this->db->set('barcode', $this->input->post('barcode', true));
        $this->db->set('description', $this->input->post('description', true));
        $this->db->set('quantity', $this->input->post('quty', true));

        $this->db->set('sub_category_idsub_category', $category_id);
        $this->db->set('mesure_idmesure', $mesure);

        $this->db->where('item_code', $item_code);
        $this->db->update('stock_description');


    }


    function update_stock_description_quantity($stock_ID, $pending_qty, $available_qty)
    {

        $this->db->set('pending_qty', $pending_qty);
        $this->db->set('available_qty', $available_qty);

        $this->db->where('idstock', $stock_ID);

        $this->db->update('stock_description');


    }


    function where_search_stock_description_pass_item_code($value)
    {

        $this->db->where('item_code', $value);
        $query = $this->db->get('stock_description');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function where_search_stock_description_pass_stock_id($value)
    {

        $this->db->where('idstock', $value);
        $query = $this->db->get('stock_description');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}