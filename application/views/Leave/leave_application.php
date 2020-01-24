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
                                            <h4 class="modal-title" id="myModalLabel2">Leave Application</h4>
                                        </div>

                                        <div id="pay_sheet" class="modal-body ">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="title">Leave
                                                    Type</label>
                                                <div class="col-md-3 col-sm-3">
                                                    <select id="leave_type" name="leave_type"
                                                            class="form-control">
                                                        <option>Choose Leave Type</option>
                                                    </select>
                                                </div>
                                            </div>

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

                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label col-md-3 col-sm-3">From Date
                                                        </label>
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left"
                                                                   id="from_date"
                                                                   name="calender_date" placeholder="Calender Date"
                                                                   aria-describedby="inputSuccess2Status3">
                                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                                  aria-hidden="true"></span>
                                                            <span class="sr-only">(success)</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label col-md-3 col-sm-3">To Date
                                                        </label>
                                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left"
                                                                   id="to_date"
                                                                   name="calender_date" placeholder="Calender Date"
                                                                   aria-describedby="inputSuccess2Status3">
                                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                                  aria-hidden="true"></span>
                                                            <span class="sr-only">(success)</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" onclick="leave_apply()"
                                                    class="btn btn-primary">Apply
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
    load_employee_for_leave_application();


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

        }, 'text');

    }

    function leave_apply() {

        var url = "../Leave_controller/leave_apply";

        var employee_id = document.getElementById("employee_no").value
        var from_date = document.getElementById("from_date").value;
        var to_date = document.getElementById("to_date").value;
        var leave_type = document.getElementById("leave_type").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {
            employee_id: employee_id,
            from_date: from_date,
            to_date: to_date,
            leave_type: leave_type
        }, function (response) {

            alert(response);

            if (response === "true") {

                new PNotify({
                    title: 'Success',
                    text: 'Apply pending...... !',
                    type: 'success',
                    styling: 'bootstrap3'
                });

                document.getElementById("close_modal").click();

            } else {

                new PNotify({
                    title: 'Oh No!',
                    text: response,
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


</script>


<!-- /page content -->



