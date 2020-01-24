<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/18/2018
 * Time: 4:30 PM
 */

class Branch_models extends CI_Model
{

    function indert_branch()
    {

        $id = $this->session->userdata('company_id');

        $data = array(

            'branch_code' => $this->input->post('branch-code', true),
            'branch_name' => $this->input->post('branch-name', true),
            'branch_contact' => $this->input->post('branch-contact_number', true),
            'branch_email' => $this->input->post('branch-email', true),
            'branch_address' => $this->input->post('branch-address', true),

            'company_idcompany' => $id,
            'is_active' => 1,

        );

        $this->db->insert('branch', $data);

        return true;

    }

    function where_serch_branch($value)
    {

        $this->db->where('company_idcompany', $value);
        $query = $this->db->get('branch');
        return $query->result();

    }

    function get_branch_id($value)
    {

        $this->db->where('branch_name', $value);
        $query = $this->db->get('branch');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }
    }
    function get_branch_name($value)
    {

        $this->db->where('idbranch', $value);
        $query = $this->db->get('branch');
        return $query->row(0);

    }

    function Delete_branch_pass_branch_id($value){

        $this->db->where('idbranch', $value);
        $this->db->delete('branch');
        return true;

    }

    function where_search_branch_id_pass_company_id_and_branch_name($value ,$company_id){

        $this->db->where('branch_name', $value);
        $this->db->where('company_idcompany', $company_id);
        $query = $this->db->get('branch');

       if($query->num_rows() == 1){
           return $query->row(0);
       } else{
          return false;
       }

    }



}