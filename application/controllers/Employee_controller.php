<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/22/2018
 * Time: 4:02 PM
 */

class Employee_controller extends CI_Controller
{

    function serch_branchall()
    {

        $id = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $result = $this->Branch_models->where_serch_branch($id);

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
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

    function serch_employee_type()
    {

        $this->load->model('Employee_type_models');
        $result = $this->Employee_type_models->serch_employee_type();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idemployee_type,
                'type' => $row->type,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function serch_salary_type()
    {

        $this->load->model('Salary_type_models');
        $result = $this->Salary_type_models->serch_salary_type();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idsalary_type,
                'salary_type' => $row->salary_type,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function serch_position()
    {

        $this->load->model('Position_models');
        $result = $this->Position_models->serch_position();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idposition,
                'position' => $row->position,
                'desciption' => $row->desciption,
                'sequence' => $row->sequence,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function save_employee()
    {

        $this->load->model('Employee_models');
        $result = $this->Employee_models->insert_employee_data();

        if ($result == true) {

            echo "true";
        }

    }

    function load_department()
    {

        $branch_name = $this->input->post('data');

        $this->load->model('Branch_models');
        $branchid = $this->Branch_models->get_branch_id($branch_name);

        $br_id = $branchid->idbranch;

        $company_id = $this->session->userdata('companyID');

        $this->load->model('Department_models');
        $result = $this->Department_models->where_serch_company_has_branch($br_id, $company_id);

        $data = [];

        foreach ($result as $row) {

            $this->load->model('Department_models');
            $department = $this->Department_models->get_department_name($row->department_iddepartment);

            array_push($data, [

                'id' => $department->iddepartment,
                'department_name' => $department->department_name,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }


    function search_profile_data()
    {

        $data = $this->input->post('user_data');

        $this->load->model('Employee_models');
        $result = $this->Employee_models->search_user_profile($data);

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'user_code' => $row->user_code,
                'surname' => $row->surname,
                'fname' => $row->fname,
                'lname' => $row->lname,
                'nic' => $row->nic,

            ]);

        }


        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function search_employee_details_branch()
    {

        $id = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $Branch_id = $this->Branch_models->where_serch_branch($id);

        $data = [];

        foreach ($Branch_id as $row) {

            $branchid = $row->idbranch;

            $this->load->model('Branch_has_department_model');
            $Branch_has_id = $this->Branch_has_department_model->get_branch_has_department_pass_branch_companyid_id($branchid, $id);

            if ($Branch_has_id !== false) {

                foreach ($Branch_has_id as $row) {

                    $branch_has_department = $row->branch_has_departmentid;

                    $this->load->model('User_branch_models');
                    $user_branch = $this->User_branch_models->where_search_user_branch_pass_branch_has_department_ID($branch_has_department);

                    if ($user_branch !== false) {

                        foreach ($user_branch as $row) {

                            $user_profile_id = $row->user_profile_iduser_profile;

                            $this->load->model('User_profile_models');
                            $user_profile = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($user_profile_id);

                            $this->load->model('Employee_models');
                            $emplyee = $this->Employee_models->where_search_employee_id_pass_user_has_ranch_id($row->user_has_branchid);

                            if ($emplyee !== false) {

                                $employ_ID = null;
                                $employ_epf = null;
                                $employ_branch = null;
                                $employee_name = null;
                                $employee_department = null;
                                $employee_position = null;

                                foreach ($emplyee as $row) {

                                    $this->load->model('User_branch_models');
                                    $user_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($row->user_branch_user_has_branchid);

                                    $this->load->model('Branch_has_department_model');
                                    $branch_has_department = $this->Branch_has_department_model->where_search_department_pass_branch_has_department_id($user_branch->branch_has_department_branch_has_departmentid);

                                    $this->load->model('Branch_models');
                                    $Branch_name = $this->Branch_models->get_branch_name($branch_has_department->branch_idbranch);

                                    $this->load->model('Department_models');
                                    $department = $this->Department_models->get_department_name($branch_has_department->department_iddepartment);

                                    $this->load->model('Employee_designation_models');
                                    $employee_designation = $this->Employee_designation_models->where_search_Employee_designation_pass_employee_id($row->idemployee);

                                    $this->load->model('Position_models');
                                    $position_name = $this->Position_models->get_position_name_pass_position_id($employee_designation->position_idposition);

                                    $employ_code = $row->employee_id;
                                    $employ_ID = $row->idemployee;
                                    $user_cod = $user_profile->user_code;
                                    $employ_branch = $Branch_name->branch_name;
                                    $employee_name = $user_profile->fname . " " . $user_profile->lname;
                                    $employee_department = $department->department_name;
                                    $employee_position = $position_name->position;

                                }

                                array_push($data, [
                                    'input' => "<input type=\"button\" class=\"btn btn-round btn-primary btn-xs\" onclick=\"Qualification_add('$user_cod');\"  value=\"Qualification ADD\">",
                                    'update' => "<input type=\"button\" class=\"btn btn-round btn-success btn-xs\"  data-toggle=\"modal\" data-target=\".bs-example-modal-lg\" onclick=\"update_employee_details('$employ_ID');\"  value=\"Update\">",
                                    'employee_id' => $employ_code,
                                    'employee_name' => $employee_name,
                                    'employee_branch' => $employ_branch,
                                    'employee_department' => $employee_department,
                                    'employee_position' => $employee_position,
                                ]);

                            }

                        }

                    }

                }

            }

        }
        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }


    function get_employee_data_for_update(){

        $Employee_ID = $this->input->post('Employee_ID');

        $data = [];

        $this->load->model('Employee_models');
        $employee = $this->Employee_models->where_search_employee_id_pass_employee_id($Employee_ID);

        $employee_code=$employee->employee_id;


        $this->load->model('User_branch_models');
        $user_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($employee->user_branch_user_has_branchid);

        $this->load->model('User_profile_models');
        $user_profile = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($user_branch->user_profile_iduser_profile);

        $employee_name = $user_profile->fname . " " . $user_profile->lname;

        $this->load->model('Employee_designation_models');
        $employee_designation = $this->Employee_designation_models->where_search_Employee_designation_pass_employee_id($Employee_ID);

        $this->load->model('Position_models');
        $position_name = $this->Position_models->get_position_name_pass_position_id($employee_designation->position_idposition);

        $employee_position = $position_name->position;


        array_push($data, [

            'employee_ID' => $Employee_ID,
            'employee_code' => $employee_code,
            'employee_name' => $employee_name,
            'employee_position' => $employee_position,
        ]);

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function Employee_update(){

        $Employee_ID = $this->input->post('Employee_ID');
        $Employee_code = $this->input->post('Employee_code');

        $this->load->model('Employee_models');
        $employee = $this->Employee_models->Update_employee_code($Employee_ID,$Employee_code);

        if($employee == true){
            echo "true";
        }



    }


}