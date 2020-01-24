<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/14/2018
 * Time: 4:02 PM
 */

class Employee_designation_models extends CI_Model
{

    // return for position id.............................................

    function where_search_Employee_designation_pass_employee_id($value){

        $status="active";

        $this->load->model('Status_models');
        $status_id= $this->Status_models->getstatus_id($status);

        $this->db->where('employee_idemployee', $value);
        $this->db->where('status_idstatus', $status_id->idstatus);
        $query = $this->db->get('employee_designation');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}