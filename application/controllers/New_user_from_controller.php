<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/15/2018
 * Time: 4:47 PM
 */

class New_user_from_controller extends CI_Controller
{

    function load_title()
    {

        $this->load->model('User_title_models');
        $result = $this->User_title_models->loadtitle();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'title' => $row->title,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

//    profile save part ................................................................

    function save_profile_data()
    {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('first-name', 'First Name', 'required');
        $this->form_validation->set_rules('last-name', 'Last Name', 'required');
        $this->form_validation->set_rules('date-of-birth', 'Date of Birth', 'required');
        $this->form_validation->set_rules('primary_contact_number', 'Primary Contact Number', 'required');
        $this->form_validation->set_rules('p_address', 'Permanent Address', 'required');


        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_profile.email]');

        if ($this->form_validation->run() == FALSE) {

            echo "Error";

        } else {

            $titlename = $this->input->post('title');

            $this->load->model('User_title_models');
            $titleid = $this->User_title_models->gettitleid($titlename);

            $t_id = $titleid->idtitle;

            $this->load->model('User_profile_models');
            $respons = $this->User_profile_models->save_profile_data($t_id);

            if ($respons == true) {
                echo "true";
            }


        }


    }

//Create User Account..............................................................................

    function save_user_login_account()
    {

        $this->form_validation->set_rules('user-role', 'User Role', 'required');
        $this->form_validation->set_rules('user-name', 'User Name', 'required|is_unique[user_login.user_name]');

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            echo 'error';

        } else {

            $userrole = $this->input->post('user-role');

            $this->load->model('User_role_models');
            $respons = $this->User_role_models->getuserrole_retun_id($userrole);

            if ($respons != false) {

                $this->load->model('User_profile_models');
                $respons = $this->User_profile_models->Create_User_Account($respons->iduser_role);

                if ($respons == true) {
                    echo "true";
                }

            }

        }


    }

    function get_user_role()
    {

        $this->load->model('User_role_models');
        $result = $this->User_role_models->get_user_role_all();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'user_role' => $row->user_role,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function get_company_maxid()
    {

        $this->load->model('Get_max_id_models');
        $result = $this->Get_max_id_models->get_company_max_id();

        $MaxID = $result->idcompany;

        $formatnumber = sprintf('%04u', $MaxID + 1);

        echo 'C-' . $formatnumber;

    }

//    Company Register part...............................................................

    function save_company()
    {

        $this->form_validation->set_rules('company-name', 'Company Name', 'required');

        if ($this->form_validation->run() == FALSE) {

            echo "error";

        } else {

            $this->load->model('Company_models');
            $respons = $this->Company_models->insert_company();

            if ($respons == true) {
                echo "true";
            }

        }

    }

    // Branch Register .....................................................................

    function get_branch_maxid()
    {

        $this->load->model('Get_max_id_models');
        $result = $this->Get_max_id_models->get_branch_max_id();

        $MaxID = $result->idbranch;

        $formatnumber = sprintf('%04u', $MaxID + 1);

        echo 'B-' . $formatnumber;

    }

    function save_branch()
    {

        $this->form_validation->set_rules('branch-name', 'Branch Name', 'required');

        if ($this->form_validation->run() == FALSE) {

            echo "error";

        } else {

            $this->load->model('Branch_models');
            $respons = $this->Branch_models->indert_branch();

            if ($respons == true) {
                echo "true";
            }

        }

    }

    function serch_branchall()
    {

        $id = $this->session->userdata('company_id');

        $this->load->model('Branch_models');
        $result = $this->Branch_models->where_serch_branch($id);

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'branch_id' => $row->idbranch,
                'branch_code' => $row->branch_code,
                'branch_name' => $row->branch_name,
                'branch_contact' => $row->branch_contact,
                'branch_email' => $row->branch_email,
                'branch_address' => $row->branch_address,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function create_new_department_serch_branchall()
    {

        $id =  $company = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $result = $this->Branch_models->where_serch_branch($id);

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'branch_id' => $row->idbranch,
                'branch_code' => $row->branch_code,
                'branch_name' => $row->branch_name,
                'branch_contact' => $row->branch_contact,
                'branch_email' => $row->branch_email,
                'branch_address' => $row->branch_address,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function serch_department()
    {

        $this->load->model('Department_models');
        $result = $this->Department_models->allserch_department();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'iddepartment' => $row->iddepartment,
                'department_name' => $row->department_name,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }


    function insert_department()
    {

        $department_name = $this->input->post('department');

        $company = $this->session->userdata('company_id');

        $this->load->model('Department_models');
        $result = $this->Department_models->where_serch_department($department_name);

        if ($result == false) {

            $this->load->model('Department_models');
            $departmentid = $this->Department_models->insert_department();

            $branch_name = $this->input->post('branch-name-select');

            $this->load->model('Branch_models');
            $branchresut = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch_name,$company);

            $branchid = $branchresut->idbranch;

            $this->load->model('Department_models');
            $response = $this->Department_models->where_serch_department_has_branch($branchid, $departmentid);

            if ($response == false) {

                $this->load->model('Department_models');
                $result2 = $this->Department_models->insert_department_has_branch($departmentid, $branchid);

                if ($result2 == true) {
                    echo "true";
                }

            }

        } else {

            $id = $result->iddepartment;

            $branch_name = $this->input->post('branch-name-select');

            $this->load->model('Branch_models');
            $branchresut = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch_name ,$company);

            $branchid = $branchresut->idbranch;

            $this->load->model('Department_models');
            $response = $this->Department_models->where_serch_department_has_branch($branchid, $id);

            if ($response == false) {

                $this->load->model('Department_models');
                $result3 = $this->Department_models->insert_department_has_branch($id, $branchid);

                if ($result3 == true) {
                    echo "true";
                }

            }

        }

    }

    function load_department_has_branch_table()
    {

        $department_id = $this->session->userdata('company_id');

        $this->load->model('Department_models');
        $result = $this->Department_models->serch_department_has_branch($department_id);

        $data = [];

        foreach ($result as $row) {

            $this->load->model('Branch_models');
            $branch_name = $this->Branch_models->get_branch_name($row->branch_idbranch);

            $this->load->model('Department_models');
            $department_name = $this->Department_models->get_department_name($row->department_iddepartment);

            array_push($data, [
                'department_id' => $row->branch_has_departmentid,
                'branch' => $branch_name->branch_name,
                'department' => $department_name->department_name,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }
    function load_department_has_branch_table_create_new_department()
    {

        $department_id = $this->session->userdata('companyID');

        $this->load->model('Department_models');
        $result = $this->Department_models->serch_department_has_branch($department_id);

        $data = [];

        foreach ($result as $row) {

            $this->load->model('Branch_models');
            $branch_name = $this->Branch_models->get_branch_name($row->branch_idbranch);

            $this->load->model('Department_models');
            $department_name = $this->Department_models->get_department_name($row->department_iddepartment);

            array_push($data, [
                'department_id' => $row->branch_has_departmentid,
                'branch' => $branch_name->branch_name,
                'department' => $department_name->department_name,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function Delete_Branch()
    {

        $branch_ID = $this->input->post('branch_id');

        $this->load->model('Branch_models');
        $result = $this->Branch_models->Delete_branch_pass_branch_id($branch_ID);

        if ($result == true) {
            echo "true";
        }


    }

    function Delete_department()
    {

        $department_id = $this->input->post('department_id');

        $this->load->model('Branch_has_department_model');
        $result = $this->Branch_has_department_model->delete_branch_has_department_pass_branch_has_department_id($department_id);

        if ($result == true) {
            echo "true";
        }

    }


    function insert_department_crete_new_department()
    {

        $department_name = $this->input->post('department');

        $company = $this->session->userdata('companyID');

        $this->load->model('Department_models');
        $result = $this->Department_models->where_serch_department($department_name);

        if ($result == false) {

            $this->load->model('Department_models');
            $departmentid = $this->Department_models->insert_department();

            $branch_name = $this->input->post('branch-name-select');

            $this->load->model('Branch_models');
            $branchresut = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch_name,$company);

            $branchid = $branchresut->idbranch;

            $this->load->model('Department_models');
            $response = $this->Department_models->where_serch_department_has_branch($branchid, $departmentid);

            if ($response == false) {

                $this->load->model('Department_models');
                $result2 = $this->Department_models->insert_department_has_branch_create_new($departmentid, $branchid);

                if ($result2 == true) {
                    echo "true";
                }

            }

        } else {

            $id = $result->iddepartment;

            $branch_name = $this->input->post('branch-name-select');

            $this->load->model('Branch_models');
            $branchresut = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch_name ,$company);

            $branchid = $branchresut->idbranch;

            $this->load->model('Department_models');
            $response = $this->Department_models->where_serch_department_has_branch($branchid, $id);

            if ($response == false) {

                $this->load->model('Department_models');
                $result3 = $this->Department_models->insert_department_has_branch_create_new($id, $branchid);

                if ($result3 == true) {
                    echo "true";
                }

            }

        }

    }


}