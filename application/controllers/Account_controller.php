<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/6/2018
 * Time: 10:20 AM
 */

class Account_controller extends CI_Controller
{

    function save_account_category()
    {

        $this->load->model('account_management/account_category_model');
        $result = $this->account_category_model->insert_account_category_model();

    }

    function all_account_category()
    {

        $this->load->model('account_management/account_category_model');
        $result_account_category = $this->account_category_model->all_search_account_category();

        if ($result_account_category !== false) {

            $data = [];

            foreach ($result_account_category as $row) {

                array_push($data, [

                    'account_category_code' => $row->account_category_code,
                    'account_category' => $row->account_category,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "No-Data";

        }


    }

    function all_transaction_type()
    {

        $this->load->model('account_management/transaction_type_model');
        $result_transaction_type = $this->transaction_type_model->all_search_transaction_type();

        if ($result_transaction_type !== false) {

            $data = [];

            foreach ($result_transaction_type as $row) {

                array_push($data, [

                    'idtransaction_type' => $row->idtransaction_type,
                    'transaction_type' => $row->transaction_type,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        } else {
            echo "No-Data";

        }


    }


    function save_transaction_type()
    {

        $this->load->model('account_management/ transaction_type_model');
        $result = $this->transaction_type_model->insert_transaction_type_model();

    }

    function save_transaction_data()
    {

        $account_category = $this->input->post('account_category_select');
        $transaction_type = $this->input->post('transaction_type_select');

        $this->load->model('account_management/account_category_model');
        $result_account_category = $this->account_category_model->where_search_account_category_id($account_category);

        if ($result_account_category !== false) {

            $this->load->model('account_management/account_model');
            $result_account_id = $this->account_model->insert_account($result_account_category->idaccount_category);

            $this->load->model('account_management/transaction_type_model');
            $result_transaction_type = $this->transaction_type_model->where_search_transaction_type_id($transaction_type);

            if ($result_transaction_type !== false) {

                $this->load->model('account_management/transaction_type_has_account');
                $result = $this->transaction_type_has_account->insert_transaction_type_has_account($result_account_id, $result_transaction_type->idtransaction_type);

            } else {

                echo "transaction_type";
                die();
            }

        } else {

            echo "account_category";
            die();
        }

    }



}