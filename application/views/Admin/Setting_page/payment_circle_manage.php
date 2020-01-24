<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Payment Circle Manage
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
                        <!---->
                        <!--                        <span class="section">..</span>-->


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

                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3" for="Payment Date"> Payment Date
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="Payment_Date" name="Payment_Date"
                                        class="form-control">
                                    <option>Choose Date</option>
                                </select>
                            </div>
                        </div>


                        <button id="generate_button" onclick="generate_payment_circle_manage()"
                                type="button" class="btn btn-success">
                            Generate
                        </button>


                    </div>


                </div>


            </div>

        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Payment Circle
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

                    <div class="form-group">

                        <div class="col-md-12 col-sm-12">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Status</th>
                                    <th>Option</th>

                                </tr>
                                </thead>
                                <tbody id="payment_circle_table_id">

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
</div>

<script>


    load_date();
    load_payment_circle_manage();

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


    function load_payment_circle_manage() {

        var url = "../Salary_controller/load_payment_circle";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            console.log("Payment Circle "+response);

            var JSONObject = JSON.parse(response);

            var id;
            var from_date;
            var to_date;
            var year;
            var month;
            var status;
            var table = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                from_date = JSONObject[k]["from_date"];
                to_date = JSONObject[k]["to_date"];
                year = JSONObject[k]["year"];
                month = JSONObject[k]["month"];
                status = JSONObject[k]["status"];

                table = table + "<tr> <th scope=\"row\">" + id + "</th><td><input id=\"date\" type=\"date\" value=\""+from_date+"\"></td><td><input id=\"date\" type=\"date\" value=\""+to_date+"\"></td><td>" + year + "</td><td>" + month + "</td><td>" + status + "</td></tr>";
            }

            document.getElementById("payment_circle_table_id").innerHTML = table;


        }, 'text');

    }

    function load_date() {

        var option = document.getElementById("Payment_Date").innerHTML;

        for (var i = 1; i < 32; i++) {
            if (i < 10) {
                option = option + "<option>0" + i + "</option>";
            } else {
                option = option + "<option>" + i + "</option>";
            }

        }

        document.getElementById("Payment_Date").innerHTML = option;

    }


    function generate_payment_circle_manage() {

        var url = "../Salary_controller/generate_payment_circle_manage";
        var from_date = document.getElementById("from_date").value;
        var to_date = document.getElementById("to_date").value;
        var Payment_Date = document.getElementById("Payment_Date").value;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {
            from_date: from_date,
            to_date: to_date,
            Payment_Date: Payment_Date
        }, function (response) {

            console.log("............................" + response);

            load_payment_circle_manage();

        }, 'text');

    }

</script>


<!-- /page content -->