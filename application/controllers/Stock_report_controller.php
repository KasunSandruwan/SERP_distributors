<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/6/2018
 * Time: 5:18 PM
 */

class Stock_report_controller extends CI_Controller
{

    function all_location_stock_report()
    {

        $this->load->model('stock/stock_description_models');
        $result_stock_description = $this->stock_description_models->all_search_stock_description();

        if ($result_stock_description !== false) {

            $data = [];


            foreach ($result_stock_description as $row) {

                $id = $this->session->userdata('companyID');

                $this->load->model('Branch_models');
                $result = $this->Branch_models->where_serch_branch($id);


                $data2 = [];

                $al_physical_qty = 0;
                $al_pending_qty = 0;
                $al_available_qty = 0;
                $al_cost_price = 0;

                foreach ($result as $Branch_row) {

                    $this->load->model('stock/stock_description_has_branch_models');
                    $result_stock_description_has_branch = $this->stock_description_has_branch_models->where_search_stock_branch_and_stock_description_has_branch($row->idstock, $Branch_row->idbranch);

                    if ($result_stock_description_has_branch !== false) {

                        array_push($data2, [

                            'Branch' => $Branch_row->branch_name,
                            'physical_qty' => $result_stock_description_has_branch->physical_qty,
                            'pending_qty' => $result_stock_description_has_branch->pending_qty,
                            'available_qty' => $result_stock_description_has_branch->available_qty,
                            'cost_price' => $result_stock_description_has_branch->cost_price,

                        ]);

                        $al_physical_qty = $al_physical_qty * 1 + $result_stock_description_has_branch->physical_qty * 1;
                        $al_pending_qty = $al_pending_qty * 1 + $result_stock_description_has_branch->pending_qty * 1;
                        $al_available_qty = $al_available_qty * 1 + $result_stock_description_has_branch->available_qty * 1;
                        $al_cost_price = $al_cost_price * 1 + $result_stock_description_has_branch->cost_price;


                    }


                }

                $this->load->model('stock/item_models');
                $item_result = $this->item_models->where_search_item_category($row->idstock);

                $this->load->model('stock/mesure_models');
                $result_mesure = $this->mesure_models->where_search_mesure_pass_mesre_name_id($row->mesure_idmesure);


                array_push($data, [

                    'product_ID' => $row->item_code,
                    'product_name' => $item_result->bill_name,
                    'description' => $row->description,
                    'unit' => $result_mesure->mesure_typ,
                    'stock_data' => $data2,

                    'al_physical_qty' => $al_physical_qty,
                    'al_pending_qty' => $al_pending_qty,
                    'al_available_qty' => $al_available_qty,
                    'al_cost_price' => $al_cost_price,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;


        }


    }


}