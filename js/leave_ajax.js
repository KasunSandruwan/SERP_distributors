
var tbl_employee_leave_application;

function load_employee_for_leave_application() {

    var url = "../Leave_controller/load_employee_for_leave_application";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        if (response !== "No-data") {

            var JSONObject = JSON.parse(response);

            tbl_employee_leave_application = $('#datatable-buttons').DataTable({


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

var tbl_employee_leave_manage;

function load_employee_for_leave_manage() {

    var url = "../Leave_controller/load_employee_for_leave_manage";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        if (response !== "No-data") {

            var JSONObject = JSON.parse(response);

            tbl_employee_leave_manage = $('#datatable-buttons').DataTable({


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