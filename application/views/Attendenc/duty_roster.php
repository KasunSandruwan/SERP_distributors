<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Duty Roster
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

                        <span class="section">Duty Roster</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Branch"> Branch
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select onchange="load_duty_roster()" id="branch" name="branch"
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
                                        <input type="text" onchange="load_duty_roster()" class="form-control has-feedback-left" id="from_date"
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
                                        <input type="text" onchange="load_duty_roster()" class="form-control has-feedback-left"
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

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable-buttons"  class="table  table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Roster ID</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Shiftment</th>
                                    <th>Sunday</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                </tr>
                                </thead>

                                <tbody id="duty_roster_table">

                                </tbody>
                            </table>
                        </div>




                        <!--                        Model Class ....................................................................................-->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!-- Small modal -->
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel2">Duty Roster</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3" for="employee_name">Employee Name
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text"  id="employee_name" readonly="readonly" name="employee_name"
                                                                   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3" for="employee_name">Date
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text"  id="date" readonly="readonly" name="date"
                                                                   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3" for="Branch">Shift
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <select  id="shiftment" name="shiftment"
                                                                    class="form-control">
                                                                <option>Choose Shift</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="close_modal" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="update_duty_roster()" class="btn btn-primary">Update changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /modals -->
                                </div>
                            </div>
                        </div>




<!--                     ...................................................................................................   -->
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>

<script>

    load_roster_for_branch();
    // load_duty_roster();
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

    // Data Table Get Row click Value...................................................................................

    $('#datatable-buttons tbody').on('click', 'tr', function () {
        // console.log( table.row( 0 ).data());
        var data=tbl.row(this).data();
        // console.log(data['employee_id']);
        // console.log(Object.values(data));

        dataTable_model_set_value(data);

    });

    //..................................................................................................................

</script>


<!-- /page content -->







