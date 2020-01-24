<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Expenses
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

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Expenses Date
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-12  col-sm-12 col-xs-12  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal3"
                                           name="calender_date" placeholder="Calender Date"
                                           aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label col-md-3 col-sm-3">Distributor :
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input list="distributor_data" id="distributor" onkeyup="load_distributor();"
                                       name="distributor"
                                       class="form-control"/>
                                <datalist id="distributor_data">
                                </datalist>

                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Expenses Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="expenses_type_select" name="expenses_type_select"
                                        class="form-control">
                                    <option>Choose Expenses Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Expenses Duration
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="expenses_duration" name="expenses_duration"
                                        class="form-control">
                                    <option>Daily</option>
                                    <option>Monthly</option>
                                    <option>Annual</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Expenses">Expenses
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="expenses" name="expenses"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Voucher">Expenses Value
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="expenses_value" name="expenses_value"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Expenses
                                Description </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="expenses_description" class="form-control"
                                          name="expenses_description"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Voucher Number">Voucher Number
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="voucher_number" name="voucher_number"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Voucher">Voucher
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="voucher" name="voucher"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="save_expenses_data()">
                            </div>
                        </div>

                        <!--                        <div class="form-group">-->
                        <!--                            <label class="control-label col-md-3 col-sm-3" for="calender_date_list">-->
                        <!--                            </label>-->
                        <!--                            <div class="col-md-6 col-sm-6">-->
                        <!---->
                        <!--                                <table class="table table-striped">-->
                        <!--                                    <thead>-->
                        <!--                                    <tr>-->
                        <!--                                        <th>Customer Type</th>-->
                        <!--                                        <th>Discount Default</th>-->
                        <!--                                        <th>Discount Max</th>-->
                        <!--                                        <th>Discount Min</th>-->
                        <!--                                        <th>Status</th>-->
                        <!--                                    </tr>-->
                        <!--                                    </thead>-->
                        <!--                                    <tbody id="Customer_discount_table_id">-->
                        <!---->
                        <!--                                    </tbody>-->
                        <!--                                </table>-->
                        <!---->
                        <!---->
                        <!--                            </div>-->
                        <!--                        </div>-->


                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<script>

    $('#single_cal3').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    load_expenses_type_for_select();


    function load_distributor() {

        var url = "../Profile_controller/get_distributor_data";

        var distributor = document.getElementById("distributor").value;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {distributor: distributor}, function (response) {

            console.log(response);
            var JSONObject = JSON.parse(response);

            var distributor_id;
            var surname;
            var fname;
            var lname;
            var nic;

            for (var k in JSONObject) {

                distributor_id = JSONObject[k]["distributor_id"];
                fname = JSONObject[k]["fname"];
                lname = JSONObject[k]["lname"];
                nic = JSONObject[k]["nic"];

                document.getElementById("distributor_data").innerHTML = "<option value=" + distributor_id + ">" + distributor_id + " " + "(" + fname + " " + lname + " " + nic + ")" + "</option>";

            }

        }, 'text');

    }


    function load_expenses_type_for_select() {

        var url = "../Expenses_controller/all_search_expenses_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !=='No_Data') {

                var JSONObject = JSON.parse(response);

                var id;
                var expenses_type;
                var option = "";

                for (var k in JSONObject) {

                    id = JSONObject[k]["id"];
                    expenses_type = JSONObject[k]["expenses_type"];
                    option = option + "<option>" + expenses_type + "</option>";
                }

                document.getElementById("expenses_type_select").innerHTML = option;

            }

        }, 'text');


    }

    function save_expenses_data() {

        var exp_date = document.getElementById('single_cal3').value;
        var exp_type = document.getElementById('expenses_type_select').value;
        var exp_duration = document.getElementById('expenses_duration').value;
        var expenses = document.getElementById('expenses').value;
        var exp_value = document.getElementById('expenses_value').value;
        var exp_description = document.getElementById('expenses_description').innerHTML;
        var voucher_number = document.getElementById('voucher_number').value;
        var voucher = document.getElementById('voucher').value;
        var distributor = document.getElementById('distributor').value;

        var url = "../Expenses_controller/save_expenses_data";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {

            exp_date: exp_date,
            exp_type: exp_type,
            exp_duration: exp_duration,
            expenses: expenses,
            exp_value: exp_value,
            exp_description: exp_description,
            voucher_number: voucher_number,
            voucher: voucher,
            distributor: distributor

        }, function (response) {

           document.getElementById('expenses').value="";
           document.getElementById('expenses_value').value="";
           document.getElementById('expenses_description').innerHTML="";
           document.getElementById('voucher_number').value="";
           document.getElementById('voucher').value="";
           document.getElementById('distributor').value="";

        }, 'text');

    }

    // function load_discount_range() {
    //
    //     var url = "../Profile_controller/load_discount_range";
    //
    //     $.ajaxSetup({
    //         cache: false
    //
    //     });
    //     $.post(url, {}, function (response) {
    //
    //         if (response !== 'No_Data') {
    //
    //             var JSONObject = JSON.parse(response);
    //
    //             var customer_type;
    //             var discount_difault;
    //             var discount_max;
    //             var discount_min;
    //             var status;
    //             var table = "";
    //
    //             for (var k in JSONObject) {
    //
    //                 customer_type = JSONObject[k]["customer_type"];
    //                 discount_difault = JSONObject[k]["discount_difault"];
    //                 discount_max = JSONObject[k]["discount_max"];
    //                 discount_min = JSONObject[k]["discount_min"];
    //                 status = JSONObject[k]["status"];
    //
    //                 table = table + "<tr><th scope=\"row\">" + customer_type + "</th><td>" + discount_difault + "</td><td>" + discount_max + "</td><td>" + discount_min + "</td><td>" + status + "</td></tr>";
    //             }
    //
    //             document.getElementById("Customer_discount_table_id").innerHTML = table;
    //
    //         }
    //
    //     }, 'text');
    //
    //
    // }


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







