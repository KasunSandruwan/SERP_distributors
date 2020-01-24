function salary_category_add() {

    var salary_category = document.getElementById("salary_category").value;
    var url = "../Salary_controller/save_salary_category";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {salary_category: salary_category}, function (response) {

        if (response === "true") {
            document.getElementById("salary_category").value = "";
            load_category();
            document.getElementById("salary_category_select").innerHTML = "";
            load_salary_category_select();
        }
    }, 'text');

}

function load_category() {

    var url = "../Salary_controller/load_category";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        if (response !== "false") {

            var JSONObject = JSON.parse(response);

            var id;
            var salary_category;
            var table = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                salary_category = JSONObject[k]["salary_category"];
                table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + salary_category + "</td></tr>";

            }

            document.getElementById("salary_category_table").innerHTML = table;

        }

    }, 'text');

}

function load_salary_category_select() {

    var url = "../Salary_controller/load_category";

    $.ajaxSetup({
        cache: false
    });
    $.post(url, {}, function (response) {

        if (response !== "false") {

            var JSONObject = JSON.parse(response);

            var id;
            var salary_category;
            var option = document.getElementById("salary_category_select").innerHTML;

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                salary_category = JSONObject[k]["salary_category"];
                option = option + "<option>" + salary_category + "</option>";

            }

            document.getElementById("salary_category_select").innerHTML = option;

        }

    }, 'text');

}

function add_salary_variable() {

    var salary_variable = document.getElementById("salary_variable").value;
    var salary_category = document.getElementById("salary_category_select").value;
    var url = "../Salary_controller/save_salary_variable";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {salary_variable: salary_variable, salary_category: salary_category}, function (response) {

        if (response === "true") {
            document.getElementById("salary_variable").value = "";
            load_salary_variable();
        }
    }, 'text');


}

function load_salary_variable() {

    var url = "../Salary_controller/load_salary_variable";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        if (response !== "false") {

            var JSONObject = JSON.parse(response);

            var salary_category;
            var salary_variable;
            var table = "";

            for (var k in JSONObject) {

                salary_variable = JSONObject[k]["salary_variable"];
                salary_category = JSONObject[k]["salary_category"];
                table = table + "<tr> <th scope=\"row\">" + salary_category + "</th><td>" + salary_variable + "</td></tr>";

            }

            document.getElementById("salary_variable_table_id").innerHTML = table;

        }

    }, 'text');

}

var tbl_employee_for_salary;

function load_employee_for_salary_variable() {

    var url = "../Salary_controller/load_employee_for_salary_variable_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        if (response !== "No-data") {

            var JSONObject = JSON.parse(response);

            tbl_employee_for_salary = $('#datatable-buttons').DataTable({

                'createdRow': function (row, data, dataIndex) {
                    $(row).attr({'data-toggle': 'modal', 'data-target': '.bs-example-modal-lg'});

                },

                "order": [],
                "columnDefs": [

                    {
                        "targets": 'no-sort',
                        "orderable": false,
                    },
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
                ],

                destroy: true,
                data: JSONObject,
                columns: [
                    {data: 'employee_id', title: 'Roster ID'},
                    {data: 'employee_code', title: 'Employee ID'},
                    {data: 'employee_name', title: 'Name'},
                    {data: 'employee_department', title: 'Department'},
                    {data: 'employee_position', title: 'Designation'},
                ]

            });

        } else {

            var table = "<tr class=\"odd\"><td valign=\"top\" colspan=\"4\" class=\"dataTables_empty\">No data available in table</td></tr>";

            document.getElementById("salary_variable_manage_table").innerHTML = table;

        }

    }, 'text');

}

function load_salary_variable_for_employee(data) {

    document.getElementById("variables").innerHTML = "<option>Choose Variable</option>"

    var url = "../Salary_controller/load_salary_variable_for_select";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        if (response !== "false") {

            var JSONObject = JSON.parse(response);

            var id;
            var salary_variable;
            var option = document.getElementById("variables").innerHTML;

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                salary_variable = JSONObject[k]["salary_variable"];
                option = option + "<option>" + salary_variable + "</option>";

            }

            document.getElementById("variables").innerHTML = option;

        }

    }, 'text');

    document.getElementById("employee_id").value = data["employee_id"];

}

function save_employee_for_salary_variable() {

    var url = "../Salary_controller/insert_employee_has_employee_designation";

    var employee_id = document.getElementById("employee_id").value;
    var variables = document.getElementById("variables").value;
    var variables_value = document.getElementById("variables_value").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {
        employee_id: employee_id,
        variables: variables,
        variables_value: variables_value
    }, function (response) {

        if (response === "true") {

            var str = '{"employee_id":"' + employee_id + '"}';
            var data = JSON.parse(str);
            load_employee_designation_salary_variable(data);
            // document.getElementById("close_modal").click();
            document.getElementById("variables_value").value = "";

        }

    }, 'text');

}

function load_employee_designation_salary_variable(data) {

    document.getElementById("salary_variable_table").innerHTML = "";

    var employee_id = data["employee_id"];

    var url = "../Salary_controller/Search_employee_salary_variable";

    $.ajaxSetup({
        cache: false
    });
    $.post(url, {employee_id: employee_id}, function (response) {

        if (response !== "false") {

            var JSONObject = JSON.parse(response);

            var id;
            var salary_variable;
            var value;
            var table = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                salary_variable = JSONObject[k]["salary_variable"];
                value = JSONObject[k]["value"];
                table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + salary_variable + "</td><td><input type=\"text\"  id=\"salary_value_"+id+"\" value=\""+value+"\"> </td><td> <button type='button' onclick=\"update_salary_variable_value("+id+")\" class=\"btn btn-round btn-success btn-xs\">Update</button></td></tr>";
            }

            document.getElementById("salary_variable_table").innerHTML = table;

        }

    }, 'text');

}

function update_salary_variable_value(id) {

    var url = "../Salary_controller/update_salary_variable_value";

    var variable_value=document.getElementById("salary_value_"+id).value;
    var employee_designation_id=id;

    $.ajaxSetup({
        cache: false
    });
    $.post(url, {employee_designation_id: employee_designation_id,variable_value:variable_value}, function (response) {

        if(response === "true"){

            new PNotify({
                title: 'Success',
                text: 'Update Success ...... !',
                type: 'success',
                styling: 'bootstrap3'
            });

        }

    }, 'text');

}



var tbl_pay_slip_generate;

function load_employee_for_pay_slip_generate() {

    console.log("yeeeeeeee");

    var url = "../Salary_controller/load_employee_for_pay_slip_generate";

    var payment_circle=document.getElementById("payment_circle").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {payment_circle:payment_circle}, function (response) {

        if (response !== "No-data") {

            var JSONObject = JSON.parse(response);

            tbl_pay_slip_generate = $('#datatable-buttons').DataTable({

                "order": [],
                "columnDefs": [

                    {
                        "targets": 'no-sort',
                        "orderable": false,
                    },
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
                ],

                destroy: true,
                data: JSONObject,
                columns: [
                    {data: 'employee_id', title: 'Roster ID'},
                    {data: 'employee_code', title: 'Employee ID'},
                    {data: 'employee_name', title: 'Name'},
                    {data: 'employee_department', title: 'Department'},
                    {data: 'employee_position', title: 'Designation'},
                    {data: 'input', title: 'Option'},

                ]

            });

        } else {

            var table = "<tr class=\"odd\"><td valign=\"top\" colspan=\"4\" class=\"dataTables_empty\">No data available in table</td></tr>";

            document.getElementById("employee_pay_sheet_table").innerHTML = table;

        }

    }, 'text');

}

function load_payment_circle() {

    var url = "../Salary_controller/load_payment_circle_is_not_pay";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        if (response !== "false") {

            var JSONObject = JSON.parse(response);

            console.log(response);

            var id;
            var year;
            var month;
            var option=document.getElementById("payment_circle").innerHTML;

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                year = JSONObject[k]["year"];
                month = JSONObject[k]["month"];
                option = option + "<option value="+id+">" +year+"-"+month+ "</option>";

            }

            document.getElementById("payment_circle").innerHTML = option;

        }

    }, 'text');


}







