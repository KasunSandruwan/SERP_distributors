<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/23/2018
 * Time: 9:56 AM
 */

class Branch_has_department_model extends CI_Model
{

    function get_branch_has_department_id()
    {

        $branch_name = $this->input->post('branch');

        $this->load->model('Branch_models');
        $branchid = $this->Branch_models->get_branch_id($branch_name);

        $department_name = $this->input->post('department');

        $this->load->model('Department_models');
        $department_id = $this->Department_models->get_department_id($department_name);

        $this->db->where('branch_idbranch', $branchid->idbranch);
        $this->db->where('department_iddepartment', $department_id->iddepartment);
        $query = $this->db->get('branch_has_department');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    // Search Branch id retun branch_has_ ........................................................

    function get_branch_has_department_pass_branch_companyid_id($branchid, $company_id)
    {

        $this->db->where('branch_idbranch', $branchid);
        $this->db->where('company_idcompany', $company_id);
        $query = $this->db->get('branch_has_department');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    // Where Search Department pass branch has department....................................................

    function where_search_department_pass_branch_has_department_id($value){

        $this->db->where('branch_has_departmentid', $value);
        $query = $this->db->get('branch_has_department');
        return $query->row(0);

    }


    // Delete Branch has Department Pass branch_has_department_id..................................................

    function delete_branch_has_department_pass_branch_has_department_id($value){

        $this->db->where('branch_has_departmentid', $value);
        $this->db->delete('branch_has_department');
        return true;

    }



}