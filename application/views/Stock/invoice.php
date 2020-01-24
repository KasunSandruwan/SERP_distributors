<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Invoice
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

                    <form id="save_stock" class="form-horizontal form-label-left">

                        <div class="col-md-3 col-sm-3" style="border-right:1px solid #E6E9ED;">

                            <div class="form-group">

                                <div class="col-md-12 col-sm-12">

                                    <label for="description" class="control-label col-md-3 col-sm-3">
                                        Item
                                        <input type="radio" name="type" id="Item" value="Item" checked
                                               onchange="item_type()"/>
                                    </label>

                                    <label for="description" class="control-label col-md-3 col-sm-3">
                                        Service
                                        <input type="radio" name="type" id="Service" value="Service"
                                               onchange="item_type()"/>
                                    </label>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-12 col-sm-12">

                                    <table id="datatable-buttons" class="table table-striped table-responsive">
                                        <thead>

                                        <tr>
                                            <th>Item</th>
                                            <th>Bill Name</th>
                                            <th>Qty</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-6" style="border-right:1px solid #E6E9ED;">

                            <div class="col-md-12 col-sm-12 col-lg-12">

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Item Code / Service
                                        Code
                                        : </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="item_code" name="item_code" class="form-control"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Bill Name / Service
                                        : </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="bill_name" name="bill_name" class="form-control"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Unit Price :
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="unit_price" name="unit_price" class="form-control"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label for="description" class="control-label col-md-3 col-sm-3">Quantity </label>
                                    <div class="col-md-3 col-sm-3">
                                        <input id="quantity" name="quantity" onkeyup="get_cost_price()"
                                               class="form-control"/>

                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <select id="unit_type" onchange="get_cost_price()" name="unit_type"
                                                class="form-control">
                                            <option>Unit</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Discount
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="discount" name="discount" onkeyup="get_discount_price()"
                                               class="form-control"/>
                                    </div>
                                </div>


                            </div>


                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Price
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <label id="price" name="price" class="form-control"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3">Sub Price
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="sub_price" name="sub_price" class="form-control"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3"></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <button type="button" onclick="item_add_cart();"
                                                class="btn btn-success btn-round">Add
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12">

                                <table class="table table-striped table-responsive">
                                    <thead>

                                    <tr>
                                        <th>Type</th>
                                        <th>Item</th>
                                        <th>Bill Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                        <th>Total Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody id="item_table">

                                    </tbody>
                                </table>

                            </div>

                            <div class="col-md-12 col-sm-12" style="border-top:1px solid #E6E9ED;">

                                <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="description" class="control-label col-md-3 col-sm-3"> All Total :
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                            <label id="total_all" name="total_all" class="control-label"></label>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-3">

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Customer
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input list="Customer_data" id="Customer" onkeyup="load_Customer();"
                                           name="Customer"
                                           class="form-control"/>
                                    <datalist id="Customer_data">
                                    </datalist>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Distributor
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input list="distributor_data" id="distributor" onkeyup="load_distributor();"
                                           name="distributor"
                                           class="form-control"/>
                                    <datalist id="distributor_data">
                                    </datalist>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3"
                                       for="qualification-type-select">Payment Method
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="payment_method" onchange="payment_method_check()" name="payment_method"
                                            class="form-control">
                                        <option>Choose Payment Method</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Amount
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="amount" name="amount" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Payed Amount
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="balance" name="balance" onkeyup="get_Total_due()" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3">Total Due
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="total_due" name="total_due" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label col-md-3 col-sm-3"></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <button type="button" id="save" class="btn btn-success btn-round">Pay
                                    </button>
                                </div>
                            </div>


                        </div>


                    </form>


                    <!--Payment method Model............................................................................ -->

                    <input id="card_payment_button" class="hidden" type="button" data-toggle="modal"
                           data-target=".bs-example-modal-lg"/>

                    <div class="form-horizontal form-label-left">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- Small modal -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2"></h4>
                                        </div>
                                        <div class="modal-body">

                                            <!--............................................... ....................................................................-->


                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <div style="margin-left:150px; margin-top: 100px;">
                                                    <h1 style="margin-bottom:50px;"><i class="fa fa-lock"></i>
                                                        Secure Payment</h1>

                                                    <div style="margin-top: -30px; margin-bottom: 20px;">

                                                        <img id="visa" style=""
                                                             src="<?php echo base_url(); ?>Icon/visa.png"
                                                             alt="VISA cart"/>
                                                        <img id="master"
                                                             src="<?php echo base_url(); ?>Icon/mastercard.png"
                                                             alt="Master"/>
                                                        <img id="discover"
                                                             src="<?php echo base_url(); ?>Icon/discover.png"
                                                             alt="Discover"/>
                                                        <img id="american"
                                                             src="<?php echo base_url(); ?>Icon/amex.png"
                                                             alt="American Express"/>
                                                    </div>

                                                    <div class="form-group">

                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12"
                                                                   name="cardhname" id="cardhname"
                                                                   onkeypress="return isAlphabetcarts(this.event)"
                                                                   type="text" placeholder="Cardholder Name"/>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">

                                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                                            <input class="form-control col-md-7 col-xs-12"
                                                                   name="cardnumber" id="cnuber"
                                                                   onkeydown="numberlenth(this.value, this.event)"
                                                                   type="text" placeholder="Card Number"/>

                                                        </div>

                                                        <!--                                                            onkeypress="return isNumber(this.event)"-->

                                                    </div>


                                                    <div class="form-group">

                                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                                <input class="form-control" name="cardmonth"
                                                                       id="cartmon" onblur="checkmonth()"
                                                                       onkeyup="cartmonth(this.value)"

                                                                       maxlength="2"
                                                                       style="width:50px; margin-left: -10px;"
                                                                       type="text" placeholder="MM">
                                                            </div>

                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                                <input class="form-control" name="cardyear"
                                                                       id="cardyear" onkeyup="card_exp()"

                                                                       maxlength="2"
                                                                       style="width:50px; margin-left: -35px;"
                                                                       type="text" placeholder="YY">
                                                                <span style="visibility:hidden; margin-left: 20px;"
                                                                      id="Expired">Expired...!</span>
                                                            </div>

                                                            <div class="col-md-3 col-sm-3 col-xs-6">

                                                                <input class="form-control" name="cardcvc"
                                                                       id="cvcnumber" onkeyup="cvc(this.value)"

                                                                       style="width:100px; margin-left: 55px;"
                                                                       type="text" placeholder="CVC">

                                                            </div>


                                                        </div>


                                                    </div>

                                                    <input type="text" id="cardtype" hidden="hidden">


                                                </div>


                                            </div>


                                            <!--...................................................................................................................-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" onclick="update_stock()"
                                                    class="btn btn-primary">Pay
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /modals -->
                        </div>

                    </div>


                    <!--Cheque Register ..............................................................................-->

                    <input id="cheque_payment_button" hidden type="button" data-toggle="modal"
                           data-target=".bs-example-modal-lg_cheque_model"/>

                    <div class="form-horizontal form-label-left">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- Small modal -->
                            <div class="modal fade bs-example-modal-lg_cheque_model" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2"></h4>
                                        </div>
                                        <div class="modal-body">

                                            <h1 style="margin-bottom:50px; text-align: center;"><i
                                                        class="fa fa-lock"></i>
                                                Secure Cheque Payment</h1>

                                            <div class="form-group">
                                                <label for="description" class="control-label col-md-3 col-sm-3">Bank
                                                    Name
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input id="bank_name" name="bank_name" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="control-label col-md-3 col-sm-3">Cheque
                                                    Number
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input id="cheque_number" name="cheque_number"
                                                           class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="control-label col-md-3 col-sm-3">Amount
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input id="amount" name="amount" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3">Exp Date
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="col-md-11 xdisplay  form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left"
                                                               id="single_cal"
                                                               name="exd_date" placeholder="Exp Date"
                                                               aria-describedby="inputSuccess2Status3">
                                                        <span class="fa fa-calendar-o form-control-feedback left"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">(success)</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--...................................................................................................................-->
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>

                                            <button type="button" onclick="cheque_pay()"
                                                    class="btn btn-primary">Pay
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /modals -->
                        </div>

                    </div>


                    <!--Customer Register ..............................................................................-->

                    <!--............................................... ....................................................................-->
                    <form id="profile_form_customer" class="form-horizontal form-label-left">

<!--                        <input id="customer_registor_button" type="button" data-toggle="modal"-->
<!--                               data-target=".bs-example-modal-lg_2"/>-->

                        <div class="form-horizontal form-label-left">

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- Small modal -->
                                <div class="modal fade bs-example-modal-lg_2" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2"></h4>
                                            </div>
                                            <div class="modal-body">

                                                <span class="section">Personal Info</span>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="title">Title
                                                        <span
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
                                                               name="first-name"
                                                               class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="last-name">Last
                                                        Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" id="last-name" name="last-name"
                                                               required="required"
                                                               class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3">Middle
                                                        Name / Initial</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input id="middle-name"
                                                               class="form-control col-md-7 col-xs-12"
                                                               type="text" name="middle-name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nic"
                                                           class="control-label col-md-3 col-sm-3">NIC</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input id="nic" class="form-control col-md-7 col-xs-12"
                                                               type="text"
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
                                                            <input type="radio" id="female" name="gender"
                                                                   value="female">
                                                            Female
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3"
                                                           for="contact_number">Credit Limit
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" id="credit_limit" name="credit_limit"
                                                               class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>


                                                <span class="section">Contact Info</span>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3"
                                                           for="primary_contact_number">Contact Number
                                                        (Primary)<span
                                                                class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" id="primary_contact_number"
                                                               name="primary_contact_number" required="required"
                                                               class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3"
                                                           for="contact_number">Contact
                                                        Number
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" id="contact_number" name="contact_number"
                                                               class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="email">Email
                                                        <span
                                                                class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="email" id="email" name="email"
                                                               required="required"
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


                                                <!--...................................................................................................................-->
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" id="close_modal" class="btn btn-default"
                                                        data-dismiss="modal">Close
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /modals -->
                            </div>

                        </div>

                    </form>


                </div>

            </div>
        </div>

    </div>

</div>

<script>

    init_DataTables();
    item_type();

    $('#single_cal').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_3"
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });


    $("#profile_form_customer").submit(function (e) {
        e.preventDefault();

        var dataform = $("#profile_form_customer").serialize();

        var url = "../Profile_controller/insert_customer"

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


    function load_Customer() {

        var url = "../Profile_controller/get_customer";

        var Customer = document.getElementById("Customer").value;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {Customer: Customer}, function (response) {

            console.log(response);
            var JSONObject = JSON.parse(response);

            var customer_id;
            var surname;
            var fname;
            var lname;
            var nic;

            for (var k in JSONObject) {

                customer_id = JSONObject[k]["customer_id"];
                fname = JSONObject[k]["fname"];
                lname = JSONObject[k]["lname"];
                nic = JSONObject[k]["nic"];

                document.getElementById("Customer_data").innerHTML = "<option value=" + customer_id + ">" + customer_id + " " + "(" + fname + " " + lname + " " + nic + ")" + "</option>";

            }

        }, 'text');

    }

    function cheque_pay() {

        var url = "../Stock_controller/cheque_payment";

        var bank_name = document.getElementById("bank_name").value;
        var cheque_number = document.getElementById("cheque_number").value;
        var amount = document.getElementById("amount").value;
        var exp_date = document.getElementById("single_cal").value;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {
            bank_name: bank_name,
            cheque_number: cheque_number,
            amount: amount,
            exp_date: exp_date

        }, function (response) {

        }, 'text');


    }


    function get_cost_price() {

        var url = "../Stock_controller/get_mesure_value";

        var unit_type = document.getElementById("unit_type").value;

        var unit_price = document.getElementById("unit_price").value;
        var quantity = document.getElementById("quantity").value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {unit_type: unit_type}, function (response) {

            var cost_price = unit_price * 1 * quantity * 1;
            var price = cost_price * 1 / response * 1;

            document.getElementById("price").innerHTML = price;
            document.getElementById("sub_price").value = price;

        }, 'text');

    }


    function get_discount_price() {

        var price = document.getElementById("price").innerHTML;
        var discount = document.getElementById("discount").value;

        var dis_count_dive = price * 1 / 100;
        var discount_price = dis_count_dive * 1 * discount * 1;

        var sub_price = price * 1 - discount_price * 1;

        document.getElementById("sub_price").value = sub_price;


    }


    function item_type() {

        if (document.getElementById("Item").checked) {

            load_stock();
            console.log("Select Typ-" + document.getElementById("Item").value);

        } else {

            load_service();
            console.log("Select Typ-" + document.getElementById("Service").value);

        }

    }

    load_payment_method();


    function load_service() {

        var url = "../Stock_controller/service_load_for_table";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            console.log(response);

            var JSONObject = JSON.parse(response);

            datatable_stock = $('#datatable-buttons').DataTable({

                destroy: true,
                data: JSONObject,
                columns: [

                    {data: 'Services', title: 'ID'},
                    {data: 'service_type', title: 'Services'},
                    {data: 'price', title: 'Price'},

                ]

            });

        }, 'text');


    }


    function payment_method_check() {

        var Payment_method = document.getElementById("payment_method").value;

        switch (Payment_method) {

            case "Card" :
                document.getElementById("card_payment_button").click();
                break;

            case "Cheque":
                document.getElementById("cheque_payment_button").click();
                break;

        }

        console.log("Payment Method - " + document.getElementById("payment_method").value);

    }


    function load_payment_method() {

        var url = "../Stock_controller/load_payment_mode";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var payment_mode;
            var option = document.getElementById("payment_method").innerHTML;

            for (var k in JSONObject) {

                payment_mode = JSONObject[k]["payment_mode"];

                option = option + "<option>" + payment_mode + "</option>";

            }

            document.getElementById("payment_method").innerHTML = option;

        }, 'text');


    }


    function get_Total_due() {

        console.log("total- amount");

        var amount = document.getElementById("amount").value;
        var balance = document.getElementById("balance").value;

        var Total_Due = amount * 1 - balance * 1;
        document.getElementById("total_due").value = Total_Due;

    }


    function item_add_cart() {

        var item_code = document.getElementById("item_code").innerHTML;
        var bill_name = document.getElementById("bill_name").innerHTML;


        var unit_price = document.getElementById("unit_price").value;
        var quantity = document.getElementById("quantity").value;
        var discount = document.getElementById("discount").value;
        var unit_type = document.getElementById("unit_type").value;

        var Total = document.getElementById("sub_price").value;

        // Get type.....................................................................................................

        var type;

        if (document.getElementById("Item").checked) {
            type = document.getElementById("Item").value;
        } else {
            type = document.getElementById("Service").value;
        }

        // Calculation part  Total Price get discount and free quantity ................................................


        var dis_count_dive = unit_price * 1 / 100;

        var discount_price = dis_count_dive * 1 * discount * 1;


        var url = "../Stock_controller/get_mesure_value";
        var mesure_quantity;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {unit_type: unit_type}, function (response) {

            mesure_quantity = quantity * 1 / response * 1;
            get_stock_has_available(item_code, type, mesure_quantity, discount_price, Total, unit_price, bill_name);

        }, 'text');


    }


    function get_stock_has_available(item_code, type, mesure_quantity, discount_price, Total, unit_price, bill_name) {

        var table = document.getElementById("item_table").innerHTML;

        var url = "../Stock_controller/get_stock_has_available";

        var item_code = item_code;
        var type = type;

        var mesure_quantity = mesure_quantity;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {item_code: item_code, type: type, mesure_quantity: mesure_quantity}, function (response) {

            if (response !== 'Not enough') {

                console.log("call method");

                table = table + "<tr><td>" + type + "</td><td>" + item_code + "</td><td>" + bill_name + "</td><td>" + unit_price + "</td><td>" + mesure_quantity + "</td><td>" + discount_price + "</td><td>" + Total + "</td><td>" + "<input type=\"button\" class=\"btn-small btn-danger btn-round\" value=\"Remove\" onclick=\"deleteRow(this)\"/>" + "</td></tr>";
                document.getElementById("item_table").innerHTML = table;

                clear();
                // Full get Total...............................................................................................

                var total_all = document.getElementById("total_all").innerHTML;

                var Full_Total = Total * 1 + total_all * 1;

                document.getElementById("total_all").innerHTML = Full_Total;

                document.getElementById("amount").value = Full_Total;

            } else {

                new PNotify({
                    title: 'Oh No!',
                    text: 'Not enough Quantity.',
                    type: 'error',
                    styling: 'bootstrap3'
                });


            }

        }, 'text');

    }


    function deleteRow(btn) {

        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        var T_total = row.cells[6].innerHTML;

        var total_all = document.getElementById("total_all").innerHTML;

        var Total = total_all * 1 - T_total * 1;

        document.getElementById("total_all").innerHTML = Total;

        document.getElementById("amount").value = Total;

        console.log(T_total);


    }

    function clear() {

        document.getElementById("item_code").innerHTML = "";
        document.getElementById("bill_name").innerHTML = "";
        document.getElementById("unit_price").value = "";
        document.getElementById("quantity").value = "";
        document.getElementById("discount").value = "";
        document.getElementById("price").innerHTML = "";
        document.getElementById("sub_price").value = "";

    }


    var datatable_stock;

    function load_stock() {

        var url = "../Stock_controller/stock_load_for_table";

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {}, function (response) {

            console.log(response);

            var JSONObject = JSON.parse(response);

            datatable_stock = $('#datatable-buttons').DataTable({

                destroy: true,
                data: JSONObject,
                columns: [

                    {data: 'item_code', title: 'Item'},
                    {data: 'bill_name', title: 'Bill Name'},
                    {data: 'quantity', title: 'Qty'},

                ]

            });

        }, 'text');

    }

    $('#datatable-buttons tbody').on('click', 'tr', function () {
        // console.log( table.row( 0 ).data());
        var data = datatable_stock.row(this).data();

        if (document.getElementById("Item").checked) {

            document.getElementById("item_code").innerHTML = data['item_code'];
            document.getElementById("bill_name").innerHTML = data['bill_name'];
            document.getElementById("unit_price").value = data['retail_price'];

            measure_type(data['item_code']);


        } else {

            document.getElementById("item_code").innerHTML = data['Services'];
            document.getElementById("bill_name").innerHTML = data['service_type'];
            document.getElementById("unit_price").value = data['price'];

            service_mesure();

        }

        // console.log(Object.values(data));
        // dataTable_model_set_value(data);

    });

    function service_mesure() {

        document.getElementById("unit_type").innerHTML = "<option>" + "Unit" + "</option>";
    }

    function measure_type(item_code) {

        var url = "../Stock_controller/load_sub_mesure_for_item";

        var item_code = item_code;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {item_code: item_code}, function (response) {


            var JSONObject = JSON.parse(response);

            var mesure_type;
            var mesure_value;
            var option = "";

            for (var k in JSONObject) {

                mesure_type = JSONObject[k]["mesure_type"];
                mesure_value = JSONObject[k]["mesure_value"];
                option = option + "<option>" + mesure_type + "</option>";

            }

            document.getElementById("unit_type").innerHTML = option;

        }, 'text');

    }


    function load_distributor() {

        var url = "../Profile_controller/get_distributor_data";

        var distributor = document.getElementById("distributor").value;


        $.ajaxSetup({
            cache: false
        });
        $.post(url, {distributor: distributor}, function (response) {

            console.log(response);
            var JSONObject = JSON.parse(response);

            var distributor_id;
            var surname;
            var fname;
            var lname;
            var nic;

            for (var k in JSONObject) {

                distributor_id = JSONObject[k]["distributor_id"];
                fname = JSONObject[k]["fname"];
                lname = JSONObject[k]["lname"];
                nic = JSONObject[k]["nic"];

                document.getElementById("distributor_data").innerHTML = "<option value=" + distributor_id + ">" + distributor_id + " " + "(" + fname + " " + lname + " " + nic + ")" + "</option>";

            }

        }, 'text');

    }


    $(document).ready(function () {

        $('#save').click(function () {

            var table_data = [];

            $('#item_table tr').each(function (row, tr) {

                // Create an Array again to store all the data per row..................................................

                // get only the data with value.........................................................................

                if ($(tr).find('td:eq(0)').text() !== "") {

                    var sub = {
                        'type': $(tr).find('td:eq(0)').text(),
                        'item_code': $(tr).find('td:eq(1)').text(),
                        'bill_name': $(tr).find('td:eq(2)').text(),
                        'price': $(tr).find('td:eq(3)').text(),
                        'quantity': $(tr).find('td:eq(4)').text(),
                        'discount': $(tr).find('td:eq(5)').text(),
                        'total': $(tr).find('td:eq(6)').text(),
                    };
                    table_data.push(sub);
                } else {
                    console.log("No table data");
                }

            });

            // convert json and pass ....

            if (table_data.length !== 0) {

                var url = "../Invoice_controller/insert_invoice";

                var Jsonobject = JSON.stringify(table_data);

                var full_total = document.getElementById("total_all").innerHTML;
                var payment_method = document.getElementById("payment_method").value;
                var balance = document.getElementById("balance").value;
                var total_due = document.getElementById("total_due").value;
                var distributor = document.getElementById("distributor").value;

                var Customer = document.getElementById("Customer").value;

                if (total_due =>0){

                        if(Customer !==' ' || Customer !== null){
                            document.getElementById("customer_registor_button").click();
                        }

                }else{

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            datatable: Jsonobject,
                            net_total: full_total,
                            payment_method: payment_method,
                            balance: balance,
                            total_due: total_due,
                            distributor: distributor
                        },
                        success: function (response) {

                            console.log("Out Put Error -" + response);

                            document.getElementById("item_table").innerHTML = "";
                            document.getElementById("amount").value = "";
                            document.getElementById("balance").value = "";
                            document.getElementById("total_due").value = "";
                            document.getElementById("total_all").innerHTML = "";

                        },

                    });


                }

                // console.log(table_data);
            } else {

            }

        });

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