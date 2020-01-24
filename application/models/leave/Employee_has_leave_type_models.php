<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/12/2018
 * Time: 3:35 PM
 */

class Employee_has_leave_type_models extends CI_Model
{

    // insert Employee has leave type models...............................

    function insert_employee_has_leave_type_models($employee)
    {

        $data = array(

            'employee_idemployee' => $employee->idemployee,
            'employee_user_branch_user_has_branchid' => $employee->user_branch_user_has_branchid,
            'leave_type_idleave_type' => $this->input->post('leave_type', true),

            'total_leave_count_used' => 0,
            'total_leave_count_applied' => 0,
            'total_leave_count_approved' => 0,
            'available_count' => $this->input->post('applicable', true),
            'applicable_count' => $this->input->post('applicable', true),
            'year' => $this->input->post('year', true),
//            'month' => $this->input->post('month', true),
        );

        $this->db->insert('employee_has_leave_type', $data);

        return true;

    }


    //All Search Employee has leave type models ............................

    function all_search_employee_has_leave_type()
    {

        $query = $this->db->get('employee_has_leave_type');
        return $query->result();

    }

    // where Search Employee has leave type pass employee...

    function where_search_employee_has_leave_type_pass_employee_id($value)
    {

        $this->db->where('employee_idemployee', $value);
        $query = $this->db->get('employee_has_leave_type');

        return $query->result();

    }

    // Delete Employee has leave ...................................................

    function delete_employee_has_leave_type_pass_employee_id($value)
    {

        $this->db->where('employee_leave_typeid', $value);
        $this->db->delete('employee_has_leave_type');

        return true;
    }

    function already_insert_employee_has_leave_type()
    {

        $this->db->where('employee_idemployee', $this->input->post('employee_id', true));
        $this->db->where('leave_type_idleave_type', $this->input->post('leave_type', true));
        $this->db->where('year', $this->input->post('year', true));

        $query = $this->db->get('employee_has_leave_type');

        if ($query->result()) {
            return true;
        } else {
            return false;
        }

    }

    function where_search_employee_has_leave_type_pass_leave_type_and_year_employee_id($idemployee,$idleave_type,$year)
    {

        $this->db->where('employee_idemployee',$idemployee );
        $this->db->where('leave_type_idleave_type',$idleave_type );
        $this->db->where('year', $year);

        $query = $this->db->get('employee_has_leave_type');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }

    function update_employee_has_leave_type($employee_leave_id,$apply_tot){

        $this->db->set('total_leave_count_applied',$apply_tot);

        $this->db->where('employee_leave_typeid', $employee_leave_id);
        $this->db->update('employee_has_leave_type');

        return true;
    }


}