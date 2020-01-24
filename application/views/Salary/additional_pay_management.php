<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Addition Pay Manage
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

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody id="salary_variable_manage_table">

                            </tbody>
                        </table>
                    </div>


                    <!-- Model Class ....................................................................................-->

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Salary Variable for Employee </h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-horizontal form-label-left">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="employee_id">Employee
                                                    ID
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="employee_id" readonly="readonly"
                                                           name="employee_id"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Payment Date">Salary
                                                    Variable
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <select id="variables" name="variables"
                                                            class="form-control">
                                                        <option>Choose Salary Variable</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Date">Date
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="col-md-12  form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left"
                                                               id="date"
                                                               name="register_date" placeholder="Register Date"
                                                               aria-describedby="inputSuccess2Status3">
                                                        <span class="fa fa-calendar-o form-control-feedback left"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">(success)</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Branch">Value
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="variables_value" name="variables_value"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close_modal" class="btn btn-default"
                                                data-dismiss="modal">Close
                                        </button>
                                        <button type="button"
                                                onclick="save_Employee_salary_variables_note_addition_pay()"
                                                class="btn btn-primary">Save
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

<script>

    init_DataTables();
    load_employee_for_salary_variable();

    $('#date').daterangepicker({
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

    $('#datatable-buttons tbody').on('click', 'tr', function () {
        // console.log( table.row( 0 ).data());
        var data = tbl_employee_for_salary.row(this).data();
        console.log(data['employee_id']);

        load_salary_variable_for_employee(data);

    });


    function save_Employee_salary_variables_note_addition_pay() {

        var employee_id = document.getElementById("employee_id").value;
        var variables = document.getElementById("variables").value;
        var date = document.getElementById("date").value;
        var variables_value = document.getElementById("variables_value").value;

        var url = "../Salary_controller/insert_Employee_salary_variables_note_addition_pay";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {
            employee_id: employee_id,
            variables: variables,
            date: date,
            variables_value: variables_value
        }, function (response) {

            // if (response === "true") {
            //
            //     document.getElementById("employee_id").value = "";
            //     document.getElementById("variables").value = "";
            //     document.getElementById("date").value = "";
            //     document.getElementById("variables_value").value = "";
            //
            // }

            alert(response);

        }, 'text');


    }


</script>