<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Controll Settings
                <small>change the user privilege</small>
            </h3>
        </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Type
                        <small>....</small>
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
                        <label class="control-label col-md-3 col-sm-3" for="Employee Type">Employee Type
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="employee_type" name="employee_type"
                                   class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="button" value="Add" class="btn buttons"
                                   onclick="employee_type_save()">
                        </div>
                    </div>

                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Type</th>
                        </tr>
                        </thead>
                        <tbody id="employee_type_table">

                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Salary Type
                        <small>...</small>
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
                        <label class="control-label col-md-3 col-sm-3" for="Salary Type">Salary Type
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="salary_type" name="salary_type"
                                   class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="button" value="Add" class="btn buttons"
                                   onclick="salary_type_save()">
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Salary Type</th>
                        </tr>
                        </thead>
                        <tbody id="salary_type_table">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Position Controller
                        <small>...</small>
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

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Salary Type">Position
                            </label>

                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="position" name="position"
                                       class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3" for="Salary Type">Description
                            </label>

                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="description" name="description"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3" for="Salary Type">Sequence
                            </label>

                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="sequence" name="sequence"
                                       class="form-control col-md-7 col-xs-12">
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="position_save()">
                            </div>

                        </div>

                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Position</th>
                            <th>Description</th>
                            <th>Sequence</th>
                        </tr>
                        </thead>
                        <tbody id="position_table">

                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <!---->
        <!--            <div class="clearfix"></div>-->
        <!---->
        <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
        <!--                <div class="x_panel">-->
        <!--                    <div class="x_title">-->
        <!--                        <h2>Hover rows-->
        <!--                            <small>Try hovering over the rows</small>-->
        <!--                        </h2>-->
        <!--                        <ul class="nav navbar-right panel_toolbox">-->
        <!--                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>-->
        <!--                            </li>-->
        <!--                            <li class="dropdown">-->
        <!--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"-->
        <!--                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>-->
        <!--                                <ul class="dropdown-menu" role="menu">-->
        <!--                                    <li><a href="#">Settings 1</a>-->
        <!--                                    </li>-->
        <!--                                    <li><a href="#">Settings 2</a>-->
        <!--                                    </li>-->
        <!--                                </ul>-->
        <!--                            </li>-->
        <!--                            <li><a class="close-link"><i class="fa fa-close"></i></a>-->
        <!--                            </li>-->
        <!--                        </ul>-->
        <!--                        <div class="clearfix"></div>-->
        <!--                    </div>-->
        <!--                    <div class="x_content">-->
        <!--                        <table class="table table-hover">-->
        <!--                            <thead>-->
        <!--                            <tr>-->
        <!--                                <th>#</th>-->
        <!--                                <th>First Name</th>-->
        <!--                                <th>Last Name</th>-->
        <!--                                <th>Username</th>-->
        <!--                            </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody>-->
        <!--                            <tr>-->
        <!--                                <th scope="row">1</th>-->
        <!--                                <td>Mark</td>-->
        <!--                                <td>Otto</td>-->
        <!--                                <td>@mdo</td>-->
        <!--                            </tr>-->
        <!--                            <tr>-->
        <!--                                <th scope="row">2</th>-->
        <!--                                <td>Jacob</td>-->
        <!--                                <td>Thornton</td>-->
        <!--                                <td>@fat</td>-->
        <!--                            </tr>-->
        <!--                            <tr>-->
        <!--                                <th scope="row">3</th>-->
        <!--                                <td>Larry</td>-->
        <!--                                <td>the Bird</td>-->
        <!--                                <td>@twitter</td>-->
        <!--                            </tr>-->
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!---->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!---->
        <!---->
        <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
        <!--                <div class="x_panel">-->
        <!--                    <div class="x_title">-->
        <!--                        <h2>Boardered table-->
        <!--                            <small>Bordered table subtitle</small>-->
        <!--                        </h2>-->
        <!--                        <ul class="nav navbar-right panel_toolbox">-->
        <!--                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>-->
        <!--                            </li>-->
        <!--                            <li class="dropdown">-->
        <!--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"-->
        <!--                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>-->
        <!--                                <ul class="dropdown-menu" role="menu">-->
        <!--                                    <li><a href="#">Settings 1</a>-->
        <!--                                    </li>-->
        <!--                                    <li><a href="#">Settings 2</a>-->
        <!--                                    </li>-->
        <!--                                </ul>-->
        <!--                            </li>-->
        <!--                            <li><a class="close-link"><i class="fa fa-close"></i></a>-->
        <!--                            </li>-->
        <!--                        </ul>-->
        <!--                        <div class="clearfix"></div>-->
        <!--                    </div>-->
        <!--                    <div class="x_content">-->
        <!---->
        <!--                        <table class="table table-bordered">-->
        <!--                            <thead>-->
        <!--                            <tr>-->
        <!--                                <th>#</th>-->
        <!--                                <th>First Name</th>-->
        <!--                                <th>Last Name</th>-->
        <!--                                <th>Username</th>-->
        <!--                            </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody>-->
        <!--                            <tr>-->
        <!--                                <th scope="row">1</th>-->
        <!--                                <td>Mark</td>-->
        <!--                                <td>Otto</td>-->
        <!--                                <td>@mdo</td>-->
        <!--                            </tr>-->
        <!--                            <tr>-->
        <!--                                <th scope="row">2</th>-->
        <!--                                <td>Jacob</td>-->
        <!--                                <td>Thornton</td>-->
        <!--                                <td>@fat</td>-->
        <!--                            </tr>-->
        <!--                            <tr>-->
        <!--                                <th scope="row">3</th>-->
        <!--                                <td>Larry</td>-->
        <!--                                <td>the Bird</td>-->
        <!--                                <td>@twitter</td>-->
        <!--                            </tr>-->
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!---->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!---->
        <!--            <div class="clearfix"></div>-->
        <!---->
        <!--            <div class="col-md-12 col-sm-12 col-xs-12">-->
        <!--                <div class="x_panel">-->
        <!--                    <div class="x_title">-->
        <!--                        <h2>Table design-->
        <!--                            <small>Custom design</small>-->
        <!--                        </h2>-->
        <!--                        <ul class="nav navbar-right panel_toolbox">-->
        <!--                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>-->
        <!--                            </li>-->
        <!--                            <li class="dropdown">-->
        <!--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"-->
        <!--                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>-->
        <!--                                <ul class="dropdown-menu" role="menu">-->
        <!--                                    <li><a href="#">Settings 1</a>-->
        <!--                                    </li>-->
        <!--                                    <li><a href="#">Settings 2</a>-->
        <!--                                    </li>-->
        <!--                                </ul>-->
        <!--                            </li>-->
        <!--                            <li><a class="close-link"><i class="fa fa-close"></i></a>-->
        <!--                            </li>-->
        <!--                        </ul>-->
        <!--                        <div class="clearfix"></div>-->
        <!--                    </div>-->
        <!---->
        <!--                    <div class="x_content">-->
        <!---->
        <!--                        <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->
        <!---->
        <!--                        <div class="table-responsive">-->
        <!--                            <table class="table table-striped jambo_table bulk_action">-->
        <!--                                <thead>-->
        <!--                                <tr class="headings">-->
        <!--                                    <th>-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" id="check-all" class="flat"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </th>-->
        <!--                                    <th class="column-title">Invoice</th>-->
        <!--                                    <th class="column-title">Invoice Date</th>-->
        <!--                                    <th class="column-title">Order</th>-->
        <!--                                    <th class="column-title">Bill to Name</th>-->
        <!--                                    <th class="column-title">Status</th>-->
        <!--                                    <th class="column-title">Amount</th>-->
        <!--                                    <th class="column-title no-link last"><span class="nobr">Action</span>-->
        <!--                                    </th>-->
        <!--                                    <th class="bulk-actions" colspan="7">-->
        <!--                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span-->
        <!--                                                    class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>-->
        <!--                                    </th>-->
        <!--                                </tr>-->
        <!--                                </thead>-->
        <!---->
        <!--                                <tbody>-->
        <!--                                <tr class="even pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000040</td>-->
        <!--                                    <td class=" ">May 23, 2014 11:47:56 PM</td>-->
        <!--                                    <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>-->
        <!--                                    <td class=" ">John Blank L</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$7.45</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="odd pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000039</td>-->
        <!--                                    <td class=" ">May 23, 2014 11:30:12 PM</td>-->
        <!--                                    <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">John Blank L</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$741.20</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="even pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000038</td>-->
        <!--                                    <td class=" ">May 24, 2014 10:55:33 PM</td>-->
        <!--                                    <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">Mike Smith</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$432.26</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="odd pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000037</td>-->
        <!--                                    <td class=" ">May 24, 2014 10:52:44 PM</td>-->
        <!--                                    <td class=" ">121000204</td>-->
        <!--                                    <td class=" ">Mike Smith</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$333.21</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="even pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000040</td>-->
        <!--                                    <td class=" ">May 24, 2014 11:47:56 PM</td>-->
        <!--                                    <td class=" ">121000210</td>-->
        <!--                                    <td class=" ">John Blank L</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$7.45</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="odd pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000039</td>-->
        <!--                                    <td class=" ">May 26, 2014 11:30:12 PM</td>-->
        <!--                                    <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">John Blank L</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$741.20</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="even pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000038</td>-->
        <!--                                    <td class=" ">May 26, 2014 10:55:33 PM</td>-->
        <!--                                    <td class=" ">121000203</td>-->
        <!--                                    <td class=" ">Mike Smith</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$432.26</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="odd pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000037</td>-->
        <!--                                    <td class=" ">May 26, 2014 10:52:44 PM</td>-->
        <!--                                    <td class=" ">121000204</td>-->
        <!--                                    <td class=" ">Mike Smith</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$333.21</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!---->
        <!--                                <tr class="even pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000040</td>-->
        <!--                                    <td class=" ">May 27, 2014 11:47:56 PM</td>-->
        <!--                                    <td class=" ">121000210</td>-->
        <!--                                    <td class=" ">John Blank L</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$7.45</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr class="odd pointer">-->
        <!--                                    <td class="a-center ">-->
        <!--                                        <div class="icheckbox_flat-green" style="position: relative;"><input-->
        <!--                                                    type="checkbox" class="flat" name="table_records"-->
        <!--                                                    style="position: absolute; opacity: 0;">-->
        <!--                                            <ins class="iCheck-helper"-->
        <!--                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class=" ">121000039</td>-->
        <!--                                    <td class=" ">May 28, 2014 11:30:12 PM</td>-->
        <!--                                    <td class=" ">121000208</td>-->
        <!--                                    <td class=" ">John Blank L</td>-->
        <!--                                    <td class=" ">Paid</td>-->
        <!--                                    <td class="a-right a-right ">$741.20</td>-->
        <!--                                    <td class=" last"><a href="#">View</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                </tbody>-->
        <!--                            </table>-->
        <!--                        </div>-->


    </div>
</div>

<!-- /page content -->

<script>

    load_employee_type_for_table();
    load_salary_type_for_table();
    load_position_for_table();

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




