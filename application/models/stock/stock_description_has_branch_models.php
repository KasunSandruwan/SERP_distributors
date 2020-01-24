<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 6/18/2018
 * Time: 3:47 PM
 */

class stock_description_has_branch_models extends CI_Model
{

    function insert_stock_description_has_branch($idstock,$ididbranch){

        $data = array(

            'available_qty' =>$this->input->post('Quantity', true),//$this->input->post('item_code', true),
            'pending_qty' =>0.0,//$this->input->post('item_name', true),

            'physical_qty' =>$this->input->post('Quantity', true),

            'cost_price' => $this->input->post('Cost_Price', true),
            'wholesale_price' => $this->input->post('wholesale_price', true),
            'selling_price' => $this->input->post('retail_price', true),

            'remark' => 'Active',

            'stock_description_idstock' => $idstock,
            'branch_idbranch' => $ididbranch,

        );

        $this->db->insert('stock_description_has_branch', $data);

        return $this->db->insert_id();

    }

    // Where Search pass stock_description_ID...........................................................................

    function where_search_stock_description_has_branch($value){

        $this->db->where('stock_description_idstock',$value);
        $query = $this->db->get('stock_description_has_branch');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }

    }

    function where_search_stock_branch_and_stock_description_has_branch($value ,$branchid){

        $this->db->where('branch_idbranch',$branchid);
        $this->db->where('stock_description_idstock',$value);
        $query = $this->db->get('stock_description_has_branch');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{

            return false;
        }

    }
    function where_search_stock_branch_branch($branchid){

        $this->db->where('branch_idbranch',$branchid);
        $query = $this->db->get('stock_description_has_branch');

        if($query->result()){
            return $query->result();
        }else{

            return false;
        }

    }



    function update_search_stock_description_has_branch($value){

        $this->db->set('cost_price', $this->input->post('Cost_Price', true));
        $this->db->set('wholesale_price', $this->input->post('wholesale_price', true));
        $this->db->set('selling_price',$this->input->post('retail_price', true));

        $this->db->set('physical_qty',$this->input->post('quty', true));

        $this->db->where('stock_description_idstock', $value);
        $this->db->update('stock_description_has_branch');

    }

    function  update_stock_Qunty_stock_description_has_branch($stock_id,$branchid,$new_physical_qty,$new_available_qty,$item){

        $this->db->set('cost_price',$item['cost_price']);
        $this->db->set('wholesale_price',$item['wholesale_price']);
        $this->db->set('selling_price',$item['retail_price']);

        $this->db->set('physical_qty',$new_physical_qty);
        $this->db->set('available_qty',$new_available_qty);

        $this->db->where('branch_idbranch', $branchid);
        $this->db->where('stock_description_idstock', $stock_id);
        $this->db->update('stock_description_has_branch');


    }

    function update_stock_qunty_invoice_stock_description_has_branch($stock_id,$branchid,$new_available_qty,$new_pending_qty){

        $this->db->set('available_qty',$new_available_qty);
        $this->db->set('pending_qty',$new_pending_qty);

        $this->db->where('branch_idbranch', $branchid);
        $this->db->where('stock_description_idstock', $stock_id);
        $this->db->update('stock_description_has_branch');

    }

    function update_stock_pending_qty_stock_description_has_branch($id,$pending_qty,$available_qty){

        $this->db->set('pending_qty',$pending_qty);
        $this->db->set('available_qty',$available_qty);

        $this->db->where('stock_description_has_branchid', $id);
        $this->db->update('stock_description_has_branch');

    }





}