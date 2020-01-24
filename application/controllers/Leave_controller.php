<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 5/15/2018
 * Time: 1:13 PM
 */

class Leave_controller extends CI_Controller
{


    function load_employee_for_leave_application()
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
                                    'input' => "<input type=\"button\" class=\"btn btn-round btn-primary btn-xs\" value=\"Application\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\" onclick=\"Leave_application('$employ_ID');\">",

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

    function load_employee_details()
    {
        $employee_id = $this->input->post('employee_id');

        $this->load->model('Employee_models');
        $employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        $employee_name = null;
        $employee_position = null;

        $data = [];

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

            array_push($data, [
                'employee_id' => $employee_id,
                'employee_name' => $employee_name,
                'employee_position' => $employee_position,
            ]);

        }
        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function leave_apply()
    {

        $employee_id = $this->input->post('employee_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $leave_type = $this->input->post('leave_type');


        $this->load->model('Employee_models');
        $employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        if ($employee !== false) {


            // get Date Difference .....................................................................

            $diff = abs(strtotime($to_date) - strtotime($from_date));
            $difference = floor($diff / (60 * 60 * 24));

            // Format Date M-y-d ......................................................................

            $from_date = new DateTime($from_date);
            $to_date = new DateTime($to_date);

            $f_from_date = $from_date->format("M-Y-d");
            $f_to_date = $to_date->format("M-Y-d");

            $this->load->model('leave/Employee_has_leave_application_models');
            $result_leve_date = $this->Employee_has_leave_application_models->already_add($employee_id);

            $count = 1;

            if ($result_leve_date == true) {

                foreach ($result_leve_date as $row) {

                    $date_from = $row->date_from;
                    $date_to = $row->date_to;

                    $f_date = strtotime($f_from_date);
                    $t_date = strtotime($f_to_date);

                    $resut = $this->check_in_already_add($date_from, $date_to, $f_date, $t_date);

                    if ($resut !== true) {

                        if (sizeof($result_leve_date) === $count) {

                            $this->load->model('leave/Employee_has_leave_application_models');
                            $Employee_has_leave_application_id = $this->Employee_has_leave_application_models->insert_employee_has_leave_application($employee_id, $employee->user_branch_user_has_branchid, $f_from_date, $f_to_date, $leave_type, $difference);

//                            if ($Employee_has_leave_application_result == true) {

                            $this->load->model('leave/Employee_has_leave_type_models');
                            $leave_result_id = $this->Employee_has_leave_type_models->where_search_employee_has_leave_type_pass_leave_type_and_year_employee_id($employee_id, $leave_type, $from_date->format("Y"));

                            $apply_tot = $leave_result_id->total_leave_count_applied;
                            $update_apply_tot = $apply_tot + $difference;

                            $this->load->model('leave/Employee_has_leave_type_models');
                            $result_update = $this->Employee_has_leave_type_models->update_employee_has_leave_type($leave_result_id->employee_leave_typeid, $update_apply_tot);

                            // notification_insert_part......................................................................................................................

                            $userrole = "admin";

                            $this->load->model('User_role_models');
                            $result_u_role_id = $this->User_role_models->getuserrole_retun_id($userrole);

                            $this->load->model('User_profile_models');
                            $result_User_profile_id = $this->User_profile_models->where_search_user_profile_id_pass_user_role_id($result_u_role_id->iduser_role);

                            foreach ($result_User_profile_id as $row) {

                                $table_name = "Employee_has_leave_application";
                                $description="Leave Request";

                                $this->load->model('notification/notification_models');
                                $result_User_login = $this->notification_models->insert_notification($row->iduser_profile, $table_name, $Employee_has_leave_application_id,$description);

                            }

                            if ($result_update == true) {
                                echo "true";
                            }

//                            }

                        } else {

                            $count++;
                            continue;

                        }

                    } else {

                        echo "You have already Apply That Day....!";
                        break;

                    }


                }
// else part............................................................................................................
            } else {

                $this->load->model('leave/Employee_has_leave_application_models');
                $Employee_has_leave_application_id = $this->Employee_has_leave_application_models->insert_employee_has_leave_application($employee_id, $employee->user_branch_user_has_branchid, $f_from_date, $f_to_date, $leave_type, $difference);

//                            if ($Employee_has_leave_application_result == true) {

                $this->load->model('leave/Employee_has_leave_type_models');
                $leave_result_id = $this->Employee_has_leave_type_models->where_search_employee_has_leave_type_pass_leave_type_and_year_employee_id($employee_id, $leave_type, $from_date->format("Y"));

                $apply_tot = $leave_result_id->total_leave_count_applied;
                $update_apply_tot = $apply_tot + $difference;

                $this->load->model('leave/Employee_has_leave_type_models');
                $result_update = $this->Employee_has_leave_type_models->update_employee_has_leave_type($leave_result_id->employee_leave_typeid, $update_apply_tot);

                // notification_insert_part......................................................................................................................

                $userrole = "admin";

                $this->load->model('User_role_models');
                $result_u_role_id = $this->User_role_models->getuserrole_retun_id($userrole);

                $this->load->model('User_profile_models');
                $result_User_profile_id = $this->User_profile_models->where_search_user_profile_id_pass_user_role_id($result_u_role_id->iduser_role);

                foreach ($result_User_profile_id as $row) {

                    $table_name = "Employee_has_leave_application";
                    $description="Leave Request";

                    $this->load->model('notification/notification_models');
                    $result_User_login = $this->notification_models->insert_notification($row->iduser_profile, $table_name, $Employee_has_leave_application_id,$description);

                }

                if ($result_update == true) {
                    echo "true";
                }


            }


        }


    }


    function load_leave_type()
    {

        $this->load->model('leave/Leave_type_models');
        $result = $this->Leave_type_models->all_search_leave_type();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'id' => $row->idleave_type,
                'leave_type' => $row->leave_type,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function check_in_already_add($date_from, $date_to, $f_date, $t_date)
    {
        $start_ts = strtotime($date_from);
        $end_ts = strtotime($date_to);

        return (($f_date >= $start_ts) && ($f_date < $end_ts) || ($t_date >= $start_ts) && ($t_date < $end_ts));

    }


    function load_employee_for_leave_manage()
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
                                    'input' => "<input type=\"button\" class=\"btn btn-round btn-primary btn-xs\" value=\"ADD\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\" onclick=\"Leave_application('$employ_ID');\">",

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


    function load_employee_has_leave()
    {

        $employee_id = $this->input->post('employee_id');

        $this->load->model('leave/Employee_has_leave_type_models');
        $result = $this->Employee_has_leave_type_models->where_search_employee_has_leave_type_pass_employee_id($employee_id);

        $data = [];

        if (sizeof($result) > 0) {

            foreach ($result as $row) {

                $this->load->model('leave/Leave_type_models');
                $result_Leave_type = $this->Leave_type_models->where_search_leave_type_pass_leave_type_ID($row->leave_type_idleave_type);

                array_push($data, [

                    'employee_leave_typeid' => $row->employee_leave_typeid,
                    'leave_type' => $result_Leave_type->leave_type,
                    'applicable_count' => $row->applicable_count,
                    'available_count' => $row->available_count,
                    'year' => $row->year,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "false";
        }

    }


    function employee_has_leave_save()
    {

        $employee_id = $this->input->post('employee_id');

        $this->load->model('Employee_models');
        $employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        // Check already insert this value..............................................................................

        $this->load->model('leave/Employee_has_leave_type_models');
        $result_Employee_has_leave_already = $this->Employee_has_leave_type_models->already_insert_employee_has_leave_type();

        if ($result_Employee_has_leave_already == false) {

            $this->load->model('leave/Employee_has_leave_type_models');
            $result_Employee_has_leave = $this->Employee_has_leave_type_models->insert_employee_has_leave_type_models($employee);

            if ($result_Employee_has_leave == true) {
                echo "true";
            }

        }

    }

    function Remove_employee_has_leave()
    {

        $id = $this->input->post('id');

        $this->load->model('leave/Employee_has_leave_type_models');
        $result = $this->Employee_has_leave_type_models->delete_employee_has_leave_type_pass_employee_id($id);


    }


}