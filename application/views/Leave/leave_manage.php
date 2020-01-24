<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Leave Application
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
                                            <h4 class="modal-title" id="myModalLabel2">Leave Manage</h4>
                                        </div>

                                        <div class="modal-body ">


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

                                            <span class="section"></span>

                                            <div class="form-group">

                                                <label class="control-label col-md-3 col-sm-3">Leave Type
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <select id="leave_type" name="leave_type"
                                                            class="form-control">
                                                        <option>Choose Leave Type</option>
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3">Year
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <select id="year" name="year"
                                                            class="form-control">
                                                        <option>Choose Year</option>
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Designation">Applicable
                                                    Leave
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="applicable"
                                                           name="applicable"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Leave Type</th>
                                                        <th>Applicable Count</th>
                                                        <th>Available Count</th>
                                                        <th>Year</th>

                                                    </tr>
                                                    </thead>

                                                    <tbody id="leave_has_employee_table">
                                                    </tbody>
                                                </table>

                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" onclick="employee_has_leave_add()"
                                                    class="btn btn-primary">Add
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
    load_employee_for_leave_manage();


    $('#from_date').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    $('#to_date').daterangepicker({
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


    function Leave_application(data) {

        var url = "../Leave_controller/load_employee_details";

        var employee_id = data;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {employee_id: employee_id}, function (response) {

            console.log("Out - " + response);

            var JSONObject = JSON.parse(response);

            var employee_ID;
            var employee_name;
            var employee_position;

            for (var k in JSONObject) {

                employee_ID = JSONObject[k]["employee_id"];
                employee_name = JSONObject[k]["employee_name"];
                employee_position = JSONObject[k]["employee_position"];

            }

            document.getElementById("employee_no").value = employee_ID;
            document.getElementById("name_of_employee").value = employee_name;
            document.getElementById("designation").value = employee_position;
            document.getElementById("leave_type").innerHTML = "<option>Choose Leave Type</option>"
            load_leve_type();
            load_year();
            load_leave_manage_for_table(data);

        }, 'text');

    }

    function employee_has_leave_add() {

        var url = "../Leave_controller/employee_has_leave_save";

        var employee_id = document.getElementById("employee_no").value;
        var leave_type = document.getElementById("leave_type").value;
        var year = document.getElementById("year").value;
        var applicable = document.getElementById("applicable").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {

            employee_id: employee_id,
            year: year,
            applicable: applicable,
            leave_type: leave_type

        }, function (response) {

            if (response === "true") {

                new PNotify({
                    title: 'Success',
                    text: 'Save ...... !',
                    type: 'success',
                    styling: 'bootstrap3'
                });

                document.getElementById("applicable").value = "";
                load_leave_manage_for_table(employee_id);


            } else {

                new PNotify({
                    title: 'Oh No!',
                    text: "Some thing Wrong ",
                    type: 'error',
                    styling: 'bootstrap3'
                });

            }

        }, 'text');

    }


    function load_leve_type() {

        var url = "../Leave_controller/load_leave_type";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            console.log(response);

            var id;
            var leave_type;
            var option = document.getElementById("leave_type").innerHTML;

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                leave_type = JSONObject[k]["leave_type"];

                option = option + "<option value=" + id + ">" + leave_type + "</option>";

            }

            document.getElementById("leave_type").innerHTML = option;

        }, 'text');

    }

    function load_year() {

        var max = new Date().getFullYear(),
            To_max = max + 2,
            select = document.getElementById('year');

        for (var i = max; i <= To_max; i++) {
            var opt = document.createElement('option');
            opt.value = i;
            opt.innerHTML = i;
            select.appendChild(opt);
        }

    }

    function load_leave_manage_for_table(data) {

        var url = "../Leave_controller/load_employee_has_leave";

        var employee_id = data;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {employee_id: employee_id}, function (response) {

            if (response !== "false") {

                var JSONObject = JSON.parse(response);

                var leave_type;
                var applicable_count;
                var available_count;
                var year;
                var ID;

                var table = "";

                for (var k in JSONObject) {

                    leave_type = JSONObject[k]["leave_type"];
                    applicable_count = JSONObject[k]["applicable_count"];
                    available_count = JSONObject[k]["available_count"];
                    year = JSONObject[k]["year"];
                    ID = JSONObject[k]["employee_leave_typeid"];

                    table = table + "<tr><th scope=\"row\">" + leave_type + "</th><td>" + applicable_count + "</td><td>" + available_count + "</td><td>" + year + "</td> <td> <button type='button'  onclick=\"Remove_employee_has_leave(" + ID + ") \" class=\"btn btn-round btn-danger btn-xs\" >Remove</button></td></tr>";

                }

                document.getElementById("leave_has_employee_table").innerHTML = table;

            }else {
                document.getElementById("leave_has_employee_table").innerHTML="";
            }

        }, 'text');

    }

    function Remove_employee_has_leave(id) {

        var url = "../Leave_controller/Remove_employee_has_leave";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {id: id}, function (response) {

            var data_id =document.getElementById("employee_no").value;
            load_leave_manage_for_table(data_id);

        }, 'text');

    }


</script>

<!-- /page content -->



