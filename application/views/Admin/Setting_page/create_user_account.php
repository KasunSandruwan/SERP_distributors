<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create User Account
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

                    <form id="create_user_account_form" class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-code">User Code
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input list="user_data" id="user-code" name="user-code" onkeyup="search_data()"
                                       class="form-control"/>
                                <datalist id="user_data">
                                </datalist>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-role">User Role
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <select name="user-role" id="user-role" class="form-control">
                                    <option>Choose User Role</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="user-name">User Name
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="user-name" name="user-name"
                                       required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="password">Password
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="password" id="password" name="password"
                                       required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password" class="control-label col-md-3 col-sm-3">Confirm
                                Password <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input id="confirm-password" class="form-control col-md-7 col-xs-12"
                                       required="required" type="password" name="confirm-password">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<script>

    load_branch_employee();
    load_user_role();


    $("#create_user_account_form").submit(function (e) {
        e.preventDefault();

        var dataform = $("#create_user_account_form").serialize();

        var url = "../settings_controller/Create_user_account"


        $.ajaxSetup({
            cache: false,

        });
        $.post(url, dataform, function (response) {

            if (response === "true") {

                document.getElementById("create_user_account_form").reset();

                new PNotify({
                    title: 'Success',
                    text: 'Save Success ...... !',
                    type: 'success',
                    styling: 'bootstrap3'
                });

            } else {

                new PNotify({
                    title: 'Oh No!',
                    text: response,
                    type: 'error',
                    styling: 'bootstrap3'
                });

            }

        }, 'text');

        // var dataform = $("#employee_form").serialize();
        //
        // var url = "../Employee_controller/save_employee"
        //
        // $.ajaxSetup({
        //     cache: false,
        //
        // });
        // $.post(url, dataform, function (response) {
        //
        //     if (response === "true") {
        //
        //         new PNotify({
        //             title: 'Success',
        //             text: 'Save Success ...... !',
        //             type: 'success',
        //             styling: 'bootstrap3'
        //         });
        //
        //         document.getElementById("employee_form").reset();
        //
        //         // document.getElementById("employee_id").value="";
        //         // document.getElementById("epf").value="";
        //         // document.getElementById("single_cal3").value="";
        //         // masege save.........................................
        //     }else {
        //
        //         new PNotify({
        //             title: 'Oh No!',
        //             text: 'Something terrible happened.',
        //             type: 'error',
        //             styling: 'bootstrap3'
        //         });
        //
        //     }
        //
        // }, 'text');

    });


</script>

