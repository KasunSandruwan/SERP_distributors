<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/13/2018
 * Time: 12:11 PM
 */

class settings_controller extends CI_Controller
{

    function loadstatus()
    {

        $this->load->model('Status_models');
        $result = $this->Status_models->loadstatus();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idstatus,
                'status_type' => $row->status_type,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function Create_user_account()
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

            $user_code = $this->input->post('user-code');

            $this->load->model('User_profile_models');
            $user_id = $this->User_profile_models->get_user_id($user_code);

            $this->load->model('User_login_models');
            $allredy_check = $this->User_login_models->search_allredy_has_user_for_account($user_id->iduser_profile);

            if ($allredy_check === false) {

                if ($respons != false) {

                    $this->load->model('User_profile_models');
                    $respons = $this->User_profile_models->Employee_for_Create_User_Account($respons->iduser_role, $user_id->iduser_profile);

                    if ($respons == true) {
                        echo "true";
                    }

                }

            } else {
                echo "User has Already Account";
                die();
            }


        }


    }


}