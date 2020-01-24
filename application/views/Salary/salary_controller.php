<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Salary Controller
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

                        <span class="section">Salary Category</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Salary Category">Salary Category
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="salary_category" name="salary_category"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="salary_category_add()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Salary Category">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Salary Category</th>
                                    </tr>
                                    </thead>
                                    <tbody id="salary_category_table"></tbody>
                                </table>

                            </div>
                        </div>


                        <span class="section">Salary Variable </span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Salary Category Select">Salary Category
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="salary_category_select" class="form-control col-md-7 col-xs-12"></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="Salary Variable">Salary Variable
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="salary_variable" name="salary_variable"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="add_salary_variable()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Salary Variable Table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Salary Category</th>
                                        <th>Salary Variable</th>
                                    </tr>
                                    </thead>
                                    <tbody id="salary_variable_table_id">

                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <span class="section">Employee for Add Salary Variable </span>

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
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Salary Variable for Employee </h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="employee_id">Employee ID
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text"  id="employee_id" readonly="readonly" name="employee_id"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="variables">Variables
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <select  id="variables" name="variables"
                                                             class="form-control">
                                                        <option>Choose Variable</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Branch">Value
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text"  id="variables_value"  name="variables_value"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Salary Variable</th>
                                                        <th>Value</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody id="salary_variable_table">
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="close_modal" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="save_employee_for_salary_variable()" class="btn btn-primary">Save</button>
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
    load_category();
    load_salary_variable();
    load_salary_category_select();
    load_employee_for_salary_variable();

    $('#single_cal3').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    $('#myDatepicker').datetimepicker({
        format: 'hh:mm A'
    });
    $('#myDatepicker1').datetimepicker({
        format: 'hh:mm A'
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

    // Data Table Get Row click Value...................................................................................

    $('#datatable-buttons tbody').on('click', 'tr', function () {
        // console.log( table.row( 0 ).data());
        var data=tbl_employee_for_salary.row(this).data();
        console.log(data['employee_id']);

        load_salary_variable_for_employee(data);
        load_employee_designation_salary_variable(data);

        // console.log(Object.values(data));

    });

</script>


<!-- /page content -->







