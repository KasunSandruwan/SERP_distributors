<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Customer Order
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

                    <form id="save_stock" class="form-horizontal form-label-left">

                        <div class="col-md-6 col-sm-6" style="border-right:1px solid #E6E9ED;">

                            <div class="form-group">

                                <div class="col-md-12 col-sm-12">

                                    <table id="datatable-buttons" class="table table-striped table-responsive">
                                        <thead>

                                        <tr>
                                            <th>Item</th>
                                            <th>Bill Name</th>
                                            <th>Qty</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-6" style="border-right:1px solid #E6E9ED;">

                            <div class="col-md-12 col-sm-12 col-lg-12">

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
                                    <label for="description" class="control-label col-md-3 col-sm-3">Customer :
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input list="Customer_data" id="Customer" onchange="load_discount_customer()"
                                               onkeyup="load_Customer();"
                                               name="Customer"
                                               class="form-control"/>
                                        <datalist id="Customer_data">
                                        </datalist>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Item Code
                                        Code
                                        : </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="item_code" name="item_code" class="form-control"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Bill Name
                                        : </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="bill_name" name="bill_name" class="form-control"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Unit Price :
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="unit_price" name="unit_price" class="form-control"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label for="description" class="control-label col-md-3 col-sm-3">Quantity </label>
                                    <div class="col-md-3 col-sm-3">
                                        <input id="quantity" name="quantity" onkeyup="get_cost_price()"
                                               class="form-control"/>

                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <select id="unit_type" onchange="get_cost_price()" name="unit_type"
                                                class="form-control">
                                            <option>Unit</option>
                                        </select>
                                    </div>

                                </div>


                            </div>


                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Price
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="price" name="price" class="form-control"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Discount
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="discount" name="discount" onchange="check_discount_rate()"
                                               class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3"></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <button type="button" onclick="item_add_cart();"
                                                class="btn btn-success btn-round">Add
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12">

                                <table class="table table-striped table-responsive">
                                    <thead>

                                    <tr>
                                        <th>Item</th>
                                        <th>Bill Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                        <th>Total Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody id="item_table">

                                    </tbody>
                                </table>

                            </div>

                            <div class="col-md-12 col-sm-12" style="border-top:1px solid #E6E9ED;">

                                <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="description" class="control-label col-md-3 col-sm-3"> All Total :
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                            <label id="total_all" name="total_all" class="control-label"></label>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3"></label>
                                <div class="col-md-12 col-sm-12 ">
                                    <button type="button" id="save" class="btn btn-success btn-round">Order
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>

</div>

<script>

    init_DataTables();
    load_stock();
    get_distributor_code();


    var d_max;
    var d_min;

    function load_discount_customer() {

        var url = "../Customer_order_management_controller/load_discount_customer";

        var Customer = document.getElementById("Customer").value;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {Customer: Customer}, function (response) {

            if (response !== 'No_Data') {

                var JSONObject = JSON.parse(response);

                var discount_difault;
                var discount_max;
                var discount_min;

                for (var k in JSONObject) {

                    discount_difault = JSONObject[k]["discount_difault"];
                    discount_max = JSONObject[k]["discount_max"];
                    discount_min = JSONObject[k]["discount_min"];

                    d_max = discount_max;
                    d_min = discount_min;

                    document.getElementById('discount').value = discount_difault;

                }

            }

        }, 'text');

    }

    function get_distributor_code() {

        var url = "../Customer_order_management_controller/load_distributor_code";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            document.getElementById("distributor").value = response;

        }, 'text');

    }

    function check_discount_rate() {

        var discount = document.getElementById('discount').value;

        if (discount * 1 > d_max * 1 || discount * 1 < d_min * 1) {

            document.getElementById('discount').value = "";

            if (discount * 1 >= d_max * 1) {

                new PNotify({
                    title: 'Oh No!',
                    text: 'Customer Discount Max Value.',
                    type: 'error',
                    styling: 'bootstrap3'
                });

            } else {

                new PNotify({
                    title: 'Oh No!',
                    text: 'Customer Discount Min Value.',
                    type: 'error',
                    styling: 'bootstrap3'
                });

            }

        }

    }


    function load_Customer() {

        var url = "../Profile_controller/get_customer";

        var Customer = document.getElementById("Customer").value;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {Customer: Customer}, function (response) {

            console.log(response);
            var JSONObject = JSON.parse(response);

            var customer_id;
            var surname;
            var fname;
            var lname;
            var nic;

            for (var k in JSONObject) {

                customer_id = JSONObject[k]["customer_id"];
                fname = JSONObject[k]["fname"];
                lname = JSONObject[k]["lname"];
                nic = JSONObject[k]["nic"];

                document.getElementById("Customer_data").innerHTML = "<option value=" + customer_id + ">" + customer_id + " " + "(" + fname + " " + lname + " " + nic + ")" + "</option>";

            }

        }, 'text');

    }

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

    function get_cost_price() {

        var url = "../Stock_controller/get_mesure_value";

        var unit_type = document.getElementById("unit_type").value;
        var unit_price = document.getElementById("unit_price").value;

        var quantity = document.getElementById("quantity").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {unit_type: unit_type}, function (response) {

            var cost_price = unit_price * 1 * quantity * 1;
            var price = cost_price * 1 / response * 1;

            document.getElementById("price").innerHTML = price;
            // document.getElementById("sub_price").value = price;

        }, 'text');

    }

    function load_supplier() {

        var url = "../Profile_controller/get_supplier_data";

        var supplier = document.getElementById("supplier").value;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {supplier: supplier}, function (response) {

            console.log(response);
            var JSONObject = JSON.parse(response);

            var supplier_code;
            var surname;
            var fname;
            var lname;
            var nic;

            for (var k in JSONObject) {

                supplier_code = JSONObject[k]["supplier_id"];
                fname = JSONObject[k]["fname"];
                lname = JSONObject[k]["lname"];
                nic = JSONObject[k]["nic"];

                document.getElementById("supplier_data").innerHTML = "<option value=" + supplier_code + ">" + supplier_code + " " + "(" + fname + " " + lname + " " + nic + ")" + "</option>";

            }

        }, 'text');

    }


    function item_add_cart() {

        var table = document.getElementById("item_table").innerHTML;

        var item_code = document.getElementById("item_code").innerHTML;
        var bill_name = document.getElementById("bill_name").innerHTML;
        var unit_price = document.getElementById("unit_price").value;

        var quantity = document.getElementById("quantity").value;

        var unit_type = document.getElementById("unit_type").value;
        var discount = document.getElementById("discount").value;

        var Total = document.getElementById("price").innerHTML;

        var dis_count_dive = Total * 1 / 100;
        var discount_price = dis_count_dive * 1 * discount * 1;

        Total = Total * 1 - discount_price * 1;

        var url = "../Stock_controller/get_mesure_value";
        var mesure_quantity;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {unit_type: unit_type}, function (response) {

            mesure_quantity = quantity * 1 / response * 1;
            get_stock_has_available(item_code, mesure_quantity, discount_price, Total, unit_price, bill_name);

        }, 'text');

    }

    function get_stock_has_available(item_code, mesure_quantity, discount_price, Total, unit_price, bill_name) {

        var table = document.getElementById("item_table").innerHTML;

        var url = "../Stock_controller/get_stock_has_available_for_order_invoice";

        var item_code = item_code;
        var mesure_quantity = mesure_quantity;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {item_code: item_code, mesure_quantity: mesure_quantity}, function (response) {

            if (response !== 'Not enough') {

                console.log("call method");

                table = table + "<tr><td>" + item_code + "</td><td>" + bill_name + "</td><td>" + unit_price + "</td><td>" + mesure_quantity + "</td><td>" + discount_price + "</td><td>" + Total + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-danger btn-round\" value=\"Remove\" onclick=\"deleteRow(this)\"/>" + "</td></tr>";
                document.getElementById("item_table").innerHTML = table;

                clear();
                // Full get Total...............................................................................................

                var total_all = document.getElementById("total_all").innerHTML;
                var Full_Total = Total * 1 + total_all * 1;

                document.getElementById("total_all").innerHTML = Full_Total;

                load_stock();

            } else {

                new PNotify({
                    title: 'Oh No!',
                    text: 'Not enough Quantity.',
                    type: 'error',
                    styling: 'bootstrap3'
                });

            }

        }, 'text');

    }

    function deleteRow(btn) {

        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        var T_total = row.cells[5].innerHTML;

        var total_all = document.getElementById("total_all").innerHTML;

        var Total = total_all * 1 - T_total * 1;

        document.getElementById("total_all").innerHTML = Total;

        // Get Update  Itme Quty Stock ......................................................................

        var url = "../Stock_controller/remove_item_update_stock_has_available_quantity";

        var item_code=row.cells[0].innerHTML;
        var quantity=row.cells[3].innerHTML;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {item_code: item_code, quantity: quantity}, function (response) {

        }, 'text');

        console.log(T_total);

    }

    function clear() {

        document.getElementById("item_code").innerHTML = "";
        document.getElementById("bill_name").innerHTML = "";
        document.getElementById("unit_price").value = "";
        document.getElementById("quantity").value = "";
        document.getElementById("price").innerHTML = "";

    }


    var datatable_stock;

    function load_stock() {

        var url = "../Stock_controller/stock_load_for_table";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            console.log(response);

            var JSONObject = JSON.parse(response);

            datatable_stock = $('#datatable-buttons').DataTable({

                destroy: true,
                data: JSONObject,
                columns: [

                    {data: 'item_code', title: 'Item'},
                    {data: 'bill_name', title: 'Bill Name'},
                    {data: 'quantity', title: 'Qty'},

                ]

            });

        }, 'text');

    }


    $('#datatable-buttons tbody').on('click', 'tr', function () {

        var data = datatable_stock.row(this).data();

        document.getElementById("item_code").innerHTML = data['item_code'];
        document.getElementById("bill_name").innerHTML = data['bill_name'];
        document.getElementById("unit_price").value = data['retail_price'];

        measure_type(data['item_code']);

    });


    function measure_type(item_code) {

        var url = "../Stock_controller/load_sub_mesure_for_item";

        var item_code = item_code;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {item_code: item_code}, function (response) {


            var JSONObject = JSON.parse(response);

            var mesure_type;
            var mesure_value;
            var option = "";

            for (var k in JSONObject) {

                mesure_type = JSONObject[k]["mesure_type"];
                mesure_value = JSONObject[k]["mesure_value"];
                option = option + "<option>" + mesure_type + "</option>";

            }

            document.getElementById("unit_type").innerHTML = option;

        }, 'text');

    }

    $(document).ready(function () {

        $('#save').click(function () {

            var table_data = [];

            $('#item_table tr').each(function (row, tr) {

                // Create an Array again to store all the data per row..................................................

                // get only the data with value.........................................................................

                if ($(tr).find('td:eq(0)').text() !== "") {

                    var sub = {
                        'item_code': $(tr).find('td:eq(0)').text(),
                        'bill_name': $(tr).find('td:eq(1)').text(),
                        'price': $(tr).find('td:eq(2)').text(),
                        'quantity': $(tr).find('td:eq(3)').text(),
                        'discount': $(tr).find('td:eq(4)').text(),
                        'total': $(tr).find('td:eq(5)').text(),
                    };
                    table_data.push(sub);
                } else {
                    console.log("No table data");
                }

            });

            // convert json and pass ....

            if (table_data.length !== 0) {

                var url = "../Customer_order_management_controller/Customer_order_management_insert";

                var Jsonobject = JSON.stringify(table_data);

                var full_total = document.getElementById("total_all").innerHTML;
                var Customer = document.getElementById("Customer").value;
                var distributor = document.getElementById("distributor").value;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {

                        datatable: Jsonobject,
                        net_total: full_total,
                        Customer: Customer,
                        distributor: distributor,

                    },
                    success: function (response) {

                        document.getElementById('item_table').innerHTML = "";
                        document.getElementById('distributor').value = "";
                        document.getElementById('Customer').value = "";
                        document.getElementById('discount').value = "";
                        document.getElementById('total_all').innerHTML = "";


                    },

                });

            } else {

            }

        });

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

    $(document).ready(function () {
        $('.ui-pnotify').remove();
    });

</script>