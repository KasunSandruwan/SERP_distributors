<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Service Category Mange
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

                    <form id="save_service_category" class="form-horizontal form-label-left">


                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3" for="Service Category">Service Category
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="service_category" name="service_category"
                                       class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="service_category_save()">
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-md-12 col-sm-12">

                                <table class="table table-striped table-responsive">
                                    <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Service Category</th>


                                    </tr>
                                    </thead>
                                    <tbody id="service_category_table">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </form>


                </div>

            </div>
        </div>


        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Service Manage
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

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Service Category
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="service_category_select" name="service_category_select"
                                        class="form-control">
                                    <option>Choose Service Category</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label col-md-3 col-sm-3">Service
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input list="service_data" id="service" name="service" onkeyup="Search_service();"
                                       onchange="getservice_price();" class="form-control"/>
                                <datalist id="service_data">
                                </datalist>

                            </div>
                        </div>


                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Price
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="Price" name="Price" class="form-control col-md-7 col-xs-12">

                            </div>

                            <label>RS</label>

                        </div>

                        <div class="form-group">

                            <div class="col-md-12 col-sm-12">

                                <table class="table table-striped table-responsive">
                                    <thead>

                                    <tr>
                                        <th>Item</th>
                                        <th>Bill Name</th>
                                        <th>Qty</th>
                                        <th>Service</th>
                                        <th>Price</th>

                                    </tr>
                                    </thead>
                                    <tbody id="service_table">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </form>


                </div>

            </div>
        </div>


        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Stock Items
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

                            <table id="datatable-buttons" class="table table-striped table-responsive">
                                <thead>

                                <tr>
                                    <th>Item</th>
                                    <th>Item Description</th>
                                    <th>Qty</th>
                                    <th>Cost Price</th>
                                    <th>Wholesale Price</th>
                                    <th>Retail Price</th>
                                    <th>Barcode</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Bill Name</th>

                                </tr>
                                </thead>
                                <tbody id="stock_table">

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="form-horizontal form-label-left">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- Small modal -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Service for Item Add</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="item_code">Item Code
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" readonly="readonly" id="item_code_modal"
                                                           name="item_code_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="issued_date">Bill
                                                    Name
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="bill_name_modal" name="bill_name_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3"
                                                       for="qualification-type-select">Unit
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <select id="unit" name="unit"
                                                            class="form-control">
                                                        <option>Choose Unit</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="issued_date">Quantity
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="Quantity_modal" name="Quantity_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" onclick="add_items_for_service()"
                                                    class="btn btn-primary">Add
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /modals -->
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

<script>

    init_DataTables();


    load_stock();
    service_category_for_table();
    load_service_category_select();

    function service_category_save() {

        var url = "../Stock_controller/service_category_save";
        var service_category = document.getElementById("service_category").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {
            service_category: service_category,
        }, function (response) {

            new PNotify({
                title: 'Success',
                text: 'Item Add...... !',
                type: 'success',
                styling: 'bootstrap3'
            });

            document.getElementById("service_category").value = "";
            service_category_for_table();
            load_service_category_select();

        }, 'text');

    }


    function service_category_for_table() {

        var url = "../Stock_controller/all_search_service_category";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No_Data') {

                var JSONObject = JSON.parse(response);

                var id;
                var service_category;
                var table = "";

                for (var k in JSONObject) {

                    id = JSONObject[k]["idservice_category"];

                    service_category = JSONObject[k]["service_category"];
                    table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + service_category + "</td></tr>";
                }

                document.getElementById("service_category_table").innerHTML = table;

            }

        }, 'text');


    }

    function load_service_category_select() {

        var url = "../Stock_controller/all_search_service_category";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No_Data') {

                var option = "";

                var JSONObject = JSON.parse(response);

                var id;
                var service_category;

                for (var k in JSONObject) {

                    id = JSONObject[k]["idservice_category"];

                    service_category = JSONObject[k]["service_category"];
                    option = option + "<option>" + service_category + "</option>";
                }

                document.getElementById("service_category_select").innerHTML = option;

            }

        }, 'text');

    }


    function add_items_for_service() {

        var url = "../Stock_controller/add_items_for_service";

        var service = document.getElementById("service").value;
        var Price = document.getElementById("Price").value;
        var service_category = document.getElementById("service_category_select").value;

        var item_code_modal = document.getElementById("item_code_modal").value;
        var bill_name_modal = document.getElementById("bill_name_modal").value;
        var unit_type = document.getElementById("unit").value;
        var Quantity_modal = document.getElementById("Quantity_modal").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {
            service: service,
            Price: Price,
            service_category: service_category,

            item_code_modal: item_code_modal,
            bill_name_modal: bill_name_modal,
            unit_type: unit_type,
            Quantity_modal: Quantity_modal

        }, function (response) {

            new PNotify({
                title: 'Success',
                text: 'Item Add...... !',
                type: 'success',
                styling: 'bootstrap3'
            });

            document.getElementById("Quantity_modal").value = "";
            document.getElementById("close_modal").click();
            getservice_price();

        }, 'text');

    }

    function getservice_price() {

        var url = "../Stock_controller/where_search_service_type";
        var service = document.getElementById("service").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {service: service}, function (response) {

            console.log("................" + response);

            if (response !== "false") {

                var JSONObject = JSON.parse(response);

                var item_code;
                var bill_name;
                var qty;
                var service;
                var price;
                var table = "";

                for (var k in JSONObject) {

                    item_code = JSONObject[k]["item_code"];
                    bill_name = JSONObject[k]["bill_name"];
                    qty = JSONObject[k]["qty"];
                    service = JSONObject[k]["service"];
                    price = JSONObject[k]["price"];

                    table = table + "<tr><td>" + item_code + "</td><td>" + bill_name + "</td><td>" + qty + "</td><td>" + service + "</td><td>" + price + "</td></tr>";


                }
                document.getElementById("service_table").innerHTML = table;
                document.getElementById("Price").value = price;

            } else {

                document.getElementById("Price").value = "0";
            }


        }, 'text');


    }


    function Search_service() {


        var url = "../Stock_controller/search_service_type";

        var service = document.getElementById("service").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {service: service}, function (response) {

            var JSONObject = JSON.parse(response);

            var option = "";
            var service_type;

            for (var k in JSONObject) {

                service_type = JSONObject[k]["service_type"];
                option = option + "<option>" + service_type + "</option>";

            }

            document.getElementById("service_data").innerHTML = option;

        }, 'text');

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

                'createdRow': function (row, data, dataIndex) {
                    $(row).attr({'data-toggle': 'modal', 'data-target': '.bs-example-modal-lg'});

                },

                "order": [],
                "columnDefs": [

                    {
                        "targets": 'no-sort',
                        "orderable": false,
                    },
                    {
                        "targets": [0],
                        "visible": true,
                        "searchable": true
                    }
                ],

                destroy: true,
                data: JSONObject,
                columns: [
                    {data: 'item_code', title: 'Item'},
                    {data: 'description', title: 'Item Description'},
                    {data: 'quantity', title: 'Qty'},
                    {data: 'cost_price', title: 'Cost PPrice'},
                    {data: 'wholesale_price', title: 'Wholesale rice'},
                    {data: 'retail_price', title: 'Retail Price'},
                    {data: 'barcode', title: 'Barcode'},
                    {data: 'category', title: 'Category'},
                    {data: 'type', title: 'Type'},
                    {data: 'bill_name', title: 'Bill Name'},

                ]

            });

        }, 'text');

    }

    function get_sub_mesure(data) {


        var url = "../Stock_controller/get_sub_mesure";

        var unit_typ = data;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {unit_typ: unit_typ}, function (response) {

            var JSONObject = JSON.parse(response);

            var option = "";
            var mesure;

            for (var k in JSONObject) {

                mesure = JSONObject[k]["mesure"];
                option = option + "<option>" + mesure + "</option>";


            }

            document.getElementById("unit").innerHTML = option;

        }, 'text');


    }


    $('#datatable-buttons tbody').on('click', 'tr', function () {
        // console.log( table.row( 0 ).data());
        var data = datatable_stock.row(this).data();
        console.log("................Item Code - " + data['item_code']);

        document.getElementById("item_code_modal").value = data['item_code'];
        document.getElementById("bill_name_modal").value = data['bill_name'];
        get_sub_mesure(data['type']);

        // console.log(Object.values(data));
        // dataTable_model_set_value(data);

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


    // load stock update   for modal ...................................................................................


</script>


<!-- /page content -->







