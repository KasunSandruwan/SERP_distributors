<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/5/2018
 * Time: 4:13 PM
 */

class Employee_attendance_models extends CI_Model
{

    // insert Employee_attendance .................
    function insert_Employee_attendance_sheet($id, $arrival_time, $departure_time,$date)
    {

        $time1 = strtotime($arrival_time);
        $time2 = strtotime($departure_time);

        $difference = round($time2 - $time1);

        $hours = $difference / 3600; // 3600 seconds in an hour
        $minutes = ($hours - floor($hours)) * 60;
        $final_hours = round($hours, 0);
        $final_minutes = round($minutes);

        $this->db->set('arrival_time', $arrival_time);
        $this->db->set('departure_time', $departure_time);
        $this->db->set('working_hours', $final_hours . "." . $final_minutes);

        $working_hours=$final_hours .":". $final_minutes;

        // ...........................................

        $this->load->model('attendenc/Employee_attendance_models');
        $result = $this->Employee_attendance_models->where_search_Employee_attendance_data_pass_Employee_attendance_ID($id);

        if ($result !== false) {

            foreach ($result as $row) {

                $this->load->model('attendenc/Shiftment_models');
                $shift = $this->Shiftment_models->where_search_Shiftment_pass_shiftment_ID($row->shiftment_idshiftment);

                $shift_hours_count = $shift->hours_count;

                // Convert Double data in Time format...................................................................

                list($hours_convert, $wrongMinutes) = explode('.', number_format((float)$shift_hours_count, 2, '.', ''));
                $minutes_convert = ($wrongMinutes < 10 ? $wrongMinutes * 10 : $wrongMinutes) * 0.6;
                $shift_hours_count_format = $hours_convert.':'.$minutes_convert;

                $time3 = strtotime($working_hours);
                $time4 = strtotime($shift_hours_count_format);

                $difference2 = round($time3 - $time4);

                $hours2 = $difference2 / 3600; // 3600 seconds in an hour
                $minutes2 = ($hours2 - floor($hours2)) * 60;
                $final_hours2 = round($hours2, 0);
                $final_minutes2 = round($minutes2);

                $this->db->set('hours_difference', $final_hours2.".".$final_minutes2);

                $this->load->model('attendenc/Calender_date_models');
                $Calender_date= $this->Calender_date_models->where_Calender_date_pass_calender_date($date);

                if($Calender_date === false){

                    if($final_hours2.".".$final_minutes2 < 0) {

                    $attendstatus = "Short-leave";

                    $this->load->model('attendenc/Attendence_status_models');
                    $Attendence_status = $this->Attendence_status_models->where_search_Attendence_status_pass_attendence($attendstatus);

                    if ($Attendence_status !== false) {

                        $this->db->set('attendence_status_idattendenc_status',$Attendence_status->idattendenc_status);

                    }

                    }else if($final_hours2.".".$final_minutes2 == 0.0 || $final_hours2.".".$final_minutes2 == 0){

                        $attendstatus="Full-time";

                        $this->load->model('attendenc/Attendence_status_models');
                        $Attendence_status = $this->Attendence_status_models->where_search_Attendence_status_pass_attendence($attendstatus);

                        if($Attendence_status !==false){

                            $this->db->set('attendence_status_idattendenc_status',$Attendence_status->idattendenc_status);

                        }

                     }else{

                    $attendstatus="OT";

                    $this->load->model('attendenc/Attendence_status_models');
                    $Attendence_status = $this->Attendence_status_models->where_search_Attendence_status_pass_attendence($attendstatus);

                    if($Attendence_status !==false){

                        $this->db->set('attendence_status_idattendenc_status',$Attendence_status->idattendenc_status);

                    }

                }

                    }else{

                    $attendstatus="Double-OT";

                    $this->load->model('attendenc/Attendence_status_models');
                    $Attendence_status = $this->Attendence_status_models->where_search_Attendence_status_pass_attendence($attendstatus);

                    if($Attendence_status !==false){

                        $this->db->set('attendence_status_idattendenc_status',$Attendence_status->idattendenc_status);

                    }

                }

            }

        }

        $this->db->where('employee_attendance_id', $id);
        $this->db->update('employee_attendance');

        return true;

    }

    function where_search_employee_attend_pass_employee_id_and_branch_id_and_date($employee_id, $branch_id, $date)
    {

        $this->db->where('employee_idemployee', $employee_id);
        $this->db->where('branch_idbranch', $branch_id);
        $this->db->where('date', $date);

        $query = $this->db->get('employee_attendance');

        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return false;
        }

    }


    function insert_Employee_attendance_duty_roster($date, $week)
    {

        $employee_id = $this->input->post('employee_id');
        $shiftment = $this->input->post('shiftment');

        // get branch ID................................................................................................

        $branch = $this->input->post('branch');

        $this->load->model('Branch_models');
        $branch_result = $this->Branch_models->get_branch_id($branch);

        $branch_ID = null;

        if ($branch_result !== false) {

            $branch_ID = $branch_result->idbranch;

        }
        // get Employee ID...............................................................................................

        $this->load->model('Employee_models');
        $result_employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        // get shitment ID .............................................................................................

        $this->load->model('attendenc/Shiftment_models');
        $result_shiftment = $this->Shiftment_models->where_search_Shiftment_pass_shiftment_name($shiftment);

        if ($result_shiftment !== false) {

            $this->load->model('attendenc/Calender_date_models');
            $Calender_date = $this->Calender_date_models->where_Calender_date_pass_calender_date($date);

            $Calender = null;

            if ($Calender_date !== false) {
                $Calender = $Calender_date->idcalender_date;
            }

            $data = array(

                'employee_idemployee' => $result_employee->idemployee,
                'employee_user_branch_user_has_branchid' => $result_employee->user_branch_user_has_branchid,
                'calender_date_idcalender_date' => $Calender,
                'shiftment_idshiftment' => $result_shiftment->idshiftment,
                'attendence_status_idattendenc_status' => 1,
                'branch_idbranch' => $branch_ID,

                'date' => $date,
                'week_day' => $week,

            );

            $this->db->insert('employee_attendance', $data);
            return $this->db->insert_id();

        } else {
            return "pleas select shiftment";
        }

    }

    // Where Search Employee Attendance  pass Employee Attendance ID....................................................

    function where_search_Employee_attendance_data_pass_Employee_attendance_ID($data)
    {

        $this->db->where('employee_attendance_id', $data);
        $query = $this->db->get('employee_attendance');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;

        }

    }

    function delete_Employee_attendance_duty_roster($date)
    {

        $employee_id = $this->input->post('employee_id');
        $shiftment = $this->input->post('shiftment');

        // get Employee ID...............................................................................................

        $this->load->model('Employee_models');
        $result_employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        // get shitment ID .............................................................................................

        $this->load->model('attendenc/Shiftment_models');
        $result_shiftment = $this->Shiftment_models->where_search_Shiftment_pass_shiftment_name($shiftment);

        if ($result_shiftment !== false) {

            $this->db->where('employee_idemployee', $result_employee->idemployee);
            $this->db->where('employee_user_branch_user_has_branchid', $result_employee->user_branch_user_has_branchid);
            $this->db->where('shiftment_idshiftment', $result_shiftment->idshiftment);
            $this->db->where('date', $date);
            $this->db->delete('employee_attendance');

            return "unchecked ....! ";

        } else {
            return "pleas select shiftment";
        }

    }

    function Employee_attendance_duty_roster_all_ready_add($date)
    {

        $employee_id = $this->input->post('employee_id');
        $shiftment = $this->input->post('shiftment');

        // get Employee ID...............................................................................................

        $this->load->model('Employee_models');
        $result_employee = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        // get shitment ID .............................................................................................

        $this->load->model('attendenc/Shiftment_models');
        $result_shiftment = $this->Shiftment_models->where_search_Shiftment_pass_shiftment_name($shiftment);

        if ($result_shiftment !== false) {

            $this->db->where('employee_idemployee', $result_employee->idemployee);
            $this->db->where('employee_user_branch_user_has_branchid', $result_employee->user_branch_user_has_branchid);
            $this->db->where('shiftment_idshiftment', $result_shiftment->idshiftment);
            $this->db->where('date', $date);
            $query = $this->db->get('employee_attendance');

            if ($query->result()) {
                return true;
            } else {
                return false;
            }

        } else {
            return "pleas select shiftment";
        }

    }

    // Where Search Employee attendance duty roster pass date...........................................................

    function Employee_attendance_duty_roster_pass_date($date)
    {

        $branch = $this->input->post('branch');

        $this->load->model('Branch_models');
        $branch_result = $this->Branch_models->get_branch_id($branch);

        if ($branch_result !== false) {

            $this->db->where('date', $date);
            $this->db->where('branch_idbranch', $branch_result->idbranch);

            $query = $this->db->get('employee_attendance');

            if ($query->result()) {
                return $query->result();
            } else {
                return false;

            }

        } else {
            return false;
        }


    }

    // Where Search  Employee attendance duty roster bet win date and employee id.......................................


    function Employee_attendance_duty_roster_pass_date_and_employee_id($date, $employee_id)
    {

        $this->db->where('date', $date);
        $this->db->where('employee_idemployee', $employee_id);

        $query = $this->db->get('employee_attendance');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;

        }

    }

    // Update Employee Attendance Shift ................................................................................

    function Employee_attendance_duty_roster_shift_update_pass_id($data)
    {

        $shiftment = $this->input->post('shift');

        // get shitment ID .............................................................................................

        $this->load->model('attendenc/Shiftment_models');
        $result_shiftment = $this->Shiftment_models->where_search_Shiftment_pass_shiftment_name($shiftment);

        if ($result_shiftment !== false) {

            $this->db->set('shiftment_idshiftment', $result_shiftment->idshiftment);

            $this->db->where('employee_attendance_id', $data);
            $this->db->update('employee_attendance');

            return true;

        } else {
            return false;
        }

    }


    function Where_search_employee_attendance($data){

        $this->db->where('employee_attendance_id', $data);

        $query = $this->db->get('employee_attendance');

        if ($query->num_rows() == 1){
            return $query->row(0);
        } else {
            return false;
        }

    }


}