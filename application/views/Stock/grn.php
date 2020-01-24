<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>GRN Manage
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

                            <div  class="form-group">
                                <label class="control-label col-md-3 col-sm-3" for="Branch">GRN Type
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="grn_type" onchange="check_grn_type()" name="grn_type" class="form-control">
                                        <option>Choose GRN Type</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3" for="Branch"> Branch
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="branch" onchange="load_order();" name="branch" class="form-control">
                                        <option>Choose Branch</option>
                                    </select>
                                </div>
                            </div>

                            <div id="order_visible" hidden class="form-group" >
                                <label class="control-label col-md-3 col-sm-3" for="Branch">Order ID
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="order_id" onchange="load_stock_purchase();" name="order_id"
                                            class="form-control">
                                        <option>Choose Order</option>
                                    </select>
                                </div>
                            </div>


                            <div style="margin-top:50px" class="form-group">

                                <div class="col-md-12 col-sm-12">

                                    <table id="datatable-buttons" class="table table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-6" style="
                        border-right:1px solid #E6E9ED;">

                            <div class="col-md-12 col-sm-12 col-lg-12">

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Item Code
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
                                    <label for="description" class="control-label col-md-3 col-sm-3">Quantity : </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="quantity_label" name="quantity_label" class="form-control"></label>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Retail Price
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="retail_price" name="retail_price" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Cost Price
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="cost_price" name="cost_price" class="form-control"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Whole Sale Price
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="whole_sale_price" name="whole_sale_price" class="form-control"/>
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-6 col-sm-6 col-lg-6">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3">Expire Date
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="col-md-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="single_cal"
                                                   name="expire_date" placeholder="Expire Date"
                                                   aria-describedby="inputSuccess2Status3">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                            <span class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Received Quantity
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="quantity" name="quantity" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Free Quantity
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="free_quantity" name="free_quantity" class="form-control"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Discount
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="discount" name="discount" class="form-control"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3"></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <button type="button" onclick="item_add_stock();"
                                                class="btn btn-success btn-round">Add
                                        </button>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-sm-12">

                                <table class="table table-striped table-responsive">
                                    <thead>

                                    <tr>
                                        <th>Order ID</th>
                                        <th>Item</th>
                                        <th>Bill Name</th>
                                        <th>Expire Date</th>
                                        <th>Whole Sale Price</th>
                                        <th>Retail Price</th>
                                        <th>Cost Price</th>
                                        <th>Received Qty</th>
                                        <th>Free Qty</th>
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

                        </div>

                        <div class="col-md-3 col-sm-3">

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
                                <label class="control-label col-md-3 col-sm-3"
                                       for="qualification-type-select">Payment Method
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="payment_method" onchange="payment_method_check()" name="payment_method"
                                            class="form-control">
                                        <option>Choose Payment Method</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Amount
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="amount" name="amount" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Balance
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="balance" name="balance" onkeyup="get_Total_due()" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Total Due
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="total_due" name="total_due" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3"></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <button type="button" id="save" class="btn btn-success btn-round">Generate GRN
                                    </button>
                                </div>
                            </div>


                        </div>


                        <!--Payment method Model............................................................................ -->

                        <input id="card_payment_button" class="hidden" type="button" data-toggle="modal"
                               data-target=".bs-example-modal-lg"/>

                        <div class="form-horizontal form-label-left">

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- Small modal -->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2"></h4>
                                            </div>
                                            <div class="modal-body">

                                                <!--............................................... ....................................................................-->

                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <div style="margin-left:150px; margin-top: 100px;">
                                                        <h1 style="margin-bottom:50px;"><i class="fa fa-lock"></i>
                                                            Secure Payment</h1>

                                                        <div style="margin-top: -30px; margin-bottom: 20px;">

                                                            <img id="visa" style=""
                                                                 src="<?php echo base_url(); ?>Icon/visa.png"
                                                                 alt="VISA cart"/>
                                                            <img id="master"
                                                                 src="<?php echo base_url(); ?>Icon/mastercard.png"
                                                                 alt="Master"/>
                                                            <img id="discover"
                                                                 src="<?php echo base_url(); ?>Icon/discover.png"
                                                                 alt="Discover"/>
                                                            <img id="american"
                                                                 src="<?php echo base_url(); ?>Icon/amex.png"
                                                                 alt="American Express"/>
                                                        </div>

                                                        <div class="form-group">

                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12"
                                                                       name="cardhname" id="cardhname"
                                                                       onkeypress="return isAlphabetcarts(this.event)"
                                                                       type="text" placeholder="Cardholder Name"/>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">

                                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                                <input class="form-control col-md-7 col-xs-12"
                                                                       name="cardnumber" id="cnuber"
                                                                       onkeydown="numberlenth(this.value, this.event)"
                                                                       type="text" placeholder="Card Number"/>

                                                            </div>

                                                            <!--                                                            onkeypress="return isNumber(this.event)"-->

                                                        </div>


                                                        <div class="form-group">

                                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                                    <input class="form-control" name="cardmonth"
                                                                           id="cartmon" onblur="checkmonth()"
                                                                           onkeyup="cartmonth(this.value)"

                                                                           maxlength="2"
                                                                           style="width:50px; margin-left: -10px;"
                                                                           type="text" placeholder="MM">
                                                                </div>

                                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                                    <input class="form-control" name="cardyear"
                                                                           id="cardyear" onkeyup="card_exp()"

                                                                           maxlength="2"
                                                                           style="width:50px; margin-left: -35px;"
                                                                           type="text" placeholder="YY">
                                                                    <span style="visibility:hidden; margin-left: 20px;"
                                                                          id="Expired">Expired...!</span>
                                                                </div>

                                                                <div class="col-md-3 col-sm-3 col-xs-6">

                                                                    <input class="form-control" name="cardcvc"
                                                                           id="cvcnumber" onkeyup="cvc(this.value)"

                                                                           style="width:100px; margin-left: 55px;"
                                                                           type="text" placeholder="CVC">

                                                                </div>


                                                            </div>


                                                        </div>

                                                        <input type="text" id="cardtype" hidden="hidden">


                                                    </div>


                                                </div>


                                                <!--...................................................................................................................-->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="close_modal" class="btn btn-default"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button" onclick="update_stock()"
                                                        class="btn btn-primary">Pay
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /modals -->
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
    load_payment_method();
    load_branch();

    load_stock();

    load_grn_type();


    $('#single_cal').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });


    function check_grn_type() {

        var grn_type= document.getElementById("grn_type").value;

        switch (grn_type) {

            case "Purchase Order" :

                document.getElementById('order_visible').removeAttribute("hidden");

                break;

            case "Manual":

                load_stock();
                document.getElementById('order_visible').setAttribute("hidden","");

                break;

        }


    }


    function load_grn_type() {

        var url = "../Order_management_controller/load_grn_type";
        document.getElementById("grn_type").innerHTML = "";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            var option = document.getElementById("grn_type").innerHTML;


            var JSONObject = JSON.parse(response);

            var grn_type;

            for (var k in JSONObject) {

                grn_type = JSONObject[k]["grn_type"];
                option = option + "<option>" + grn_type + "</option>";

            }

            document.getElementById("grn_type").innerHTML = option;

        }, 'text');

    }


    function load_order() {

        var url = "../Order_management_controller/load_order_has_branch";
        var branch = document.getElementById("branch").value;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {branch: branch}, function (response) {

            var option = document.getElementById("order_id").innerHTML;

            if (response !== 'No_Order') {

                var JSONObject = JSON.parse(response);

                var order_code;

                for (var k in JSONObject) {

                    order_code = JSONObject[k]["order_code"];
                    option = option + "<option>" + order_code + "</option>";

                }

                document.getElementById("order_id").innerHTML = option;

            } else {
                document.getElementById("order_id").innerHTML = "";
            }


        }, 'text');

    }

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


    function payment_method_check() {

        var Payment_method = document.getElementById("payment_method").value;

        switch (Payment_method) {

            case "Card" :
                document.getElementById("card_payment_button").click();
                break;

            case "Cheque":

                break;


        }


        console.log("Payment Method - " + document.getElementById("payment_method").value);

    }


    function load_payment_method() {

        var url = "../Stock_controller/load_payment_mode";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var payment_mode;
            var option = document.getElementById("payment_method").innerHTML;

            for (var k in JSONObject) {

                payment_mode = JSONObject[k]["payment_mode"];

                option = option + "<option>" + payment_mode + "</option>";

            }

            document.getElementById("payment_method").innerHTML = option;


        }, 'text');


    }


    function get_Total_due() {

        var amount = document.getElementById("amount").value;
        var balance = document.getElementById("balance").value;

        var Total_Due = amount * 1 - balance * 1;

        document.getElementById("total_due").value = Total_Due;

    }


    function item_add_stock() {

        var item_code = document.getElementById("item_code").innerHTML;
        var bill_name = document.getElementById("bill_name").innerHTML;

        var whole_sale_price = document.getElementById("whole_sale_price").value;
        var retail_price = document.getElementById("retail_price").value;


        var expire_date = document.getElementById("single_cal").value;


        var cost_price = document.getElementById("cost_price").value;


        var quantity = document.getElementById("quantity").value;
        var free_quantity = document.getElementById("free_quantity").value;

        var discount = document.getElementById("discount").value;

        var order_id = document.getElementById("order_id").value;

        var new_order_id;

        if(order_id ==='Choose Order'){

            new_order_id='No';

        }else {
            new_order_id=order_id;
        }

        // Calculation part  Total Price get discount and free quantity ................................................

        var re_quantity = quantity * 1 - free_quantity * 1;

        var tot = cost_price * 1 * re_quantity * 1;

        var dis_count_dive = tot * 1 / 100;

        var discount_price = dis_count_dive * 1 * discount * 1;

        //..............................................................................................................

        var Total = tot * 1 - discount_price * 1;


        var table = document.getElementById("item_table").innerHTML;

        table = table + "<tr><td>" + new_order_id + "</td><td>" + item_code + "</td><td>" + bill_name + "</td><td>" + expire_date + "</td><td>" + whole_sale_price + "</td><td>" + retail_price + "</td><td>" + cost_price + "</td><td>" + quantity + "</td><td>" + free_quantity + "</td><td>" + discount_price + "</td><td>" + Total + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-danger btn-round\" value=\"Remove\" onclick=\"deleteRow(this)\"/>" + "</td></tr>";

        document.getElementById("item_table").innerHTML = table;
        clear();

        // Full get Total...............................................................................................

        var total_all = document.getElementById("total_all").innerHTML;

        var Full_Total = Total * 1 + total_all * 1;

        document.getElementById("total_all").innerHTML = Full_Total;

        document.getElementById("amount").value = Full_Total;

    }

    function deleteRow(btn) {

        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        var T_total = row.cells[10].innerHTML;

        var total_all = document.getElementById("total_all").innerHTML;

        var Total = total_all * 1 - T_total * 1;

        document.getElementById("total_all").innerHTML = Total;

        document.getElementById("amount").value = Total;

        console.log(T_total);
    }

    function clear() {

        document.getElementById("item_code").innerHTML = "";
        document.getElementById("quantity_label").innerHTML = "";
        document.getElementById("bill_name").innerHTML = "";
        document.getElementById("whole_sale_price").value = "";
        document.getElementById("retail_price").value = "";
        document.getElementById("cost_price").value = "";
        document.getElementById("quantity").value = "";
        document.getElementById("free_quantity").value = "";
        document.getElementById("discount").value = "";


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



    var datatable_stock;

    function load_stock_purchase() {

        var url = "../Order_management_controller/purchase_order_stock_load_for_table";

        var order_id = document.getElementById("order_id").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {order_id: order_id}, function (response) {

            console.log(response);

            if (response !== "No-data") {

                var JSONObject = JSON.parse(response);

                datatable_stock = $('#datatable-buttons').DataTable({

                    destroy: true,
                    data: JSONObject,
                    columns: [

                        {data: 'item_code', title: 'Item'},
                        {data: 'description', title: 'Description'},
                        {data: 'quantity', title: 'Qty'},

                    ]

                });

            }

        }, 'text');

    }

    $('#datatable-buttons tbody').on('click', 'tr', function () {
        // console.log( table.row( 0 ).data());
        var data = datatable_stock.row(this).data();

        document.getElementById("item_code").innerHTML = data['item_code'];
        document.getElementById("bill_name").innerHTML = data['bill_name'];
        document.getElementById("quantity_label").innerHTML = data['quantity'];

        document.getElementById("retail_price").value = data['retail_price'];
        document.getElementById("cost_price").value = data['cost_price'];
        document.getElementById("whole_sale_price").value = data['wholesale_price'];


        // console.log(Object.values(data));
        // dataTable_model_set_value(data);

    });


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

    $(document).ready(function () {

        $('#save').click(function () {

            var table_data = [];

            $('#item_table tr').each(function (row, tr) {

                // Create an Array again to store all the data per row..................................................

                // get only the data with value.........................................................................

                if ($(tr).find('td:eq(0)').text() !== "") {

                    var sub = {

                        'order_id': $(tr).find('td:eq(0)').text(),
                        'item_code': $(tr).find('td:eq(1)').text(),
                        'bill_name': $(tr).find('td:eq(2)').text(),
                        'expire_date': $(tr).find('td:eq(3)').text(),
                        'wholesale_price': $(tr).find('td:eq(4)').text(),
                        'retail_price': $(tr).find('td:eq(5)').text(),
                        'cost_price': $(tr).find('td:eq(6)').text(),
                        'Received_quantity': $(tr).find('td:eq(7)').text(),
                        'free_quantity': $(tr).find('td:eq(8)').text(),
                        'discount': $(tr).find('td:eq(9)').text(),
                        'total': $(tr).find('td:eq(10)').text(),
                    };
                    table_data.push(sub);
                } else {
                    console.log("No table data");
                }

            });

            // convert json and pass ....

            if (table_data.length !== 0) {

                var url = "../GRN_controller/grn_insert";

                var Jsonobject = JSON.stringify(table_data);

                var full_total = document.getElementById("total_all").innerHTML;
                var payment_method = document.getElementById("payment_method").value;
                var balance = document.getElementById("balance").value;
                var total_due = document.getElementById("total_due").value;

                var supplier = document.getElementById("supplier").value;
                var order_id = document.getElementById("order_id").value;
                var grn_type=  document.getElementById("grn_type").value;
                var branch=  document.getElementById("branch").value;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        datatable: Jsonobject,
                        net_total: full_total,
                        payment_method: payment_method,
                        balance: balance,
                        total_due: total_due,
                        supplier: supplier,
                        order_id: order_id,
                        grn_type:grn_type,
                        branch:branch
                    },
                    success: function (response) {

                        console.log(response);

                        document.getElementById("item_table").innerHTML = "";
                        document.getElementById("supplier").value = "";
                        document.getElementById("amount").value = "";
                        document.getElementById("balance").value = "";
                        document.getElementById("total_due").value = "";

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

</script>