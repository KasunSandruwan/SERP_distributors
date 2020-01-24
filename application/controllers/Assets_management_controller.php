<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/23/2018
 * Time: 10:52 AM
 */

class Assets_management_controller extends CI_Controller
{

    function save_asset_type()
    {

        $this->load->model('assets_management/asset_type_models');
        $result_asset_type = $this->asset_type_models->insert_asset_type();


    }


    function all_search_asset_type()
    {

        $this->load->model('assets_management/asset_type_models');
        $result = $this->asset_type_models->all_search_asset_type();

        $data = [];
        foreach ($result as $row) {

            array_push($data, [

                'asset_type' => $row->asset_type,
                'id' => $row->idasset_type,

            ]);

        }


        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }

    function save_asset()
    {

        $asset_type=$this->input->post('asset_type');

        $this->load->model('assets_management/asset_type_models');
        $result_asset_type = $this->asset_type_models->where_search_asset_type($asset_type);

        if ($result_asset_type !== false) {

            $idasset_type = $result_asset_type->idasset_type;

            $this->load->model('assets_management/asset_models');
            $result = $this->asset_models->insert_asset($idasset_type);

        }

    }

    function load_asset(){

        $this->load->model('assets_management/asset_models');
        $result = $this->asset_models->all_search_asset_active();

        $data = [];
        foreach ($result as $row) {

            $this->load->model('assets_management/asset_type_models');
            $result_asset_type = $this->asset_type_models->where_search_asset_type_pass_asset_id( $row->asset_type_idasset_type);

            array_push($data, [

                'asset_type' => $result_asset_type->asset_type,
                'asset_name' => $row->asset_name,
                'asset_description' => $row->asset_description,
                'reg_date' => $row->reg_date,

            ]);

        }


        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }


}