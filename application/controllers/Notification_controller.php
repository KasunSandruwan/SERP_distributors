<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 5/17/2018
 * Time: 11:59 AM
 */

class Notification_controller extends CI_Controller
{


    function check_user_has_notification()
    {

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');

        $this->load->model('notification/notification_models');
        $result_notification = $this->notification_models->get_user_has_notification();

        $data = [];

        if($result_notification !==false){

        foreach ($result_notification as $row) {

            $profile_name = null;
            $notification_time = null;
            $table_name = null;
            $id = null;
            $description = null;
            $notification_count = sizeof($result_notification);
            $notification_time_dff = null;

            switch ($row->notification_table) {

                case "Employee_has_leave_application":

                    $this->load->model('leave/Employee_has_leave_application_models');
                    $result_leave = $this->Employee_has_leave_application_models->where_search_employee_has_leave_application_pass_aplication_id($row->notificationco_table_id);


                    $this->load->model('User_branch_models');
                    $result_User_branch = $this->User_branch_models->where_search_user_branch_retun_profile_id($result_leave->employee_user_branch_user_has_branchid);

                    $this->load->model('User_profile_models');
                    $result_User_profile = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($result_User_branch->user_profile_iduser_profile);

                    $profile_name = $result_User_profile->fname . " " . $result_User_profile->lname;
                    $description = $row->description . " " . $result_leave->difference." Day";

                    $id=$result_leave->employee_has_leave_applicationid;

                    break;

                default :

                    break;

            }

            // notification Time .......................................................................................

            $datetime1 = new DateTime(mdate($format));
            $datetime2 = new DateTime($row->notification_time);
            $interval = $datetime1->diff($datetime2);

            $min = $interval->format('%i mins ago');
            $hour = $interval->format('%h hours ago');
            $day = $interval->format('%d days ago');

            if ($hour < 1 && $day < 1) {
                $notification_time_dff = $min;
            } else {

                if ($day < 1) {
                    $notification_time_dff = $hour;
                } else {
                    $notification_time_dff = $day;
                }

            }

            $table_name=$row->notification_table;
            $notification_time = $notification_time_dff;

            //..........................................................................................................

            array_push($data, [

                'profile_name' => $profile_name,
                'notification_time' => $notification_time,
                'description' => $description,
                'notification_count' => $notification_count,
                'action' => $table_name,
                'id'=>$id,

            ]);

        }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }

        echo "No_data";

        }

}