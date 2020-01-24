<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/5/2018
 * Time: 10:30 AM
 */

class Expenses_controller extends CI_Controller
{

    function save_expenses_type()
    {

        $this->load->model('expenses/expenses_type_model');
        $result = $this->expenses_type_model->insert_expenses_type();

    }

    function all_search_expenses_type()
    {


        $this->load->model('expenses/expenses_type_model');
        $result_expenses_type = $this->expenses_type_model->all_search_expenses_type();

        if ($result_expenses_type !== false) {

            $data = [];

            foreach ($result_expenses_type as $row) {

                array_push($data, [

                    'id' => $row->idexpenses_type,
                    'expenses_type' => $row->expenses_type,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "No_Data";

        }

    }

    function save_expenses_data()
    {

        $expenses_type = $this->input->post('exp_type');
        $distributor = $this->input->post('distributor');

        $this->load->model('expenses/expenses_type_model');
        $result_exp_type_id = $this->expenses_type_model->where_search_expenses_type_id($expenses_type);

        if ($result_exp_type_id !== false) {

            $this->load->model('expenses/expenses_model');
            $result_exp_ID = $this->expenses_model->insert_expenses($result_exp_type_id->idexpenses_type);

            $this->load->model('profile_management/distributor_models');
            $distributor_result = $this->distributor_models->where_search_distributor_pass_distributor_code($distributor);

            $iddistributor = null;

            if ($distributor_result !== false) {

                $iddistributor = $distributor_result->iddistributor;

            }

            $this->load->model('expenses/expenses_values_model');
            $result = $this->expenses_values_model->insert_expenses_values($result_exp_ID, $iddistributor);


        }


    }


}