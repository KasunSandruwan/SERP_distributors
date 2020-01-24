<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/12/2018
 * Time: 3:06 PM
 */

class Employee_has_leave_application_models extends CI_Model
{

    // insert Employee has leave application...............................

    function insert_employee_has_leave_application($idemployee, $employee_user_branch_id, $date_from, $date_to,$leave_type,$difference)
    {

        $result = $this->get_leave_apply_maxid();
        $Max_ID = $result->employee_has_leave_applicationid + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $data = array(

            'employee_idemployee' => $idemployee,
            'employee_user_branch_user_has_branchid' => $employee_user_branch_id,
            'leave_type_idleave_type' =>$leave_type,
            'apply_date_time' => mdate($format),
            'leave_code' => "L - " . $formatnumber,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'leave_status' => "pending",
            'difference' => $difference,

        );

        $this->db->insert('employee_has_leave_application', $data);

        return $this->db->insert_id();

    }

    // update employee_has_leave_application............................................................................

    function update_employee_has_leave_application($value)
    {

        $apply_date_time = $this->input->post('apply_date_time', true);
        $approved_reject_time = $this->input->post('approved_reject_time', true);
        $reject_reason = $this->input->post('reject_reason', true);

        $leave_code = $this->input->post('leave_code', true);
        $date_from = $this->input->post('date_from', true);
        $date_to = $this->input->post('date_to', true);
        $leave_status = $this->input->post('leave_status', true);

        $this->db->set('apply_date_time', $apply_date_time);
        $this->db->set('approved_reject_time', $approved_reject_time);
        $this->db->set('reject_reason', $reject_reason);
        $this->db->set('leave_code', $leave_code);
        $this->db->set('date_from', $date_from);
        $this->db->set('date_to', $date_to);
        $this->db->set('leave_status', $leave_status);


        $this->db->where('employee_has_leave_applicationid', $value);
        $this->db->update('employee_has_leave_application');

        return true;
    }


    //All Search employee_has_leave_application ............................

    function all_search_employee_has_leave_application()
    {

        $query = $this->db->get('employee_has_leave_application');
        return $query->result();

    }

    //Where Search employee_has_leave_application Pass leave code............................

    function where_search_employee_has_leave_application_pass_leave_code($value)
    {
        $this->db->where('leave_code', $value);
        $query = $this->db->get('employee_has_leave_application');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

//Where Search employee_has_leave_application Pass employee id............................

    function where_search_employee_has_leave_application_pass_employee_id($value)
    {
        $this->db->where('employee_idemployee', $value);
        $query = $this->db->get('employee_has_leave_application');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


    function where_search_employee_has_leave_application_pass_aplication_id($value)
    {
        $this->db->where('employee_has_leave_applicationid', $value);
        $query = $this->db->get('employee_has_leave_application');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }



    function get_leave_apply_maxid()
    {

        $this->db->select_max('employee_has_leave_applicationid');
        $query = $this->db->get('employee_has_leave_application');

        return $query->row(0);
    }


    function already_add($idemployee){

        $this->db->where("employee_idemployee", $idemployee);
        $query = $this->db->get('employee_has_leave_application');

        if ($query->result()) {

            return $query->result();

        } else {

            return false;
        }



    }


}