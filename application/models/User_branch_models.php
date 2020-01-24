<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/23/2018
 * Time: 9:18 AM
 */

class User_branch_models extends CI_Model
{

    function insert_user_branch_data()
    {

        $status_type = 'active';

        $this->load->model('Status_models');
        $status_id = $this->Status_models->getstatus_id($status_type);

        $this->load->model('Branch_has_department_model');
        $getbranch_has_d_id = $this->Branch_has_department_model->get_branch_has_department_id();


        $user_code = $this->input->post('user-code');

        $this->load->model('User_profile_models');
        $user_id = $this->User_profile_models->get_user_id($user_code);

        $data = array(

            'user_profile_iduser_profile' => $user_id->iduser_profile,
            'status_idstatus' => $status_id->idstatus,
            'branch_has_department_branch_has_departmentid' => $getbranch_has_d_id->branch_has_departmentid,

        );

        $this->db->insert('user_branch', $data);

        $get_id = $this->db->insert_id();

        return $get_id;

    }

    // Where Search user branch pass branch has department ID...............................................

    function where_search_user_branch_pass_branch_has_department_ID($value){

        $status_type = 'active';

        $this->load->model('Status_models');
        $status_id = $this->Status_models->getstatus_id($status_type);

        $this->db->where('branch_has_department_branch_has_departmentid', $value);
        $this->db->where('status_idstatus', $status_id->idstatus);

        $query = $this->db->get('user_branch');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }

    }

    // Where Search user branch return profile id......................................................

    function where_search_user_branch_retun_profile_id($value)
    {
        $this->db->where('user_has_branchid', $value);
        $query = $this->db->get('user_branch');
        return $query->row(0);

    }

    // Where Search user branch pass profile id ........................................................



    function where_search_user_branch_pass_profile_id($value){

        $status_type = 'active';

        $this->load->model('Status_models');
        $status_id = $this->Status_models->getstatus_id($status_type);

        $this->db->where('user_profile_iduser_profile', $value);
        $this->db->where('status_idstatus', $status_id->idstatus);

        $query = $this->db->get('user_branch');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }


    }




}