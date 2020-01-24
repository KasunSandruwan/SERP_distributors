<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/19/2018
 * Time: 1:54 PM
 */

class Department_models extends CI_Model
{

    function allserch_department()
    {

        $query = $this->db->get('department');
        return $query->result();

    }

    function where_serch_department($value)
    {

        $this->db->where('department_name', $value);
        $query = $this->db->get('department');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }

    function insert_department()
    {

        $data = array(
            'department_name' => $this->input->post('department', true),
        );

        $this->db->insert('department', $data);
        $get_id = $this->db->insert_id();

        return $get_id;


    }

    function insert_department_has_branch($departmentid, $branchid)
    {

        $id = $this->session->userdata('company_id');

        $data = array(
            'department_iddepartment' => $departmentid,
            'branch_idbranch' => $branchid,
            'company_idcompany'=>$id,
        );

        $this->db->insert('branch_has_department', $data);

        return true;

    }
    function insert_department_has_branch_create_new($departmentid, $branchid)
    {

        $company = $this->session->userdata('companyID');

        $data = array(
            'department_iddepartment' => $departmentid,
            'branch_idbranch' => $branchid,
            'company_idcompany'=>$company,
        );

        $this->db->insert('branch_has_department', $data);

        return true;

    }

    function serch_department_has_branch($value)
    {

        $this->db->where('company_idcompany', $value);
        $query = $this->db->get('branch_has_department');
        return $query->result();

    }

    function where_serch_department_has_branch($branch_id, $department_id)
    {

        $this->db->where('branch_idbranch', $branch_id);
        $this->db->where('department_iddepartment', $department_id);
        $query = $this->db->get('branch_has_department');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }


    }

    function where_serch_company_has_branch($branch_id, $company_id)
    {

        $this->db->where('branch_idbranch', $branch_id);
        $this->db->where('company_idcompany', $company_id);
        $query = $this->db->get('branch_has_department');

        return $query->result();

    }

    function get_department_name($value)
    {

        $this->db->where('iddepartment', $value);
        $query = $this->db->get('department');
        return $query->row(0);

    }
    function get_department_id($value)
    {
        $this->db->where('department_name', $value);
        $query = $this->db->get('department');
        return $query->row(0);

    }


}