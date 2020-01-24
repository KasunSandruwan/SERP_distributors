<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Qualification Add
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

                    <form id="save_qualification_user" class="form-horizontal form-label-left">

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
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Qualification
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="qualification_subject" onchange="where_search_subject_qualification_id();"
                                        name="qualification_subject"
                                        class="form-control">
                                    <option>Choose Qualification</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label col-md-3 col-sm-3">Description
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <textarea id="description_qualification" class="form-control"
                                          name="description_qualification"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="issued_date">Issued Date
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="issued_date" name="issued_date"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="subject_table">
                            </label>
                            <div id="table_load" class="col-md-6 col-sm-6">


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                            </div>
                        </div>

                    </form>


                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Qualification
                        <small>Search</small>
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

                            <table class="table table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Qualification</th>
                                    <th>Description</th>
                                    <th>Issued Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="qualification_table">
<!--                                <tr>-->
<!--                                    <th scope="row">1</th>-->
<!--                                    <td>Name</td>-->
<!--                                    <td>Qualification</td>-->
<!--                                    <td>Description</td>-->
<!--                                    <td>Issued Date</td>-->
<!--                                    <td>-->
<!--                                        <table class="table table-responsive">-->
<!--                                            <thead>-->
<!--                                            <tr>-->
<!--                                                <th>Subject</th>-->
<!--                                                <th>Class</th>-->
<!--                                            </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
<!--                                            <tr>-->
<!--                                            <td>Maths</td>-->
<!--                                            <td>A</td>-->
<!--                                            </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!---->
<!--                                </td>-->
<!---->
<!--                                </tr>-->
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


</div>

<script>

    load_qualification();

    $("#save_qualification_user").submit(function (e) {
        e.preventDefault();

        var dataform = $("#save_qualification_user").serialize();

        var url = "../Qualification_controller/save_qualification_user";

        $.ajaxSetup({
            cache: false,

        });
        $.post(url, dataform, function (response) {

            if (response === "true") {

                var user_code= document.getElementById("user-code").value;
                load_all_qualification_employee_after_add_new(user_code);
                document.getElementById("save_qualification_user").reset();

            }

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


</script>


<!-- /page content -->







