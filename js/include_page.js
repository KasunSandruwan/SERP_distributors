var current_page = "";

function get_profile() {

    $("#page_content").load("../Page_controller/include_profile");
    document.getElementById("profile_side_id").setAttribute("class", "current-page");

    if (current_page !== "") {
        document.getElementById(current_page).removeAttribute("class", "current-page");
    }
    current_page = "profile_side_id";

}

function get_employee_details() {

    $("#page_content").load("../Page_controller/include_employee_details");
    document.getElementById("employee_details_side_id").setAttribute("class", "current-page");
    if (current_page !== "") {
        document.getElementById(current_page).removeAttribute("class", "current-page");
    }
    current_page = "employee_details_side_id";

}

function get_employee_type_page() {

    $("#page_content").load("../Page_controller/include_employee_type_setting");

}

function qualification_mange() {

    $("#page_content").load("../Page_controller/include_qualification");

}

function qualification_add() {

    $("#page_content").load("../Page_controller/include_qualification_add");

}

function calender_manage() {

    $("#page_content").load("../Page_controller/include_calender_mange_page");

}

function attendenc_controller() {

    $("#page_content").load("../Page_controller/include_attendenc_controller_page");

}

function duty_roster_manage() {

    $("#page_content").load("../Page_controller/include_duty_roster_manage_page");

}

function duty_roster() {

    $("#page_content").load("../Page_controller/include_duty_roster_page");
}

function search_employee_details() {

    $("#page_content").load("../Page_controller/include_search_employee_details");
}

function daily_attendenc() {

    $("#page_content").load("../Page_controller/include_daily_attendenc");
}

function salary_controller() {

    $("#page_content").load("../Page_controller/include_salary_controller");

}

function pay_slip_generate() {
    $("#page_content").load("../Page_controller/include_pay_slip_generate");
}

function payment_circle_manage() {

    $("#page_content").load("../Page_controller/include_payment_circle_manage");
}

function create_new_department() {

    $("#page_content").load("../Page_controller/include_create_new_department");
}

function additional_pay_management() {

    $("#page_content").load("../Page_controller/include_additional_pay_management");

}

function leave_application() {

    $("#page_content").load("../Page_controller/include_leave_application");

}

function leave_manage() {

    $("#page_content").load("../Page_controller/include_leave_manage");

}

function stock_manage() {

    $("#page_content").load("../Page_controller/include_stock_manage");

}

function service_page() {

    $("#page_content").load("../Page_controller/include_service");

}

function grn_page() {

    $("#page_content").load("../Page_controller/include_grn");

}

function supplier_register() {

    $("#page_content").load("../Page_controller/supplier_register");

}

function invoice() {

    $("#page_content").load("../Page_controller/invoice_page");

}

function distributor_register() {

    $("#page_content").load("../Page_controller/distributor_register");

}

function purchase_order() {

    $("#page_content").load("../Page_controller/purchase_order");

}

function Customer_Type() {

    $("#page_content").load("../Page_controller/Customer_Type");

}

function customer_register() {

    $("#page_content").load("../Page_controller/customer_register");

}

function customer_order() {

    $("#page_content").load("../Page_controller/customer_order");

}

function order_invoice() {

    $("#page_content").load("../Page_controller/order_invoice");

}

function driver_register() {

    $("#page_content").load("../Page_controller/driver_register");

}

function delivery_note() {

    $("#page_content").load("../Page_controller/delivery_note");

}

function Asset_manage() {

    $("#page_content").load("../Page_controller/Asset_manage");

}
function sales_invoice_sum() {

    $("#page_content").load("../Page_controller/sales_invoice_sum");

}
function sales_chart_report() {

    $("#page_content").load("../Page_controller/sales_chart_report");

}
function sales_product_sum_with_margin() {

    $("#page_content").load("../Page_controller/sales_product_sum_with_margin");

}
function Expenses_Type() {

    $("#page_content").load("../Page_controller/Expenses_Type");

}
function expenses() {

    $("#page_content").load("../Page_controller/expenses");

}

function Account_mangae() {

    $("#page_content").load("../Page_controller/Account_mangae");

}
function Transaction() {

    $("#page_content").load("../Page_controller/Transaction");

}
function Stock_Balance_All_Location() {

    $("#page_content").load("../Page_controller/Stock_Balance_All_Location");

}
function Create_user_account() {

    $("#page_content").load("../Page_controller/Create_user_account");

}







