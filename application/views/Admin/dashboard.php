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

    <title>Quick Office Automation</title>

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
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="<?php echo base_url(); ?>vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<!--    <link href="--><?php //echo base_url(); ?><!--vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">-->
<!--    <link href="--><?php //echo base_url(); ?><!--vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">


    <style type="text/css">

        .cartdisable{

            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

    </style>

</head>

<body class="nav-md" >
<div class="container body">
    <div class="main_container">


        <?php $this->load->view('include/sidebar') ?>

        <!-- top navigation -->
        <?php $this->load->view('include/navigation') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div id="page_content" class="right_col" role="main">

        </div>
        <!-- /page content -->


        <!-- footer content -->
        <?php $this->load->view('include/footer') ?>
        <!-- /footer content -->
    </div>
</div>


<div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?php echo base_url(); ?>vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

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

    <!-- PNotify -->
    <script src="<?php echo base_url(); ?>vendors/pnotify/dist/pnotify.js"></script>
<!--    <script src="--><?php //echo base_url(); ?><!--vendors/pnotify/dist/pnotify.buttons.js"></script>-->
<!--    <script src="--><?php //echo base_url(); ?><!--vendors/pnotify/dist/pnotify.nonblock.js"></script>-->

    <!-- ECharts -->
    <script src="<?php echo base_url(); ?>vendors/echarts/dist/echarts.min.js"></script>

    <!-- Get profile Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/ajax.js"></script>

    <!-- Get employee Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/employee_ajax.js"></script>

    <!-- Get qualification Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/qualification_ajax.js"></script>

    <!-- Get calender manage Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/calender_manage_ajax.js"></script>

    <!-- Get calender manage Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/attendenc_controller_ajax.js"></script>

    <!-- Get calender manage Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/salary_manage_ajax.js"></script>

    <!-- Get calender manage Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/settings_controller_ajax.js"></script>

    <!-- Get calender manage Data Ajax Scripts -->
    <script src="<?php echo base_url(); ?>js/leave_ajax.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>build/js/custom.js"></script>
    <!--Include Page-->
    <script src="<?php echo base_url(); ?>js/include_page.js"></script>

    <!--Include Card validation-->
    <script src="<?php echo base_url(); ?>js/cartvalidate.js"></script>

    <script>
        $(document).ready(function (){
            $('.ui-pnotify').remove();
        });
    </script>

</body>
</html>
