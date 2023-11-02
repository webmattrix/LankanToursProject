<?php
require "./assets/model/sqlConnection.php";
require "./assets/model/visitor.php";
require "./assets/model/timeZoneConverter.php";


session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/adminPanel.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/scrolbar.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
</head>

<body style="background-color: #EAEAEA;">

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto; min-height: 100vh;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div class="col-12 px-3 pt-2 pb-3">
                        <div class="row">
                            <div class="admin_header-grid">

                                <?php

                                $overall_income = 0;
                                $yearly_income = 0;
                                $monthly_income = 0;
                                $outgoing_income = 0;
                                $total_engagement = 0;
                                $today_engagement = 0;
                                $saving_amount = 0;

                                // To get this year
                                $dateTimeObject = new DateTime();
                                $dateTimeObject->setTimezone(new DateTimeZone(date_default_timezone_get()));
                                $year = $dateTimeObject->format("Y");
                                $month = $dateTimeObject->format("m");

                                $query = "SELECT * FROM `order`";
                                $order_rs = Database::search($query);
                                $order_num = $order_rs->num_rows;
                                for ($order_iteration = 0; $order_iteration < $order_num; $order_iteration++) {
                                    $order_data = $order_rs->fetch_assoc();
                                    $overall_income = $overall_income + $order_data['cost'];
                                    $saving_amount = $saving_amount + $order_data['saving_amount'];

                                    $order_year = date("Y", strtotime($order_data["date_time"]));
                                    if ($order_year == $year) {
                                        $yearly_income = $yearly_income + $order_data['cost'];

                                        $order_month = date("m", strtotime($order_data["date_time"]));
                                        if ($order_month == $month) {
                                            $monthly_income = $monthly_income + $order_data['cost'];
                                        }
                                    }
                                }

                                $query = "SELECT * FROM `custom_tour`";
                                $ct_order_rs = Database::search($query);
                                $ct_order_num = $ct_order_rs->num_rows;
                                for ($ct_order_iteration = 0; $ct_order_iteration < $ct_order_num; $ct_order_iteration++) {
                                    $ct_order_data = $ct_order_rs->fetch_assoc();
                                    $overall_income = $overall_income + $ct_order_data['cost'];
                                    $saving_amount = $saving_amount + $ct_order_data['saving_amount'];

                                    $ct_order_year = date("Y", strtotime($ct_order_data["date_time"]));
                                    if ($ct_order_year == $year) {
                                        $yearly_income = $yearly_income + $ct_order_data['cost'];

                                        $ct_order_month = date("m", strtotime($ct_order_data["date_time"]));
                                        if ($ct_order_month == $month) {
                                            $monthly_income = $monthly_income + $ct_order_data['cost'];
                                        }
                                    }
                                }

                                $query = "SELECT * FROM `user`";
                                $user_rs = Database::search($query);
                                $total_users = sprintf("%02s", $user_rs->num_rows);
                                $new_users = 0;
                                for ($user_iteration = 0; $user_iteration < $user_rs->num_rows; $user_iteration++) {
                                    $user_data = $user_rs->fetch_assoc();
                                    $user_reg_month = date("Y-m", strtotime($user_data["reg_date"]));
                                    if ($user_reg_month == $year . "-" . $month) {
                                        $new_users = $new_users + 1;
                                    }
                                }
                                $new_users = sprintf("%02s", $new_users);

                                ?>

                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/overall_income.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Overall
                                        Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">
                                        <?php echo ("$" . $overall_income); ?>
                                    </span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/income.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Yearly
                                        Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">
                                        <?php echo ("$" . $yearly_income); ?>
                                    </span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/profile_card.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <div class="content p-3">
                                        <img src="../assets/img/girl_profile_picture.jpg" alt="" class="admin_panel-profile-image">
                                        <div class="admin-name">
                                            <span class="name segoeui-bold">John Luther</span>
                                            <span class="type quicksand-SemiBold">Owner</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/todayEngagement.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Today
                                        Engagement</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">
                                        <?php echo ($total_users); ?>
                                    </span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/income.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Profit</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">
                                        <?php echo ("$" . $saving_amount); ?>
                                    </span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/overall_outgoing.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Outgoing
                                        Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">
                                        <?php echo ("$" . $overall_income - $saving_amount); ?>
                                    </span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/totalEngagement.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">New
                                        Engagements</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">
                                        <?php echo ($new_users); ?>
                                    </span>
                                </div>
                            </div>

                            <hr>

                            <div class="admin_body-container">

                                <div class="admin_body-grid">
                                    <div class="position-relative"> <!-- Income Chart (According to the months) -->
                                        <span class="fst-italic quicksand-Medium" style="z-index: 1; font-size: 16px;">-
                                            Year : 2023 -</span>
                                        <div class="w-100 h-100">
                                            <canvas id="canvas" class="rounded p-2"></canvas>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="fst-italic quicksand-Medium" style="z-index: 1; font-size: 16px;">-
                                            Visiters -</span>
                                        <div class="p-2 chart-container w-100 h-100">
                                            <canvas id="myChart" style="width: 100%; height: 100%; position: relative;"></canvas>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="quicksand-Bold">Messages</span>
                                            <hr style="width: 100%;">
                                        </div>
                                        <div class="d-flex flex-column gap-3 admin_panel_scroll-boxes" style="overflow-y: auto;">
                                            <?php

                                            $message_rs = Database::search("SELECT * FROM `request_message` ORDER BY `date_time` DESC");

                                            for ($x = 0; $x < $message_rs->num_rows; $x++) {
                                                $message_data = $message_rs->fetch_assoc();

                                                $convertTime = strtotime(timeConverter::convert($message_data["date_time"]));

                                                $user_rs = Database::search("SELECT * FROM user WHERE `email`='" . $message_data["email"] . "'");
                                                if ($user_rs->num_rows == 1) {
                                                    $user_data = $user_rs->fetch_assoc();
                                            ?>
                                                    <div class="msg-box px-3 rounded <?php if ($message_data["status"] == 0) {
                                                                                            echo ("border border-secondary");
                                                                                        } ?>">
                                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                                            <span class="quicksand-SemiBold fs-6">
                                                                <?php echo ($user_data["f_name"] . " " . $user_data["l_name"]); ?>
                                                            </span>
                                                            <span style="font-size: 14px;" class="text-black-50 quicksand-Regular">
                                                                <?php echo (date("d M, Y", $convertTime)); ?>
                                                            </span>
                                                        </div>
                                                        <div class="pt-2 quicksand-SemiBold position-relative">
                                                            <span class="text-black-50 admin_panel-msg-text">
                                                                <?php echo ($message_data["message"]); ?>
                                                            </span>
                                                            <a class="text-decoration-none" style="font-size: 14px;" href="#">View more...</a>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="msg-box px-3 rounded <?php if ($message_data["status"] == 0) {
                                                                                            echo ("border border-secondary");
                                                                                        } ?>">
                                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                                            <span class="quicksand-SemiBold fs-6">
                                                                <?php echo ($message_data["email"]); ?>
                                                            </span>
                                                            <span style="font-size: 14px;" class="text-black-50 quicksand-Regular">
                                                                <?php echo (date("d M, Y", $convertTime)); ?>
                                                            </span>
                                                        </div>
                                                        <div class="pt-2 quicksand-SemiBold position-relative">
                                                            <span class="text-black-50 admin_panel-msg-text">
                                                                <?php echo ($message_data["message"]); ?>
                                                            </span>
                                                            <a class="text-decoration-none" style="font-size: 14px;" href="#">View more...</a>
                                                        </div>
                                                    </div>
                                                <?php
                                                }

                                                ?>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="quicksand-Bold" style="min-width: max-content; display: block;">Ongoing Tours</span>
                                            <hr style="width: 100%;">
                                        </div>
                                        <div class="d-flex flex-column gap-3 admin_panel_scroll-boxes" style="overflow-y: auto;">
                                            <?php

                                            $date = new DateTime();
                                            $today = $date->setTimezone(new DateTimeZone("Asia/Colombo"));
                                            $today = $today->format("Y-m-d");

                                            $order_rs = Database::search("SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name` FROM `order` 
                                            INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
                                            INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
                                            INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
                                            WHERE `order`.`start_date` <= '" . $today . "' AND `order`.`end_date` >= '" . $today . "' 
                                            ORDER BY `start_date` ASC");
                                            $ct_order_rs = Database::search("SELECT *,`employee`.`name` AS `guide_name` FROM `custom_tour`
                                            INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
                                            INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
                                            WHERE `custom_tour`.`start_date` <= '" . $today . "' AND `custom_tour`.`end_date` >= '" . $today . "' ORDER BY `start_date` ASC");

                                            $order_num = $order_rs->num_rows;
                                            $ct_order_num = $ct_order_rs->num_rows;

                                            $order_iteration = 0;
                                            $ct_order_iteration = 0;

                                            $loop = true;

                                            $order_previouse = null;
                                            $ct_order_previouse = null;

                                            $order_data = null;
                                            $ct_order_data = null;

                                            $order_start = null;
                                            $ct_order_start = null;

                                            while ($loop) {

                                                if ($order_previouse == null) {
                                                    if ($order_iteration < $order_num) {
                                                        $order_data = $order_rs->fetch_assoc();
                                                        $order_start = strtotime($order_data["start_date"]);
                                                        $order_iteration = $order_iteration + 1;
                                                    } else {
                                                        $order_start = "9999-99-99";
                                                    }
                                                } else {
                                                }

                                                if ($ct_order_previouse == null) {
                                                    if ($ct_order_iteration < $ct_order_num) {
                                                        $ct_order_data = $ct_order_rs->fetch_assoc();
                                                        $ct_order_start = strtotime($ct_order_data["start_date"]);
                                                        $ct_order_iteration = $ct_order_iteration + 1;
                                                    } else {
                                                        $ct_order_start = "9999-99-99";
                                                    }
                                                } else {
                                                }

                                                if ($order_start > $ct_order_start) {
                                                    $order_previouse = $order_data;
                                                    $ct_order_previouse = null;
                                                    $main_data = $ct_order_data;
                                                    $tour_name = "Custom Tour";
                                                } else {
                                                    $ct_order_previouse = $ct_order_data;
                                                    $order_previouse = null;
                                                    $main_data = $order_data;
                                                    $tour_name = $main_data["tour_name"];
                                                }


                                                if ($order_iteration == $order_num && $ct_order_iteration == $ct_order_num) {
                                                    $loop = false;
                                                }

                                            ?>
                                                <div class="ongoing-tour-box px-3 rounded d-flex align-items-center gap-2">
                                                    <?php
                                                    if ($main_data["profile_picture"] == null || empty($main_data["profile_picture"])) {
                                                    ?>
                                                        <img src="../assets/img/profile/empty_profile.jpg" style="width: 50px; clip-path: circle();" />
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <img src="../assets/img/profile/guide/<?php echo ($main_data["profile_picture"]); ?>" style="width: 50px; clip-path: circle();" />
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="w-100 p-1">
                                                        <div class="w-100 d-flex justify-content-between">
                                                            <span class="quicksand-SemiBold">
                                                                <?php echo ($tour_name); ?>
                                                            </span>
                                                            <span style="font-size: 14px;" class="text-black-50 quicksand-Medium"><?php echo ((date_diff(new DateTime($today), new DateTime($main_data["end_date"])))->d); ?> Days Left</span>
                                                        </div>
                                                        <div class="w-100 p-1">
                                                            <span class="quicksand-Medium">Assigned Guide :
                                                                <?php echo ($main_data["guide_name"]); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Page Content / body content eka methanin liyanna -->

                </div>

            </div>

        </div>
    </div>

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart JS Link -->
    <script src="../js/adminPanel.js"></script>
    <script src="../js/visiterChart.js"></script>

</body>

</html>