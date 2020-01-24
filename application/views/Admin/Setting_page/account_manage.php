<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Account Mange
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

                        <span class="section">Account Category</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Expenses Type">Account Category
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="account_category" name="account_category"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="account_category_save()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="account_category_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Account Category</th>
                                    </tr>
                                    </thead>
                                    <tbody id="account_category_table"></tbody>
                                </table>

                            </div>
                        </div>


                        <span class="section">Transaction </span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Transaction Type">Transaction Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="transaction_type" name="transaction_type"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="transaction_type_save()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="transaction_type_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Transaction Type</th>
                                    </tr>
                                    </thead>
                                    <tbody id="transaction_type_table"></tbody>
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

    load_account_category_table();


    function account_category_save() {

        var account_category = document.getElementById("account_category").value;

        var url = "../Account_controller/save_account_category";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {account_category: account_category}, function (response) {

            document.getElementById("account_category").value = "";
            load_account_category_table();

        }, 'text');

    }


    function transaction_type_save() {

        var transaction_type = document.getElementById("transaction_type").value;

        var url = "../Account_controller/save_transaction_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {transaction_type: transaction_type}, function (response) {

            document.getElementById("transaction_type").value = "";
            load_transaction_type_table();

        }, 'text');

    }


    function load_account_category_table() {

        var url = "../Account_controller/all_account_category";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No-Data') {

                var JSONObject = JSON.parse(response);

                var account_category_code;
                var account_category;
                var table = "";

                for (var k in JSONObject) {

                    account_category_code = JSONObject[k]["account_category_code"];

                    account_category = JSONObject[k]["account_category"];
                    table = table + "<tr> <th scope=\"row\">" + account_category_code + "</th><td>" + account_category + "</td></tr>";
                }

                document.getElementById("account_category_table").innerHTML = table;

            }

        }, 'text');

    }

    function load_transaction_type_table() {

        var url = "../Account_controller/all_transaction_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No-Data') {

                var JSONObject = JSON.parse(response);

                var idtransaction_type;
                var transaction_type;
                var table = "";

                for (var k in JSONObject) {

                    idtransaction_type = JSONObject[k]["idtransaction_type"];

                    transaction_type = JSONObject[k]["transaction_type"];
                    table = table + "<tr> <th scope=\"row\">" + idtransaction_type + "</th><td>" + transaction_type + "</td></tr>";
                }

                document.getElementById("transaction_type_table").innerHTML = table;

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







