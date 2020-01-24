<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Department Register
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
                        <!---->
                        <form id="department_register_step5" class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3" for="user-role">Branch
                                    Name
                                </label>
                                <div class="col-md-6 col-sm-6">

                                    <select name="branch-name-select" id="branch-name-select"
                                            class="form-control">
                                        <option>Branch</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3">Department</label>
                                <div class="col-md-6 col-sm-6">
                                    <input list="department_list" id="department" class="form-control"
                                           name="department"/>
                                    <datalist id="department_list">
                                    </datalist>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-default">Add</button>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="branch-table"
                                       class="control-label col-md-3 col-sm-3"> </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Department for Branch
                                                <small></small>
                                            </h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i
                                                                class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <table class="table table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>Branch Name</th>
                                                    <th>Department</th>
                                                    <th></th>

                                                </tr>
                                                </thead>
                                                <tbody id="table-department">
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>


                </div>


            </div>

        </div>

        <script>

            load_branch_for_new_department();
            load_department_certe_new_department();
            load_department_has_branch_table();


            $("#department_register_step5").submit(function (e) {
                e.preventDefault();

                var dataform = $("#department_register_step5").serialize();
                var url = "../New_user_from_controller/insert_department_crete_new_department"


                $.ajaxSetup({
                    cache: false,

                });
                $.post(url, dataform, function (response) {

                    load_department_has_branch_table();
                    document.getElementById("department_list").innerHTML = "<option>" + " " + "</option>";
                    load_department_certe_new_department();


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


            function load_branch_for_new_department() {

                var url = "../New_user_from_controller/create_new_department_serch_branchall";

                $.ajaxSetup({
                    cache: false

                });
                $.post(url, {}, function (response) {

                    var JSONObject = JSON.parse(response);

                    var option = document.getElementById("branch-name-select").innerHTML;

                    var branch_code;
                    var branch_name;

                    for (var k in JSONObject) {

                        branch_name = JSONObject[k]["branch_name"];
                        option = option + "<option>" + branch_name + "</option>";

                    }

                    document.getElementById("branch-name-select").innerHTML = option;


                }, 'text');
            }


            function load_department_certe_new_department() {

                var url = "../New_user_from_controller/serch_department";

                $.ajaxSetup({
                    cache: false

                });
                $.post(url, {}, function (response) {

                    var JSONObject = JSON.parse(response);

                    var option = document.getElementById("department_list").innerHTML;

                    var department_name;

                    for (var k in JSONObject) {

                        department_name = JSONObject[k]["department_name"];
                        option = option + "<option >" + department_name + "</option>";

                    }

                    document.getElementById("department_list").innerHTML = option;

                }, 'text');
            }

            function load_department_has_branch_table() {

                var url = "../New_user_from_controller/load_department_has_branch_table_create_new_department";

                $.ajaxSetup({
                    cache: false

                });
                $.post(url, {}, function (response) {

                    var JSONObject = JSON.parse(response);

                    var department_id;
                    var branch;
                    var department;
                    var table = "";

                    for (var k in JSONObject) {

                        department_id = JSONObject[k]["department_id"];
                        branch = JSONObject[k]["branch"];
                        department = JSONObject[k]["department"];
                        table = table + "<tr> <th scope=\"row\">" + branch + "</th><td>" + department + "</td><td><button type='button' onclick=\"Remove_department_new_crete_department(" + department_id + ")\" class=\"btn btn-round btn-danger btn-xs\">Remove</button></td></tr>";
                    }

                    document.getElementById("table-department").innerHTML = table;

                }, 'text');

            }

            function Remove_department_new_crete_department(id) {

                var url = "../New_user_from_controller/Delete_department"


                $.ajaxSetup({
                    cache: false,

                });
                $.post(url, {department_id: id}, function (response) {

                    if (response === "true") {
                        load_department_has_branch_table();
                        alert(response);
                    }

                }, 'text');

            }


        </script>