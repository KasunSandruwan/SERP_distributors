<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Duty Roster Mange
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

                        <span class="section">Roster Create</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Shift">Shift
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="shiftment" onchange="load_branch_employee_for_duty_roster()"  name="shiftment" class="form-control">
                                    <option>Choose shift</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Branch"> Branch
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select onchange="load_branch_employee_for_duty_roster()" id="branch" name="branch"
                                        class="form-control">
                                    <option>Choose Branch</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-md-3 col-sm-3">From Date
                                    </label>
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="from_date"
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
                                        <input type="text" class="form-control has-feedback-left" id="to_date"
                                               name="calender_date" placeholder="Calender Date"
                                               aria-describedby="inputSuccess2Status3">
                                        <span class="fa fa-calendar-o form-control-feedback left"
                                              aria-hidden="true"></span>
                                        <span class="sr-only">(success)</span>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>All Select <input type="checkbox"></th>
                                </tr>
                                </thead>

                                <tbody id="duty_roster_manage_table">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>

<script>

    load_roster_for_branch();
    load_shiftment_for_select();

    init_DataTables();

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

</script>


<!-- /page content -->







