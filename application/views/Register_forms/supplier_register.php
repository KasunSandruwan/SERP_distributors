<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>New Supplier Register
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

                    <form id="profile-form-employee" class="form-horizontal form-label-left">

                        <span class="section">Personal Info</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Title <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="title" name="title" class="form-control">
                                    <option>Choose Title</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">First
                                Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="first-name" required="required"
                                       name="first-name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="last-name">Last Name
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="last-name" name="last-name"
                                       required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3">Middle
                                Name / Initial</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="middle-name" class="form-control col-md-7 col-xs-12"
                                       type="text" name="middle-name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nic" class="control-label col-md-3 col-sm-3">NIC</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="nic" class="form-control col-md-7 col-xs-12" type="text"
                                       name="nic">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passport"
                                   class="control-label col-md-3 col-sm-3">Passport</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="passport" class="form-control col-md-7 col-xs-12"
                                       type="text" name="passport">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender"
                                   class="control-label col-md-3 col-sm-3">Gender </label>
                            <div class="col-md-6 col-sm-6">
                                <div id="div_male">
                                    <input type="radio" id="male" checked name="gender"
                                           value="male"> Male
                                </div>
                                <div id="div_female">
                                    <input type="radio" id="female" name="gender" value="female">
                                    Female
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="is_Local " class="control-label col-md-3 col-sm-3">is Local </label>

                            <div class="col-md-6 col-sm-6">
                                <input type="checkbox" id="is_Local" name="is_Local">
                            </div>

                        </div>


                        <span class="section">Contact Info</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="primary_contact_number">Contact Number (Primary)<span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="primary_contact_number"
                                       name="primary_contact_number" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="contact_number">Contact
                                Number
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="contact_number" name="contact_number"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="email">Email <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="email" id="email" name="email" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="control-label col-md-3 col-sm-3">Permanent
                                Address <span class="required">*</span></label></label>
                            <div class="col-md-6 col-sm-6">
                                                    <textarea id="p_address" class="form-control" required="required"
                                                              name="p_address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address"
                                   class="control-label col-md-3 col-sm-3">Address </label>
                            <div class="col-md-6 col-sm-6">
                                                    <textarea id="address" class="form-control"
                                                              name="address"></textarea>
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
            <!-- End SmartWizard Content -->
        </div>
    </div>
</div>
<!-- /page content -->

<script>

    $("#profile-form-employee").submit(function (e) {
        e.preventDefault();

        var dataform = $("#profile-form-employee").serialize();

        var url = "../Profile_controller/insert_supplier"

        $.ajaxSetup({
            cache: false,

        });
        $.post(url, dataform, function (response) {

            if (response === "true") {

                new PNotify({
                    title: 'Success',
                    text: 'Save Success ...... !',
                    type: 'success',
                    styling: 'bootstrap3'
                });

                document.getElementById("profile-form-employee").reset();

            } else {

                new PNotify({
                    title: 'Oh No!',
                    text: 'Something terrible happened.',
                    type: 'error',
                    styling: 'bootstrap3'
                });

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

    load_title("../New_user_from_controller/load_title");

    $(document).ready(function () {
        $('.ui-pnotify').remove();
    });


</script>






