<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 2/18/2018
 * Time: 3:56 PM
 */

class Company_models extends CI_Model
{

    function insert_company()
    {

        $id = $this->session->userdata('new_user_id');

        $data = array(

            'company_code' => $this->input->post('company-code', true),
            'company_name' => $this->input->post('company-name', true),
            'company_rate' => $this->input->post('company-rate', true),
            'user_profile_iduser_profile' => $id,
            'status_idstatus' => 1,
            'url' => "No",

        );

        $this->db->insert('company', $data);
        $get_id = $this->db->insert_id();

        $array_id = array(
            'company_id' => $get_id,
        );

        $this->session->set_userdata($array_id);

        $id = $this->session->userdata('login_create_id');

        $this->db->set('company_idcompany', $get_id);
        $this->db->where('iduser_login', $id);
        $this->db->update('user_login');

        return true;

    }

    function where_search_company($value){


        $this->db->where('idcompany', $value);
        $this->db->where('status_idstatus', '1');

        $query = $this->db->get('company');

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }


    }

}