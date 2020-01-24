<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 4/5/2018
 * Time: 2:07 PM
 */

class Payment_circle_models extends CI_Model
{

    // insert payment circle......................................................................

    function insert_payment_circle($from_date_new, $to_date_new)
    {

        $format_date = new DateTime($from_date_new);

        $company = $this->session->userdata('companyID');

        $data = array(

            'from_date' => $from_date_new,
            'to_date' => $to_date_new,
            'company_idcompany' => $company,
            'year' => $format_date->format("Y"),
            'month' => $format_date->format("M"),
            'is_current' => "pending",

        );

        $this->db->insert('payment_circle', $data);

        return true;

    }

    // all search payment circle....................................................................

    function all_search_payment_circle()
    {

        $company = $this->session->userdata('companyID');

        $this->db->where("company_idcompany", $company);
        $query = $this->db->get('payment_circle');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    // get order between data ...........................................................................


    function get_payment_circle_between_date()
    {

        $company = $this->session->userdata('companyID');

        //$this->db->where("is_current", 'pending');

        $this->db->where("company_idcompany", $company);

        $query = $this->db->get('payment_circle');

        if ($query->result()) {

            return $query->result();

        } else {

            return false;
        }

    }

    function already_add_payment_circle_between_date($today)
    {

        $company = $this->session->userdata('companyID');

        $event = $this->db->where("from_date <=", $today)
            ->where("to_date >=", $today)
            ->order_by("from_date", "asc")
            ->where("company_idcompany", $company)
            ->get("payment_circle");

        if ($event->result()) {
            return true;

        } else {

            return false;
        }


    }


    function update_payment_circle_status($payment_circle_id)
    {

        $is_current = "success";

        $this->db->set('is_current', $is_current);

        $this->db->where('payment_circle', $payment_circle_id);
        $this->db->update('payment_circle');

        return true;

    }

    function where_search_payment_circle_status_active()
    {
        $is_current = "pending";

        $this->db->where('is_current', $is_current);
        $query = $this->db->get('payment_circle');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function where_search_payment_circle_id($payment_circle_id){

        $this->db->where('payment_circle', $payment_circle_id);
        $query = $this->db->get('payment_circle');

        if ($query->result()) {
            return $query->row(0);
        } else {
            return false;
        }

    }


}