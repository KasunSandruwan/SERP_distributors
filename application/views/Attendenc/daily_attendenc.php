<!-- page content -->
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daily Attendenc Sheet
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

                    <div class="form-horizontal form-label-left">

                        <form method="post" enctype="multipart/form-data" id="upload_exel"
                              class="form-horizontal form-label-left">

                            <table width="600"
                                   style="margin:115px auto; background:#f8f8f8; border:1px solid #eee; padding:10px;">
                                <tr>
                                    <td colspan="2" style="font:bold 15px arial; text-align:center; padding:0 0 5px 0;">
                                        Daily Attend Uploading
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%"
                                        style="font:bold 12px tahoma, arial, sans-serif; text-align:right; border-bottom:1px solid #eee; padding:5px 10px 5px 0px; border-right:1px solid #eee;">
                                        Select file
                                    </td>
                                    <td width="50%" style="border-bottom:1px solid #eee; padding:5px;">
                                        <label class="btn btn-success btn-file">
                                            <input type="file" name="file" id="file" style="display: none;"/>
                                            Upload
                                        </label>
                                    </td>
                                </tr>
                            </table>

                        </form>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 ">
                                <button type="button" id="save" class="btn btn-success btn-round">Save</button>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable"
                                   class="table table-responsive table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>IN Time</th>
                                    <th>Out Time</th>
                                    <th>Date</th>
                                    <th>Working Time</th>

                                </tr>
                                </thead>

                                <tbody id="daly_attendenc_table">

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

    function load_upload_data_content_data() {

        var url = "../File_upload_controller/excel_content_load"

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            var JSONObject = JSON.parse(response);

            var A;
            var B;
            var C;
            var D;
            var E;
            var difference;
            var table = "";

            for (var k in JSONObject) {

                A = JSONObject[k]["A"];
                B = JSONObject[k]["B"];
                C = JSONObject[k]["C"];
                D = JSONObject[k]["D"];
                E = JSONObject[k]["E"];
                difference = JSONObject[k]["difference"];
                table = table + "<tr><td>" + A + "</td><td>" + B + "</td><td>" + C + "</td><td>" + D + "</td><td>" + E + "</td><td>" + difference + "</td></tr>";
            }

            document.getElementById("daly_attendenc_table").innerHTML = table;

        }, 'text');

    }

    $(document).ready(function () {

        $('#save').click(function () {

            var table_data = [];

            $('#daly_attendenc_table tr').each(function (row, tr) {

                // Create an Array again to store all the data per row..................................................

                // get only the data with value.........................................................................

                if ($(tr).find('td:eq(0)').text() !== "") {

                    var sub = {
                        'employee_id': $(tr).find('td:eq(0)').text(),
                        'name': $(tr).find('td:eq(1)').text(),
                        'in_time': $(tr).find('td:eq(2)').text(),
                        'out_time': $(tr).find('td:eq(3)').text(),
                        'date': $(tr).find('td:eq(4)').text(),
                    };
                    table_data.push(sub);
                } else {
                    console.log("No table data");
                }

            });

            // convert json and pass ....

            if (table_data.length !== 0) {

                var url = "../Attendenc_controller/employee_attend_update";

                var Jsonobject = JSON.stringify(table_data);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {datatable:Jsonobject},
                    success: function (response) {

                        alert(response);

                        if(response ==="Save"){
                            document.getElementById("daly_attendenc_table").innerHTML="";
                            document.getElementById("file").value="";

                        }
                        console.log(response);

                    },

                });

                // console.log(table_data);
            } else {

                new PNotify({
                    title: 'Inform ',
                    text: 'pleas Upload  file........ !',
                    type: 'info',
                    styling: 'bootstrap3'

                });

            }

        });


        $(document).on('change', '#file', function () {

            var property = document.getElementById("file").files[0];
            var exelfile_name = property.name;
            var exelfile_extension = exelfile_name.split('.').pop().toLocaleLowerCase();

            if (jQuery.inArray(exelfile_extension, ['xlsx', 'xls','csv']) == -1) {

                new PNotify({
                    title: 'Inform ',
                    text: 'invalid  file ...!',
                    type: 'error',
                    styling: 'bootstrap3'

                });

            } else {

                var formData = new FormData();
                formData.append("file", property);

                var url = "../File_upload_controller/upload_exsel"
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    // async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {

                        if (response === "upload don") {

                            new PNotify({
                                title: 'Success',
                                text: 'Upload File Success ...... !',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            load_upload_data_content_data();
                        } else {

                            new PNotify({
                                title: 'Inform ',
                                text: 'No file selected',
                                type: 'info',
                                styling: 'bootstrap3'

                            });

                        }

                    }
                });

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

    })
    ;

</script>

<!-- /page content -->







