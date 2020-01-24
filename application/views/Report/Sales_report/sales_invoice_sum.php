<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Invoice Sum <span id="invoice_sum"></span></h2>
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
                                <th class="column-title">Invoice</th>
                                <th class="column-title">Invoice Date</th>
                                <th class="column-title">Bill to Name</th>
                                <th class="column-title">Amount</th>
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

        var url = "../Invoice_report_controller/search_invoice";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            console.log(response);

            var full_total;
            var invoice_data;
            var Table = "";
            var Table_foter = "";

            var JSONObject = JSON.parse(response);

            for (var k in JSONObject) {

                full_total = JSONObject[k]["full_total"];
                invoice_data = JSONObject[k]["invoice_data"];

                for (var j in invoice_data) {

                    Table = Table + "<tr class=\"odd pointer\">\n" +
                        "                                <td class=\" \">" + invoice_data[j].invoice_code + "</td>\n" +
                        "                                <td class=\" \">" + invoice_data[j].date + "  " + invoice_data[j].time + "</td>\n" +
                        "                                <td class=\" \">" + invoice_data[j].bill_to_name + "</td>\n" +
                        "                                <td class=\"a-right a-right \"> LKR " + invoice_data[j].net_total + "</td>\n" +
                        "                            </tr>";

                }

                Table_foter = " <tr class=\"even pointer\" style='background-color:rgba(38,185,154,.07) '>\n" +
                    "                                <td colspan=\"3\" style='text-align:right' > Total Amount - </td>\n" +
                    "                                <td class=\"a-right a-right \">LKR " + full_total + "</td>\n" +
                    "                            </tr>";

            }

            document.getElementById('table_content').innerHTML = Table + Table_foter;
            document.getElementById('invoice_sum').innerHTML = "LKR " + full_total;

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