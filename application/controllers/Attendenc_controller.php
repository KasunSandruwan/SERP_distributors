<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/6/2018
 * Time: 10:42 AM
 */

class Attendenc_controller extends CI_Controller
{

    function save_day_type()
    {
        $day_type = $this->input->post('day_type');

        $this->load->model('attendenc/Day_type_models');
        $result = $this->Day_type_models->allredy_add($day_type);

        if ($result == false) {

            $this->load->model('attendenc/Day_type_models');
            $result = $this->Day_type_models->insert_day_type();

            if ($result == true) {
                echo "true";
            }

        }
    }

    function all_search_day_type()
    {

        $this->load->model('attendenc/Day_type_models');
        $result = $this->Day_type_models->all_search_data_type();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'id' => $row->idday_type,
                'day_typ' => $row->day_typ,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function save_calender_date()
    {

        $day_type = $this->input->post('day_type');

        $this->load->model('attendenc/Day_type_models');
        $day_type_ID = $this->Day_type_models->where_search_pass_name($day_type);

        $this->load->model('attendenc/Calender_date_models');
        $result = $this->Calender_date_models->insert_Calender_date($day_type_ID->idday_type);

        if ($result == true) {
            echo "true";
        }

    }


    function all_search_calender_date()
    {

        $this->load->model('attendenc/Calender_date_models');
        $result = $this->Calender_date_models->all_search_Calender_date();

        $data = [];

        foreach ($result as $row) {

            $this->load->model('attendenc/Day_type_models');
            $day_type_id = $this->Day_type_models->where_search_pass_ID($row->day_type_idday_type);

            array_push($data, [

                'calender_date' => $row->calender_date,
                'week_day' => $row->week_day,
                'day_typ' => $day_type_id->day_typ,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function save_attendence_status()
    {

        $attendence_status = $this->input->post('attendence_status');

        $this->load->model('attendenc/Attendence_status_models');
        $result = $this->Attendence_status_models->allredy_add_attendenc_status($attendence_status);

        if ($result == false) {

            $this->load->model('attendenc/Attendence_status_models');
            $result = $this->Attendence_status_models->insert_attendence_status();

            if ($result == true) {
                echo "true";
            }

        }

    }

    function all_search_attendence_status()
    {

        $this->load->model('attendenc/Attendence_status_models');
        $result = $this->Attendence_status_models->all_search_attendence_status();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'id' => $row->idattendenc_status,
                'attendence_status' => $row->attendence_status,


            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function save_shiftment()
    {

        $shiftment_name = $this->input->post('shiftment_name');

        $this->load->model('attendenc/Shiftment_models');
        $result = $this->Shiftment_models->allready_add($shiftment_name);

        if ($result == false) {

            $status = 'active';

            $this->load->model('Status_models');
            $status_ID = $this->Status_models->getstatus_id($status);

            $this->load->model('attendenc/Shiftment_models');
            $result = $this->Shiftment_models->insert_Shiftment($status_ID->idstatus);

            if ($result == true) {
                echo "true";
            }

        } else {
            echo "all ready Add ";
        }

    }

    function load_shiftment_all()
    {

        $this->load->model('attendenc/Shiftment_models');
        $result = $this->Shiftment_models->all_search_Shiftment();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'shiftment_name' => $row->shiftment_name,
                'start_time' => $row->start_time,
                'end_time' => $row->end_time,
                'hours_count' => $row->hours_count,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function load_employee_duty_roster()
    {

        $branch = $this->input->post('branch');
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
                                    'input' => "<input type=\"checkbox\" id=\"$employ_ID\"  onclick=\"getSelected('$employ_ID');\" >",
                                    'employee_id' => $employ_code,
                                    'employee_name' => $employee_name,
                                    'employee_department' => $employee_department,
                                    'employee_position' => $employee_position,
                                ]);

                            }


                        }


                    } else {

                        if (sizeof($result) === $count-1) {
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
                echo "No-data_false";
            }
        } else {
            echo "No-data_branch_result_false";
        }


    }

    function save_employee_attendance_data()
    {

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

//        $dayofweek = date('w', strtotime($date));
//        $f_date= date('Y-m-d', $from_date);
//        $t_date= date('Y-m-d',$to_date);

        $begin = new DateTime($from_date);
        $end = new DateTime($to_date);
        $interval = DateInterval::createFromDateString('1 day');

        $period = new DatePeriod($begin, $interval, $end->modify('1 day'));

        foreach ($period as $dt) {

            $date = $dt->format("M-Y-d");
            $week = $dt->format("l");

            $this->load->model('attendenc/Employee_attendance_models');
            $result = $this->Employee_attendance_models->Employee_attendance_duty_roster_all_ready_add($date);

            if ($result == false) {

                $this->load->model('attendenc/Employee_attendance_models');
                $result = $this->Employee_attendance_models->insert_Employee_attendance_duty_roster($date, $week);

            }

        }
        echo $result;

    }

    function uncheck_employee_duty_roster()
    {

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $begin = new DateTime($from_date);
        $end = new DateTime($to_date);
        $interval = DateInterval::createFromDateString('1 day');

        $period = new DatePeriod($begin, $interval, $end->modify('1 day'));

        foreach ($period as $dt) {

            $date = $dt->format("M-Y-d");

            $this->load->model('attendenc/Employee_attendance_models');
            $result = $this->Employee_attendance_models->delete_Employee_attendance_duty_roster($date);

        }
        echo $result;

    }

    function load_duty_roster()
    {

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $begin = new DateTime($from_date);
        $end = new DateTime($to_date);
        $interval = DateInterval::createFromDateString('1 day');

        $period = new DatePeriod($begin, $interval, $end->modify('1 day'));

        $data = [];

        foreach ($period as $dt) {

            $roster_ID = null;
            $employ_ID = null;
            $employee_name = null;
            $shiftment = null;
            $employee_position = null;
            $Sunday = "";
            $Monday = "";
            $Tuesday = "";
            $Wednesday = "";
            $Thursday = "";
            $Friday = "";
            $Saturday = "";

            $date = $dt->format("M-Y-d");

            $this->load->model('attendenc/Employee_attendance_models');
            $result = $this->Employee_attendance_models->Employee_attendance_duty_roster_pass_date($date);


            if ($result !== false) {

                foreach ($result as $row) {

                    $this->load->model('User_branch_models');
                    $user_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($row->employee_user_branch_user_has_branchid);

                    $this->load->model('User_profile_models');
                    $user__profileid = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($user_branch->user_profile_iduser_profile);


                    $this->load->model('attendenc/Shiftment_models');
                    $Shiftment_name = $this->Shiftment_models->where_search_Shiftment_pass_shiftment_ID($row->shiftment_idshiftment);


                    $employ_ID = $row->employee_idemployee;
                    $employee_name = $user__profileid->fname . " " . $user__profileid->lname;
                    $shiftment = $Shiftment_name->shiftment_name;
                    $week = $row->week_day;
                    $roster_ID = $row->employee_attendance_id;

                    $Holiday = $row->calender_date_idcalender_date;

                    switch ($week) {
                        case "Sunday":

                            if ($Holiday !== null) {
                                $Sunday = "<span style=\"background-color:red; color: white\">$row->date</span>";
                            } else {
                                $Sunday = $row->date;
                            }
                            break;
                        case "Monday":

                            if ($Holiday !== null) {
                                $Monday = "<span style=\"background-color:red; color: white\">$row->date</span>";
                            } else {
                                $Monday = $row->date;
                            }
                            break;
                        case "Tuesday":

                            if ($Holiday !== null) {
                                $Tuesday = "<span style=\"background-color:red; color: white\">$row->date</span>";
                            } else {
                                $Tuesday = $row->date;
                            }

                            break;
                        case "Wednesday":

                            if ($Holiday !== null) {
                                $Wednesday = "<span style=\"background-color:red; color: white\">$row->date</span>";
                            } else {
                                $Wednesday = $row->date;
                            }
                            break;
                        case "Thursday":

                            if ($Holiday !== null) {
                                $Thursday = "<span style=\"background-color:red; color: white\">$row->date</span>";
                            } else {
                                $Thursday = $row->date;
                            }

                            break;
                        case "Friday":

                            if ($Holiday !== null) {
                                $Friday = "<span style=\"background-color:red; color: white\">$row->date</span>";
                            } else {
                                $Friday = $row->date;
                            }

                            break;
                        case "Saturday":

                            if ($Holiday !== null) {
                                $Saturday = "<span style=\"background-color:red; color: white\">$row->date</span>";
                            } else {
                                $Saturday = $row->date;
                            }
                            break;
                        default:
                            echo "Your favorite color is neither red, blue, nor green!";

                    }
                    array_push($data, [

                        'roster_id' => $roster_ID,
                        'employee_id' => $employ_ID,
                        'employee_name' => $employee_name,
                        'shiftment' => $shiftment,
                        'sunday' => $Sunday,
                        'monday' => $Monday,
                        'tuesday' => $Tuesday,
                        'wednesday' => $Wednesday,
                        'thursday' => $Thursday,
                        'friday' => $Friday,
                        'saturday' => $Saturday,
                    ]);

                }

            } else {

//                break;

            }

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function load_employee_attendance_row()
    {

        $roster_ID = $this->input->post('roster_id');

        $this->load->model('attendenc/Employee_attendance_models');
        $result = $this->Employee_attendance_models->where_search_Employee_attendance_data_pass_Employee_attendance_ID($roster_ID);

        if ($result !== false) {

            $data = [];

            foreach ($result as $row) {

                $this->load->model('attendenc/Shiftment_models');
                $Shiftment_name = $this->Shiftment_models->where_search_Shiftment_pass_shiftment_ID($row->shiftment_idshiftment);

                $shiftment = $Shiftment_name->shiftment_name;

                array_push($data, [

                    'date' => $row->date . "  " . $row->week_day,
                    'shiftment' => $shiftment,

                ]);

            }
            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;


        } else {
            echo "No-data";
        }


    }


    function employee_attendance_shift_update()
    {

        $roster_ID = $this->input->post('roster_id');

        $this->load->model('attendenc/Employee_attendance_models');
        $result = $this->Employee_attendance_models->Employee_attendance_duty_roster_shift_update_pass_id($roster_ID);

        if ($result == true) {

            echo "true";

        } else {
            echo "in value Shift ";
        }

    }

    function employee_attend_update()
    {

        $data = $_POST['datatable'];
        $json = json_decode($data, true);

        $switch=false;

        foreach ($json as $item) {

            $employee_code = $item['employee_id'];

            $originalDate = $item['date'];
            $date = date("M-Y-d", strtotime($originalDate));

            $this->load->model('attendenc/attendence_sheet_models');
            $this->attendence_sheet_models->attendance_sheet_upload_change_status($employee_code,$date);


            $this->load->model('Employee_models');
            $Employee_result = $this->Employee_models->where_search_employee_id_pass_employee_id_code_retun_result_set($employee_code);

            if ($Employee_result !== false) {

                foreach ($Employee_result as $row) {

                    $employee_id = $row->idemployee;

                    // get branch ID  login session ....................................................................

                    $branch_id = 40;

                    $originalDate = $item['date'];
                    $date = date("M-Y-d", strtotime($originalDate));

                    $this->load->model('attendenc/Employee_attendance_models');
                    $Employee_attend_result = $this->Employee_attendance_models->where_search_employee_attend_pass_employee_id_and_branch_id_and_date($employee_id, $branch_id, $date);

                    if ($Employee_attend_result !== false) {

                        $id = $Employee_attend_result->employee_attendance_id;

                        $arrival_time = $item['in_time'];
                        $departure_time = $item['out_time'];

                        // create status check . before update database ................................................

                        $this->load->model('attendenc/Employee_attendance_models');
                        $Employee_attend_sheet_result = $this->Employee_attendance_models->insert_Employee_attendance_sheet($id, $arrival_time, $departure_time,$date);

                        $this->load->model('attendenc/Employee_attendance_models');
                        $attendenc_result = $this->Employee_attendance_models->Where_search_employee_attendance($id);

                        $this->load->model('salary/allowance/Employee_salary_variables_note_models');
                        $this->Employee_salary_variables_note_models->insert_Employee_salary_variables_note($attendenc_result);

                        if ($Employee_attend_sheet_result == true) {
                            $switch=true;
                        }

                    }

                }

            } else {
//                echo "No employee data";
            }

        }
        if ($switch) {
            echo "Save";
        }

    }

}