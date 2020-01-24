<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/7/2018
 * Time: 8:37 PM
 */

class Admin_controller extends CI_Controller
{

    public function index()
    {
        $this->load->view('Admin/dashboard');
    }

    function save_employee_type()
    {
        $employee_type = $this->input->post('employee_type');

        $this->load->model('Employee_type_models');
        $result = $this->Employee_type_models->allredy_add_employee_type($employee_type);

        if ($result == false) {

            $this->load->model('Employee_type_models');
            $result = $this->Employee_type_models->insert_employee_type();

            if ($result == true) {
                echo "true";
            }

        } else {
            echo "all ready add";
        }
    }

    function search_emplyee_type()
    {

        $this->load->model('Employee_type_models');
        $result = $this->Employee_type_models->serch_employee_type();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                array_push($data, [

                    'employee_id' => $row->idemployee_type,
                    'employee_type' => $row->type,

                ]);

            }
            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }

    function insert_salary_type()
    {

        $salary_type = $this->input->post('salary_type');

        $this->load->model('Salary_type_models');
        $result = $this->Salary_type_models->allredy_add_salary_type($salary_type);

        if ($result == false) {

            $this->load->model('Salary_type_models');
            $result = $this->Salary_type_models->insert_salary_type();

            if ($result == true) {
                echo "true";
            }

        } else {
            echo "all ready add";
        }

    }

    function load_salary_type_for_table()
    {

        $this->load->model('Salary_type_models');
        $result = $this->Salary_type_models->serch_salary_type();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                array_push($data, [

                    'idsalary_type' => $row->idsalary_type,
                    'salary_type' => $row->salary_type,

                ]);

            }
            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }

    function load_position_for_table()
    {

        $this->load->model('Position_models');
        $result = $this->Position_models->serch_position();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                array_push($data, [

                    'idposition' => $row->idposition,
                    'position' => $row->position,
                    'desciption' => $row->desciption,
                    'sequence' => $row->sequence,

                ]);

            }
            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }

    function insert_position()
    {

        $position = $this->input->post('position');

        $this->load->model('Position_models');
        $result = $this->Position_models->allredy_add_position($position);

        if ($result == false) {

            $this->load->model('Position_models');
            $result = $this->Position_models->insert_position();

            if ($result == true) {
                echo "true";
            }

        } else {
            echo "all ready add";
        }
    }
}