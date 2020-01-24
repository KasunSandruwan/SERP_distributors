<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Customer Type Manage
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
                            <label class="control-label col-md-3 col-sm-3" for="Customer Type">Customer Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="customer_type" name="customer_type"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="customer_type_save()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="day_type_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Type</th>
                                    </tr>
                                    </thead>
                                    <tbody id="customer_type_table_id"></tbody>
                                </table>

                            </div>
                        </div>


                        <span class="section">Discount Manage</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Customer Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="Customer_type_select" name="Customer_type_select"
                                        class="form-control">
                                    <option>Choose Customer Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Customer Type">Default Discount
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="default_discount" name="default_discount"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Customer Type">Discount Max
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="discount_max" name="discount_max"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Customer Type">Discount Min
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="discount_min" name="discount_min"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="save_customer_discount_date()">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="calender_date_list">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Customer Type</th>
                                        <th>Discount Default</th>
                                        <th>Discount Max</th>
                                        <th>Discount Min</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody id="Customer_discount_table_id">

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

    load_customer_type_table();
    load_customer_type_for_select();
    load_discount_range();

    function customer_type_save() {

        var customer_type = document.getElementById("customer_type").value;

        var url = "../Profile_controller/save_customer_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {customer_type: customer_type}, function (response) {

            load_customer_type_table();
            load_customer_type_for_select();
            document.getElementById("customer_type").value = "";

        }, 'text');

    }

    function load_customer_type_table() {

        var url = "../Profile_controller/all_search_customer_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No_Data') {

                var JSONObject = JSON.parse(response);

                var id;
                var customer_type;
                var table = "";

                for (var k in JSONObject) {

                    id = JSONObject[k]["id"];

                    customer_type = JSONObject[k]["customer_type"];
                    table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + customer_type + "</td></tr>";
                }

                document.getElementById("customer_type_table_id").innerHTML = table;

            }

        }, 'text');

    }


    function load_customer_type_for_select() {

        var url = "../Profile_controller/all_search_customer_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No_Data') {

                var option = document.getElementById("Customer_type_select").innerHTML = "";

                var JSONObject = JSON.parse(response);

                var id;
                var customer_type;

                for (var k in JSONObject) {

                    id = JSONObject[k]["id"];

                    customer_type = JSONObject[k]["customer_type"];
                    option = option + "<option>" + customer_type + "</option>";
                }

                document.getElementById("Customer_type_select").innerHTML = option;

            }

        }, 'text');


    }

    function save_customer_discount_date() {

        var customer_type = document.getElementById('Customer_type_select').value;
        var default_discount = document.getElementById('default_discount').value;
        var discount_max = document.getElementById('discount_max').value;
        var discount_min = document.getElementById('discount_min').value;

        var url = "../Profile_controller/save_discount_range";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {
            customer_type: customer_type,
            default_discount: default_discount,
            discount_max: discount_max,
            discount_min: discount_min

        }, function (response) {

            document.getElementById("default_discount").value = "";
            document.getElementById("discount_max").value = "";
            document.getElementById("discount_min").value = "";
            load_discount_range();

        }, 'text');

    }

    function load_discount_range() {

        var url = "../Profile_controller/load_discount_range";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No_Data') {

                var JSONObject = JSON.parse(response);

                var customer_type;
                var discount_difault;
                var discount_max;
                var discount_min;
                var status;
                var table = "";

                for (var k in JSONObject) {

                    customer_type = JSONObject[k]["customer_type"];
                    discount_difault = JSONObject[k]["discount_difault"];
                    discount_max = JSONObject[k]["discount_max"];
                    discount_min = JSONObject[k]["discount_min"];
                    status = JSONObject[k]["status"];

                    table = table + "<tr><th scope=\"row\">" + customer_type + "</th><td>" + discount_difault + "</td><td>"+discount_max+"</td><td>"+discount_min+"</td><td>"+status+"</td></tr>";
                }

                document.getElementById("Customer_discount_table_id").innerHTML = table;

            }

        }, 'text');



    }



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







