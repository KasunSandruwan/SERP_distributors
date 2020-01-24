function day_type_save() {

    var day_type = document.getElementById("day_type").value;

    var url = "../Attendenc_controller/save_day_type";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {day_type: day_type}, function (response) {

        load_Holiday_select();
        load_day_type_table();
        document.getElementById("day_type").value = "";

    }, 'text');

}

function load_day_type_table() {

    var url = "../Attendenc_controller/all_search_day_type";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var day_typ;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];

            day_typ = JSONObject[k]["day_typ"];
            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + day_typ + "</td></tr>";
        }

        document.getElementById("day_type_table_id").innerHTML = table;

    }, 'text');

}

function load_Holiday_select() {

    var url = "../Attendenc_controller/all_search_day_type";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var day_typ;
        var option = document.getElementById("Holiday_select").innerHTML;

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];

            day_typ = JSONObject[k]["day_typ"];
            option = option + "<option>" + day_typ + "</option>";
        }

        document.getElementById("Holiday_select").innerHTML = option;

    }, 'text');
}

function save_calender_date() {

    var calender = document.getElementById("single_cal3").value;
    var date = new Date(calender);

    var calender_date =months(date)+"-"+date.getFullYear()+"-"+date.getDate();
    var week_day = week(date);
    var day_type = document.getElementById("Holiday_select").value;

    var url = "../Attendenc_controller/save_calender_date";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {calender_date: calender_date, week_day: week_day, day_type: day_type}, function (response) {

        document.getElementById("single_cal3").value = "";
        document.getElementById("Holiday_select").innerHTML="<option>Choose Holiday</option>";
        load_Holiday_select();
        load_calender_date_tabe();

    }, 'text');

}


function week(date) {

    var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    return days[date.getDay()];

}

function months(date) {
    var monthNames = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
    return monthNames[date.getMonth()];
}

function load_calender_date_tabe() {

    var url = "../Attendenc_controller/all_search_calender_date";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var calender_date;
        var week_day;
        var day_typ;
        var table = "";

        for (var k in JSONObject) {

            calender_date = JSONObject[k]["calender_date"];
            week_day = JSONObject[k]["week_day"];
            day_typ = JSONObject[k]["day_typ"];

            table = table + "<tr> <th scope=\"row\">" + calender_date + "</th><td>" + week_day + "</td><td>" + day_typ + "</td></tr>";
        }

        document.getElementById("calender_date_table_id").innerHTML = table;

    }, 'text');


}



