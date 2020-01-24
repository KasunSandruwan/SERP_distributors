<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Register From
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

                    <form id="employee_form" class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-code">User Code
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input list="user_data" id="user-code" name="user-code" onkeyup="search_data()"
                                       class="form-control"/>
                                <datalist id="user_data">
                                </datalist>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="employee_id">Employee ID
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="employee_id" name="employee_id"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-role">Branch
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <select id="branch" onchange="load_department()" name="branch" class="form-control">
                                    <option>Choose Branch</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="department">Department
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="department" name="department" class="form-control">
                                    <option>Choose Department</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-role">Employee Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="employee_type" name="employee_type" class="form-control">
                                    <option>Choose Employee Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-role">Salary Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="salary_type" name="salary_type" class="form-control">
                                    <option>Choose Salary Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-role">Position
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="position" name="position" class="form-control">
                                    <option>Choose Position</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-name">EPF
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="epf" name="epf" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Register Date
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal"
                                           name="register_date" placeholder="Register Date"
                                           aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Probation Start Date
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal2"
                                           name="probation_start" placeholder="Probation Start Date"
                                           aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Probation End Date
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal3"
                                           name="probation_end" placeholder="Probation End Date"
                                           aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"> Start Data
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal4"
                                           name="start_data" placeholder="Start Data"
                                           aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">End Date
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal5"
                                           name="end_date" placeholder="End Date"
                                           aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<script>

    load_branch_employee();

    $('#single_cal').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    $('#single_cal2').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    $('#single_cal3').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    $('#single_cal5').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });



    $("#employee_form").submit(function (e) {
        e.preventDefault();

        var dataform = $("#employee_form").serialize();

        var url = "../Employee_controller/save_employee"

        $.ajaxSetup({
            cache: false,

        });
        $.post(url, dataform, function (response) {

            if (response === "true") {

                new PNotify({
                    title: 'Success',
                    text: 'Save Success ...... !',
                    type: 'success',
                    styling: 'bootstrap3'
                });

                document.getElementById("employee_form").reset();

                // document.getElementById("employee_id").value="";
                // document.getElementById("epf").value="";
                // document.getElementById("single_cal3").value="";
                // masege save.........................................
            }else {

                new PNotify({
                    title: 'Oh No!',
                    text: 'Something terrible happened.',
                    type: 'error',
                    styling: 'bootstrap3'
                });

            }

        }, 'text');

    });


</script>

