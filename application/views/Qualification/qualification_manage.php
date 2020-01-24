<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Qualification Manage
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

                        <span class="section">Qualification Type</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Qualification Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="qualification-type" name="qualification-type"
                                       onkeypress="runScript(event)"
                                       class="form-control col-md-7 col-xs-12">

                            </div>


                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons"
                                       onclick="qualification_type_save()">
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="qualification_type_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Qualification Type</th>
                                    </tr>
                                    </thead>
                                    <tbody id="qualification_type_table_id">

                                    </tbody>
                                </table>


                            </div>
                        </div>


                        <span class="section">Qualification</span>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Qualification Type
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="qualification-type-select" name="qualification-type-select"
                                        class="form-control">
                                    <option>Choose Qualification Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="qualification">Qualification
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="qualification" name="qualification"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label col-md-3 col-sm-3">Description
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <textarea id="description" class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-md-offset-3">
                                <button type="button" class="btn buttons" onclick="save_qualification()">Add</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="qualification_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Qualification Type</th>
                                        <th>Qualification</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody id="qualification_table_id">

                                    </tbody>
                                </table>


                            </div>
                        </div>

                        <span class="section">Subject</span>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"
                                   for="qualification-type-select">Qualification
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select id="qualification_subject" name="qualification_subject"
                                        class="form-control">
                                    <option>Choose Qualification </option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Subject">Subject
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="subject" name="subject"
                                       class="form-control col-md-7 col-xs-12">

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="Subject">
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="button" value="Add" class="btn buttons" onclick="subject_save()" >
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="subject_table">
                            </label>
                            <div class="col-md-6 col-sm-6">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Qualification</th>
                                    </tr>
                                    </thead>
                                    <tbody id="subject_table_id">

                                    </tbody>
                                </table>


                            </div>
                        </div>


                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<script>
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


    qualification_load__type_table();
    qualification_type_set_select();
    qualification_load_table();
    load_subject_in_table();
    load_qualification();

</script>


<!-- /page content -->







