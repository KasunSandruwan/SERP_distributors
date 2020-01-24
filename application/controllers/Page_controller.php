<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_controller extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('login');
    }

    public function homepage()
    {
        $this->load->view('home');
    }

    public function profile()
    {
        $this->load->view('profile');
    }

    public function settings()
    {
        $this->load->view('Admin/settings');
    }

    public function newuserfrom()
    {
        $this->load->view('Register_forms/new_user_from');
    }

    public function employeeform()
    {
        $this->load->view('Register_forms/employee_form');
    }

    public function include_profile()
    {

        $this->load->view('Register_forms/employee/profile');

    }

    public function include_employee_details()
    {
        $this->load->view('Register_forms/employee/emloyee_detail');
    }

    public function include_employee_type_setting()
    {
        $this->load->view('Admin/Setting_page/settings');
    }

    public function include_qualification()
    {
        $this->load->view('Qualification/qualification_manage');
    }

    public function include_qualification_add()
    {
        $this->load->view('Qualification/qualification_add');

    }

    public function include_calender_mange_page()
    {
        $this->load->view('Admin/Setting_page/calender_mange');

    }

    public function include_attendenc_controller_page()
    {
        $this->load->view('Admin/Setting_page/attendenc_controller');

    }

    public function include_duty_roster_manage_page()
    {
        $this->load->view('Attendenc/duty_roster_manage');

    }

    public function include_duty_roster_page()
    {
        $this->load->view('Attendenc/duty_roster');

    }

    public function include_search_employee_details()
    {
        $this->load->view('Register_forms/employee/search_employee_details');

    }

    public function include_daily_attendenc()
    {
        $this->load->view('Attendenc/daily_attendenc');

    }

    public function include_salary_controller()
    {
        $this->load->view('Salary/salary_controller');

    }

    public function include_pay_slip_generate()
    {
        $this->load->view('Salary/pay_slip');

    }

    public function include_payment_circle_manage()
    {
        $this->load->view('Admin/Setting_page/payment_circle_manage');
    }

    public function include_create_new_department()
    {
        $this->load->view('Admin/Setting_page/create_new_department');
    }

    public function include_additional_pay_management()
    {
        $this->load->view('Salary/additional_pay_management');
    }

    public function include_leave_application()
    {
        $this->load->view('Leave/leave_application');
    }

    public function include_leave_manage()
    {
        $this->load->view('Leave/leave_manage');
    }

    public function include_stock_manage()
    {
        $this->load->view('Stock/stock');
    }

    public function include_service()
    {
        $this->load->view('Stock/service');
    }

    public function include_grn()
    {
        $this->load->view('Stock/grn');
    }

    public function supplier_register()
    {
        $this->load->view('Register_forms/supplier_register');
    }

    public function invoice_page()
    {
        $this->load->view('Stock/invoice');
    }

    public function distributor_register()
    {
        $this->load->view('Register_forms/distributor_register');
    }

    public function purchase_order()
    {
        $this->load->view('Stock/purchase_order');
    }

    public function Customer_Type()
    {
        $this->load->view('Admin/Setting_page/customer_type');
    }

    public function customer_register()
    {

        $this->load->view('Register_forms/customer_register');

    }

    public function driver_register()
    {

        $this->load->view('Register_forms/driver_register');

    }

    public function customer_order()
    {

        $this->load->view('Stock/customer_order');

    }

    public function order_invoice()
    {

        $this->load->view('Stock/order_invoice');

    }

    public function delivery_note()
    {

        $this->load->view('Delivery_management/Deliver_note');

    }

    public function Asset_manage()
    {

        $this->load->view('Admin/Setting_page/asset_mange');

    }

    public function sales_invoice_sum()
    {
        $this->load->view('Report/Sales_report/sales_invoice_sum');
    }

    public function sales_chart_report()
    {

        $this->load->view('Report/Sales_report/sales_report_chart');

    }

    public function sales_product_sum_with_margin()
    {

        $this->load->view('Report/Sales_report/sales_product_sum_with_margin');

    }

    public function Expenses_Type()
    {

        $this->load->view('Admin/Setting_page/expenses_type');

    }

    public function expenses()
    {

        $this->load->view('Expenses/expenses');

    }

    public function Account_mangae()
    {

        $this->load->view('Admin/Setting_page/account_manage');

    }

    public function Transaction()
    {
        $this->load->view('Transaction/transaction');

    }

    public function Stock_Balance_All_Location()
    {

        $this->load->view('Report/Stock_report/stock_balance_all_location');

    }

    public function Create_user_account()
    {

        $this->load->view('Admin/Setting_page/create_user_account');

    }

}
