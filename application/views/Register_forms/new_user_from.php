<?php
if (!($this->session->userdata('Loggedin'))) {
    redirect('Page_controller/index');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md" onload="load_title('<?php echo base_url('index.php/New_user_from_controller/load_title'); ?>')">
<div class="container body">
    <div class="main_container">

        <?php $this->load->view('include/sidebar') ?>

        <!-- top navigation -->
        <?php $this->load->view('include/navigation') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>New User From
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


                                <!-- Smart Wizard -->

                                <!-- Tabs -->
                                <div id="wizard" class="form_wizard wizard_verticle">
                                    <ul class="list-unstyled wizard_steps">
                                        <li>
                                            <a href="#step-11">
                                                <span class="step_no">1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-22">
                                                <span class="step_no">2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-33">
                                                <span class="step_no">3</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-44">
                                                <span class="step_no">4</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-55">
                                                <span class="step_no">5</span>
                                            </a>
                                        </li>


                                    </ul>

                                    <div id="step-11">
                                        <h2 class="StepTitle">Step 1 Content</h2>
                                        <form id="profile-form-step_1" class="form-horizontal form-label-left">

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
                                                <label class="control-label col-md-3 col-sm-3">Date Of Birth <span
                                                            class="required">*</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6">
                                                    DD.MM.YYYY
                                                    <div class='input-group date' id='myDatepicker'>
                                                        <input type='text' required="required" id="date-of-birth"
                                                               name="date-of-birth" class="form-control"/>
                                                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
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
                                                    <div id="next-button" hidden></div>
                                                    <button type="submit" class="btn btn-success">Next</button>

                                                </div>
                                            </div>


                                        </form>
                                    </div>

                                    <!-- Step 2 Content Line ...............................................................................--->

                                    <div id="step-22">
                                        <h2 class="StepTitle">Step 2 Content</h2>


                                        <form id="create-user-form-step_2" class="form-horizontal form-label-left">

                                            <span class="section">Create User Account</span>

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
<!--                                                    <button id="back-button" class="btn btn-default" type="button">-->
<!--                                                        Previous-->
<!--                                                    </button>-->
                                                    <div id="next-button2" hidden></div>
                                                    <button type="submit" class="btn btn-success">Next</button>

                                                </div>
                                            </div>


                                        </form>


                                    </div>
                                    <div id="step-33">
                                        <h2 class="StepTitle">Step 3 Content</h2>

                                        <form id="company_register-step3" class="form-horizontal form-label-left">

                                            <span class="section">Company Register</span>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="company-code">Company
                                                    Code <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="company-code" name="company-code"
                                                           required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="company-name">Company
                                                    Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="company-name" name="company-name"
                                                           required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="company-rate" class="control-label col-md-3 col-sm-3">Company
                                                    Rate </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input id="company-rate" class="form-control col-md-7 col-xs-12"
                                                           type="text" name="company-rate">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-md-offset-3">
<!--                                                    <button id="back-button2" class="btn btn-default" type="button">-->
<!--                                                        Previous-->
<!--                                                    </button>-->
                                                    <div id="next-button3" hidden></div>
                                                    <button type="submit" class="btn btn-success">Next</button>

                                                </div>
                                            </div>


                                        </form>

                                    </div>

                                    <!--Step 4 Content Line....................................................................................................  -->

                                    <div id="step-44">
                                        <h2 class="StepTitle">Step 4 Content</h2>

                                        <form id="branch_register_step4" class="form-horizontal form-label-left">

                                            <span class="section">Company for Branch Register</span>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="branch-code">Branch
                                                    Code<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="branch-code" name="branch-code"
                                                           required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="branch-name">Branch
                                                    Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="branch-name" name="branch-name"
                                                           required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="company-rate" class="control-label col-md-3 col-sm-3">Contact
                                                    number </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input id="branch-contact_number"
                                                           class="form-control col-md-7 col-xs-12" type="text"
                                                           name="branch-contact_number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="company-rate"
                                                       class="control-label col-md-3 col-sm-3">Email</label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input id="branch-email" class="form-control col-md-7 col-xs-12"
                                                           type="email" name="branch-email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="-branch-address" class="control-label col-md-3 col-sm-3">Address </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <textarea id="branch-address" class="form-control"
                                                              name="branch-address"></textarea>
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
                                                            <h2>Register Branch
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
                                                                    <th>Branch Code</th>
                                                                    <th>Branch Name</th>
                                                                    <th>Contact Number</th>
                                                                    <th>Email</th>
                                                                    <th>Address</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="table-branch">

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-md-offset-3">
<!--                                                    <button id="back-button3" class="btn btn-default" type="button">-->
<!--                                                        Previous-->
<!--                                                    </button>-->
                                                    <button id="next-button4" onclick="load_branch_department()"
                                                            type="button" class="btn btn-success">
                                                        Next
                                                    </button>

                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                    <!--Step 5 Content Line............................................................................. -->

                                    <div id="step-55">
                                        <h2 class="StepTitle">Step 5 Content</h2>

                                        <form id="department_register_step5" class="form-horizontal form-label-left">

                                            <span class="section">Department Register</span>

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

                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-md-offset-3">
                                                    <button id="back-button4" class="btn btn-default" type="button">
                                                        Previous
                                                    </button>
                                                    <button type="button" onclick="go_to_loginpage()"
                                                            class="btn btn-success">
                                                        Finish
                                                    </button>
                                                </div>
                                            </div>


                                        </form>


                                    </div>


                                </div>
                                <!-- End SmartWizard Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('include/footer') ?>
        <!-- /footer content -->
    </div>
</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?php echo base_url(); ?>js/form_wizard.js"></script>

<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url(); ?>vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap-datetimepicker -->
<script src="<?php echo base_url(); ?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- bootstrap-wysiwyg -->
<script src="<?php echo base_url(); ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo base_url(); ?>vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?php echo base_url(); ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?php echo base_url(); ?>vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?php echo base_url(); ?>vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?php echo base_url(); ?>vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo base_url(); ?>vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?php echo base_url(); ?>vendors/starrr/dist/starrr.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>build/js/custom.js"></script>

<!-- Get profile Data Ajax Scripts -->
<script src="<?php echo base_url(); ?>js/ajax.js"></script>
<!-- Initialize datetimepicker -->
<script>

    $('#myDatepicker').datetimepicker({
        format: 'DD.MM.YYYY'
    });

</script>

</body>
</html>
