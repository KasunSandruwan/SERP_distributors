<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Purchase Order
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

                        <div class="col-md-3 col-sm-3" style="border-right:1px solid #E6E9ED;">

                            <div class="form-group">

                                <div class="col-md-12 col-sm-12">

                                    <label for="description" class="control-label col-md-3 col-sm-3">
                                        Item
                                        <input type="radio" name="type" id="Item" value="Item" checked
                                               onchange="item_type()"/>
                                    </label>

                                    <label for="description" class="control-label col-md-3 col-sm-3">
                                        Service
                                        <input type="radio" name="type" id="Service" value="Service"
                                               onchange="item_type()"/>
                                    </label>

                                </div>

                            </div>

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
                                    <label for="description" class="control-label col-md-3 col-sm-3">Item Code / Service
                                        Code
                                        : </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="item_code" name="item_code" class="form-control"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Bill Name / Service
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

                                <!--                                <div class="form-group">-->
                                <!--                                    <label for="description" class="control-label col-md-3 col-sm-3">Sub Price-->
                                <!--                                    </label>-->
                                <!--                                    <div class="col-md-6 col-sm-6">-->
                                <!--                                        <input id="sub_price" name="sub_price" class="form-control"/>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->


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
                                        <th>Type</th>
                                        <th>Item</th>
                                        <th>Bill Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
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

                        </div>

                        <div class="col-md-3 col-sm-3">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3" for="Branch"> Branch
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select  id="branch" name="branch"
                                            class="form-control">
                                        <option>Choose Branch</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Order Type
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="order_type" name="order_type"
                                            class="form-control">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Supplier
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input list="supplier_data" id="supplier" onkeyup="load_supplier();" name="supplier"
                                           class="form-control"/>
                                    <datalist id="supplier_data">
                                    </datalist>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3"></label>
                                <div class="col-md-6 col-sm-6 ">
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
    item_type();
    load_order_type();
    load_branch();

    // $('#single_cal').daterangepicker({
    //     singleDatePicker: true,
    //     singleClasses: "picker_3"
    // }, function (start, end, label) {
    //     console.log(start.toISOString(), end.toISOString(), label);
    // });


    function load_branch() {

        var url = "../Employee_controller/serch_branchall";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var option = document.getElementById("branch").innerHTML;

            var branch_code;
            var branch_name;

            for (var k in JSONObject) {

                branch_name = JSONObject[k]["branch_name"];
                option = option + "<option>" + branch_name + "</option>";

            }

            document.getElementById("branch").innerHTML = option;

        }, 'text');

    }

    function load_order_type() {

        var url = "../Order_management_controller/load_order_type";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var id;
            var order_type;
            var option = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];
                order_type = JSONObject[k]["order_type"];

                option = option + "<option>" + order_type + "</option>";

            }

            document.getElementById("order_type").innerHTML = option;

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


    function item_type() {

        if (document.getElementById("Item").checked) {

            load_stock();
            console.log("Select Typ-" + document.getElementById("Item").value);

        } else {

            load_service();
            console.log("Select Typ-" + document.getElementById("Service").value);

        }

    }


    function load_service() {

        var url = "../Stock_controller/service_load_for_table";

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

                    {data: 'Services', title: 'ID'},
                    {data: 'service_type', title: 'Services'},
                    {data: 'price', title: 'Price'},

                ]

            });

        }, 'text');

    }


    function item_add_cart() {

        var table = document.getElementById("item_table").innerHTML;

        var item_code = document.getElementById("item_code").innerHTML;
        var bill_name = document.getElementById("bill_name").innerHTML;
        var unit_price = document.getElementById("unit_price").value;

        var quantity = document.getElementById("quantity").value;

        var unit_type = document.getElementById("unit_type").value;

        var Total = document.getElementById("price").innerHTML;


        // Get type.....................................................................................................

        var type;

        if (document.getElementById("Item").checked) {
            type = document.getElementById("Item").value;
        } else {
            type = document.getElementById("Service").value;
        }

        var url = "../Stock_controller/get_mesure_value";
        var mesure_quantity;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {unit_type: unit_type}, function (response) {


            mesure_quantity = quantity * 1 / response * 1;

            table = table + "<tr><td>" + type + "</td><td>" + item_code + "</td><td>" + bill_name + "</td><td>" + unit_price + "</td><td>" + mesure_quantity + "</td><td>" + Total + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-danger btn-round\" value=\"Remove\" onclick=\"deleteRow(this)\"/>" + "</td></tr>";
            document.getElementById("item_table").innerHTML = table;

            clear();
            // Full get Total...............................................................................................

            var total_all = document.getElementById("total_all").innerHTML;
            var Full_Total = Total * 1 + total_all * 1;

            document.getElementById("total_all").innerHTML = Full_Total;

        }, 'text');

    }

    function deleteRow(btn) {

        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        var T_total = row.cells[5].innerHTML;

        var total_all = document.getElementById("total_all").innerHTML;

        var Total = total_all * 1 - T_total * 1;

        document.getElementById("total_all").innerHTML = Total;

        document.getElementById("amount").value = Total;

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

        if (document.getElementById("Item").checked) {

            document.getElementById("item_code").innerHTML = data['item_code'];
            document.getElementById("bill_name").innerHTML = data['bill_name'];
            document.getElementById("unit_price").value = data['retail_price'];

            measure_type(data['item_code']);


        } else {

            document.getElementById("item_code").innerHTML = data['Services'];
            document.getElementById("bill_name").innerHTML = data['service_type'];
            document.getElementById("unit_price").value = data['price'];

            service_mesure();

        }


    });

    function service_mesure() {

        document.getElementById("unit_type").innerHTML = "<option>" + "Unit" + "</option>";
    }

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
                        'type': $(tr).find('td:eq(0)').text(),
                        'item_code': $(tr).find('td:eq(1)').text(),
                        'bill_name': $(tr).find('td:eq(2)').text(),
                        'price': $(tr).find('td:eq(3)').text(),
                        'quantity': $(tr).find('td:eq(4)').text(),
                        'total': $(tr).find('td:eq(5)').text(),
                    };
                    table_data.push(sub);
                } else {
                    console.log("No table data");
                }

            });

            // convert json and pass ....

            if (table_data.length !== 0) {

                var url = "../Order_management_controller/order_insert";

                var Jsonobject = JSON.stringify(table_data);

                var full_total = document.getElementById("total_all").innerHTML;

                var supplier = document.getElementById("supplier").value;
                var order_type = document.getElementById("order_type").value;
                var branch= document.getElementById("branch").value;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        datatable: Jsonobject,
                        net_total: full_total,
                        order_type: order_type,
                        supplier: supplier,
                        branch:branch

                    },
                    success: function (response) {

                        // if(response === "true"){

                            document.getElementById("total_all").innerHTML = "";
                            document.getElementById("item_table").innerHTML = "";
                            document.getElementById("supplier").value= "";

                            document.getElementById("branch").innerHTML="<option>"+"Choose Branch"+"</option>";
                            load_branch();

                        // }

                        console.log(response);


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