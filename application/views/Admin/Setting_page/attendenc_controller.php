<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Attendenc Controller
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

                        <span class="section">Attendenc Status</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Attendenc Status">Attendenc Status
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="attendenc_status" name="attendenc_status"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="attendenc_status_save()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="attendenc_status_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Attendenc Status</th>
                                    </tr>
                                    </thead>
                                    <tbody id="attendenc_status_table_id"></tbody>
                                </table>

                            </div>
                        </div>


                        <span class="section">Shift</span>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="shiftment">Shift
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="shiftment_name" name="shiftment_name"
                                       class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Start Time"> Start Time
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class='input-group date' id='myDatepicker'>
                                    <input type='text' id="start_time" class="form-control"/>
                                    <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="End Time"> End Time
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class='input-group date' id='myDatepicker1'>
                                    <input type='text' id="end_time" class="form-control" onkeyup="hours_count_get()"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Working Duration
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="hours_count" name="hours_count" "
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="Save_shiftment()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="shiftment__list">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Shift</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Working Duration</th>
                                    </tr>
                                    </thead>
                                    <tbody id="shiftment_table_id">

                                    </tbody>
                                </table>


                            </div>
                        </div>


                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<script>

    load_attendence_status_table();
    load_shiftment_table();

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

</script>


<!-- /page content -->







