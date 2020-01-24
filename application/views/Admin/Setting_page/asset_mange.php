<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Asset Manage
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

                        <span class="section">Asset Type</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Asset_Type">Asset Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="asset_type" name="asset_type"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="button">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="asset_type_save()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="asset_type_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Asset Type</th>
                                    </tr>
                                    </thead>
                                    <tbody id="asset_type_table_id"></tbody>
                                </table>

                            </div>
                        </div>


                        <span class="section">Asset Manage</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Asset Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="asset_type_select" name="asset_type_select"
                                        class="form-control">
                                    <option>Choose Asset Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="Vehicle Number">Vehicle Number
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="vehicle_number" name="vehicle_number"
                                       class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Description">Description
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="asset_description" name="asset_description"
                                       class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="button">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="Save_asset()">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="asset_list">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Asset Type</th>
                                        <th>Vehicle Number</th>
                                        <th>Description</th>
                                        <th>Register Date</th>

                                    </tr>
                                    </thead>
                                    <tbody id="asset_table_id">

                                    </tbody>
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

    load_asset_type_table();
    load_asset_type_select();
    load_asset_tabe();

    function asset_type_save() {

        var asset_type = document.getElementById("asset_type").value;

        var url = "../Assets_management_controller/save_asset_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {asset_type: asset_type}, function (response) {

            document.getElementById("asset_type").value = "";
            load_asset_type_table();
            load_asset_type_select();

        }, 'text');

    }


    function load_asset_type_table() {

        var url = "../Assets_management_controller/all_search_asset_type";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var id;
            var asset_type;
            var table = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];

                asset_type = JSONObject[k]["asset_type"];
                table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + asset_type + "</td></tr>";
            }

            document.getElementById("asset_type_table_id").innerHTML = table;

        }, 'text');

    }

    function load_asset_type_select() {

        var url = "../Assets_management_controller/all_search_asset_type";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var id;
            var asset_type;
            var option ="";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];

                asset_type = JSONObject[k]["asset_type"];
                option = option + "<option>" + asset_type + "</option>";
            }

            document.getElementById("asset_type_select").innerHTML = option;

        }, 'text');

    }

    function Save_asset(){

        var asset_type= document.getElementById("asset_type_select").value;
        var vehicle_number = document.getElementById("vehicle_number").value;
        var asset_description = document.getElementById("asset_description").value;

        var url = "../Assets_management_controller/save_asset";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {asset_type: asset_type, vehicle_number: vehicle_number, asset_description: asset_description}, function (response) {

             load_asset_tabe();

        }, 'text');


    }

    function load_asset_tabe() {

        var url = "../Assets_management_controller/load_asset";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);


            var asset_type;
            var asset_name;
            var asset_description;
            var reg_date;

            var table = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];

                asset_type = JSONObject[k]["asset_type"];
                asset_name = JSONObject[k]["asset_name"];
                asset_description = JSONObject[k]["asset_description"];
                reg_date = JSONObject[k]["reg_date"];

                table = table + "<tr> <th scope=\"row\">" + asset_type + "</th><td>" + asset_name + "</td><td>" + asset_description + "</td><td>" + reg_date +"</td></tr>";
            }

            document.getElementById("asset_table_id").innerHTML = table;

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







