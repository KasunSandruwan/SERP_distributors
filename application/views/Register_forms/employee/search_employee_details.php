<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Details
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

                    <div class="form-horizontal form-label-left">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable"
                                   class="table table-responsive table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>

                                <tbody id="duty_roster_table">

                                </tbody>
                            </table>
                        </div>



                        <!-- Model Class ....................................................................................-->

                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <!-- Small modal -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Employee Details Update</h4>
                                        </div>

                                        <div id="pay_sheet" class="modal-body ">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="employee_ID">Employee
                                                    ID
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="employee_id"
                                                           readonly="readonly"
                                                           name="employee_id"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="employee_Code">Employee
                                                    Code
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="employee_code"
                                                           name="employee_code"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Name of Employee">Name
                                                    of Employee
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="name_of_employee" readonly="readonly"
                                                           name="name_of_employee"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3" for="Designation">Designation
                                                </label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="text" id="designation" readonly="readonly"
                                                           name="designation"
                                                           class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" id="close_modal" class="btn btn-default"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" onclick="Update_employee()"
                                                    class="btn btn-primary">Update
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>
                </div>

            </div>

        </div>


    </div>

</div>

<script>

    init_DataTables();
    all_employees_company_is_active();


    function Update_employee() {


        var url = "../Employee_controller/Employee_update";
        var Employee_ID=document.getElementById("employee_id").value;
        var Employee_code=document.getElementById("employee_code").value;

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {Employee_ID:Employee_ID ,Employee_code:Employee_code}, function (response) {

            if(response === "true"){

                new PNotify({
                    title: 'Success',
                    text: 'Update...... !',
                    type: 'success',
                    styling: 'bootstrap3'
                });

                document.getElementById("close_modal").click();

            }

        }, 'text');

    }

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







