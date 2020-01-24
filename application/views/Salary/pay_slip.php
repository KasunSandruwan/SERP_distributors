<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Pay Slip Generate
                        <small>.</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Payment Circle</label>
                            <div class="col-md-3 col-sm-3">
                                <select id="payment_circle" onchange="load_employee_for_pay_slip_generate();"
                                        name="payment_circle" class="form-control">
                                    <option>Choose Payment Circle</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Employee Code</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody id="employee_pay_sheet_table">

                                </tbody>
                            </table>
                        </div>

                        <!-- Model Class ....................................................................................-->

                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <!-- Small modal -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Quick Office Automation Pay
                                                Slip</h4>
                                        </div>

                                        <div id="pay_sheet" class="modal-body ">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="employee_NO">Employee
                                                    NO
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="employee_no"
                                                           readonly="readonly"
                                                           name="employee_no"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Name of Employee">Name
                                                    of Employee
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="name_of_employee" readonly="readonly"
                                                           name="name_of_employee"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Designation">Designation
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="designation" readonly="readonly"
                                                           name="designation"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div id="paysheet_model_content">

                                            </div>

                                            <!--                                            <span class="section">Basic Salary</span>-->
                                            <!--                                            <div class="form-group">-->
                                            <!---->
                                            <!--                                                <label class="control-label col-md-3 col-sm-3" for="salary">Salary-->
                                            <!--                                                </label>-->
                                            <!--                                                <div class="col-md-6 col-sm-6">-->
                                            <!--                                                                                                <input type="text" id="salary"  readonly="readonly" name="salary"-->
                                            <!--                                                           class="form-control col-md-7 col-xs-12">-->
                                            <!--                                                </div>-->
                                            <!---->
                                            <!--                                            </div>-->

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" onclick="pay_slip_pay()"
                                                    class="btn btn-primary">Pay
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Model 2 Class ....................................................................................-->

                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <!-- Small modal -->
                            <div class="modal fade bs-example-modal-lg_2" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>

                                        </div>

                                        <div class="x_content">

                                            <div style="margin-left:55px;" id="pay_slip_print">

                                                <table border="1">
                                                    <thead>

                                                    </thead>
                                                    <tbody id="content_print">

                                                    <tr>
                                                        <td colspan="2" style="text-align: center; ">
                                                            <h1>Quick Office Automation Pay Slip</h1>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>


                                        <div class="modal-footer hidde-print">


                                            <button class="btn btn-default" onclick="printElem('pay_slip_print')"><i
                                                        class="fa fa-print"></i> Print
                                            </button>

                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<script>

    init_DataTables();
    load_employee_for_pay_slip_generate();
    load_payment_circle();

    $('#single_cal3').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });


    $(document).ready(function () {

        $('.collapse-link').on('click', function () {
            console.log("collapse-link");
            var $BOX_PANEL = $(this).closest('.x_panel'),
                $ICON = $(this).find('i'),
                $BOX_CONTENT = $BOX_PANEL.find('.x_content');

            // fix for some div with hardcoded fix class
            if ($BOX_PANEL.attr('style')) {
                $BOX_CONTENT.slideToggle(200, function () {
                    $BOX_PANEL.removeAttr('style');
                });
            } else {
                $BOX_CONTENT.slideToggle(200);
                $BOX_PANEL.css('height', 'auto');
            }

            $ICON.toggleClass('fa-chevron-up fa-chevron-down');
        });

        $('.close-link').click(function () {
            var $BOX_PANEL = $(this).closest('.x_panel');

            $BOX_PANEL.remove();
        });

    });

    function genratePay_sheet(data) {

        var url = "../Salary_controller/Pay_sheat_genarat";
        var employee_id = data;
        var payment_circle_id = document.getElementById("payment_circle").value;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {employee_id: employee_id, payment_circle_id: payment_circle_id}, function (response) {

            console.log("Out - " + response);

            // $('#pay_sheet').toggle();

            var JSONObject = JSON.parse(response);

            var employee_ID;
            var employee_name;
            var employee_position;

            var salary_category;
            var salary_variable_object;
            var employee_value_object;
            var pay_sheet_variable_value_object;
            var employee_has_designation_id;
            var pay_sheet_ID;
            var salary_category_id;


            var paysheet_content = "";

            var category = "";

            var salary_variable = "";



            var employee_salary_variable = 0;
            var paysheet_variable_value = 0;
            var salary_variable_tot = "";

            var Basic_salary = 0;
            var Allowance = 0;
            var Deductions = 0;


            for (var k in JSONObject) {

                employee_ID = JSONObject[k]["employee_ID"];
                employee_name = JSONObject[k]["employee_name"];
                employee_position = JSONObject[k]["employee_position"];
                salary_category = JSONObject[k]["salary_category"];

                for (var j in salary_category) {

                    salary_variable_object = salary_category[j].salary_variable_object;
                    salary_category_id = salary_category[j].category_id;

                    console.log("Salary Category - " + salary_category[j].category);
                    console.log("Basic Category Lenth- " + salary_variable_object.length);

                    category = category + "<span class=\"section\">" + salary_category[j].category + "</span>";

                    var category_tot = 0;
                    var salary = "";

                    for (var l in salary_variable_object) {

                        salary_variable = "";

                        employee_value_object = salary_variable_object[l].employee_value_object;
                        console.log("Salary variable - " + salary_variable_object[l].salary_variable);

                        pay_sheet_variable_value_object = salary_variable_object[l].pay_sheet_variable_value_object;

                        for (var m in employee_value_object) {

                            console.log("Value - " + employee_value_object[m].value);
                            employee_salary_variable = employee_value_object[m].value;

                            employee_has_designation_id = employee_value_object[m].ID;

                            category_tot = category_tot * 1 + employee_salary_variable * 1;

                            if (salary_category[j].category === "Basic Salary") {

                                Basic_salary = category_tot;
                                console.log("..........................................Basic Salary - " + Basic_salary);
                            }

                        }


                        for (var n in pay_sheet_variable_value_object) {

                            console.log("Pay sheet variable value  - " + pay_sheet_variable_value_object[n].paysheet_variable_value);
                            paysheet_variable_value = pay_sheet_variable_value_object[n].paysheet_variable_value;
                            pay_sheet_ID = pay_sheet_variable_value_object[n].paysheet_id;

                        }

                        switch (salary_variable_object[l].salary_variable) {

                            case "OT":

                                console.log("OT Pay -" + GET_OT_Pay_value(Basic_salary));
                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(GET_OT_Pay_value(Basic_salary) * 1 * paysheet_variable_value * 1) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";


                                category_tot = category_tot * 1 + GET_OT_Pay_value(Basic_salary) * 1 * paysheet_variable_value * 1 - employee_salary_variable * 1;

                                var result = insert_employee_pay_sheet(employee_has_designation_id, GET_OT_Pay_value(Basic_salary) * 1 * paysheet_variable_value * 1, employee_ID);

                                console.log("....................." + result);

                                break;

                            case "Double-OT":

                                console.log("OT Pay -" + GET_OT_Pay_value(Basic_salary));
                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(GET_OT_Pay_value(Basic_salary) * 1 * paysheet_variable_value * 1 * 2) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";

                                category_tot = category_tot * 1 + GET_OT_Pay_value(Basic_salary) * 1 * paysheet_variable_value * 1 * 2 - employee_salary_variable * 1;

                                insert_employee_pay_sheet(employee_has_designation_id, GET_OT_Pay_value(Basic_salary) * 1 * paysheet_variable_value * 1 * 2, employee_ID);

                                break;

                            case "EPF":

                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + " - " + employee_salary_variable + "%" + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(GET_EPF_Deductions(Basic_salary, employee_salary_variable)) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";


                                category_tot = category_tot * 1 + GET_EPF_Deductions(Basic_salary, employee_salary_variable) * 1 - employee_salary_variable;

                                insert_employee_pay_sheet(employee_has_designation_id, GET_EPF_Deductions(Basic_salary, employee_salary_variable), employee_ID);

                                break;

                            case "Short-leave":

                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(GET_TO_Short_leave(Basic_salary) * 1 * paysheet_variable_value * 1) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";



                                category_tot = category_tot * 1 + GET_TO_Short_leave(Basic_salary) * 1 * paysheet_variable_value * 1 - employee_salary_variable * 1;

                                insert_employee_pay_sheet(employee_has_designation_id, GET_TO_Short_leave(Basic_salary) * 1 * paysheet_variable_value * 1, employee_ID);

                                break;

                            case "Salary":

                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(employee_salary_variable * 1) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";

                                insert_employee_pay_sheet(employee_has_designation_id, employee_salary_variable * 1, employee_ID);

                                break;

                            case "Budget Allowance ":

                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(employee_salary_variable * 1) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";


                                insert_employee_pay_sheet(employee_has_designation_id, employee_salary_variable * 1, employee_ID);

                                break;

                            case "Fixed Allowances":

                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(employee_salary_variable * 1) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";


                                insert_employee_pay_sheet(employee_has_designation_id, employee_salary_variable * 1, employee_ID);

                                break;

                            case "Mobile Bill":

                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(Get_Mobile_bill(employee_salary_variable * 1, paysheet_variable_value * 1)) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";


                                category_tot = category_tot * 1 + Get_Mobile_bill(employee_salary_variable * 1, paysheet_variable_value * 1) - employee_salary_variable * 1;

                                insert_employee_pay_sheet(employee_has_designation_id, Get_Mobile_bill(employee_salary_variable * 1, paysheet_variable_value * 1), employee_ID);


                                break;
                            default :

                                salary_variable = salary_variable + "<div class=\"form-group\">\n" +
                                    "\n" +
                                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">" + salary_variable_object[l].salary_variable + "</label>\n" +
                                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                                    "        <input type=\"text\" id=\"salary\" value=\"" + Currency_Formatting(employee_salary_variable * 1 * paysheet_variable_value * 1) + "\" readonly=\"readonly\" name=\"salary\"\n" +
                                    "               class=\"form-control col-md-7 col-xs-12\">\n" +
                                    "    </div>\n" +
                                    "\n" +
                                    "</div>";


                                category_tot = category_tot * 1 + employee_salary_variable * 1 * paysheet_variable_value * 1 - employee_salary_variable * 1;

                                insert_employee_pay_sheet(employee_has_designation_id, employee_salary_variable * 1 * paysheet_variable_value * 1, employee_ID);

                                break;

                        }

                        category = category + salary_variable;

                        if (salary_category[j].category === "Allowance") {
                            Allowance = category_tot;
                        }

                        if (salary_category[j].category === "Deductions") {
                            Deductions = category_tot;
                        }

                        paysheet_variable_value = "";
                        employee_salary_variable = "";

                    }

                    salary_variable_tot = salary + "<span class=\"section\"></span>" +
                        "<div class=\"form-group\">\n" +
                        "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">Total\n" +
                        "    </label>\n" +
                        "    <div class=\"col-md-6 col-sm-6\">\n" +
                        "        <label class=\"form-control col-md-7 col-xs-12\">" + Currency_Formatting(category_tot) + "</label>\n" +
                        "    </div>\n" +
                        "</div>";

                    category = category + salary_variable_tot;

                    // this line category ..............................................................................

                    insert_paysheet_has_salary_summery(salary_category_id, category_tot, employee_ID);

                }

                paysheet_content = paysheet_content + category;

                category_tot = Basic_salary * 1 + Allowance * 1 - Deductions * 1;

                paysheet_content = paysheet_content + "<span class=\"section\"></span>" +
                    "<div class=\"form-group\">\n" +
                    "    <label class=\"control-label col-md-3 col-sm-3\" for=\"salary\">Net Salary \n" +
                    "    </label>\n" +
                    "    <div class=\"col-md-6 col-sm-6\">\n" +
                    "        <label style=\"text-align: right\" id=\"net_salary\"  class=\"form-control col-md-7 col-xs-12\">" + Currency_Formatting(category_tot) + "</label>\n" +
                    "    </div>\n" +
                    "</div>";

            }


            document.getElementById("employee_no").value = employee_ID;
            document.getElementById("name_of_employee").value = employee_name;
            document.getElementById("designation").value = employee_position;
            document.getElementById("paysheet_model_content").innerHTML = paysheet_content;

            document.getElementById("content_print").innerHTML =paysheet_content_print;


        }, 'text');

    }

    function GET_OT_Pay_value(Basic_salary) {

        var workig_day = 25;
        var hours = 8;

        var x = Basic_salary * 1 / workig_day * 1;
        var OT_pay = x * 1 / hours * 1;

        return OT_pay;

    }

    function GET_TO_Short_leave(Basic_salary) {

        var workig_day = 25;
        var hours = 8;

        var x = Basic_salary * 1 / workig_day * 1;
        var Short_leave = x * 1 / hours * 1;

        return Short_leave * 4;

    }

    function Get_Mobile_bill(Bil_limit, Current_limit) {

        var Bil_limit = Bil_limit;
        var Current_limit = Current_limit;

        var Mobile_bill;

        if (Bil_limit < Current_limit) {
            Mobile_bill = Current_limit * 1 - Bil_limit * 1;

        } else {
            Mobile_bill = 0;
        }

        return Mobile_bill;

    }

    function GET_EPF_Deductions(Basic_salary, EPF) {

        var basic = Basic_salary * 1 / 100;
        var epf = basic * 1 * EPF * 1;

        return epf;

    }

    function Currency_Formatting(value) {

        // var num =value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,");
        var num = value.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num;

    }

    function insert_employee_pay_sheet(ID, value, employee_id) {

        var url = "../Salary_controller/employee_paysheet_pay";

        var employee_has_designation_salary_variable = ID;
        var payment_value = value;
        var payment_circle_id = document.getElementById("payment_circle").value;
        var employee_id = employee_id;

        $.ajaxSetup({
            cache: false,
            async: false
        });
        $.post(url, {
            ID: employee_has_designation_salary_variable,
            payment_value: payment_value,
            payment_circle_id: payment_circle_id,
            employee_id: employee_id
        }, function (response) {

            console.log(response);

        }, 'text');

    }


    function printElem(divId) {
        var content = document.getElementById(divId).innerHTML;
        var mywindow = window.open('', 'Print', 'height=600,width=800');
        // var mywindow = window.open();

        mywindow.document.write('<html><head><title>Print</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(content);
        mywindow.document.write('</body></html>');

        mywindow.document.close();
        mywindow.focus()
        mywindow.print();
        mywindow.close();
        return true;
    }


    function insert_paysheet_has_salary_summery(category_ID, category_Total, employee_ID) {

        var url = "../Salary_controller/insert_paysheet_has_salary_summery";

        var category_ID = category_ID;
        var category_Total = category_Total;
        var employee_ID = employee_ID;
        var payment_circle_id = document.getElementById("payment_circle").value;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {
            category_ID: category_ID,
            category_Total: category_Total,
            employee_ID: employee_ID,
            payment_circle_id: payment_circle_id
        }, function (response) {

            console.log(response);

        }, 'text');

    }

    function pay_slip_pay() {

        var url = "../Salary_controller/pay_slip_pay";

        var employee_ID = document.getElementById("employee_no").value;
        var payment_circle_id = document.getElementById("payment_circle").value;
        var net_salary = document.getElementById("net_salary").innerHTML;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {
            payment_circle_id: payment_circle_id,
            employee_ID: employee_ID,
            net_salary: net_salary
        }, function (response) {

            if (response !== "false") {

                document.getElementById("close_modal").click();

                new PNotify({
                    title: 'Success',
                    text: 'Happy Enjoy ...... !',
                    type: 'success',
                    styling: 'bootstrap3'
                });

            } else {

                new PNotify({
                    title: 'Error',
                    text: 'pleas check ...... !',
                    type: 'error',
                    styling: 'bootstrap3'
                });


            }


        }, 'text');

    }


    function printView_paysheet(data) {

        console.log("call....");

        var url = "../Salary_controller/printView_paysheet";
        var employee_id = data;
        var payment_circle_id = document.getElementById("payment_circle").value;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {employee_id: employee_id, payment_circle_id: payment_circle_id}, function (response) {

            console.log("..................................." + response);

            var JSONObject = JSON.parse(response);

            var employee_ID;
            var employee_name;
            var employee_position;
            var paysheet_code;
            var paysheet_Total;
            var Payment_date;

            var object;
            var object_salary;

            var category = "";
            var category_tot = "";
            var salary_variable = "";
            var payment_value = "";

            var category_print = "";
            var category_Amount = "";
            var Total_amount = "";
            var Top_Content = "";


            for (var k in JSONObject) {

                employee_ID = JSONObject[k]["employee_ID"];
                employee_name = JSONObject[k]["employee_name"];
                employee_position = JSONObject[k]["employee_position"];
                paysheet_code = JSONObject[k]["paysheet_code"];
                paysheet_Total = JSONObject[k]["paysheet_Total"];
                Payment_date=JSONObject[k]["Payment_date"];

                object = JSONObject[k]["object"];

                console.log(employee_ID);

                for (var j in object) {

                    category = object[j].category;
                    category_tot = object[j].category_tot;

                    object_salary = object[j].object_salary;

                    var salary_variable_print = "";

                    console.log("category............................" + category + "....................................");


                    category_print = category_print + "<tr colspan=\"2\">\n" +
                        "           <td>\n" +
                        "              <h2>" + category + "</h2>\n" +
                        "           </td>\n" +
                        "           <td></td> \n"+
                        "        </tr>";


                    for (var l in object_salary) {

                        salary_variable = object_salary[l].salary_variable;
                        payment_value = object_salary[l].payment_value;

                        salary_variable_print = salary_variable_print + "<tr>\n" +
                            "        <td width=\"600\">\n" +
                            "            <p>" + salary_variable + "</p>\n" +
                            "        </td>\n" +
                            "        <td>\n" +
                            "            <p>" + payment_value + "</p>\n" +
                            "        </td>\n" +
                            "       </tr>";

                        console.log(salary_variable + " - " + payment_value);

                    }


                    category_print = category_print + salary_variable_print;

                    category_Amount = " <tr style=\"background-color:#e5e5e5; border: 1px solid #CCCCCC \">\n" +
                        "                <td width=\"600\"></td>\n" +
                        "                <td>" + category_tot + "</td>\n" +
                        "                </tr>";

                    category_print = category_print + category_Amount;

                    console.log("Total - " + category_tot);

                }

            }


            Top_Content = " <tr>\n" +
                "                                    <td colspan=\"2\" style=\"text-align: center; \">\n" +
                "                                        <h1>Quick Office Automation Pay Slip</h1>\n" +
                "                                    </td>\n" +
                "                                </tr>\n" +
                "\n" +
                "                                <tr>\n" +
                "\n" +
                "                                    <td width=\"600\">\n" +
                "\n" +
                "                                        <h2>" + employee_name + "</h2>\n" +
                "                                        <b>Employee ID:</b>" + employee_ID + "" +
                "                                        <br>\n" +
                "                                        <b>Designation:</b>" + employee_position + "" +
                "                                        <br>\n" +
                "\n" +
                "                                    </td>\n" +
                "\n" +
                "                                    <td>\n" +
                "\n" +
                "                                        <b>Pay Slip ID:</b>" + paysheet_code + "" +
                "                                        <br>\n" +
                "                                        <b>Payment Date:</b>"+Payment_date+"" +
                "                                        <br>\n" +
                "\n" +
                "                                    </td>\n" +
                "\n" +
                "                                </tr> <tr>\n" +
                "            <td></td>\n" +
                "            <td></td>\n" +
                "        </tr>";

            Total_amount = "<tr style=\"background-color:#e5e5e5;\">\n" +
                "            <td style=\"text-align:center\">Total Amount  </td>\n" +
                "            <td>" + paysheet_Total + "</td>\n" +
                "        </tr>";

            document.getElementById("content_print").innerHTML = Top_Content + category_print + Total_amount;


        }, 'text');
    }


</script>


<!-- /page content -->



