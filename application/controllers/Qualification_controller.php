<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/27/2018
 * Time: 4:12 PM
 */

class Qualification_controller extends CI_Controller
{

    function save_qualification_type()
    {

        $data = $this->input->post('data');

        if ($data != null || $data != "") {

            $this->load->model('qualification/Qualification_type_models');
            $result = $this->Qualification_type_models->all_ready_add_qualificationType($data);

            if ($result == false) {

                $this->load->model('qualification/Qualification_type_models');
                $result = $this->Qualification_type_models->insert_qualificationType();

                if ($result == true) {
                    echo "true";
                }

            }

        }

    }

    function load_qualification_type_table()
    {

        $this->load->model('qualification/Qualification_type_models');
        $result = $this->Qualification_type_models->all_search_qualificationType();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [
                'id' => $row->idqualification_type,
                'qualification_type' => $row->qualification_type,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


    function save_qualification()
    {

        $qualification_type = $this->input->post('qualification_type_select');

        $this->load->model('qualification/Qualification_type_models');
        $qualification = $this->Qualification_type_models->where_search_qualificationType_pass_name($qualification_type);

        $quID = $qualification->idqualification_type;

        $this->load->model('qualification/Qualification_models');
        $result = $this->Qualification_models->insert_qualification($quID);

        if ($result == true) {
            echo "true";
        }

    }


    function load_qualification_table()
    {

        $this->load->model('qualification/Qualification_models');
        $result = $this->Qualification_models->all_search_qualification();

        $data = [];

        foreach ($result as $row) {

            $this->load->model('qualification/Qualification_type_models');
            $Qualification_type = $this->Qualification_type_models->where_search_qualificationType_pass_id($row->qualification_type_idqualification_type);

            array_push($data, [

                'id' => $row->idqualification,
                'qualification_name' => $row->qualification_name,
                'description' => $row->description,
                'qualification_type' => $Qualification_type->qualification_type,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function subject_save()
    {

        $data = $this->input->post('qualification_subject');

        if ($data != null || $data != "") {

            $this->load->model('qualification/Subject_models');
            $result = $this->Subject_models->all_ready_add_subject($data);

            if ($result == false) {

                $this->load->model('qualification/Subject_models');
                $subject_id = $this->Subject_models->insert_subject();

                if ($subject_id != null) {

                    $qualification = $this->input->post('qualification');

                    $this->load->model('qualification/Qualification_models');
                    $qualification_id = $this->Qualification_models->where_search_qualification_pass_name($qualification);


                    $this->load->model('qualification/Qualification_has_subject_models');
                    $result = $this->Qualification_has_subject_models->insert_qualification_has_subject($qualification_id->idqualification, $subject_id);

                    if ($result == true) {

                        echo "true";
                    }

                }

            }

        }

    }

    function load_subject_table()
    {

        $this->load->model('qualification/Qualification_has_subject_models');
        $result = $this->Qualification_has_subject_models->all_search_Qualification_value();


        $data = [];

        foreach ($result as $row) {

            $this->load->model('qualification/Subject_models');
            $subject_name = $this->Subject_models->where_search_subject_pass_id($row->subject_idsubject);

            $this->load->model('qualification/Qualification_models');
            $qualification_name = $this->Qualification_models->where_search_qualification_pass_id($row->qualification_idqualification);


            array_push($data, [

                'id' => $row->qualification_has_subjectcol,
                'subject' => $subject_name->subject,
                'qualification' => $qualification_name->qualification_name,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function load_qualification()
    {

        $this->load->model('qualification/Qualification_models');
        $result = $this->Qualification_models->all_search_qualification();

        $data = [];

        foreach ($result as $row) {

            array_push($data, [

                'id' => $row->idqualification,
                'qualification_name' => $row->qualification_name,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }

    function search_subject_where_qualification_id()
    {


        $data = $this->input->post('qualification');

        $this->load->model('qualification/Qualification_models');
        $qualification_id = $this->Qualification_models->where_search_qualification_pass_name($data);

        if ($qualification_id !== false) {

            $qualification_ID = $qualification_id->idqualification;

            $this->load->model('qualification/Qualification_has_subject_models');
            $result = $this->Qualification_has_subject_models->where_search_qualification_has_subject_pass_qualification_id($qualification_ID);

            $data = [];

            foreach ($result as $row) {

                $this->load->model('qualification/Subject_models');
                $subject_name = $this->Subject_models->where_search_subject_pass_id($row->subject_idsubject);

                array_push($data, [

                    'id' => $row->qualification_has_subjectcol,
                    'subject' => $subject_name->subject,

                ]);


            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "No_data";
        }

    }


    function save_qualification_user()
    {

        $this->load->model('qualification/User_profile_has_qualification_models');
        $result = $this->User_profile_has_qualification_models->insert_User_profile_has_qualification();

        if ($result != null || $result == "") {

            $this->load->model('qualification/Qualification_value_models');
            $result = $this->Qualification_value_models->insert_Qualification_value($result);

            if ($result == true) {
                echo "true";
            }
        }


    }


    function all_search_qualification_employee()
    {

        // pass user code.........................................

        $user_code = $this->input->post('user_code');

        $this->load->model('User_profile_models');
        $profile_id = $this->User_profile_models->get_user_id($user_code);

        $this->load->model('qualification/User_profile_has_qualification_models');
        $result = $this->User_profile_has_qualification_models->where_search_User_profile_has_qualification_profile_id($profile_id->iduser_profile);

        $data = [];
        $data2 = [];
        if ($result !== false) {

            $employee_name = null;
            $employee_qualification = null;
            $description = null;
            $issued_date = null;

            foreach ($result as $row2) {

                $this->load->model('qualification/Qualification_models');
                $qualification = $this->Qualification_models->where_search_qualification_pass_id($row2->qualification_idqualification);


                $this->load->model('qualification/Qualification_value_models');
                $qualification_value = $this->Qualification_value_models->where_search_Qualification_value_profile_has_qualification_id($row2->user_profile_has_qualificationid);


                if ($qualification_value !== false) {

                    foreach ($qualification_value as $row) {

                        $this->load->model('qualification/Qualification_has_subject_models');
                        $qualification_has_sub = $this->Qualification_has_subject_models->where_search_qualification_has_subject_pass_qualification_has_subject_id($row->qualification_has_subject_qualification_has_subjectcol);

                        $this->load->model('qualification/Subject_models');
                        $subject = $this->Subject_models->where_search_subject_pass_id($qualification_has_sub->subject_idsubject);

                        $subject_name = $subject->subject;
                        $class = $row->qualification_value;

                        array_push($data2, [
                            'subject_name' => $subject_name,
                            'class' => $class,
                        ]);

                    }

                }else{

                    $data2 =null;
                }

                $employee_qualification = $qualification->qualification_name;
                $description = $row2->description;
                $issued_date = $row2->issued_date;

                array_push($data, [
                    'employee_code' => $profile_id->user_code,
                    'employee_name' => $profile_id->fname . " " . $profile_id->lname,
                    'employee_qualification' => $employee_qualification,
                    'description' => $description,
                    'issued_date' => $issued_date,
                    'subjectObject' => $data2,
                ]);

            }
            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "No-Qualification";

        }

    }

}