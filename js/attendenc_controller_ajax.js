function attendenc_status_save() {

    var attendence_status = document.getElementById("attendenc_status").value;

    var url = "../Attendenc_controller/save_attendence_status";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {attendence_status: attendence_status}, function (response) {

        alert(response);
        document.getElementById("attendenc_status").value = "";
        load_attendence_status_table();

    }, 'text');

}

function load_attendence_status_table() {

    var url = "../Attendenc_controller/all_search_attendence_status";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var id;
        var attendence_status;
        var table = "";

        for (var k in JSONObject) {

            id = JSONObject[k]["id"];

            attendence_status = JSONObject[k]["attendence_status"];
            table = table + "<tr> <th scope=\"row\">" + id + "</th><td>" + attendence_status + "</td></tr>";
        }

        document.getElementById("attendenc_status_table_id").innerHTML = table;

    }, 'text');

}

function hours_count_get() {

    var start_time = document.getElementById("start_time").value;
    var end_time = document.getElementById("end_time").value;

    var startTime = moment(start_time, "HH:mm:ss a");
    var endTime = moment(end_time, "HH:mm:ss a");

    var totalHours = (endTime.diff(startTime, 'hours'));
    var totalMinutes = endTime.diff(startTime, 'minutes');
    var clearMinutes = totalMinutes % 60;
    console.log(totalHours + " hours and " + clearMinutes + " minutes");

    var new_hours;
    var new_minutes;

    if (totalHours <= 0 && clearMinutes <= 0) {

        console.log(totalHours + " 2-hours and " + clearMinutes + " 2-minutes");

        new_hours = totalHours / -1;
        new_hours = 23 - new_hours;

        new_minutes = clearMinutes / -1;
        new_minutes = 60 - new_minutes;


    } else {

        if (totalHours === 0) {
            new_hours = 24 - totalHours;
        } else {
            new_hours = totalHours;
        }
        new_minutes = clearMinutes;
    }

    document.getElementById("hours_count").value = new_hours + ' hour and ' + new_minutes + ' minutes.';

    return new_hours + "." + new_minutes;

}

function Save_shiftment() {

    var url = "../Attendenc_controller/save_shiftment";

    var shiftment_name = document.getElementById("shiftment_name").value;
    var start_time = document.getElementById("start_time").value;
    var end_time = document.getElementById("end_time").value;
    var hours_count = hours_count_get();

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {
        shiftment_name: shiftment_name,
        start_time: start_time,
        end_time: end_time,
        hours_count: hours_count
    }, function (response) {

        document.getElementById("shiftment_name").value = "";
        document.getElementById("start_time").value = "";
        document.getElementById("end_time").value = "";
        document.getElementById("hours_count").value = "";

        load_shiftment_table();

    }, 'text');

}

function load_shiftment_table() {

    var url = "../Attendenc_controller/load_shiftment_all";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var shiftment_name;
        var start_time;
        var end_time;
        var hours_count;

        var table = "";

        for (var k in JSONObject) {

            shiftment_name = JSONObject[k]["shiftment_name"];
            start_time = JSONObject[k]["start_time"];
            end_time = JSONObject[k]["end_time"];
            hours_count = JSONObject[k]["hours_count"];

            hours_countformat = parseFloat(hours_count).toFixed(2);

            table = table + "<tr> <th scope=\"row\">" + shiftment_name + "</th><td>" + start_time + "</td><td>" + end_time + "</td><td>" + hours_countformat + "h</td></tr>";
        }

        document.getElementById("shiftment_table_id").innerHTML = table;

    }, 'text');


}

function load_shiftment_for_select() {

    var url = "../Attendenc_controller/load_shiftment_all";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {}, function (response) {

        var JSONObject = JSON.parse(response);

        var shiftment_name;

        var option = document.getElementById("shiftment").innerHTML;

        for (var k in JSONObject) {

            shiftment_name = JSONObject[k]["shiftment_name"];

            option = option + "<option>" + shiftment_name + "</option>";
        }

        document.getElementById("shiftment").innerHTML = option;

    }, 'text');

}

function load_roster_for_branch() {

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

    }, 'text');

}

var tbl;

function load_branch_employee_for_duty_roster() {

    var url = "../Attendenc_controller/load_employee_duty_roster";
    var branch = document.getElementById("branch").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {branch: branch}, function (response) {


        console.log(response);

        if (response !== "No-data") {

            var JSONObject = JSON.parse(response);

            tbl = $('#datatable-buttons').DataTable({

                destroy: true,
                data: JSONObject,
                columns: [
                    {data: 'employee_id', title: 'Employee ID'},
                    {data: 'employee_name', title: 'Name'},
                    {data: 'employee_department', title: 'Department'},
                    {data: 'employee_position', title: 'Designation'},
                    {data: 'input', title: 'All Select'},

                ]

            });

        } else {

            var table = "<tr class=\"odd\"><td valign=\"top\" colspan=\"4\" class=\"dataTables_empty\">No data available in table</td></tr>";

            document.getElementById("duty_roster_manage_table").innerHTML = table;

        }

    }, 'text');

}

function getSelected(value) {

    var ischecked = document.getElementById(value).checked;
    var shiftment = document.getElementById("shiftment").value;
    var from_date = document.getElementById("from_date").value;
    var to_date = document.getElementById("to_date").value;
    var branch = document.getElementById("branch").value;

    var format_year;
    var week;

    if (ischecked == true) {

        // var to_date = new Date(to_date);

        // for (var d = new Date(from_date); d <= to_date; d.setDate(d.getDate() + 1)) {

        // var newDate = new Date(d);
        //
        // (function (newDate) {
        //
        //     console.log("Date - " + new Date(d));

        // week = week_day(newDate);
        // format_year = months(newDate) + " " + newDate.getDate() + " " + newDate.getFullYear();

        var url = "../Attendenc_controller/save_employee_attendance_data";
        var employee_id = value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {
                branch: branch,
                employee_id: employee_id,
                shiftment: shiftment,
                from_date: from_date,
                to_date: to_date
            }
            , function (response) {

                if(response ==="pleas select shiftment"){

                    new PNotify({
                            title: 'Inform ',
                            text: 'pleas select shift........',
                            type: 'info',
                            styling: 'bootstrap3'

                    });

                    // new PNotify({
                    //     title: 'Regular Notice',
                    //     text: 'Check me out! I\'m a notice.',
                    //     styling: 'bootstrap3'
                    // });

                }else {

                    new PNotify({
                        title: 'Success',
                        text: 'Add shift Success ...... !',
                        type: 'success',
                        styling: 'bootstrap3'
                    });

                }


            }, 'text');

        // })(newDate);

        // }

    } else {

        alert("Employee -" + value + "-" + ischecked);

        var url = "../Attendenc_controller/uncheck_employee_duty_roster";
        var employee_id = value;

        $.ajaxSetup({
            cache: false
        });
        $.post(url, {
                employee_id: employee_id,
                shiftment: shiftment,
                from_date: from_date,
                to_date: to_date
            }
            , function (response) {

                alert(response);
            }, 'text');

    }

}

function load_duty_roster() {

    var url = "../Attendenc_controller/load_duty_roster";
    var branch = document.getElementById("branch").value;
    var from_date = document.getElementById("from_date").value;
    var to_date = document.getElementById("to_date").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {
        branch: branch,
        from_date: from_date,
        to_date: to_date
    }, function (response) {

        if (response !== "No-data") {

            var JSONObject = JSON.parse(response);

            tbl = $('#datatable-buttons').DataTable({

                'createdRow': function (row, data, dataIndex) {
                    $(row).attr({'data-toggle': 'modal', 'data-target': '.bs-example-modal-lg'});

                },

                "order": [],
                "columnDefs": [

                    {
                        "targets": 'no-sort',
                        "orderable": false,
                    },
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
                ],

                destroy: true,
                select: true,
                data: JSONObject,
                columns: [
                    {data: 'roster_id', title: 'Roster ID'},
                    {data: 'employee_id', title: 'Employee ID'},
                    {data: 'employee_name', title: 'Name'},
                    {data: 'shiftment', title: 'Shiftment'},
                    {data: 'sunday', title: 'Sunday'},
                    {data: 'monday', title: 'Monday'},
                    {data: 'tuesday', title: 'Tuesday'},
                    {data: 'wednesday', title: 'Wednesday'},
                    {data: 'thursday', title: 'Thursday'},
                    {data: 'friday', title: 'Friday'},
                    {data: 'saturday', title: 'Saturday'},
                ],

                select: {
                    style: 'single'
                },


            });

        } else {

            var table = "<tr class=\"odd\"><td valign=\"top\" colspan=\"4\" class=\"dataTables_empty\">No data available in table</td></tr>";

            document.getElementById("duty_roster_table").innerHTML = table;

        }


    }, 'text');

}

var employee_ro_id;

function dataTable_model_set_value(data) {

    employee_ro_id = data['roster_id'];

    document.getElementById("shiftment").innerHTML = "<option>Choose Shift</option>"
    load_shiftment_for_select();

    var url = "../Attendenc_controller/load_employee_attendance_row";

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {
        roster_id: data['roster_id']
    }, function (response) {

        if (response !== "No-data") {

            var JSONObject = JSON.parse(response);

            var date;
            var shift;

            for (var k in JSONObject) {
                date = JSONObject[k]["date"];
                shift = JSONObject[k]["shiftment"];
            }

            document.getElementById("shiftment").value = shift;
            document.getElementById("date").value = date;
            document.getElementById("employee_name").value = data['employee_name'];

        }

    }, 'text');

}

function update_duty_roster() {

    var url = "../Attendenc_controller/employee_attendance_shift_update";
    var shift = document.getElementById("shiftment").value;

    $.ajaxSetup({
        cache: false

    });
    $.post(url, {
        roster_id: employee_ro_id,
        shift: shift
    }, function (response) {

        if (response === "true") {

            new PNotify({
                title: 'Success',
                text: 'Update shift Success ...... !',
                type: 'success',
                styling: 'bootstrap3'
            });
            document.getElementById("close_modal").click();
            load_duty_roster();
        }else {

            new PNotify({
                title: 'Oh No!',
                text: 'Something terrible happened.',
                type: 'error',
                styling: 'bootstrap3'
            });

        }

    }, 'text');


}

// function week_day(date) {
//
//     var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
//     return days[date.getDay()];
//
// }


// function months(date) {
//
//     var monthNames = ["January", "February", "March", "April", "May", "June",
//         "July", "August", "September", "October", "November", "December"];
//     return monthNames[date.getMonth()];
// }
