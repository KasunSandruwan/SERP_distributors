function runScript(e) {

    if (e.keyCode == 13) {

        qualification_type_save();
    }
}

function qualification_type_save() {

    var qualification_type = document.getElementById("qualification-type").value;

    var url = "../Qualification_controller/save_qualification_type";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {data: qualification_type}, function (response) {

        document.getElementById("qualification-type").value = "";
        qualification_load__type_table();
        document.getElementById("qualification-type-select").innerHTML = "<option>Choose Qualification Type</option>";
        qualification_type_set_select();

    }, 'text');


}

function qualification_load__type_table() {

    var url = "../Qualification_controller/load_qualification_type_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var qualification_type;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];
            qualification_type = JSONObject[k]["qualification_type"];
            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + qualification_type + "</td></tr>";
        }

        document.getElementById("qualification_type_table_id").innerHTML = table;


    }, 'text');

}


function qualification_type_set_select() {


    var url = "../Qualification_controller/load_qualification_type_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);


        var id;
        var qualification_type;
        var option = document.getElementById("qualification-type-select").innerHTML;

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];
            qualification_type = JSONObject[k]["qualification_type"];
            option = option + "<option>" + qualification_type + "</option>";
        }

        document.getElementById("qualification-type-select").innerHTML = option;


    }, 'text');

}

function save_qualification() {

    var qualification = document.getElementById("qualification").value;
    var description = document.getElementById("description").value;
    var qualification_type_select = document.getElementById("qualification-type-select").value;


    var url = "../Qualification_controller/save_qualification";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {
        qualification_name: qualification,
        description: description,
        qualification_type_select: qualification_type_select
    }, function (response) {

        document.getElementById("qualification").value = "";
        document.getElementById("description").value = "";
        qualification_load_table();
        document.getElementById("qualification_subject").innerHTML = "<option>Choose Qualification </option>";
        load_qualification();

    }, 'text');

}


function qualification_load_table() {

    var url = "../Qualification_controller/load_qualification_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);


        var id;
        var qualification_type;
        var qualification_name;
        var description;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];
            qualification_type = JSONObject[k]["qualification_type"];
            qualification_name = JSONObject[k]["qualification_name"];
            description = JSONObject[k]["description"];
            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + qualification_type + "</td><td>" + qualification_name + "</td><td>" + description + "</td></tr>";
        }

        document.getElementById("qualification_table_id").innerHTML = table;


    }, 'text');

}

function subject_save() {

    var subject = document.getElementById("subject").value;
    var qualification = document.getElementById("qualification_subject").value;


    var url = "../Qualification_controller/subject_save";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {qualification_subject: subject, qualification: qualification}, function (response) {

        document.getElementById("subject").value = "";
        load_subject_in_table();


    }, 'text');


}

function load_subject_in_table() {

    var url = "../Qualification_controller/load_subject_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var subject;
        var qualification;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];
            subject = JSONObject[k]["subject"];
            qualification = JSONObject[k]["qualification"];
            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + subject + "</td><td>" + qualification + "</td></tr>";
        }

        document.getElementById("subject_table_id").innerHTML = table;


    }, 'text');
}

function load_qualification() {

    var url = "../Qualification_controller/load_qualification";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);


        var id;
        var qualification_name;
        var option = document.getElementById("qualification_subject").innerHTML;

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];
            qualification_name = JSONObject[k]["qualification_name"];
            option = option + "<option>" + qualification_name + "</option>";
        }

        document.getElementById("qualification_subject").innerHTML = option;

    }, 'text');

}

function where_search_subject_qualification_id() {

    var url = "../Qualification_controller/search_subject_where_qualification_id";
    var qualification = document.getElementById('qualification_subject').value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {qualification: qualification}, function (response) {

        if (response !== "No_data") {

            document.getElementById("table_load").innerHTML = " <table class=\"table table-striped\">\n" +
                "                                    <thead>\n" +
                "                                    <tr>\n" +
                "                                        <th>#</th>\n" +
                "                                        <th>Subject</th>\n" +
                "                                        <th>Class</th>\n" +
                "                                    </tr>\n" +
                "                                    </thead>\n" +
                "                                    <tbody id=\"subject_table_id\">\n" +
                "\n" +
                "                                    </tbody>\n" +
                "                                </table>"

            var JSONObject = JSON.parse(response);

            var id;
            var subject;
            var table = "";

            for (var k in JSONObject) {

                id = JSONObject[k]["id"];

                subject = JSONObject[k]["subject"];
                table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + subject + "</td><td><input type='text' name='subject_" + id + "' ></td></tr>";
            }

            document.getElementById("subject_table_id").innerHTML = table;

        }

    }, 'text');

}

function load_all_qualification_employee(user_code) {

    qualification_add();

    var delayInMilliseconds = 1000;

    var url = "../Qualification_controller/all_search_qualification_employee";
    var user_code = user_code;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {user_code: user_code}, function (response) {

        if (response !== "No-Qualification") {

            var JSONObject = JSON.parse(response);

            console.log(JSONObject);

            var employee_code;
            var employee_name;
            var employee_qualification;
            var description;
            var issued_date;
            var subjectObject;
            var table_qualificationa = "";
            var subtable = "";

            for (var k in JSONObject) {

                employee_code = JSONObject[k]["employee_code"];
                employee_name = JSONObject[k]["employee_name"];
                employee_qualification = JSONObject[k]["employee_qualification"];
                description = JSONObject[k]["description"];
                issued_date = JSONObject[k]["issued_date"];
                subjectObject = JSONObject[k]["subjectObject"];

                if (JSONObject[k]["subjectObject"] !== null) {

                    for (var j in subjectObject) {

                        console.log("subject object call" + j);

                        subtable = subtable + "<tr>\n" +
                            "                                            <td>" + subjectObject[j].subject_name + "</td>\n" +
                            "                                            <td>" + subjectObject[j].class + "</td>\n" +
                            "                                            </tr>";

                    }

                    table_qualificationa = table_qualificationa + "           <tr>\n" +
                        "                                    <th scope=\"row\">" + employee_code + "</th>\n" +
                        "                                    <td>" + employee_name + "</td>\n" +
                        "                                    <td>" + employee_qualification + "</td>\n" +
                        "                                    <td>" + description + "</td>\n" +
                        "                                    <td>" + issued_date + "</td>\n" +
                        "                                    <td><table class=\"table table-responsive\"><thead>\n" +
                        "                                            <tr>\n" +
                        "                                                <th>Subject</th>\n" +
                        "                                                <th>Class</th>\n" +
                        "                                            </tr>\n" +
                        "                                            </thead>\n" +
                        "                                            <tbody>" + subtable + "</tbody>\n" +
                        "                                        </table>\n" +
                        "                                </td>\n" +
                        "                                </tr>";

                } else {

                    table_qualificationa = table_qualificationa + "           <tr>\n" +
                        "                                    <th scope=\"row\">" + employee_code + "</th>\n" +
                        "                                    <td>" + employee_name + "</td>\n" +
                        "                                    <td>" + employee_qualification + "</td>\n" +
                        "                                    <td>" + description + "</td>\n" +
                        "                                    <td>" + issued_date + "</td>\n" +
                        "                                    <td>" + "                " + "</td>\n" +
                        "                                </tr>";

                }

            }

            setTimeout(function () {
                console.log("qualification_table data" + table_qualificationa);
                document.getElementById("qualification_table").innerHTML = table_qualificationa;

            }, delayInMilliseconds);

        }

        setTimeout(function () {

            document.getElementById("user-code").value = user_code;
            document.getElementById("user-code").setAttribute("readonly", "readonly");

        }, delayInMilliseconds);

    }, 'text');


}

function load_all_qualification_employee_after_add_new(user_code) {

    var url = "../Qualification_controller/all_search_qualification_employee";
    var user_code = user_code;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {user_code: user_code}, function (response) {

        if (response !== "No-Qualification") {

            var JSONObject = JSON.parse(response);

            console.log(JSONObject);

            var employee_code;
            var employee_name;
            var employee_qualification;
            var description;
            var issued_date;
            var subjectObject;
            var table = "";
            var subtable = "";

            for (var k in JSONObject) {

                employee_code = JSONObject[k]["employee_code"];
                employee_name = JSONObject[k]["employee_name"];
                employee_qualification = JSONObject[k]["employee_qualification"];
                description = JSONObject[k]["description"];
                issued_date = JSONObject[k]["issued_date"];
                subjectObject = JSONObject[k]["subjectObject"];

                if (JSONObject[k]["subjectObject"] !== null) {

                    for (var j in subjectObject) {

                        console.log("subject object call" + j);

                        subtable = subtable + "<tr>\n" +
                            "                                            <td>" + subjectObject[j].subject_name + "</td>\n" +
                            "                                            <td>" + subjectObject[j].class + "</td>\n" +
                            "                                            </tr>";

                    }


                    table = table + "           <tr>\n" +
                        "                                    <th scope=\"row\">" + employee_code + "</th>\n" +
                        "                                    <td>" + employee_name + "</td>\n" +
                        "                                    <td>" + employee_qualification + "</td>\n" +
                        "                                    <td>" + description + "</td>\n" +
                        "                                    <td>" + issued_date + "</td>\n" +
                        "                                    <td><table class=\"table table-responsive\"><thead>\n" +
                        "                                            <tr>\n" +
                        "                                                <th>Subject</th>\n" +
                        "                                                <th>Class</th>\n" +
                        "                                            </tr>\n" +
                        "                                            </thead>\n" +
                        "                                            <tbody>" + subtable + "</tbody>\n" +
                        "                                        </table>\n" +
                        "                                </td>\n" +
                        "                                </tr>";


                } else {

                    table = table + "           <tr>\n" +
                        "                                    <th scope=\"row\">" + employee_code + "</th>\n" +
                        "                                    <td>" + employee_name + "</td>\n" +
                        "                                    <td>" + employee_qualification + "</td>\n" +
                        "                                    <td>" + description + "</td>\n" +
                        "                                    <td>" + issued_date + "</td>\n" +
                        "                                    <td>" + "                " + "</td>\n" +
                        "                                </tr>";

                }


            }
            document.getElementById("qualification_table").innerHTML = table;

        }
        document.getElementById("user-code").value = user_code;
        document.getElementById("user-code").setAttribute("readonly", "readonly");

    }, 'text');

}




