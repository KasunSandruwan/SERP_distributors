function load_branch_employee() {

    var url = "../Employee_controller/serch_branchall";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("branch").innerHTML;

        var branch_code;
        var branch_name;

        for (var k in JSONObject) {

            branch_name = JSONObject[k]["branch_name"];
            option = option + "<option>" + branch_name + "</option>";

        }

        document.getElementById("branch").innerHTML = option;


        document.getElementById("employee_type").innerHTML="<option>Choose Employee Type</option>";
        load_employee_type();

    }, 'text');

}

function load_employee_type() {

    var url = "../Employee_controller/serch_employee_type";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("employee_type").innerHTML;

        var branch_code;
        var type;

        for (var k in JSONObject) {

            type = JSONObject[k]["type"];
            option = option + "<option>" + type + "</option>";

        }

        document.getElementById("employee_type").innerHTML = option;

        document.getElementById("salary_type").innerHTML="<option>Choose Salary Type</option>";
        load_salary_type();

    }, 'text');

}

function load_salary_type() {

    var url = "../Employee_controller/serch_salary_type";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("salary_type").innerHTML;

        var branch_code;
        var salary_type;

        for (var k in JSONObject) {

            salary_type = JSONObject[k]["salary_type"];
            option = option + "<option>" + salary_type + "</option>";

        }

        document.getElementById("salary_type").innerHTML = option;

        document.getElementById("position").innerHTML="<option>Choose Position</option>";
        load_position();

    }, 'text');

}

function load_position() {

    var url = "../Employee_controller/serch_position";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("position").innerHTML;

        var branch_code;
        var position;

        for (var k in JSONObject) {

            position = JSONObject[k]["position"];
            option = option + "<option>" + position + "</option>";

        }

        document.getElementById("position").innerHTML = option;

    }, 'text');

}

function load_department() {

    var url = "../Employee_controller/load_department";
    var branch = document.getElementById("branch").value;

    document.getElementById("department").innerHTML = "<option> Choose Departmen </option>";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {data: branch}, function (response) {

        var JSONObject = JSON.parse(response);

        var option = document.getElementById("department").innerHTML;

        var branch_code;
        var department;

        for (var k in JSONObject) {

            department = JSONObject[k]["department_name"];
            option = option + "<option>" + department + "</option>";

        }

        document.getElementById("department").innerHTML = option;

    }, 'text');

}

$("#profile-form-employee").submit(function (e) {
    e.preventDefault();

    var dataform = $("#profile-form-employee").serialize();

    var url = "../Employee_controller/save_profile_data"

    $.ajaxSetup({
        cache: false,

    });
    $.post(url, dataform, function (response) {

        if (response === "true") {
            get_employee_details();
        }

    }, 'text');

});

// $("#employee_form").submit(function (e) {
//     e.preventDefault();
//
//     alert("sun");
//
//      var dataform = $("#employee_form").serialize();
//
//     var url = "../Employee_controller/save_employee"
//
//     $.ajaxSetup({
//         cache: false,
//
//     });
//     $.post(url, dataform, function (response) {
//
//         if (response === "true") {
//
//             document.getElementById("employee_id").value="";
//             document.getElementById("epf").value="";
//             document.getElementById("single_cal3").value="";
//             // masege save.........................................
//         }
//
//     }, 'text');
//
// });

function search_data() {

    var url = "../Employee_controller/search_profile_data" ;

    var user_code = document.getElementById("user-code").value;

    $.ajaxSetup({
        cache: false,

    });
    $.post(url, { user_data: user_code}, function (response) {

        var JSONObject = JSON.parse(response);

        var user_code;
        var surname;
        var fname;
        var lname;
        var nic;

        for (var k in JSONObject) {

            user_code = JSONObject[k]["user_code"];
            fname = JSONObject[k]["fname"];
            lname = JSONObject[k]["lname"];
            nic = JSONObject[k]["nic"];

            document.getElementById("user_data").innerHTML = "<option value="+user_code+">"+user_code+" "+"("+fname+" "+lname+" "+nic+")"+"</option>";

        }

    }, 'text');

}

var tbl2;

function all_employees_company_is_active() {

    var url = "../Employee_controller/search_employee_details_branch";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        console.log(response);

        var JSONObject = JSON.parse(response);

        tbl2 = $('#datatable').DataTable({

            destroy: true,
            data: JSONObject,
            columns: [
                {data: 'employee_id', title: 'Employee ID'},
                {data: 'employee_name', title: 'Name'},
                {data: 'employee_branch', title: 'Branch'},
                {data: 'employee_department', title: 'Department'},
                {data: 'employee_position', title: 'Designation'},
                {data: 'input', title: ''},
                {data: 'update', title: ''},

            ]

        });


    }, 'text');

}
function Qualification_add(value) {

    var user_code=value;
    load_all_qualification_employee(user_code);

}

function update_employee_details(data) {


    var url = "../Employee_controller/get_employee_data_for_update";
    var Employee_ID=data;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {Employee_ID:Employee_ID}, function (response) {

        var JSONObject = JSON.parse(response);


        var employee_id;
        var employee_code;
        var employee_name;
        var employee_position;

        for (var k in JSONObject) {

            employee_id = JSONObject[k]["employee_ID"];
            employee_code = JSONObject[k]["employee_code"];
            employee_name = JSONObject[k]["employee_name"];
            employee_position = JSONObject[k]["employee_position"];

        }

        document.getElementById("employee_id").value=employee_id;
        document.getElementById("employee_code").value=employee_code;
        document.getElementById("name_of_employee").value=employee_name;
        document.getElementById("designation").value=employee_position;

    }, 'text');




}




