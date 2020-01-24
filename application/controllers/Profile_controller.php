<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/12/2018
 * Time: 11:08 AM
 */

class Profile_controller extends CI_Controller
{


    function get_data()
    {

        $id = $this->session->userdata('profileID');

        $this->load->model('User_profile_models');
        $res = $this->User_profile_models->getprofiledata($id);

        foreach ($res as $row) {

            $user_data = array(
                'fname' => $row->fname,
                'lname' => $row->lname,
                'surname' => $row->surname,
                'nic' => $row->nic,
                'passport' => $row->passport,
                'email' => $row->email,
                'p_address' => $row->p_address,
                'address' => $row->address,
                'date_of_birth' => $row->date_of_birth,
                'gender' => $row->gender,
                'primary-phonenumber' => $row->primary_contact_number,
                'phonenumber' => $row->contact_number,
            );

        }

        header('Content-Type: application/json');
        echo json_encode($user_data);

    }

    function update_data()
    {


        $this->form_validation->set_rules('first-name', 'First Name', 'required');
        $this->form_validation->set_rules('last-name', 'Last Name', 'required');
        $this->form_validation->set_rules('p_address', 'Permanent Address', 'required');
        $this->form_validation->set_rules('primary-phonenumber', 'Primary Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('profile');

        } else {

            $id = $this->session->userdata('profileID');

            $this->load->model('User_profile_models');
            $response = $this->User_profile_models->update_profile_data($id);

            if ($response == true) {

                redirect('Page_controller/profile');

            }

        }


    }


    function insert_distributor()
    {


        $titlename = $this->input->post('title');

        $this->load->model('User_title_models');
        $titleid = $this->User_title_models->gettitleid($titlename);

        $t_id = $titleid->idtitle;

        $this->load->model('User_profile_models');
        $respons = $this->User_profile_models->insert_supplier_profile($t_id);


        $this->load->model('profile_management/distributor_models');
        $respons = $this->distributor_models->insert_distributor($respons);

        if ($respons == true) {

            echo 'true';
        }


    }

    function insert_supplier()
    {


        $titlename = $this->input->post('title');

        $this->load->model('User_title_models');
        $titleid = $this->User_title_models->gettitleid($titlename);

        $t_id = $titleid->idtitle;

        $this->load->model('User_profile_models');
        $respons = $this->User_profile_models->insert_supplier_profile($t_id);


        $is_local_request = $this->input->post('is_Local');

        if ($is_local_request === 'on') {

            $is_local = 'yes';

        } else {
            $is_local = 'No';
        }

        $this->load->model('profile_management/supplier_models');
        $respons = $this->supplier_models->insert_supplier($respons, $is_local);

        if ($respons == true) {

            echo 'true';
        }

    }


    function get_supplier_data()
    {

        $this->load->model('profile_management/supplier_models');
        $respons = $this->supplier_models->all_search_supplier();

        $supplier = $this->input->post('supplier');

        $data = [];

        foreach ($respons as $row) {

            $this->load->model('User_profile_models');
            $respons_user_profile = $this->User_profile_models->where_search_supplier_user_profile($supplier);

            foreach ($respons_user_profile as $result_userprofile) {

                if ($row->user_profile_iduser_profile === $result_userprofile->iduser_profile) {

                    array_push($data, [

                        'fname' => $result_userprofile->fname,
                        'lname' => $result_userprofile->lname,
                        'sname' => $result_userprofile->surname,
                        'nic' => $result_userprofile->nic,
                        'contact_number' => $result_userprofile->primary_contact_number,
                        'supplier_id' => $row->supplier,

                    ]);

                }

            }

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function get_distributor_data()
    {

        $this->load->model('profile_management/distributor_models');
        $respons = $this->distributor_models->all_distributor();

        $distributor = $this->input->post('distributor');

        $data = [];

        foreach ($respons as $row) {

            $this->load->model('User_profile_models');
            $respons_user_profile = $this->User_profile_models->where_search_distributor($distributor);

            foreach ($respons_user_profile as $result_userprofile) {

                if ($row->user_profile_iduser_profile === $result_userprofile->iduser_profile) {

                    array_push($data, [

                        'fname' => $result_userprofile->fname,
                        'lname' => $result_userprofile->lname,
                        'sname' => $result_userprofile->surname,
                        'nic' => $result_userprofile->nic,
                        'contact_number' => $result_userprofile->primary_contact_number,
                        'distributor_id' => $row->distributor,

                    ]);

                }

            }
        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }
  function get_driver_data()
    {

        $this->load->model('profile_management/driver_models');
        $respons = $this->distributor_models->all_driver();

        $driver_code = $this->input->post('driver_code');

        $data = [];

        foreach ($respons as $row) {

            $this->load->model('User_profile_models');
            $respons_user_profile = $this->User_profile_models->where_search_distributor($driver_code);

            foreach ($respons_user_profile as $result_userprofile) {

                if ($row->user_profile_iduser_profile === $result_userprofile->iduser_profile) {

                    array_push($data, [

                        'fname' => $result_userprofile->fname,
                        'lname' => $result_userprofile->lname,
                        'sname' => $result_userprofile->surname,
                        'nic' => $result_userprofile->nic,
                        'contact_number' => $result_userprofile->primary_contact_number,
                        'driver_code' => $row->driver_code,

                    ]);

                }

            }
        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function insert_customer()
    {

        $titlename = $this->input->post('title');

        $this->load->model('User_title_models');
        $titleid = $this->User_title_models->gettitleid($titlename);

        $t_id = $titleid->idtitle;

        $this->load->model('User_profile_models');
        $profile_id = $this->User_profile_models->insert_supplier_profile($t_id);

        $customer_type = $this->input->post('Customer_type_select');

        $this->load->model('profile_management/customer_type_models');
        $respons = $this->customer_type_models->where_search_customer_type($customer_type);

        $customer_type_id=$respons->idcustomer_type;

        $this->load->model('profile_management/customer_models');
        $result = $this->customer_models->insert_customer($profile_id,$customer_type_id);

        if ($result == true) {

            echo 'true';
        }

    }
    function insert_driver()
    {

        $titlename = $this->input->post('title');

        $this->load->model('User_title_models');
        $titleid = $this->User_title_models->gettitleid($titlename);

        $t_id = $titleid->idtitle;

        $this->load->model('User_profile_models');
        $respons = $this->User_profile_models->insert_supplier_profile($t_id);


        $this->load->model('profile_management/driver_models');
        $respons = $this->driver_models->insert_driver($respons);

        if ($respons == true) {

            echo 'true';
        }

    }

    function get_customer()
    {

        $this->load->model('profile_management/customer_models');
        $respons = $this->customer_models->all_search_customer();

        $customer = $this->input->post('Customer');

        $data = [];

        foreach ($respons as $row) {

            $this->load->model('User_profile_models');
            $respons_user_profile = $this->User_profile_models->where_search_customer($customer);

            foreach ($respons_user_profile as $result_userprofile) {

                if ($row->user_profile_iduser_profile === $result_userprofile->iduser_profile) {

                    array_push($data, [

                        'fname' => $result_userprofile->fname,
                        'lname' => $result_userprofile->lname,
                        'sname' => $result_userprofile->surname,
                        'nic' => $result_userprofile->nic,
                        'contact_number' => $result_userprofile->primary_contact_number,
                        'customer_id' => $row->idcustomer,

                    ]);

                }

            }
        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function save_customer_type()
    {

        $customer_type = $this->input->post('customer_type');

        $this->load->model('profile_management/customer_type_models');
        $respons = $this->customer_type_models->where_search_customer_type_all_ready_add($customer_type);

        if ($respons === false) {

            $this->load->model('profile_management/customer_type_models');
            $this->customer_type_models->insert_customer_type();

        }

    }

    function all_search_customer_type()
    {

        $this->load->model('profile_management/customer_type_models');
        $respons = $this->customer_type_models->all_search_customer_type();

        if ($respons !== false) {

            $data = [];

            foreach ($respons as $row) {


                array_push($data, [

                    'id' => $row->idcustomer_type,
                    'customer_type' => $row->customer_type,

                ]);

            }


            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo 'No_Data';
        }

    }

    function save_discount_range(){

        $customer_type = $this->input->post('customer_type');

        $this->load->model('profile_management/customer_type_models');
        $respons = $this->customer_type_models->where_search_customer_type($customer_type);

        $customer_type_id=$respons->idcustomer_type;

        $this->load->model('profile_management/discount_range_models');
        $respons_discount_range = $this->discount_range_models->where_search_discount_range($customer_type_id);

        if($respons_discount_range !==false){

            $iddiscount_range=$respons_discount_range->iddiscount_range;

            $this->load->model('profile_management/discount_range_models');
            $respons = $this->discount_range_models->update_discount_range_status($iddiscount_range);

        }

        $this->load->model('profile_management/discount_range_models');
        $this->discount_range_models->insert_discount_range($customer_type_id);

    }

    function load_discount_range(){

        $this->load->model('profile_management/discount_range_models');
        $respons = $this->discount_range_models->all_search_discount_range();

        if ($respons !== false) {

            $data = [];

            foreach ($respons as $row) {

                $this->load->model('profile_management/customer_type_models');
                $respons_customer_type = $this->customer_type_models->where_search_customer_type_pass_id($row->customer_type_idcustomer_type);

                $status=$row->status;

                $status_labal="";

                if($status === 'active'){

                    $status_labal = "<span class=\"btn btn-round btn-success btn-xs\">active</span>";

                }else{

                    $status_labal = "<span class=\"btn btn-round btn-danger btn-xs\">De_active</span>";

                }

                array_push($data, [

                    'customer_type' => $respons_customer_type->customer_type,
                    'discount_difault' => $row->discount_difault,
                    'discount_max' => $row->discount_max,
                    'discount_min' => $row->discount_min,
                    'status' => $status_labal,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo 'No_Data';
        }




    }



}