<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 8/29/2018
 * Time: 12:57 PM
 */

class Invoice_report_controller extends CI_Controller
{

    function get_sales_amount()
    {

        $id = $this->session->userdata('companyID');

        $this->load->model('Branch_models');
        $result = $this->Branch_models->where_serch_branch($id);

        $data = [];
        $data2 = [];
        foreach ($result as $row2) {

            $this->load->model('invoice/invoice_models');
            $invoice_result = $this->invoice_models->where_search_invoice_pass_branch_id_payment_status($row2->idbranch);

            if ($invoice_result !== false) {

                $January = 0;
                $February = 0;
                $March = 0;
                $April = 0;
                $May = 0;
                $June = 0;
                $July = 0;
                $August = 0;
                $September = 0;
                $October = 0;
                $November = 0;
                $December = 0;

                $data2 = [];

                foreach ($invoice_result as $row) {

                    $date = $row->date;
                    $parts = explode('-', $date);

                    $year = $parts[0];
                    $month = $parts[1];


                    switch ($month) {

                        case '01':
                            $January = $January * 1 + $row->net_total * 1;
                            break;
                        case '02':
                            $February = $February * 1 + $row->net_total * 1;
                            break;
                        case '03':
                            $March = $March * 1 + $row->net_total * 1;
                            break;
                        case '04':
                            $April = $April * 1 + $row->net_total * 1;
                            break;
                        case '05':
                            $May = $May * 1 + $row->net_total * 1;
                            break;
                        case '06':
                            $June = $June * 1 + $row->net_total * 1;
                            break;
                        case '07':
                            $July = $July * 1 + $row->net_total * 1;
                            break;
                        case '08':
                            $August = $August * 1 + $row->net_total * 1;
                            break;
                        case '09':
                            $September = $September * 1 + $row->net_total * 1;
                            break;
                        case '10':
                            $October = $October * 1 + $row->net_total * 1;
                            break;
                        case '11':
                            $November = $November * 1 + $row->net_total * 1;
                            break;
                        case '12':
                            $December = $December * 1 + $row->net_total * 1;
                            break;
                        default:
                            break;

                    }

//                    SELECT * FROM Table_name Where Month(date)='10' && YEAR(date)='2016';

                }

                array_push($data2, [

                    'January' => $January,
                    'February' => $February,
                    'March' => $March,
                    'April' => $April,
                    'May' => $May,
                    'June' => $June,
                    'July' => $July,
                    'August' => $August,
                    'September' => $September,
                    'October' => $October,
                    'November' => $November,
                    'December' => $December,
                ]);

            }


            array_push($data, [
                'branch_name' => $row2->branch_name,
                'branch_sales' => $data2,
            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;


    }

    function search_invoice()
    {

        $this->load->model('invoice/invoice_models');
        $invoice_result = $this->invoice_models->where_search_invoice_status_susses();

        if ($invoice_result !== false) {

            $data2 = [];
            $data = [];

            $Total = 0;

            foreach ($invoice_result as $row) {

                $this->load->model('User_login_models');
                $respons_user_profile_id = $this->User_login_models->where_search_user_login_id($row->user_login_iduser_login);

                $Cashier_name = "";

                if ($respons_user_profile_id !== false) {

                    $this->load->model('User_profile_models');
                    $respons_user_profile = $this->User_profile_models->where_search_user_profile_name_pass_user_profile_id($respons_user_profile_id->user_profile_iduser_profile);

                    $Cashier_name = $respons_user_profile->fname . " " . $respons_user_profile->lname;
                }

                array_push($data2, [

                    'invoice_code' => $row->invoice_code,
                    'date' => $row->date,
                    'time' => $row->time,
                    'bill_to_name' => $Cashier_name,
                    'net_total' => $row->net_total,

                ]);

                $Total = $Total * 1 + $row->net_total * 1;

            }

            array_push($data, [

                'full_total' => $Total,
                'invoice_data' => $data2,


            ]);


            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }

    }

    function sales_product_sum_with_margin()
    {

        $this->load->model('stock/stock_description_models');
        $stock_result = $this->stock_description_models->all_search_stock_description();

        $data = [];
        $data2 = [];


        if ($stock_result !== false) {

            $f_qty = 0;
            $f_cost_value = 0;
            $f_sales = 0;
            $f_profit = 0;
            $f_margin = 0;


            foreach ($stock_result as $row) {

                $this->load->model('stock/item_models');
                $item_result = $this->item_models->where_search_item_category($row->idstock);

                $this->load->model('invoice/invoice_has_stock_description_models');
                $invoice_has_stock_description = $this->invoice_has_stock_description_models->where_search_invoice_has_stock_description_pass_stock_description_id_and_invoice_id($row->idstock);

                $qty = 0;
                $cost_value = 0;
                $sales = 0;

                foreach ($invoice_has_stock_description as $row2) {

                    $qty = $qty * 1 + $row2->quantity * 1;
                    $cost_value = $row2->grn_price * 1;

                    $sales = $sales * 1 + $row2->subtotal * 1;

                }

                // Get Cost value.......................................................................................
                $cost_value = $cost_value * 1 * $qty * 1;

                // Get Sales Profit.....................................................................................

                $profit = $sales * 1 - $cost_value * 1;

                //  Get Product Margin..................................................................................

                $x = $profit * 1 / $cost_value * 1;
                $margin = $x * 1 * 100;

                array_push($data2, [

                    'product_ID' => $row->item_code,
                    'product_name' => $item_result->bill_name,
                    'qty' => number_format($qty,2),
                    'cost_value' =>number_format($cost_value,2) ,
                    'sales' => number_format($sales,2),
                    'profit' =>number_format($profit,2) ,
                    'margin' =>number_format($margin,2)."%",

                ]);

                $f_qty = $f_qty * 1 + $qty * 1;
                $f_cost_value = $f_cost_value * 1 + $cost_value * 1;
                $f_sales = $f_sales * 1 + $sales;
                $f_profit = $f_profit * 1 + $profit * 1;
                $f_margin = $f_margin * 1 + $margin;

            }



            array_push($data, [

                'f_qtu' => number_format($f_qty,2),
                'f_cost_value' =>number_format( $f_cost_value,2),
                'f_sales' =>number_format($f_sales,2),
                'f_profit' => number_format( $f_profit,2),
                'f_margin' =>number_format($f_margin,2)."%",
                'table_data' => $data2,

            ]);

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }


    }


    function load_invoice_has_item()
    {

        $invoice_id = $this->input->post('invoice_id');

        $this->load->model('invoice/invoice_has_stock_description_models');
        $invoice_result = $this->invoice_has_stock_description_models->where_search_invoice_has_stock_description($invoice_id);

        if ($invoice_result !== false) {

            $data = [];

            foreach ($invoice_result as $row) {

                $this->load->model('stock/item_models');
                $bill_name = $this->item_models->where_search_item_category($row->stock_description_idstock);

                array_push($data, [

                    'item_name' => $bill_name->bill_name,
                    'unit_price' => $row->unit_price,
                    'qty' => $row->quantity,
                    'net_total' => $row->net_total,
                    'payment_method' => $row->payment_mode,
                    'payment_status' => $row->payment_status,
                    'date' => $row->date,
                    'time' => $row->time,

                ]);

            }

            header('Content-Type: application/json');
            $encode_data = json_encode($data);
            echo $encode_data;

        }


    }


//$query = $this->db->query("YOUR QUERY");
//$fields = $query->field_data();

}