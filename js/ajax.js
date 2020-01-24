function profiledata(url) {

    $.ajaxSetup({
        cache: false
    });
    $.post(url, {}, function (response) {

        var object = JSON.parse(response);

        document.getElementById('first-name').value = object["fname"];
        document.getElementById('last-name').value = object["lname"];
        document.getElementById('nic-number').value = object["nic"];
        document.getElementById('sur-name').value = object["surname"];
        document.getElementById('passport').value = object["passport"];
        document.getElementById('email').value = object["email"];

        document.getElementById('p_address').innerHTML = object["p_address"];
        document.getElementById('address').innerHTML = object["address"];

        document.getElementById('single_cal3').value = object["date_of_birth"];

        if (object["gender"] == 'male') {

            document.getElementById('male').setAttribute("class", "iradio_flat-green hover checked");
        } else {
            document.getElementById('female').setAttribute("class", "iradio_flat-green hover checked");
        }

        document.getElementById('primary-phonenumber').value = object["primary-phonenumber"];
        document.getElementById('phonenumber').value = object["phonenumber"];

    }, 'text');

}

function statusload(url) {

    $.ajaxSetup({
        cache: false
    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var status_type;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];
            status_type = JSONObject[k]["status_type"];
            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + status_type + "</td></tr>";
        }

        document.getElementById("st_tbody").innerHTML = table;

    }, 'text');

}

function load_title(url) {

    $.ajaxSetup({
        cache: false
    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("title").innerHTML;
        var title;

        for (var k in JSONObject) {
            title = JSONObject[k]["title"];
            option = option + "<option>" + title + "</option>";
        }
        document.getElementById("title").innerHTML = option;

    }, 'text');

}

function getcompany_maxid() {

    var url = "../New_user_from_controller/get_company_maxid";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {
        document.getElementById("company-code").value = response;

    }, 'text');

}

function getbranch_maxid() {

    var url = "../New_user_from_controller/get_branch_maxid";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        document.getElementById("branch-code").value = response;

    }, 'text');

}

function load_branch() {

    var url = "../New_user_from_controller/serch_branchall";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var branch_code;
        var branch_name;
        var branch_contact;
        var branch_email;
        var branch_address;
        var branch_id;

        var table = "";

        for (var k in JSONObject) {

            branch_id = JSONObject[k]["branch_id"];
            branch_code = JSONObject[k]["branch_code"];
            branch_name = JSONObject[k]["branch_name"];
            branch_contact = JSONObject[k]["branch_contact"];
            branch_email = JSONObject[k]["branch_email"];
            branch_address = JSONObject[k]["branch_address"];
            table = table + "<tr> <th scope=\"row\">" + branch_code + "</th><td>" + branch_name + "</td><td>" + branch_contact + "</td><td>" + branch_email + "</td><td>" + branch_address + "</td><td><button type='button' onclick=\"Remove_branch(" + branch_id + ")\" class=\"btn btn-round btn-danger btn-xs\">Remove</button></td></tr>";

        }

        document.getElementById("table-branch").innerHTML = table;


    }, 'text');

}

function Remove_branch(id) {

    var url = "../New_user_from_controller/Delete_Branch";

    $.ajaxSetup({
        cache: false
    });
    $.post(url, {branch_id: id}, function (response) {

        if (response === "true") {
            load_branch();
        }

    }, 'text');

}


function load_branch_department() {

    var url = "../New_user_from_controller/serch_branchall";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("branch-name-select").innerHTML;

        var branch_code;
        var branch_name;

        for (var k in JSONObject) {

            branch_name = JSONObject[k]["branch_name"];
            option = option + "<option>" + branch_name + "</option>";

        }

        document.getElementById("branch-name-select").innerHTML = option;
        load_department();

    }, 'text');

}

function load_department() {

    var url = "../New_user_from_controller/serch_department";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("department_list").innerHTML;

        var department_name;

        for (var k in JSONObject) {

            department_name = JSONObject[k]["department_name"];
            option = option + "<option >" + department_name + "</option>";

        }

        document.getElementById("department_list").innerHTML = option;

    }, 'text');


}

function load_user_role() {

    var url = "../New_user_from_controller/get_user_role";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("user-role").innerHTML;

        for (var k in JSONObject) {
            user_role_value = JSONObject[k]["user_role"];

            if (user_role_value !== "super admin") {
                option = option + "<option>" + user_role_value + "</option>";

            }

        }
        document.getElementById("user-role").innerHTML = option;

    }, 'text');

}

function load_department_branch_table() {

    var url = "../New_user_from_controller/load_department_has_branch_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var department_id;
        var branch;
        var department;
        var table = "";

        for (var k in JSONObject) {

            department_id = JSONObject[k]["department_id"];
            branch = JSONObject[k]["branch"];
            department = JSONObject[k]["department"];
            table = table + "<tr> <th scope=\"row\">" + branch + "</th><td>" + department + "</td><td><button type='button' onclick=\"Remove_department(" + department_id + ")\" class=\"btn btn-round btn-danger btn-xs\">Remove</button></td></tr>";
        }

        document.getElementById("table-department").innerHTML = table;

    }, 'text');

}

function Remove_department(id) {

    var url = "../New_user_from_controller/Delete_department"


    $.ajaxSetup({
        cache: false,

    });
    $.post(url, {department_id: id}, function (response) {

        if (response === "true") {
            load_department_branch_table();
            alert(response);
        }

    }, 'text');

}


$("#profile-form-step_1").submit(function (e) {
    e.preventDefault();

    var dataform = $("#profile-form-step_1").serialize();
    var url = "../New_user_from_controller/save_profile_data"

    $.ajaxSetup({
        cache: false,

    });
    $.post(url, dataform, function (response) {

        if (response === "true") {
            document.getElementById("next-button").click();
            load_user_role();
        }

    }, 'text');


});


$("#create-user-form-step_2").submit(function (e) {
    e.preventDefault();

    var dataform = $("#create-user-form-step_2").serialize();
    var url = "../New_user_from_controller/save_user_login_account"


    $.ajaxSetup({
        cache: false,

    });
    $.post(url, dataform, function (response) {

        if (response === "true") {
            document.getElementById("next-button2").click();
            getcompany_maxid();
        }else {


        }

    }, 'text');


});


$("#company_register-step3").submit(function (e) {
    e.preventDefault();

    var dataform = $("#company_register-step3").serialize();
    var url = "../New_user_from_controller/save_company"


    $.ajaxSetup({
        cache: false,

    });
    $.post(url, dataform, function (response) {

        if (response === "true") {
            document.getElementById("next-button3").click();
            getbranch_maxid();
        }

    }, 'text');


});

$("#branch_register_step4").submit(function (e) {
    e.preventDefault();

    var dataform = $("#branch_register_step4").serialize();

    var url = "../New_user_from_controller/save_branch"


    $.ajaxSetup({
        cache: false,

    });
    $.post(url, dataform, function (response) {

        if (response === "true") {
            getbranch_maxid();
            document.getElementById("branch-name").value = "";
            document.getElementById("branch-contact_number").value = "";
            document.getElementById("branch-email").value = "";
            document.getElementById("branch-address").value = "";
            load_branch();

        }

    }, 'text')

});


$("#department_register_step5").submit(function (e) {
    e.preventDefault();

    var dataform = $("#department_register_step5").serialize();
    var url = "../New_user_from_controller/insert_department"


    $.ajaxSetup({
        cache: false,

    });
    $.post(url, dataform, function (response) {

        load_department_branch_table();
        document.getElementById("department_list").innerHTML = "<option>" + " " + "</option>";
        load_department();

    }, 'text');

});

function go_to_loginpage() {
    window.location.href = "../login_controller/logout_user";
}













