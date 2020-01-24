<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Transaction
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
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Account Category
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="account_category_select" name="account_category_select"
                                        class="form-control">
                                    <option>Account Category</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Expenses">Account Name
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="account_name" name="account_name"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Voucher">Account Number
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="account_number" name="account_number"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Transaction Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="transaction_type_select" name="transaction_type_select"
                                        class="form-control">
                                    <option>Transaction Type</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Credit Value">Credit Value
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="credit_value" name="credit_value"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Debit Value">Debit Value
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="debit_value" name="debit_value"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="save_transaction_data()">
                            </div>
                        </div>


                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<script>


    load_transaction_type_for_select();
    load_account_category_for_select();


    function load_transaction_type_for_select() {

        var url = "../Account_controller/all_transaction_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No-Data') {

                var JSONObject = JSON.parse(response);

                var idtransaction_type;
                var transaction_type;
                var option = "";

                for (var k in JSONObject) {

                    idtransaction_type = JSONObject[k]["idtransaction_type"];

                    transaction_type = JSONObject[k]["transaction_type"];

                    option = option + "<option>" + transaction_type + "</option>";
                }

                document.getElementById("transaction_type_select").innerHTML = option;

            }

        }, 'text');


    }

    function load_account_category_for_select() {

        var url = "../Account_controller/all_account_category";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if (response !== 'No-Data') {

                var JSONObject = JSON.parse(response);

                var account_category_code;
                var account_category;
                var option = "";

                for (var k in JSONObject) {

                    account_category_code = JSONObject[k]["account_category_code"];
                    account_category = JSONObject[k]["account_category"];

                    option = option + "<option>" + account_category + "</option>";
                }

                document.getElementById("account_category_select").innerHTML = option;

            }

        }, 'text');


    }

    function save_transaction_data() {

        var account_category_select = document.getElementById('account_category_select').value;
        var account_name = document.getElementById('account_name').value;
        var account_number = document.getElementById('account_number').value;
        var transaction_type_select = document.getElementById('transaction_type_select').value;
        var credit_value = document.getElementById('credit_value').value;
        var debit_value = document.getElementById('debit_value').value;

        var url = "../Account_controller/save_transaction_data";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {

            account_category_select: account_category_select,
            account_name: account_name,
            account_number: account_number,
            transaction_type_select: transaction_type_select,
            credit_value: credit_value,
            debit_value: debit_value

        }, function (response) {

            if (response !== "transaction_type" || response !== "account_category") {

                document.getElementById('account_name').value = "";
                document.getElementById('account_number').value = "";
                document.getElementById('credit_value').value = "";
                document.getElementById('debit_value').value = "";

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







