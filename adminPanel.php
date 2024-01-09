<?php
require "./assets/model/visitor.php";
session_start();

if (!isset($_SESSION["lt_admin"]) || $_SESSION["lt_admin"] == null) {
    header("Location: ../Admin");
} else {

    require "assets/model/getOrdersList.php";
    require "assets/model/timeZoneConverter.php";

    $admin = $_SESSION["lt_admin"];

    $employee_rs = Database::search("SELECT *,`employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`, `employee`.`id` AS `emp_id`
    FROM `employee`
    INNER JOIN `admin` ON `employee`.`id`=`admin`.`employee_id`
    INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` WHERE `employee`.`id`='" . $admin["employee_id"] . "'");
    $employee_data = $employee_rs->fetch_assoc();

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
        <style>
            .transactionModel {
                width: 50%;
            }

            .model-responsive {
                width: 50%;
            }

            .spinner {
                width: 56px;
                height: 56px;
                display: grid;
                border: 4.5px solid #0000;
                border-radius: 50%;
                border-right-color: #fff;
                animation: spinner-a4dj62 1.2s infinite linear;
            }

            .spinner::before,
            .spinner::after {
                content: "";
                grid-area: 1/1;
                margin: 2.2px;
                border: inherit;
                border-radius: 50%;
                animation: spinner-a4dj62 2.4s infinite;
            }

            .spinner::after {
                margin: 8.9px;
                animation-duration: 3.5999999999999996s;
            }

            @keyframes spinner-a4dj62 {
                100% {
                    transform: rotate(1turn);
                }
            }
        </style>
    </head>

    <body style="background-color: #EAEAEA;">

        <div class="position-fixed top-0 start-0 vh-100 vw-100 d-flex flex-column gap-2 justify-content-center align-items-center" style="z-index: 99; background-color: #2b2b2b;" id="preLoader">
            <div class="spinner"></div>
            <div class="text-white quicksand-SemiBold">Page is Loading...</div>
        </div>

        <div class="position-fixed start-0 top-0 vh-100 vw-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center d-none" style="z-index: 4;" id="messageModel">
            <div class="bg-white px-2 py-1 rounded model-responsive">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="quicksand-SemiBold">Message</span>
                    <iconify-icon icon="ic:round-close" class="c-pointer" onclick="toggleMessageModel(false);"></iconify-icon>
                </div>
                <div class="mt-3" id="com_and_req_message">

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">

                <div class="position-fixed start-0 top-0 vw-100 vh-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center d-none" style="z-index: 2;" id="transactionHistoryModel">
                    <div class="bg-white rounded p-1 transactionModel">
                        <div class="d-flex justify-content-center position-relative">
                            <div class="position-absolute end-0 me-2 mt-1 c-pointer fs-5" onclick="toggleTransactionModel();">
                                <iconify-icon icon="ic:round-close"></iconify-icon>
                            </div>

                            <?php

                            $order_table = Database::search("SELECT * FROM `order` ORDER BY `date_time` ASC LIMIT 1");
                            $order_table_data = $order_table->fetch_assoc();

                            $custom_order_table = Database::search("SELECT * FROM `custom_tour` ORDER BY `date_time` ASC LIMIT 1");
                            $custom_order_table_data = $custom_order_table->fetch_assoc();

                            $order_year = date("Y", strtotime($order_table_data["date_time"]));
                            $custom_order_year = date("Y", strtotime($custom_order_table_data["date_time"]));

                            $first_year;

                            if ($order_year < $custom_order_year) {
                                $first_year = $order_year;
                            } else {
                                $first_year = $custom_order_year;
                            }

                            $this_year = new DateTime();
                            $this_year = $this_year->setTimezone(new DateTimeZone("Asia/Colombo"));
                            $this_year = $this_year->format("Y");

                            $year_count = intval($this_year) - intval($first_year);

                            ?>

                            <select class="text-dark px-2 py-1 border-1 border-secondary rounded mb-2" style="min-width: 200px; max-width: fit-content;" onchange="setTransactionYear();" id="transactionYearSelector">
                                <option value="0">Year</option>
                                <?php
                                for ($x = 0; $x <= $year_count; $x++) {
                                ?>
                                    <option value="<?php echo ($first_year); ?>"><?php echo ($first_year); ?></option>
                                <?php

                                    $first_year += 1;
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <canvas id="allTransaction"></canvas>
                        </div>
                    </div>
                </div>

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

                                    $date = new DateTime();
                                    $today = $date->setTimezone(new DateTimeZone("Asia/Colombo"));
                                    $today = $today->format("Y-m-d");

                                    $query = "SELECT * FROM `order` WHERE `end_date`<'" . $today . "'";
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

                                    $query = "SELECT * FROM `custom_tour` WHERE `end_date`<'" . $today . "'";
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
                                        <div class="content p-3">
                                            <img src="<?php
                                                        if (empty($employee_data["profile_picture"])) {
                                                            echo ("../assets/img/profile/empty_profile.jpg");
                                                        } else {
                                                            echo ("../assets/img/profile/admin/" . $employee_data["profile_picture"]);
                                                        }
                                                        ?>" alt="" class="admin_panel-profile-image">
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
                                            <div class="d-flex justify-content-between px-2">
                                                <span class="fst-italic quicksand-Medium" style="z-index: 1; font-size: 16px;">-
                                                    Year : <?php echo ($year); ?> -</span>
                                                <button class="px-3 d-flex justify-content-center align-items-center border-0 rounded" style="outline: none; background-color: #0090AF;" onclick="toggleTransactionModel();">
                                                    <iconify-icon icon="solar:chart-linear" class="text-white"></iconify-icon>
                                                </button>
                                            </div>
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

                                                $message_rs = Database::search("SELECT * FROM `request_message` WHERE `status`<>'1' ORDER BY `date_time` DESC");

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
                                                                <span class="text-decoration-none text-primary" style="font-size: 14px;" onclick="toggleMessageModel('<?php echo ($message_data['id']); ?>');">View more...</span>
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
                                                                <span class="text-decoration-none text-primary" style="font-size: 14px;" onclick="toggleMessageModel('<?php echo ($message_data['id']); ?>');">View more...</span>
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

                                                $order_query = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name` FROM `order` 
                                                INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
                                                INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
                                                INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
                                                WHERE `order`.`start_date` <= '" . $today . "' AND `order`.`end_date` >= '" . $today . "' 
                                                ORDER BY `start_date` ASC";

                                                $ct_order_query = "SELECT *,`employee`.`name` AS `guide_name` FROM `custom_tour`
                                                INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
                                                INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
                                                WHERE `custom_tour`.`start_date` <= '" . $today . "' AND `custom_tour`.`end_date` >= '" . $today . "' ORDER BY `start_date` ASC";

                                                $ongoingTourList = getOrders::getOrderList($order_query, $ct_order_query);

                                                for ($ongoing_iteration = 0; $ongoing_iteration < sizeof($ongoingTourList); $ongoing_iteration++) {
                                                    $main_data = $ongoingTourList[$ongoing_iteration];
                                                ?>
                                                    <div class="ongoing-tour-box px-3 rounded d-flex align-items-center gap-2" onclick="viewOngoingTour();">
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
                                                                    <?php echo ($main_data["tour_name"]); ?>
                                                                </span>
                                                                <span style="font-size: 14px;" class="text-black-50 quicksand-Medium"><?php echo ((new DateTime($today))->diff(new DateTime($ongoingTourList[$ongoing_iteration]["end_date"]))->days); ?> Days Left</span>
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

        <script src="../js/adminTemplate.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart JS Link -->
        <script src="../js/transaction.js"></script>
        <script src="../js/adminPanel.js"></script>
        <script src="../js/visiterChart.js"></script>
    </body>

    </html>

<?php

}

?>