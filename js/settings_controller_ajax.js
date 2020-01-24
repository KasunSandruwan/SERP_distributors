function employee_type_save() {

    var url = "../Admin_controller/save_employee_type";
    var employee_type=document.getElementById("employee_type").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {employee_type:employee_type}, function (response) {
        if(response ==="true"){
            document.getElementById("employee_type").value="";
            load_employee_type_for_table();

        }

    }, 'text');

}

function load_employee_type_for_table() {

    var url = "../Admin_controller/search_emplyee_type";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var employee_type;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["employee_id"];
            employee_type = JSONObject[k]["employee_type"];
            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + employee_type + "</td></tr>";
        }

        document.getElementById("employee_type_table").innerHTML = table;

    }, 'text');

}

function salary_type_save() {

    var url = "../Admin_controller/insert_salary_type";

    var salary_type=document.getElementById("salary_type").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {salary_type:salary_type}, function (response) {
        if(response ==="true"){
            document.getElementById("salary_type").value="";
            load_salary_type_for_table();
        }

    }, 'text');

}

function load_salary_type_for_table() {

    var url = "../Admin_controller/load_salary_type_for_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

    var JSONObject = JSON.parse(response);

    var id;
    var employee_type;
    var table = "";

    for (var k in JSONObject) {

        id = JSONObject[k]["idsalary_type"];
        employee_type = JSONObject[k]["salary_type"];
        table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + employee_type + "</td></tr>";
    }

    document.getElementById("salary_type_table").innerHTML = table;

}, 'text');

}

function load_position_for_table() {

    var url = "../Admin_controller/load_position_for_table";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var position;
        var desciption;
        var sequence;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["idposition"];
            position = JSONObject[k]["position"];
            desciption = JSONObject[k]["desciption"];
            sequence = JSONObject[k]["sequence"];

            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + position + "</td><td>"+desciption+"</td><td>"+sequence+"</td></tr>";
        }

        document.getElementById("position_table").innerHTML = table;

    }, 'text');

}

function position_save() {

    var url = "../Admin_controller/insert_position";

    var position=document.getElementById("position").value;
    var description=document.getElementById("description").value;
    var sequence=document.getElementById("sequence").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {position:position,description:description,sequence:sequence}, function (response) {

        if(response ==="true"){

           document.getElementById("position").value="";
           document.getElementById("description").value="";
           document.getElementById("sequence").value="";

            load_position_for_table();
        }

    }, 'text');

}
