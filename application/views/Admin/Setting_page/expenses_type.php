<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Expenses Mange
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

                        <span class="section">Expenses Type</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Expenses Type">Expenses Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="expenses_type" name="expenses_type"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="expenses_type_save()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="expenses_type_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Expenses Type</th>
                                    </tr>
                                    </thead>
                                    <tbody id="expenses_type_table"></tbody>
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

    load_expenses_type_table();


    function expenses_type_save() {

        var expenses_type = document.getElementById("expenses_type").value;

        var url = "../Expenses_controller/save_expenses_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {expenses_type: expenses_type}, function (response) {

            document.getElementById("expenses_type").value = "";
            load_expenses_type_table();

        }, 'text');

    }


    function load_expenses_type_table() {

        var url = "../Expenses_controller/all_search_expenses_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            if(response !== 'No-Data'){

            var JSONObject = JSON.parse(response);

            var id;
            var expenses_type;
            var table = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];

                expenses_type = JSONObject[k]["expenses_type"];
                table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + expenses_type + "</td></tr>";
            }

            document.getElementById("expenses_type_table").innerHTML = table;

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







