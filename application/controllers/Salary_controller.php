<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 4/5/2018
 * Time: 9:41 AM
 */

class Salary_controller extends CI_Controller
{

    function save_salary_category()
    {

        $salary_category = $this->input->post('salary_category');

        $this->load->model('salary/salary_category_models');
        $result = $this->salary_category_models->all_ready_add_salary_category($salary_category);

        if ($result == false) {

            $this->load->model('salary/salary_category_models');
            $result = $this->salary_category_models->insert_salary_category();

            if ($result == true) {
                echo "true";
            }

        }

    }

    function load_category()
    {

        $this->load->model('salary/salary_category_models');
        $result = $this->salary_category_models->all_search_salary_category();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                array_push($data, [

                    'id' => $row->idsalary_category,
                    'salary_category' => $row->salary_category,


                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }

    function save_salary_variable()
    {

        $salary_category = $this->input->post('salary_category');

        $this->load->model('salary/salary_category_models');
        $result_salary_category = $this->salary_category_models->where_search_salary_category_pass_name($salary_category);

        if ($result_salary_category !== false) {

            $salary_category_id = $result_salary_category->idsalary_category;

            $this->load->model('salary/salary_variable_models');
            $result = $this->salary_variable_models->all_ready_add_salary_variable($salary_category_id);

            if ($result == false) {

                $this->load->model('salary/salary_variable_models');
                $result = $this->salary_variable_models->insert_salary_variable($salary_category_id);

                if ($result == true) {

                    echo "true";
                }

            }

        }

    }

    function load_salary_variable()
    {

        $this->load->model('salary/salary_variable_models');
        $result = $this->salary_variable_models->all_search_salary_variable();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                $this->load->model('salary/salary_category_models');
                $salary_category = $this->salary_category_models->where_search_salary_category_pass_id($row->salary_category_idsalary_category);

                $salary_category_name = $salary_category->salary_category;

                array_push($data, [

                    'salary_category' => $salary_category_name,
                    'salary_variable' => $row->salary_variable,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }


    function load_employee_for_salary_variable_table()
    {

//        $branch = $this->input->post('branch');
        $branch = "Yakkala";
        $id = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $branch_result = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch, $id);

        $switch = true;

        if ($branch_result !== false) {

            $branch_ID = $branch_result->idbranch;

            $this->load->model('Branch_has_department_model');
            $result = $this->Branch_has_department_model->get_branch_has_department_pass_branch_companyid_id($branch_ID, $id);

            $data = [];

            if ($result !== false) {

                $count = 0;

                foreach ($result as $row) {

                    $count++;

                    $this->load->model('User_branch_models');
                    $result_user_branch = $this->User_branch_models->where_search_user_branch_pass_branch_has_department_ID($row->branch_has_departmentid);

                    if ($result_user_branch !== false) {

                        foreach ($result_user_branch as $row) {

                            $this->load->model('Employee_models');
                            $result_employee = $this->Employee_models->where_search_employee_id_pass_user_has_ranch_id($row->user_has_branchid);

                            if ($result_employee !== false) {

                                $employ_ID = null;
                                $employee_name = null;
                                $employee_department = null;
                                $employee_position = null;

                                foreach ($result_employee as $row) {

                                    $this->load->model('User_branch_models');
                                    $user_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($row->user_branch_user_has_branchid);

                                    $this->load->model('Branch_has_department_model');
                                    $branch_has_department = $this->Branch_has_department_model->where_search_department_pass_branch_has_department_id($user_branch->branch_has_department_branch_has_departmentid);

                                    $this->load->model('Department_models');
                                    $department = $this->Department_models->get_department_name($branch_has_department->department_iddepartment);

                                    $this->load->model('User_profile_models');
                                    $user__profileid = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($user_branch->user_profile_iduser_profile);

                                    $this->load->model('Employee_designation_models');
                                    $employee_designation = $this->Employee_designation_models->where_search_Employee_designation_pass_employee_id($row->idemployee);

                                    $this->load->model('Position_models');
                                    $position_name = $this->Position_models->get_position_name_pass_position_id($employee_designation->position_idposition);


                                    $employ_ID = $row->idemployee;
                                    $employ_code = $row->employee_id;
                                    $employee_name = $user__profileid->fname . " " . $user__profileid->lname;
                                    $employee_department = $department->department_name;
                                    $employee_position = $position_name->position;

                                }

                                array_push($data, [
                                    'employee_id' => $employ_ID,
                                    'employee_code' => $employ_code,
                                    'employee_name' => $employee_name,
                                    'employee_department' => $employee_department,
                                    'employee_position' => $employee_position,
                                ]);

                            }

                        }


                    } else {

                        if (sizeof($result) === $count - 1) {
                            echo "No-data";
                            $switch = false;
                            break;
                        }
                        continue;
                    }

                }
                if ($switch) {

                    header('Content-Type: application/json');
                    $encode_data = json_encode($data);
                    echo $encode_data;

                }

            } else {
                echo "No-data";
            }
        } else {
            echo "No-data";
        }

    }

    function load_salary_variable_for_select()
    {

        $this->load->model('salary/salary_variable_models');
        $result = $this->salary_variable_models->all_search_salary_variable();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                array_push($data, [

                    'id' => $row->idsalary_variable_id,
                    'salary_variable' => $row->salary_variable,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }

    function insert_employee_has_employee_designation()
    {

        $employee_id = $this->input->post('employee_id');

        $this->load->model('Employee_designation_models');
        $result = $this->Employee_designation_models->where_search_Employee_designation_pass_employee_id($employee_id);

        if ($result !== false) {

            $employee_designation = $result->employee_designation_id;

            $variables = $this->input->post('variables');

            $this->load->model('salary/salary_variable_models');
            $result_salary_variable = $this->salary_variable_models->where_search_salary_variable_pass_salary_variable($variables);

            if ($result_salary_variable !== false) {

                $salary_variable_id = $result_salary_variable->idsalary_variable_id;

                $this->load->model('salary/employee_has_employee_designation');
                $result_already = $this->employee_has_employee_designation->already_add_employee_has_employee_designation($employee_id, $employee_designation, $salary_variable_id);

                if ($result_already === false) {

                    $this->load->model('employee_has_employee_designation');
                    $result = $this->employee_has_employee_designation->insert_employee_has_employee_designation($employee_id, $employee_designation, $salary_variable_id);

                    if ($result === true) {
                        echo "true";
                    }

                }


            }
// set massage pleas select  ....salary variables....

        }

    }


    function Search_employee_salary_variable()
    {

        $employee_id = $this->input->post('employee_id');

        $this->load->model('salary/employee_has_employee_designation');
        $result = $this->employee_has_employee_designation->Where_search_employee_designation_salary_variables($employee_id);

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                $this->load->model('salary/salary_variable_models');
                $result_salary_variable = $this->salary_variable_models->where_search_salary_variable_pass_salary_variable_ID($row->salary_variable_idsalary_variable);

                array_push($data, [

                    'id' => $row->employee_has_employee_designation_id,
                    'salary_variable' => $result_salary_variable->salary_variable,
                    'value' => $row->value,

                ]);

            }
            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }


    function load_employee_for_pay_slip_generate()
    {

//        $branch = $this->input->post('branch');

        $payment_circle = $this->input->post('payment_circle');

        $branch = "Yakkala";
        $id = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $branch_result = $this->Branch_models->where_search_branch_id_pass_company_id_and_branch_name($branch, $id);

        $switch = true;

        if ($branch_result !== false) {

            $branch_ID = $branch_result->idbranch;

            $this->load->model('Branch_has_department_model');
            $result = $this->Branch_has_department_model->get_branch_has_department_pass_branch_companyid_id($branch_ID, $id);

            $data = [];

            if ($result !== false) {

                $count = 0;

                foreach ($result as $row) {

                    $count++;

                    $this->load->model('User_branch_models');
                    $result_user_branch = $this->User_branch_models->where_search_user_branch_pass_branch_has_department_ID($row->branch_has_departmentid);

                    if ($result_user_branch !== false) {

                        foreach ($result_user_branch as $row) {

                            $this->load->model('Employee_models');
                            $result_employee = $this->Employee_models->where_search_employee_id_pass_user_has_ranch_id($row->user_has_branchid);

                            if ($result_employee !== false) {

                                $employ_ID = null;
                                $employee_name = null;
                                $employee_department = null;
                                $employee_position = null;

                                foreach ($result_employee as $row) {

                                    $this->load->model('User_branch_models');
                                    $user_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($row->user_branch_user_has_branchid);

                                    $this->load->model('Branch_has_department_model');
                                    $branch_has_department = $this->Branch_has_department_model->where_search_department_pass_branch_has_department_id($user_branch->branch_has_department_branch_has_departmentid);

                                    $this->load->model('Department_models');
                                    $department = $this->Department_models->get_department_name($branch_has_department->department_iddepartment);

                                    $this->load->model('User_profile_models');
                                    $user__profileid = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($user_branch->user_profile_iduser_profile);

                                    $this->load->model('Employee_designation_models');
                                    $employee_designation = $this->Employee_designation_models->where_search_Employee_designation_pass_employee_id($row->idemployee);

                                    $this->load->model('Position_models');
                                    $position_name = $this->Position_models->get_position_name_pass_position_id($employee_designation->position_idposition);

                                    $employ_ID = $row->idemployee;
                                    $employ_code = $row->employee_id;
                                    $employee_name = $user__profileid->fname . " " . $user__profileid->lname;
                                    $employee_department = $department->department_name;
                                    $employee_position = $position_name->position;

                                }

                                // new Code Line .......................................................................

                                $status = "success";

                                $this->load->model('salary/Paysheet_models');
                                $Paysheet = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_status($employ_ID, $status, $payment_circle);

                                $button = "";

                                if ($Paysheet === false) {
                                    $button = "<input type=\"button\" class=\"btn btn-round btn-warning btn-xs\" value=\"Pending\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\" onclick=\"genratePay_sheet('$employ_ID');\">";
                                } else {
                                    $button = "<input type=\"button\" class=\"btn btn-round btn-success btn-xs\" value=\"Paid\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg_2\" onclick=\"printView_paysheet('$employ_ID');\">";
                                }

                                array_push($data, [
                                    'employee_id' => $employ_ID,
                                    'employee_code' => $employ_code,
                                    'employee_name' => $employee_name,
                                    'employee_department' => $employee_department,
                                    'employee_position' => $employee_position,
                                    'input' => $button,
                                ]);

                            }

                        }


                    } else {

                        if (sizeof($result) === $count - 1) {
                            echo "No-data";
                            $switch = false;
                            break;
                        }
                        continue;
                    }

                }
                if ($switch) {

                    header('Content-Type: application/json');
                    $encode_data = json_encode($data);
                    echo $encode_data;

                }

            } else {
                echo "No-data";
            }
        } else {
            echo "No-data";
        }

    }

    // Pay sheet Genarate...............................................................................................

    function Pay_sheat_genarat()
    {

        $employee_id = $this->input->post('employee_id');
        $payment_circle_id = $this->input->post('payment_circle_id');

        $category = null;
        $employee_name = null;
        $employee_position = null;

        $data = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];
        $data5 = [];

        $this->load->model('Employee_models');
        $employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        if ($employee !== false) {

            $this->load->model('User_branch_models');
            $User_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($employee->user_branch_user_has_branchid);

            $this->load->model('User_profile_models');
            $user__profileid = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($User_branch->user_profile_iduser_profile);

            $this->load->model('Employee_designation_models');
            $employee_designation = $this->Employee_designation_models->where_search_Employee_designation_pass_employee_id($employee_id);

            $this->load->model('Position_models');
            $position_name = $this->Position_models->get_position_name_pass_position_id($employee_designation->position_idposition);

            $employee_name = $user__profileid->fname . " " . $user__profileid->lname;
            $employee_position = $position_name->position;

            $this->load->model('salary/salary_category_models');
            $salary_variable_category = $this->salary_category_models->all_search_salary_category();

            foreach ($salary_variable_category as $row) {

                $category = $row->salary_category;
                $category_id = $row->idsalary_category;

                $this->load->model('salary/salary_variable_models');
                $salary_variable = $this->salary_variable_models->where_search_salary_variable_pass_salary_category_ID($row->idsalary_category);

                if ($salary_variable !== false) {

                    foreach ($salary_variable as $row) {

                        $salary_variable_id = $row->idsalary_variable_id;

                        $this->load->model('salary/employee_has_employee_designation');
                        $employee_has_salary_variable = $this->employee_has_employee_designation->where_search_employee_salary_variable($employee_id, $salary_variable_id);

                        if ($employee_has_salary_variable !== false) {

                            foreach ($employee_has_salary_variable as $row2) {

                                array_push($data4, [
                                    'value' => $row2->value,
                                    'ID' => $row2->employee_has_employee_designation_id,
                                ]);

                            }

                        }

                        $status = "pending";

                        $this->load->model('salary/Paysheet_models');
                        $result_paysheet = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_status($employee_id, $status, $payment_circle_id);

                        if ($result_paysheet !== false) {

                            $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                            $result_paysheet_variable_value_summery = $this->Paysheet_has_variables_value_summery_models->where_search_paysheet_has_variables_value_summery_pass_paysheet_id_and_salary_variable_id($result_paysheet->idpaysheet, $salary_variable_id);

                            if ($result_paysheet_variable_value_summery !== false) {
                                array_push($data5, [
                                    'paysheet_variable_value' => $result_paysheet_variable_value_summery->value,
                                    'paysheet_id' => $result_paysheet_variable_value_summery->paysheet_idpaysheet,

                                ]);
                            }

                        }

                        array_push($data3, [
                            'salary_variable' => $row->salary_variable,
                            'employee_value_object' => $data4,
                            'pay_sheet_variable_value_object' => $data5,
                        ]);

                        $data4 = [];
                        $data5 = [];

                    }
                    array_push($data2, [
                        'category' => $category,
                        'category_id' => $category_id,
                        'salary_variable_object' => $data3,
                    ]);

                    $data3 = [];

                }

            }

            // Employee has salary variable get .............................................................................

            array_push($data, [

                'employee_ID' => $employee_id,
                'employee_name' => $employee_name,
                'employee_position' => $employee_position,
                'salary_category' => $data2,

            ]);

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }

    }

    function employee_paysheet_pay()
    {

        $employee_has_desigination_salary_variable_id = $this->input->post('ID');
        $payment_value = $this->input->post('payment_value');

        $employee_id = $this->input->post('employee_id');
        $payment_circle_id = $this->input->post('payment_circle_id');

        $status = "pending";

        $this->load->model('salary/Paysheet_models');
        $result_paysheet = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_status($employee_id, $status, $payment_circle_id);

        if ($result_paysheet !== false) {

            $paysheet_id = $result_paysheet->idpaysheet;

            $this->load->model('salary/Employee_paysheet_models');
            $result = $this->Employee_paysheet_models->already_insert_value($paysheet_id, $employee_has_desigination_salary_variable_id);

            if ($result === false) {

                $this->load->model('salary/Employee_paysheet_models');
                $result = $this->Employee_paysheet_models->insert_employee_paysheet($employee_has_desigination_salary_variable_id, $payment_value, $paysheet_id);

                if ($result == true) {

                    echo "true";

                }

            }

        } else {
            echo "false";
        }


    }

    function insert_paysheet_has_salary_summery()
    {

        $category_ID = $this->input->post('category_ID');
        $category_Total = $this->input->post('category_Total');
        $employee_ID = $this->input->post('employee_ID');


        $payment_circle_id = $this->input->post('payment_circle_id');

        $status = "pending";

        $this->load->model('salary/Paysheet_models');
        $result_paysheet = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_status($employee_ID, $status, $payment_circle_id);

        if ($result_paysheet !== false) {

            $paysheet_id = $result_paysheet->idpaysheet;

            $this->load->model('Employee_models');
            $result_employee_models = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_ID);

            if ($result_employee_models !== false) {

                $this->load->model('salary/Paysheet_has_salary_summery_models');
                $result = $this->Paysheet_has_salary_summery_models->aleardy_add_paysheet_has_salary_summery($paysheet_id, $category_ID, $employee_ID);

                if ($result == false) {

                    $this->load->model('salary/Paysheet_has_salary_summery_models');
                    $result_Paysheet_has_salary_summery = $this->Paysheet_has_salary_summery_models->insert_paysheet_has_salary_summery($paysheet_id, $category_ID, $category_Total, $employee_ID, $result_employee_models->user_branch_user_has_branchid);

                    if ($result_Paysheet_has_salary_summery == true) {
                        echo "true";
                    }

                }

            }
        } else {

            echo "false";
        }

    }

    function load_payment_circle_is_not_pay()
    {

        $this->load->model('salary/Payment_circle_models');
        $result = $this->Payment_circle_models->where_search_payment_circle_status_active();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                array_push($data, [

                    'id' => $row->payment_circle,
                    'year' => $row->year,
                    'month' => $row->month,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }

    function pay_slip_pay()
    {

        $payment_circle_id = $this->input->post('payment_circle_id');
        $employee_ID = $this->input->post('employee_ID');

//        $net_salary = $this->input->post('net_salary');

        $status = "pending";

        $this->load->model('salary/Paysheet_models');
        $result_paysheet = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_status($employee_ID, $status, $payment_circle_id);

        if ($result_paysheet !== false) {

            $paysheet_id = $result_paysheet->idpaysheet;

            $this->load->model('salary/Paysheet_models');
            $result = $this->Paysheet_models->update_paysheet_status($paysheet_id);

        } else {

            echo "false";
        }


    }

    function generate_payment_circle_manage()
    {

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $Payment_Date = $this->input->post('Payment_Date');


        $begin = new DateTime($from_date);
        $end = new DateTime($to_date);

        $from_date_new = null;

        $interval = DateInterval::createFromDateString('1 day');

        $period = new DatePeriod($begin, $interval, $end);

        foreach ($period as $dt) {

            if ($dt->format("d") == $Payment_Date) {

                $to_date_new = $dt->format("M-Y-d");

//                $this->load->model('salary/Payment_circle_models');
//                $Payment_circle_result = $this->Payment_circle_models->already_add_payment_circle_between_date($to_date_new);
//
//                if($Payment_circle_result == false) {

                if ($from_date_new == null) {
                    $from_date_new = $begin->format("M-Y-d");
                }

                if ($from_date_new !== $to_date_new) {

                    $this->load->model('salary/Payment_circle_models');
                    $result = $this->Payment_circle_models->insert_payment_circle($from_date_new, $to_date_new);

                    if ($result == true) {

                        $from_date_new = $to_date_new;
                    }
                }


                echo "Date - " . $dt->format("M-Y-d");

//                }

            }

        }


    }

    function load_payment_circle()
    {

        $this->load->model('salary/Payment_circle_models');
        $result = $this->Payment_circle_models->all_search_payment_circle();

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                $format_from_date = new DateTime($row->from_date);
                $format_to_date = new DateTime($row->to_date);

                array_push($data, [

                    'id' => $row->payment_circle,
                    'from_date' => $format_from_date->format("Y-m-d"),
                    'to_date' => $format_to_date->format("Y-m-d"),
                    'year' => $row->year,
                    'month' => $row->month,
                    'status' => $row->is_current,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }


    function update_salary_variable_value()
    {

        $this->load->model('salary/employee_has_employee_designation');
        $result = $this->employee_has_employee_designation->update_employee_salary_variable();

        if ($result == true) {
            echo "true";
        }

    }

    function insert_Employee_salary_variables_note_addition_pay()
    {

        $this->load->model('salary/allowance/Employee_salary_variables_note_models');
        $result = $this->Employee_salary_variables_note_models->insert_Employee_salary_variables_note_addition_pay();

//        if($result == true){
//            echo "true";
//        }

    }


    function printView_paysheet()
    {

        $employee_id = $this->input->post('employee_id');
        $payment_circle_id = $this->input->post('payment_circle_id');

        $this->load->model('Employee_models');
        $employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        $employee_name = null;
        $employee_position = null;


        $data = [];
        $data1 = [];
        $data2 = [];

        if ($employee !== false) {

            $this->load->model('User_branch_models');
            $User_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($employee->user_branch_user_has_branchid);

            $this->load->model('User_profile_models');
            $user__profileid = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($User_branch->user_profile_iduser_profile);

            $this->load->model('Employee_designation_models');
            $employee_designation = $this->Employee_designation_models->where_search_Employee_designation_pass_employee_id($employee_id);

            $this->load->model('Position_models');
            $position_name = $this->Position_models->get_position_name_pass_position_id($employee_designation->position_idposition);

            $employee_name = $user__profileid->fname . " " . $user__profileid->lname;
            $employee_position = $position_name->position;

            $status = "success";

            $this->load->model('salary/Paysheet_models');
            $result_paysheet = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_status($employee_id, $status, $payment_circle_id);

            if ($result_paysheet !== false) {

                $this->load->model('salary/Payment_circle_models');
                $result_Payment_circle = $this->Payment_circle_models->where_search_payment_circle_id($result_paysheet->payment_circle_payment_circle);

                $this->load->model('salary/salary_category_models');
                $salary_category_result = $this->salary_category_models->all_search_salary_category();

                foreach ($salary_category_result as $row) {

                    $this->load->model('salary/Paysheet_has_salary_summery_models');
                    $Paysheet_has_salary_summery_result = $this->Paysheet_has_salary_summery_models->where_search_paysheet_has_salary_summery($result_paysheet->idpaysheet, $row->idsalary_category, $employee_id);

                    foreach ($Paysheet_has_salary_summery_result as $row2) {

                        $this->load->model('salary/salary_variable_models');
                        $salary_variable_result = $this->salary_variable_models->where_search_salary_variable_pass_salary_category_ID($row2->salary_category_idsalary_category);

                        foreach ($salary_variable_result as $row3) {

                            $this->load->model('salary/employee_has_employee_designation');
                            $employee_has_employee_salary_result = $this->employee_has_employee_designation->where_search_employee_salary_variable($employee_id, $row3->idsalary_variable_id);

                            $employee_has_employee_designation_id = "";

                            if ($employee_has_employee_salary_result !== false) {

                                foreach ($employee_has_employee_salary_result as $row4) {

                                    $employee_has_employee_designation_id = $row4->employee_has_employee_designation_id;
                                }

                            }

                            $this->load->model('salary/Employee_paysheet_models');
                            $Employee_paysheet_result = $this->Employee_paysheet_models->where_search_employee_paysheet($result_paysheet->idpaysheet, $employee_has_employee_designation_id);

                            $payment_amount = 0;

                            if ($Employee_paysheet_result !== false) {
                                $payment_amount = $Employee_paysheet_result->payment_value;
                            }

                            array_push($data1, [
                                'salary_variable' => $row3->salary_variable,
                                'payment_value' => $payment_amount,

                            ]);

                        }

                    }

                    array_push($data2, [
                        'category' => $row->salary_category,
                        'category_tot' => $row2->valu,
                        'object_salary' => $data1,

                    ]);

                    $data1 = [];
                }

                array_push($data, [

                    'employee_ID' => $employee_id,
                    'employee_name' => $employee_name,
                    'employee_position' =>$employee_position,
                    'paysheet_code' =>$result_paysheet->paysheet_code,
                    'paysheet_Total' =>$result_paysheet->total,
                    'Payment_date' =>$result_Payment_circle->year."-".$result_Payment_circle->month,

                    'object' => $data2,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }


    }


}