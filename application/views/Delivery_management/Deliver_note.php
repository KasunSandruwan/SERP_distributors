<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Delivery Note
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

                        <div class="col-md-6 col-sm-6 col-lg-6" style="border-right:1px solid #E6E9ED;">

                            <div class="col-md-12 col-sm-12 col-lg-12">

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Invoice ID :
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input list="invoice_data" id="invoice_id" onkeyup="load_invoice();"
                                               onchange="load_invoice_order();"
                                               name="invoice_id"
                                               class="form-control"/>
                                        <datalist id="invoice_data">
                                        </datalist>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Asset ID :
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="asset" name="asset" class="form-control">
                                            <option>Choose Asset</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Driver Code :
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input list="driver_code_data" id="driver_code"
                                               onkeyup="load_Driver();"
                                               name="driver_code"
                                               class="form-control"/>
                                        <datalist id="driver_code_data">
                                        </datalist>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="start-millage">Start
                                        Millage</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="start_millage" name="start_millage"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3">Delivery Date</label>

                                    <div class="col-md-6 col-sm-6">
                                        DD.MM.YYYY
                                        <div class='input-group date' id='myDatepicker'>
                                            <input type='text' id="delivery_date"
                                                   name="delivery_date" class="form-control"/>
                                            <span class="input-group-addon">
                                                    <span class="glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Item Code Code
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
                                        <input id="quantity" name="quantity" onchange="get_cost_price()"
                                               onkeyup="get_cost_price()"
                                               class="form-control"/>

                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <select id="unit_type" onchange="get_cost_price()" name="unit_type"
                                                class="form-control">
                                            <option>Unit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Discount
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="discount" name="discount" readonly class="form-control "/>
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
                                    <label for="description" class="control-label col-md-3 col-sm-3">Sub Price
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="sub_price" name="sub_price" class="form-control"/>
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


                        </div>

                        <div class="col-md-6 col-sm-6">

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

                        <div class="col-md-6 col-sm-6" style="border-top:1px solid #E6E9ED;">

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
                            <div class="col-md-6 col-sm-6 ">
                                <button type="button" id="save" onclick="printElem('order_invoice_print')"
                                        class="btn btn-success btn-round">Deliver
                                </button>
                            </div>

                        </div>

                    </form>


                    <div style="margin-left:55px;" hidden id="order_invoice_print">

                        <table border="1">
                            <thead>

                            </thead>
                            <tbody id="content_print">

                            <tr>
                                <td colspan="2" style="text-align: center; ">
                                    <h1>Order Invoice</h1>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>


                </div>

            </div>
        </div>

    </div>

</div>

<script>

    init_DataTables();
    load_asset();

    $('#myDatepicker').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    function printElem(divId) {
        var content = document.getElementById(divId).innerHTML;
        var mywindow = window.open('', 'Print', 'height=600,width=800');
        // var mywindow = window.open();

        mywindow.document.write('<html><head><title>Print</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(content);
        mywindow.document.write('</body></html>');

        mywindow.document.close();
        mywindow.focus()
        mywindow.print();
        mywindow.close();
        return true;
    }


    function load_invoice_order() {

        var url = "../Invoice_controller/load_invoice_has_stock_description";
        var invoice_id = document.getElementById("invoice_id").value;

        $.ajaxSetup({cache: false});
        $.post(url, {invoice_id: invoice_id}, function (response) {

            if (response !== 'No_Data') {

                var JSONObject = JSON.parse(response);

                var item_code;
                var bill_name;
                var price;
                var quantity;
                var discount;
                var total_amount;
                var table = "";

                var total_all = document.getElementById("total_all").innerHTML;

                var Total = 0;

                for (var k in JSONObject) {

                    item_code = JSONObject[k]["item_code"];
                    bill_name = JSONObject[k]["bill_name"];
                    price = JSONObject[k]["price"];
                    quantity = JSONObject[k]["quantity"];
                    discount = JSONObject[k]["discount"];
                    total_amount = JSONObject[k]["total_amount"];

                    table = table + "<tr><td>" + item_code + "</td><td>" + bill_name + "</td><td>" + price + "</td><td>" + quantity + "</td><td>" + discount + "</td><td>" + total_amount + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-danger btn-round\" value=\"Remove\" onclick=\"deleteRow(this)\"/>" + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-success btn-round\" value=\"Update\" onclick=\"updateRow(this)\"/>" + "</td></tr>";
                    Total = total_all * 1 + total_amount * 1;

                }

                document.getElementById("item_table").innerHTML = table;
                document.getElementById("total_all").innerHTML = Total;

            }

        }, 'text');

    }


    function get_cost_price() {

        var url = "../Stock_controller/get_mesure_value";

        var unit_type = document.getElementById("unit_type").value;

        var unit_price = document.getElementById("unit_price").value;
        var quantity = document.getElementById("quantity").value;
        var discount = document.getElementById("discount").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {unit_type: unit_type}, function (response) {

            var cost_price = unit_price * 1 * quantity * 1;
            var price = cost_price * 1 / response * 1;

            var dis_count_dive = price * 1 / 100;
            var discount_price = dis_count_dive * 1 * discount * 1;

            var sub_price = price * 1 - discount_price * 1;

            document.getElementById("sub_price").value = sub_price;
            document.getElementById("price").innerHTML = price;


        }, 'text');

    }

    function load_asset() {

        var url = "../Customer_order_management_controller/load_asset";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var asset_name;
            var option = "";

            for (var k in JSONObject) {

                asset_name = JSONObject[k]["asset_name"];
                option = option + "<option>" + asset_name + "</option>";

            }
            document.getElementById("asset").innerHTML = option;

        }, 'text');

    }


    function item_add_cart() {

        var item_code = document.getElementById("item_code").innerHTML;
        var bill_name = document.getElementById("bill_name").innerHTML;
        var price = document.getElementById("price").innerHTML;


        var unit_price = document.getElementById("unit_price").value;

        var quantity = document.getElementById("quantity").value;
        var discount = document.getElementById("discount").value;
        var unit_type = document.getElementById("unit_type").value;

        var Total = document.getElementById("sub_price").value;

        // Calculation part  Total Price get discount and free quantity ................................................

        var dis_count_dive = price * 1 / 100;

        var discount_price = dis_count_dive * 1 * discount * 1;

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

                table = table + "<tr><td>" + item_code + "</td><td>" + bill_name + "</td><td>" + unit_price + "</td><td>" + mesure_quantity + "</td><td>" + discount_price + "</td><td>" + Total + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-danger btn-round\" value=\"Remove\" onclick=\"deleteRow(this)\"/>" + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-success btn-round\" value=\"Update\" onclick=\"updateRow(this)\"/>" + "</td></tr>";
                document.getElementById("item_table").innerHTML = table;

                clear();
                // Full get Total...............................................................................................

                var total_all = document.getElementById("total_all").innerHTML;

                var Full_Total = Total * 1 + total_all * 1;

                document.getElementById("total_all").innerHTML = Full_Total;


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

    function updateRow(btn) {

        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        var itme_code = row.cells[0].innerHTML;
        var bill_name = row.cells[1].innerHTML;
        var unit_price = row.cells[2].innerHTML;
        var quantity = row.cells[3].innerHTML;

        var discount = row.cells[4].innerHTML;
        var total = row.cells[5].innerHTML;

        // get discount range ..........................................................................................

        var f_total = total * 1 + discount * 1;

        var d_dive = discount * 1 / f_total * 1;

        var discount_percentage = d_dive * 1 * 100;

        document.getElementById('item_code').innerHTML = itme_code;
        document.getElementById('bill_name').innerHTML = bill_name;

        document.getElementById('unit_price').value = unit_price;
        document.getElementById('quantity').value = quantity;
        document.getElementById('discount').value = discount_percentage;

        var total_all = document.getElementById("total_all").innerHTML;

        var Total = total_all * 1 - total * 1;

        document.getElementById("total_all").innerHTML = Total;

        measure_type(itme_code);

    }

    function deleteRow(btn) {

        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        var T_total = row.cells[5].innerHTML;

        var total_all = document.getElementById("total_all").innerHTML;

        var Total = total_all * 1 - T_total * 1;

        document.getElementById("total_all").innerHTML = Total;


        var url = "../Stock_controller/remove_item_update_stock_has_available_quantity";

        var item_code = row.cells[0].innerHTML;
        var quantity = row.cells[3].innerHTML;

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
        document.getElementById("discount").value = "";
        document.getElementById("price").innerHTML = "";
        document.getElementById("sub_price").value = "";

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

    function load_invoice() {

        var url = "../Invoice_controller/like_search_invoice";

        var invoice_id = document.getElementById("invoice_id").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {invoice_id: invoice_id}, function (response) {
            // console.log(response);
            var JSONObject = JSON.parse(response);

            var invoice_code;
            var date;
            var time;
            var option = "";

            for (var k in JSONObject) {

                invoice_code = JSONObject[k]["invoice_code"];
                date = JSONObject[k]["date"];
                time = JSONObject[k]["time"];
                option = option + "<option value=" + invoice_code + ">" + invoice_code + " " + "( Date - " + date + " Time - " + time + " )" + "</option>";

            }

            document.getElementById("invoice_data").innerHTML = option;

        }, 'text');

    }

    function load_Driver() {

        var url = "../Profile_controller/get_driver_data";

        var driver_code = document.getElementById("driver_code").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {driver_code: driver_code}, function (response) {

            console.log(response);
            var JSONObject = JSON.parse(response);

            var driver_code;
            var surname;
            var fname;
            var lname;
            var nic;

            for (var k in JSONObject) {

                driver_code = JSONObject[k]["driver_code"];
                fname = JSONObject[k]["fname"];
                lname = JSONObject[k]["lname"];
                nic = JSONObject[k]["nic"];

                document.getElementById("distributor_data").innerHTML = "<option value=" + driver_code + ">" + driver_code + " " + "(" + fname + " " + lname + " " + nic + ")" + "</option>";

            }

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

              // convert json and pass .................................................................................

            if (table_data.length !== 0) {

                var url = "../Delivery_management_controller/insert_delivery_note";

                var Jsonobject = JSON.stringify(table_data);

                var full_total = document.getElementById("total_all").innerHTML;
                var invoice_id = document.getElementById("invoice_id").value;
                var asset = document.getElementById("asset").value;
                var driver_code = document.getElementById("driver_code").value;
                var start_millage = document.getElementById("start_millage").value;
                var delivery_date = document.getElementById("delivery_date").value;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {

                        datatable: Jsonobject,
                        net_total: full_total,
                        invoice_id: invoice_id,
                        asset: asset,
                        driver_code: driver_code,
                        start_millage: start_millage,
                        delivery_date: delivery_date,

                    },
                    success: function (response) {

                        console.log("Out Put Error -" + response);

                    },

                });

                // console.log(table_data);
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