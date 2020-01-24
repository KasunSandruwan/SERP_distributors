<?php
if (!($this->session->userdata('Loggedin'))){
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
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url(); ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url(); ?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url(); ?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url(); ?>vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
</head>


<body class="nav-md" onload="profiledata('<?php echo base_url('index.php/Profile_controller/get_data'); ?>')">
<div class="container body" >
    <div class="main_container">

        <?php $this->load->view('include/sidebar')?>
        <!-- top navigation -->
        <?php $this->load->view('include/navigation')?>
        <!-- /top navigation -->

        <!-- page content -->


        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>User  Profile<small>update profile data</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                                <br />

                                <?php   $attributes = array('data-parsley-validate class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                                 echo form_open('Profile_controller/update_data', $attributes); ?>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" name="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">SurName/ Initial</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="sur-name" class="form-control col-md-7 col-xs-12" type="text" name="sur-name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nic" class="control-label col-md-3 col-sm-3 col-xs-12">NIC Number</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="nic-number" class="form-control col-md-7 col-xs-12" type="text" name="nic">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="passport" class="control-label col-md-3 col-sm-3 col-xs-12">Passport Number</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="passport" class="form-control col-md-7 col-xs-12" type="text" name="passport">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact-number" class="control-label col-md-3 col-sm-3 col-xs-12">Primary Phone Number <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="primary-phonenumber" class="form-control col-md-7 col-xs-12" required="required"  type="text" name="primary-phonenumber">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact-number" class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="phonenumber" class="form-control col-md-7 col-xs-12"  type="text" name="phonenumber">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="email" class="form-control col-md-7 col-xs-12" required="required" type="email" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address <span class="required">*</span></label></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="p_address" class="form-control" required="required"  name="p_address"></textarea>
                                        </div>
                                    </div>

                                 <div class="form-group">
                                    <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="address" class="form-control" name="address"></textarea>
                                    </div>
                                 </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                    <input type="text" class="form-control has-feedback-left" id="single_cal3" name="birthdate" placeholder="Birth day" aria-describedby="inputSuccess2Status3">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span   class="sr-only">(success)</span>
                                                </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">


                                            <div class="radio">
                                                <label class="hover">
                                                    <div id="male" class="iradio_flat-green hover "  style="position: relative;">
                                                        <input  type="radio"  class="flat"  name="gender" value="male" style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div> Male
                                                </label>
                                            </div>


                                            <div class="radio">
                                                <label class="hover">
                                                    <div id="female" class="iradio_flat-green hover" style="position: relative;">

                                                        <input  type="radio" class="flat"  name="gender" value="female" style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div> Female
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="button">Cancel</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>

                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('include/footer')?>
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
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
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
<script src="<?php echo base_url(); ?>build/js/custom.min.js"></script>


<!-- Get profile Data Ajax Scripts -->
<script src="<?php echo base_url(); ?>js/ajax.js"></script>

</body>
</html>
