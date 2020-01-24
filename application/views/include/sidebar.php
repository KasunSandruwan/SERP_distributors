<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><span>SERP Distributed</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <!--                <img src="images/img.jpg" alt="..." class="img-circle profile_img">-->
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname') ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <!--                            <li><a href="#">Dashboard2</a></li>-->
                            <!--                            <li><a href="#">Dashboard3</a></li>-->
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i>Register Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <?php
                            if (($this->session->userdata('super_admin'))) {
                                ?>
                                <li><a href="../Page_controller/newuserfrom">New User Form</a></li>
                                <?php
                            }
                            ?>

                            <li><a onclick="supplier_register()">Supplier Register</a></li>
                            <li><a onclick="customer_register()">Customer Register</a></li>
                            <li><a onclick="distributor_register()">Distributor Register</a></li>
                            <li><a onclick="driver_register()">Driver Register</a></li>

                            <li><a href="#">Employee Form<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">

                                    <li id="profile_side_id" class="sub_menu"><a onclick="get_profile()">Profile</a>
                                    </li>
                                    <li id="employee_details_side_id"><a href="#" onclick="get_employee_details()">Employee
                                            Details</a>
                                    </li>
                                    <li><a href="#" onclick="search_employee_details()">Search Employee Details</a>
                                    </li>

                                </ul>

                            </li>
                            <!--                            <li><a href="form_validation.html">Form Validation</a></li>-->
                            <!--                            <li><a href="form_wizards.html">Form Wizard</a></li>-->
                            <!--                            <li><a href="form_upload.html">Form Upload</a></li>-->
                            <!--                            <li><a href="form_buttons.html">Form Buttons</a></li>-->
                        </ul>
                    </li>

                    <li><a><i class=" fa fa-bar-chart"></i> Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="#">Purchase Report<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="#">Purchase and Sales Chart</a></li>
                                    <li class="sub_menu"><a href="#">Purchase Summary</a></li>

                                </ul>
                            </li>

                            <li><a href="#">Stock Report<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">

                                    <li class="sub_menu"><a href="#">Stock Adjustment</a></li>
                                    <li class="sub_menu"><a href="#" onclick="Stock_Balance_All_Location()">Stock
                                            Balance All Location</a></li>
                                    <li class="sub_menu"><a href="#">Stock Balance Select Location</a></li>

                                </ul>
                            </li>

                            <li><a href="#">Sales Report<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="#" onclick="sales_chart_report()">Sales Chart
                                            Report</a></li>
                                    <li class="sub_menu"><a href="#" onclick="sales_invoice_sum()">Sales Invoice Sum</a>
                                    </li>
                                    <li class="sub_menu"><a href="#" onclick="sales_product_sum_with_margin()">Sales
                                            Product Sum With Margin</a></li>

                                </ul>

                            </li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-cogs"></i> Setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#" onclick="get_employee_type_page()">Employee Controller</a></li>
                            <li><a href="#" onclick="create_new_department()">Create New Department</a></li>
                            <li><a href="#" onclick="calender_manage()">Calender Manage</a></li>
                            <li><a href="#" onclick="attendenc_controller()">Attendenc Controller</a></li>
                            <li><a href="#" onclick="payment_circle_manage()">Payment Circle Manage</a></li>
                            <li><a href="#" onclick="Customer_Type()">Customer Type</a></li>
                            <li><a href="#" onclick="Asset_manage()">Asset Manage</a></li>
                            <li><a href="#" onclick="Expenses_Type()">Expenses Type</a></li>
                            <li><a href="#" onclick="Account_mangae()">Account Mange</a></li>
                            <li><a href="#" onclick="Create_user_account()">Create User Account</a></li>
                        </ul>
                    </li>

                    <li><a href="#" onclick="invoice()"><i class="fa fa-file-text"></i>Invoice </a></li>
                    <li><a href="#" onclick="order_invoice()"><i class="fa fa-file-text"></i>Order Invoice </a></li>
                    <li><a href="#" onclick="delivery_note()"><i class="fa fa-truck"></i>Delivery</a></li>
                    <li><a href="#" onclick="expenses()"><i class="fa fa-sort-amount-desc"></i>Expenses</a></li>
                    <li><a href="#" onclick="Transaction()"><i class="fa fa-exchange"></i>Transaction</a></li>

                    <li><a><i class="fa fa-cubes"></i> Stock <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#" onclick="stock_manage()">Stock Manage</a></li>
                            <li><a href="#" onclick="service_page()">Service</a></li>
                            <li><a href="#" onclick="grn_page()">GRN</a></li>
                            <li><a href="#" onclick="purchase_order()">Purchase Order</a></li>
                            <li><a href="#" onclick="customer_order()">Customer Order</a></li>
                            <!--                            <li><a href="#" onclick="attendenc_controller()">Attendenc Controller</a></li>-->
                            <!--                            <li><a href="#" onclick="payment_circle_manage()">Payment Circle Manage</a></li>-->
                            <!--                            <li><a href="widgets.html">Widgets</a></li>-->
                            <!--                            <li><a href="invoice.html">Invoice</a></li>-->
                            <!--                            <li><a href="inbox.html">Inbox</a></li>-->
                            <!--                            <li><a href="calendar.html">Calendar</a></li>-->
                        </ul>
                    </li>
                    <li><a><i class="fa fa-graduation-cap"></i> Qualification <span
                                    class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#" onclick="qualification_mange()">Qualification Manage</a></li>
                            <li><a href="#" onclick="qualification_add()">Qualification Add</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i> Attendenc <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#" onclick="duty_roster_manage()">Duty Roster Manage</a></li>
                            <li><a href="#" onclick="duty_roster()">Duty Roster </a></li>
                            <li><a href="#" onclick="daily_attendenc()">Daily Attendenc</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-money"></i> Salary Manage <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#" onclick="salary_controller()">Salary Controller</a></li>
                            <li><a href="#" onclick="additional_pay_management()">Additional Pay Management</a></li>
                            <li><a href="#" onclick="pay_slip_generate()">Pay Slip Generate</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-pencil-square-o"></i> Application <span
                                    class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#" onclick="leave_application()">Leave Application</a></li>
                            <li><a href="#" onclick="leave_manage()">Leave Management</a></li>
                            <!--                            <li><a href="#" onclick="pay_slip_generate()">Pay Slip Generate</a></li>-->
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>