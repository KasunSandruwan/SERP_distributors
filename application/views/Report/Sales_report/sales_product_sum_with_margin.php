<!-- page content -->
<div class="">
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Product Sum with Margin</h2>
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

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Product ID</th>
                                <th class="column-title">Name</th>
                                <th class="column-title text-right">Qty</th>
                                <th class="column-title text-right">Cost Value(LKR)</th>
                                <th class="column-title text-right">Sales (LKR)</th>
                                <th class="column-title text-right">Profit (LKR)</th>
                                <th class="column-title text-right">Margin</th>
                            </tr>
                            </thead>

                            <tbody id="table_content">
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>

        </div>


    </div>

</div>

<script>

    all_invoice();

    function all_invoice() {

        var url = "../Invoice_report_controller/sales_product_sum_with_margin";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            console.log(response);

            var f_qtu;
            var f_cost_value;
            var f_sales;
            var f_profit;
            var f_margin;

            var table_data;
            var Table = "";
            var Table_foter = "";

            var JSONObject = JSON.parse(response);

            for (var k in JSONObject) {

                f_qtu = JSONObject[k]["f_qtu"];
                f_cost_value = JSONObject[k]["f_cost_value"];
                f_sales = JSONObject[k]["f_sales"];
                f_profit = JSONObject[k]["f_profit"];
                f_margin = JSONObject[k]["f_margin"];

                table_data = JSONObject[k]["table_data"];

                for (var j in table_data) {

                    if (table_data[j].profit * 1 < 0) {

                        Table = Table + "<tr class=\"odd pointer\" style='background-color:rgba(255,0,0,.07)'>\n" +
                            "                                <td class=\" \">" + table_data[j].product_ID + "</td>\n" +
                            "                                <td class=\" \">" + table_data[j].product_name + "</td>\n" +
                            "                                <td class=\"text-right\" >" + table_data[j].qty + "</td>\n" +
                            "                                <td class=\"text-right  \" >" + table_data[j].cost_value + "</td>\n" +
                            "                                <td class=\"text-right  \">" + table_data[j].sales + "</td>\n" +
                            "                                <td class=\"text-right  \">" + table_data[j].profit + "</td>\n" +
                            "                                <td class=\"text-right  \">" + table_data[j].margin + "</td>\n" +
                            "                            </tr>";

                    } else {

                        Table = Table + "<tr class=\"odd pointer\">\n" +
                            "                                <td class=\" \">" + table_data[j].product_ID + "</td>\n" +
                            "                                <td class=\" \">" + table_data[j].product_name + "</td>\n" +
                            "                                <td class=\"text-right \">" + table_data[j].qty + "</td>\n" +
                            "                                <td class=\"text-right \">" + table_data[j].cost_value + "</td>\n" +
                            "                                <td class=\"text-right  \">" + table_data[j].sales + "</td>\n" +
                            "                                <td class=\"text-right  \">" + table_data[j].profit + "</td>\n" +
                            "                                <td class=\"text-right \">" + table_data[j].margin + "</td>\n" +
                            "                            </tr>";

                    }

                }

                Table_foter = "<tr class=\"even pointer\" style='background-color:rgba(38,185,154,.07) '>\n" +
                    "                                <td  class=\"a-right a-right \"></td>\n" +
                    "                                <td class=\"a-right a-right \"></td>\n" +
                    "                                <td class=\"text-right \">" + f_qtu + "</td>\n" +
                    "                                <td class=\"text-right \">" + f_cost_value + "</td>\n" +
                    "                                <td class=\"text-right\">" + f_sales + "</td>\n" +
                    "                                <td class=\"text-right \">" + f_profit + "</td>\n" +
                    "                                <td class=\"text-right \">" + f_margin + "</td>\n" +
                    "                            </tr>";

            }
            //
            document.getElementById('table_content').innerHTML = Table + Table_foter;


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