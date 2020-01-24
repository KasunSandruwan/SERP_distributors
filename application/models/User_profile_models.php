<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/7/2018
 * Time: 3:39 PM
 */

class User_profile_models extends CI_Model
{

    function getprofiledata($user_pid)
    {

        $this->db->where('iduser_profile', $user_pid);
        $query = $this->db->get('user_profile');

        return $query->result();

    }

    function update_profile_data($user_pid)
    {

        $fname = $this->input->post('first-name', true);
        $lname = $this->input->post('last-name', true);
        $sname = $this->input->post('sur-name', true);
        $nic = $this->input->post('nic', true);
        $passport = $this->input->post('passport', true);
        $p_phpnenumber = $this->input->post('primary-phonenumber', true);
        $phoneunmber = $this->input->post('phonenumber', true);
        $email = $this->input->post('email', true);
        $date_of_birth = $this->input->post('birthdate', true);
        $gender = $this->input->post('gender', true);

        $p_address = $this->input->post('p_address', true);
        $addres = $this->input->post('address', true);


        $this->db->set('surname', $sname);
        $this->db->set('fname', $fname);
        $this->db->set('lname', $lname);
        $this->db->set('date_of_birth', $date_of_birth);
        $this->db->set('gender', $gender);
        $this->db->set('primary_contact_number', $p_phpnenumber);
        $this->db->set('contact_number', $phoneunmber);
        $this->db->set('email', $email);
        $this->db->set('nic', $nic);
        $this->db->set('passport', $passport);
        $this->db->set('p_address', $p_address);
        $this->db->set('address', $addres);

        $this->db->where('iduser_profile', $user_pid);
        $this->db->update('user_profile');

        return true;

    }


    function get_profile_maxid()
    {

        $this->db->select_max('iduser_profile');
        $query = $this->db->get('user_profile');

        return $query->row(0);
    }


    function save_profile_data($title_id)
    {

        $result = $this->get_profile_maxid();
        $Max_ID = $result->iduser_profile + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $date = strtotime($this->input->post('date-of-birth'));
        $newdateformat = date('Y-m-d',$date);

        $data = array(

            'title_idtitle' => $title_id,
            'fname' => $this->input->post('first-name', true),
            'lname' => $this->input->post('last-name', true),
            'surname' => $this->input->post('middle-name', true),
            'nic' => $this->input->post('nic', true),
            'passport' => $this->input->post('passport', true),
            'date_of_birth' => $newdateformat,
            'gender' => $this->input->post('gender', true),
            'user_code' => 'U-' . $formatnumber,
            'primary_contact_number' => $this->input->post('primary_contact_number', true),
            'contact_number' => $this->input->post('contact_number', true),
            'email' => $this->input->post('email', true),
            'p_address' => $this->input->post('p_address', true),
            'address' => $this->input->post('address', true),
            'register_date_time' => mdate($format),

        );

        $this->db->insert('user_profile', $data);

        $get_id = $this->db->insert_id();

        $array_id = array(
            'new_user_id' => $get_id,
        );

        $this->session->set_userdata($array_id);

        return true;


    }

    function Employee_for_Create_User_Account($roleid ,$profile_id)
    {

        $data = array(

            'user_name' => $this->input->post('user-name', true),
            'password' => sha1($this->input->post('password', true)),
            'user_profile_iduser_profile' => $profile_id,
            'status_idstatus' => 1,

        );

        $this->db->insert('user_login', $data);
        $get_id = $this->db->insert_id();


        $this->db->set('user_role_iduser_role', $roleid);
        $this->db->where('iduser_profile', $profile_id);
        $this->db->update('user_profile');

        return true;


    }







    function Create_User_Account($roleid)
    {

        $id = $this->session->userdata('new_user_id');

        $data = array(

            'user_name' => $this->input->post('user-name', true),
            'password' => sha1($this->input->post('password', true)),
            'user_profile_iduser_profile' => $id,
            'status_idstatus' => 1,

        );

        $this->db->insert('user_login', $data);
        $get_id = $this->db->insert_id();

        $array_id = array(
            'login_create_id' => $get_id,
        );

        $this->session->set_userdata($array_id);

        // set user role......................................................................................

        $this->db->set('user_role_iduser_role', $roleid);
        $this->db->where('iduser_profile', $id);
        $this->db->update('user_profile');


        return true;


    }

    function get_user_id($value){

        $this->db->where('user_code', $value);
        $query = $this->db->get('user_profile');
        return $query->row(0);

    }

    function where_search_user_profile_name_pass_user_profile_id($value){

        $this->db->where('iduser_profile', $value);
        $query = $this->db->get('user_profile');
        return $query->row(0);

    }

    function where_search_user_profile_id_pass_user_role_id($value){

        $this->db->where('user_role_iduser_role', $value);
        $query = $this->db->get('user_profile');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }

    }


    function insert_supplier_profile($title_id){


        $result = $this->get_profile_maxid();
        $Max_ID = $result->iduser_profile + 1;

        $formatnumber = sprintf('%04u', $Max_ID);

        $format = "%Y-%m-%d %h:%i %A";
        date_default_timezone_set('Asia/Colombo');


        $data = array(

            'title_idtitle' => $title_id,
            'fname' => $this->input->post('first-name', true),
            'lname' => $this->input->post('last-name', true),
            'surname' => $this->input->post('middle-name', true),
            'nic' => $this->input->post('nic', true),
            'passport' => $this->input->post('passport', true),
            'gender' => $this->input->post('gender', true),
            'user_code' => 'U-' . $formatnumber,
            'primary_contact_number' => $this->input->post('primary_contact_number', true),
            'contact_number' => $this->input->post('contact_number', true),
            'email' => $this->input->post('email', true),
            'p_address' => $this->input->post('p_address', true),
            'address' => $this->input->post('address', true),
            'register_date_time' => mdate($format),

        );

        $this->db->insert('user_profile', $data);
        return $this->db->insert_id();

    }

    function where_search_supplier_user_profile($value){

        $this->db->from('user_profile');

        $this->db->like('primary_contact_number', $value);
        $this->db->or_like('surname', $value);
        $this->db->or_like('fname', $value);
        $this->db->or_like('lname', $value);
        $this->db->or_like('nic', $value);

        $query = $this->db->get();

        return $query->result();

    }

    function where_search_distributor($value){

        $this->db->from('user_profile');

        $this->db->like('primary_contact_number', $value);
        $this->db->or_like('surname', $value);
        $this->db->or_like('fname', $value);
        $this->db->or_like('lname', $value);
        $this->db->or_like('nic', $value);

        $query = $this->db->get();

        return $query->result();


    }
    function where_search_customer($value){

        $this->db->from('user_profile');

        $this->db->like('primary_contact_number', $value);
        $this->db->or_like('surname', $value);
        $this->db->or_like('fname', $value);
        $this->db->or_like('lname', $value);
        $this->db->or_like('nic', $value);

        $query = $this->db->get();

        return $query->result();


    }





}