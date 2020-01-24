<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="images/img.jpg" alt=""><?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname') ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="../Page_controller/profile"> Profile</a></li>
                        <li>
                            <a href="../Page_controller/settings">
                                <!--                                <span class="badge bg-red pull-right">50%</span>-->
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/login_controller/logout_user"><i
                                        class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">

                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span id="notification_count" class="badge bg-green"></span>
                    </a>

                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                        <div id="notification_menu"></div>
                        <!--                                                                        <li>-->
                        <!--                            <a>-->
                        <!--                                <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>-->
                        <!--                                <span>-->
                        <!--                          <span>John Smith</span>-->
                        <!--                          <span class="time">3 mins ago</span>-->
                        <!--                        </span>-->
                        <!--                                <span class="message">-->
                        <!--                          Film festivals used to be do-or-die moments for movie makers. They were where...-->
                        <!--                        </span>-->
                        <!--                            </a>-->
                        <!--                                                </li>-->

                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>
    </div>
</div>

<script>

    setInterval(massage, 5000);

    function massage() {

        var url = "../Notification_controller/check_user_has_notification";

        $.ajaxSetup({
            cache: false

        });
        $.post(url, {}, function (response) {

            // console.log(response);

            if(response !=="No_data") {

                var JSONObject = JSON.parse(response);

                var id;
                var profile_name;
                var notification_time;
                var description;
                var notification_count;
                var action;

                var html = "";

                for (var k in JSONObject) {

                    id = JSONObject[k]["id"];
                    profile_name = JSONObject[k]["profile_name"];
                    notification_time = JSONObject[k]["notification_time"];
                    description = JSONObject[k]["description"];
                    notification_count = JSONObject[k]["notification_count"];
                    action = JSONObject[k]["action"];


                    html = html + "<li onclick=\"notification_action('" + id + "','" + action + "');\">\n" +
                        "  <a>\n" +
                        "       <span>\n" +
                        "            <span>" + profile_name + "</span>\n" +
                        "                          <span class=\"time\">" + notification_time + "</span>\n" +
                        "            </span>\n" +
                        "        <span class=\"message\">" + description + "</span>\n" +
                        "              </a>\n" +
                        "                     </li>";

                }

                document.getElementById("notification_menu").innerHTML = html;
                document.getElementById("notification_count").innerHTML = notification_count;

            }

        }, 'text');

    }

    function notification_action(id, action) {

        switch (action) {

            case "Employee_has_leave_application":

                alert("ID - " + id + " action -" + action);

                break;
            default:
                break;
        }


    }

</script>