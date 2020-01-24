<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 4/5/2018
 * Time: 2:26 PM
 */

class Employee_salary_variables_note_models extends CI_Model
{

    // insert Employee_salary_variables_note............................................................................

    function insert_Employee_salary_variables_note($attendenc_result)
    {

        $salary_variable = "";
        $switch = false;

        $this->load->model('/attendenc/Attendence_status_models');
        $result_Attendence = $this->Attendence_status_models->where_search_Attendence_status_pass_attendence_ID($attendenc_result->attendence_status_idattendenc_status);

        switch ($result_Attendence->attendence_status) {

            case "Double-OT":

                $this->load->model('/salary/salary_variable_models');
                $result_salary_variable = $this->salary_variable_models->where_search_salary_variable_pass_salary_variable("Double-OT");
                $salary_variable = $result_salary_variable->idsalary_variable_id;

                $switch = true;
                break;
            case "OT":

                $this->load->model('/salary/salary_variable_models');
                $result_salary_variable = $this->salary_variable_models->where_search_salary_variable_pass_salary_variable("OT");
                $salary_variable = $result_salary_variable->idsalary_variable_id;

                $switch = true;
                break;

            case "Short-leave":

                $this->load->model('/salary/salary_variable_models');
                $result_salary_variable = $this->salary_variable_models->where_search_salary_variable_pass_salary_variable("Short-leave");
                $salary_variable = $result_salary_variable->idsalary_variable_id;

                $switch = true;
                break;
            default :

                $switch = false;
                break;


        }

        if ($switch) {

            $data = array(

                'salary_variable_idsalary_variable_id' => $salary_variable,
                'employee_idemployee' => $attendenc_result->employee_idemployee,
                'employee_user_branch_user_has_branchid' => $attendenc_result->employee_user_branch_user_has_branchid,
                'date' => $attendenc_result->date,
                'value' => $attendenc_result->hours_difference,
                're_make' => "",
                'status' => "1",

            );

            $this->db->insert('employee_salary_variables_note', $data);

            //..........................................................................................................

            $this->load->model('salary/Payment_circle_models');
            $result_payment_circle = $this->Payment_circle_models->get_payment_circle_between_date();

            if (sizeof($result_payment_circle) > 0) {

                foreach ($result_payment_circle as $row) {

                    $start_date = $row->from_date;

                    $end_date = $row->to_date;

                    $user_ts = strtotime($attendenc_result->date);

                    $resut = $this->check_in_range($start_date, $end_date, $user_ts);

                    if ($resut == true) {

                        $this->load->model('salary/Paysheet_models');
                        $result_payment = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_payment_circle($row->payment_circle, $attendenc_result->employee_idemployee);

                        if ($result_payment === false) {

                            $this->load->model('salary/Paysheet_models');
                            $insert_payment = $this->Paysheet_models->insert_paysheet($row->payment_circle, $attendenc_result->employee_idemployee, $attendenc_result->employee_user_branch_user_has_branchid);

                            $value = $this->timeStringToFloat($attendenc_result->hours_difference);

                            $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                            $this->Paysheet_has_variables_value_summery_models->insert_paysheet_has_variables_value_summery($insert_payment, $salary_variable, $value);

                        } else {

                            $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                            $result_paysheet_has_variable = $this->Paysheet_has_variables_value_summery_models->where_search_paysheet_has_variables_value_summery_pass_paysheet_id_and_salary_variable_id($result_payment->idpaysheet, $salary_variable);

                            if ($result_paysheet_has_variable !== false) {

                                $value_db = $result_paysheet_has_variable->value;

                                $value_time = $attendenc_result->hours_difference;

                                $format_value = number_format($value_time, 2, '.', '');

//                            $round_value = round($format_value, 2);

                                $value = $this->timeStringToFloat($format_value);

                                $tot_value = $value_db * 1 + $value * 1;

                                $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                                $this->Paysheet_has_variables_value_summery_models->update_paysheet_has_salary_variable_value_summery($result_paysheet_has_variable->paysheet_has_varibles_value_summarycol, $tot_value);

                            } else {

                                $value_time = $attendenc_result->hours_difference;

                                $format_value = number_format($value_time, 2, '.', '');
//
//                            $round_value = round($format_value, 2);

                                $value = $this->timeStringToFloat($format_value);

                                $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                                $this->Paysheet_has_variables_value_summery_models->insert_paysheet_has_variables_value_summery($result_payment->idpaysheet, $salary_variable, $value);

                            }

                        }

                    } else {

                        echo "not_payment_circle";
                        die();
                    }

                }

            }
        }

    }

    // all Search Employee_salary_variables_note .......................................................................

    function all_search_Employee_salary_variables_note()
    {

        $query = $this->db->get('employee_salary_variables_note');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }


    function timeStringToFloat($time)
    {

        if ($time < 0) {
            $time = $time * -1;
        }

        $parts = explode('.', $time);

        return $parts[0] + floor(($parts[1] / 60) * 100) / 100 . PHP_EOL;

    }

    function insert_Employee_salary_variables_note_addition_pay()
    {

        $variables = $this->input->post('variables');
        $employee_id = $this->input->post('employee_id');
        $date = $this->input->post('date');
        $variables_value = $this->input->post('variables_value');

        $date_format = new DateTime($date);

        $this->load->model('Employee_models');
        $employee_result = $this->Employee_models->where_search_employee_id_pass_employee_id($employee_id);

        $this->load->model('/salary/salary_variable_models');
        $result_salary_variable = $this->salary_variable_models->where_search_salary_variable_pass_salary_variable($variables);

        if ($result_salary_variable !== false) {

            $salary_variable = $result_salary_variable->idsalary_variable_id;

            $data = array(

                'salary_variable_idsalary_variable_id' => $salary_variable,
                'employee_idemployee' => $employee_result->idemployee,
                'employee_user_branch_user_has_branchid' => $employee_result->user_branch_user_has_branchid,
                'date' => $date_format->format("M-Y-d"),
                'value' => $variables_value,
                're_make' => "",
                'status' => "1",

            );

            $this->db->insert('employee_salary_variables_note', $data);

            $format_date = $date_format->format("M-Y-d");

            $this->load->model('salary/Payment_circle_models');
            $result_payment_circle = $this->Payment_circle_models->get_payment_circle_between_date();


            if (sizeof($result_payment_circle) > 0) {

                foreach ($result_payment_circle as $row) {

                    $start_date = $row->from_date;

                    $end_date = $row->to_date;

                    $user_ts = strtotime($format_date);

                    $resut = $this->check_in_range($start_date, $end_date, $user_ts);

                    if ($resut == true) {

                        $this->load->model('salary/Paysheet_models');

                        $result_payment = $this->Paysheet_models->where_search_paysheet_pass_employee_id_and_payment_circle($row->payment_circle, $employee_result->idemployee);

                        if ($result_payment === false) {

                            $this->load->model('salary/Paysheet_models');
                            $insert_payment = $this->Paysheet_models->insert_paysheet($row->payment_circle, $employee_result->idemployee, $employee_result->user_branch_user_has_branchid);

                            $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                            $this->Paysheet_has_variables_value_summery_models->insert_paysheet_has_variables_value_summery($insert_payment, $salary_variable, $variables_value);

                        } else {

                            $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                            $result_paysheet_has_variable = $this->Paysheet_has_variables_value_summery_models->where_search_paysheet_has_variables_value_summery_pass_paysheet_id_and_salary_variable_id($result_payment->idpaysheet, $salary_variable);

                            if ($result_paysheet_has_variable !== false) {

                                $value_db = $result_paysheet_has_variable->value;

                                $tot_value = $value_db * 1 + $variables_value * 1;

                                $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                                $this->Paysheet_has_variables_value_summery_models->update_paysheet_has_salary_variable_value_summery($result_paysheet_has_variable->paysheet_has_varibles_value_summarycol, $tot_value);

                            } else {

                                $this->load->model('salary/allowance/Paysheet_has_variables_value_summery_models');
                                $this->Paysheet_has_variables_value_summery_models->insert_paysheet_has_variables_value_summery($result_payment->idpaysheet, $salary_variable, $variables_value);

                            }

                        }

                    } else {

                    }

                }
            }

        }

    }


    function check_in_range($start_date, $end_date, $date_from_user)
    {

        $user_ts = $date_from_user;
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);

        return (($user_ts >= $start_ts) && ($user_ts < $end_ts));

    }


}