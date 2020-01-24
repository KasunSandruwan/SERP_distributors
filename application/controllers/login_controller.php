<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/7/2018
 * Time: 2:03 PM
 */

class login_controller extends CI_Controller
{

    function login_user()
    {

        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login');

        } else {

            $this->load->model('User_login_models');
            $result = $this->User_login_models->loginuser();

            if ($result != false) {

                // check status.................................................................................

                $this->load->model('Status_models');
                $Status = $this->Status_models->getstatus($result->status_idstatus);

                if ($Status->status_type == 'active') {

                    $userprofileID = $result->user_profile_iduser_profile;

                    // set user activities ..........................................................................

                    $activities = 'Log in';

                    // get User activities Data.......................................................................

                    $this->load->model('User_activities_models');
                    $uactivities = $this->User_activities_models->getactivities($activities);

                    // Set user Session Description .......................................................................

                    $description = 'ID_' . $userprofileID . '_User is Log in';

                    //..........................................................................

                    if ($uactivities != false) {

                        $this->load->model('User_sessions_activities_models');
                        $this->User_sessions_activities_models->setsession($uactivities->iduser_activities, $description);

                    } else {

                        $this->load->model('User_activities_models');
                        $activitiID = $this->User_activities_models->setactivities($activities);

                        $this->load->model('User_sessions_activities_models');
                        $this->User_sessions_activities_models->setsession($activitiID, $description);

                    }

                    //get User Profile Data...........................................................................

                    $this->load->model('User_profile_models');
                    $uprofile = $this->User_profile_models->getprofiledata($result->user_profile_iduser_profile);

                    $userroleid = null;


//                    $this->load->model('User_login_models');
//                    $user_login = $this->User_login_models->get_user_login_ID();


                    foreach ($uprofile as $row) {

                        $userroleid = $row->user_role_iduser_role;

                        $this->load->model('User_branch_models');
                        $user_branch_models = $this->User_branch_models->where_search_user_branch_pass_profile_id($result->user_profile_iduser_profile);

                        $user_branch = null;

                        if ($user_branch_models !== false) {

                            $this->load->model('Branch_has_department_model');
                            $user_branch = $this->Branch_has_department_model->where_search_department_pass_branch_has_department_id($user_branch_models->branch_has_department_branch_has_departmentid);

                            $user_branch = $user_branch->branch_idbranch;

                        }


                        //session set user.....................................................................

                        $user_data = array(

                            'profileID' => $userprofileID,
                            'fname' => $row->fname,
                            'lname' => $row->lname,
                            'companyID' => $result->company_idcompany,
                            'user_login_ID' => $result->iduser_login,
                            'user_branch' => $user_branch,
                            'Loggedin' => TRUE

                        );

                    }

                    // get user Role Data............................................................................

                    $this->load->model('User_role_models');
                    $urole = $this->User_role_models->getuserrole($userroleid);

                    foreach ($urole as $row) {

                        // check user role .................................................................................

                        if ($row->user_role == 'super admin') {


                            $admin_privilege = array(
                                'super_admin' => true,
                            );

                            $this->session->set_userdata($admin_privilege);
                            $this->session->set_userdata($user_data);
                            redirect('Admin_controller/index');

                        } else if ($row->user_role == 'admin') {

                            $this->session->set_userdata($user_data);
                            redirect('Admin_controller/index');

                        }

                    }


                } else {

                    $this->session->set_flashdata('errormgs', 'Your Account is Band or deactive');
                    redirect('Page_controller/index');

                }

            } else {
                $this->session->set_flashdata('errormgs', 'wrong Email and Password!');

                redirect('Page_controller/index');
            }

        }


    }


    function logout_user()
    {

        $this->load->model('User_session_updata_models');
        $response = $this->User_session_updata_models->sessionupdate();

        if ($response == true) {

            $this->session->unset_userdata('companyID');
            $this->session->unset_userdata('user_login_ID');
            $this->session->unset_userdata('profileID');
            $this->session->unset_userdata('Loggedin');
            $this->session->unset_userdata('super_admin');
            $this->session->unset_userdata('user_branch');

            redirect('Page_controller/index');

        }


    }


}