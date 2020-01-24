<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/23/2018
 * Time: 9:14 AM
 */

class Employee_models extends CI_Model
{

    function insert_employee_data()
    {

        $this->load->model('User_branch_models');
        $user_branch_id = $this->User_branch_models->insert_user_branch_data();


        $employee_type = $this->input->post('employee_type');

        $this->load->model('Employee_type_models');
        $employee_type_id = $this->Employee_type_models->get_employee_type_id($employee_type);

        $salary_type = $this->input->post('salary_type');

        $this->load->model('Salary_type_models');
        $salary_type_id = $this->Salary_type_models->get_salary_type_id($salary_type);

        if ($salary_type_id !== false) {
            $salary_type_id_get = $salary_type_id->idsalary_type;
        } else {
            $salary_type_id_get = "0";
        }

        $data = array(

            'user_branch_user_has_branchid' => $user_branch_id,
            'employee_id' => $this->input->post('employee_id', true),
            'epf' => $this->input->post('epf', true),
            'register_date' => $this->input->post('register_date', true),
            'probation_start' => $this->input->post('probation_start', true),
            'probation_end' => $this->input->post('probation_end', true),
            'employee_types_idemployee_types' => $employee_type_id->idemployee_type,
            'salary_type_idsalary_type' => $salary_type_id_get,

        );

        $this->db->insert('employee', $data);
        $get_id = $this->db->insert_id();


        $position = $this->input->post('position');

        $this->load->model('Position_models');
        $position_id = $this->Position_models->get_position_id($position);

        if($position_id !==false){
            $position_id_get=$position_id->idposition;
        }else{
            $position_id_get="0";
        }

        $status_type = 'active';

        $this->load->model('Status_models');
        $status_id = $this->Status_models->getstatus_id($status_type);


        $data2 = array(

            'employee_idemployee' => $get_id,
            'employee_user_branch_user_has_branchid' => $user_branch_id,
            'position_idposition' => $position_id_get,
            'start_date' => $this->input->post('start_data', true),
            'end_date' => $this->input->post('end_date', true),
            'status_idstatus' => $status_id->idstatus,

        );

        $this->db->insert('employee_designation', $data2);
        return true;

    }

    function search_user_profile($value)
    {

        $this->db->from('user_profile');
        $this->db->like('user_code', $value);
        $this->db->or_like('surname', $value);
        $this->db->or_like('fname', $value);
        $this->db->or_like('lname', $value);
        $this->db->or_like('nic', $value);
        $query = $this->db->get();

        return $query->result();


    }

    function where_search_employee_id_pass_user_has_ranch_id($value)
    {

        $this->db->where('user_branch_user_has_branchid', $value);
        $query = $this->db->get('employee');

        if ($query->result()) {

            return $query->result();
        } else {
            return false;
        }

    }

    function where_search_employee_id_pass_employee_id($value)
    {

        $this->db->where('idemployee', $value);
        $query = $this->db->get('employee');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }

    function where_search_employee_id_pass_employee_id_code_retun_result_set($value)
    {

        $this->db->where('employee_id', $value);
        $query = $this->db->get('employee');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }

    function Update_employee_code($employee_id,$employee_code){


        $this->db->set('employee_id', $employee_code);

        $this->db->where('idemployee', $employee_id);
        $this->db->update('employee');

        return true;

    }





}