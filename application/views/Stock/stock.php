<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Stock Manage
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
                                   for="qualification-type-select">Branch
                            </label>

                            <div class="col-md-6 col-sm-6">
                                <select id="branch" name="branch" class="form-control">
                                    <option>Choose Branch</option>
                                </select>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="item_code_model">Item Code
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <!--                                <input list="Item_Code_data" id="item_code" name="item_code"-->
                                <!--                                       class="form-control"/>-->
                                <!--                                <datalist id="Item_Code_data">-->
                                <!--                                </datalist>-->

                                <input type="text" id="item_code" name="item_code_model"
                                       class="form-control col-md-7 col-xs-12">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="item_name">Item name
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="item_name" name="item_name"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="barcode">Barcode
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="barcode" name="barcode"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Item Category
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="item_category" name="item_category" class="form-control">
                                    <option>Choose Category</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description" class="control-label col-md-3 col-sm-3">Description
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input list="Description_data" id="Description" name="Description"
                                       class="form-control"/>
                                <datalist id="Description_data">
                                </datalist>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Bill Name
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="bill_name" name="bill_name"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="type" name="type" class="form-control">
                                    <option>Choose Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Quantity
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="Quantity" name="Quantity"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Free
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="free" name="free" class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>


                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Retail Price
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="retail_price" name="retail_price"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                            <label>RS</label>

                        </div>

                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Cost Price
                            </label>

                            <div class="col-md-3 col-sm-3">

                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="Cost_Price_p" name="Cost_Price_p" onkeyup="get_cost_price()"
                                           class="form-control col-md-3 col-xs-6">

                                </div>

                                <label class="control-label col-md-3 col-sm-3" for="issued_date">%
                                </label>

                            </div>

                            <div class="col-md-3 col-sm-3">

                                <input type="text" id="Cost_Price" name="Cost_Price"
                                       class="form-control col-md-7 col-xs-12">

                            </div>
                            <label>RS</label>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Wholesale Price
                            </label>

                            <div class="col-md-3 col-sm-3">

                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="wholesale_price_p" name="wholesale_price_p"
                                           class="form-control col-md-7 col-xs-12" onkeyup="get_wholesale_price()">

                                </div>

                                <label class="control-label col-md-3 col-sm-3" for="issued_date">%
                                </label>

                            </div>

                            <div class="col-md-3 col-sm-3">

                                <input type="text" id="wholesale_price" name="wholesale_price"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                            <label>RS</label>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Re Order Level
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="re_order_level" name="re_order_level"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Warranty
                            </label>

                            <div class="col-md-3 col-sm-3">

                                <select id="warranty_type" name="warranty_type" class="form-control">
                                    <option>Year</option>
                                    <option>Month</option>
                                    <option>Week</option>
                                </select>

                            </div>

                            <div class="col-md-3 col-sm-3">

                                <input type="text" id="warranty" name="warranty" class="form-control col-md-6 col-xs-6">

                            </div>


                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Add
                                </button>
                            </div>
                        </div>

                    </form>


                </div>

            </div>
        </div>


        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Stock Manage
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
                                            <h4 class="modal-title" id="myModalLabel2">Stock Update</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="item_code">Item Code
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <!--                                <input list="Item_Code_data" id="item_code" name="item_code"-->
                                                    <!--                                       class="form-control"/>-->
                                                    <!--                                <datalist id="Item_Code_data">-->
                                                    <!--                                </datalist>-->

                                                    <input type="text" readonly="readonly" id="item_code_modal"
                                                           name="item_code_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="barcode">Barcode
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="barcode_modal" name="barcode_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3"
                                                       for="qualification-type-select">Item Category
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <select id="item_category_modal" name="item_category"
                                                            class="form-control">
                                                        <option>Choose Category</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="description" class="control-label col-md-3 col-sm-3">Description
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input list="Description_data" id="Description_modal"
                                                           name="Description_modal"
                                                           class="form-control"/>
                                                    <datalist id="Description_data">
                                                    </datalist>

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
                                                       for="qualification-type-select">Type
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <select id="type_modal" name="type_modal" class="form-control">
                                                        <option>Choose Type</option>
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

                                            <div class="form-group">

                                                <label class="control-label col-md-3 col-sm-3" for="issued_date">Retail
                                                    Price
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="retail_price_modal" name="retail_price_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>

                                                <label>RS</label>

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label col-md-3 col-sm-3" for="issued_date">Cost
                                                    Price
                                                </label>

                                                <div class="col-md-6 col-sm-6">

                                                    <input type="text" id="Cost_Price_modal" name="Cost_Price_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>
                                                <label>RS</label>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="issued_date">Wholesale
                                                    Price
                                                </label>

                                                <div class="col-md-6 col-sm-6">

                                                    <input type="text" id="wholesale_price_modal"
                                                           name="wholesale_price_modal"
                                                           class="form-control col-md-7 col-xs-12">

                                                </div>

                                                <label>RS</label>

                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" onclick="update_stock()"
                                                    class="btn btn-primary">Update changes
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
    get_item_code();
    item_category_load();
    mesure_type_laod();
    load_stock_for_branch();

    load_stock();


    var datatable_stock;

    function load_stock() {

        var url = "../Stock_controller/stock_load_for_table";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            console.log(response);

            if(response !=="No-data") {

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

            }

        }, 'text');

    }

    $('#datatable-buttons tbody').on('click', 'tr', function () {
        // console.log( table.row( 0 ).data());
        var data = datatable_stock.row(this).data();
        console.log("................Item Code - " + data['item_code']);

        document.getElementById("item_code_modal").value = data['item_code'];
        document.getElementById("barcode_modal").value = data['barcode'];
        document.getElementById("item_category_modal").value = data['category'];
        document.getElementById("Description_modal").value = data['description'];
        document.getElementById("bill_name_modal").value = data['bill_name'];
        document.getElementById("Quantity_modal").value = data['quantity'];
        document.getElementById("retail_price_modal").value = data['retail_price'];
        document.getElementById("Cost_Price_modal").value = data['cost_price'];
        document.getElementById("wholesale_price_modal").value = data['wholesale_price'];
        document.getElementById("type_modal").value = data['type'];
        // console.log(Object.values(data));
        // dataTable_model_set_value(data);

    });


    function load_stock_for_branch() {

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


    function get_cost_price() {

        var retail_price = document.getElementById("retail_price").value;
        var Cost_Price_p = document.getElementById("Cost_Price_p").value;

        var re = retail_price * 1 / 100 * 1;
        var presantage = re * 1 * Cost_Price_p * 1;

        var x = retail_price * 1 - presantage * 1;

        document.getElementById("Cost_Price").value = x;

    }

    function get_wholesale_price() {

        var retail_price = document.getElementById("retail_price").value;
        var wholesale_price_p = document.getElementById("wholesale_price_p").value;

        var re = retail_price * 1 / 100 * 1;
        var presantage = re * 1 * wholesale_price_p * 1;

        var x = retail_price * 1 - presantage * 1;

        document.getElementById("wholesale_price").value = x;

    }

    function mesure_type_laod() {

        var url = "../Stock_controller/mesure_type_load";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var option = document.getElementById("type").innerHTML;
            var mesure;

            for (var k in JSONObject) {
                mesure = JSONObject[k]["mesure"];
                option = option + "<option>" + mesure + "</option>";
            }
            document.getElementById("type").innerHTML = option;
            document.getElementById("type_modal").innerHTML = option;

        }, 'text');

    }

    function get_item_code() {

        var url = "../Stock_controller/get_item_code";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            document.getElementById("item_code").value = response;

        }, 'text');

    }

    function item_category_load() {

        var url = "../Stock_controller/load_item_category";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var option = document.getElementById("item_category").innerHTML;
            var category;

            for (var k in JSONObject) {
                category = JSONObject[k]["category"];
                option = option + "<option>" + category + "</option>";
            }
            document.getElementById("item_category").innerHTML = option;
            document.getElementById("item_category_modal").innerHTML = option;

        }, 'text');


    }

    $("#save_stock").submit(function (e) {
        e.preventDefault();

        var dataform = $("#save_stock").serialize();

        var url = "../Stock_controller/save_stock_item";

        $.ajaxSetup({
            cache: false,

        });
        $.post(url, dataform, function (response) {

            // if (response === "true") {
            //
            // var user_code = document.getElementById("user-code").value;
            load_stock();
            document.getElementById("save_stock").reset();
            get_item_code();

            // }

        }, 'text');

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


    function update_stock() {

        var url = "../Stock_controller/update_stock";

        var item_code = document.getElementById("item_code_modal").value;
        var barcode = document.getElementById("barcode_modal").value;
        var item_category = document.getElementById("item_category_modal").value;
        var description = document.getElementById("Description_modal").value;
        var bill_name = document.getElementById("bill_name_modal").value;
        var quty = document.getElementById("Quantity_modal").value;
        var retail_price = document.getElementById("retail_price_modal").value;
        var Cost_Price = document.getElementById("Cost_Price_modal").value;
        var wholesale_price = document.getElementById("wholesale_price_modal").value;
        var type = document.getElementById("type_modal").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {
            item_code: item_code,
            barcode: barcode,
            item_category: item_category,
            description: description,
            bill_name: bill_name,
            quty: quty,
            retail_price: retail_price,
            Cost_Price: Cost_Price,
            wholesale_price: wholesale_price,
            type: type
        }, function (response) {

            load_stock();

            new PNotify({
                title: 'Success',
                text: 'Update...... !',
                type: 'success',
                styling: 'bootstrap3'
            });

            document.getElementById("close_modal").click();

            alert("Response ..............."+response);

        }, 'text');


    }


</script>


<!-- /page content -->







