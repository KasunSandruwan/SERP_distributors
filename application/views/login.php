<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SERP Distributed</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">


</head>

<body  class="login">

<div >
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div   class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <?php echo form_open('login_controller/login_user');?>

                <?php if($this->session->flashdata('errormgs')){
                    echo "<p>".$this->session->flashdata('errormgs')."</p>";

                }?>


                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" name="uname" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    <div>
                        <input type="submit" class="btn btn-default submit"  value="Log in">
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Lost your password?
                            <a href="#signup" class="to_register">Reset password</a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> SERP Distributed</h1>
                            <p>©2018 All Rights Reserved.Sithuvili Concepts IT Solution is a SERP App.Privacy and Terms</p>
                        </div>
                    </div>

                <?php echo form_close();?>


            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Reset password</h1>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Submit</a>
                    </div>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already remember ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i>SERP Distributed</h1>
                            <p>©2018 All Rights Reserved.Sithuvili Concepts IT Solution is a SERP App.Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

</body>
</html>