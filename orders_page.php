<?php

require "./assets/model/getOrdersList.php";
require "./assets/model/timeZoneConverter.php";

session_start();

$admin = $_SESSION["lt_admin"];

$employee_rs = Database::search("SELECT *, `employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`,`employee`.`id` AS `emp_id` 
                                     FROM `employee` 
                                     INNER JOIN `admin` ON `employee`.`id`=`admin`.`employee_id` 
                                     INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` 
                                     WHERE `employee`.`id`='" . $admin["employee_id"] . "'");

$employee_data = $employee_rs->fetch_assoc();

$today = new DateTime();
$today->setTimezone(new DateTimeZone($_SESSION["timeZone"]));
$today = $today->format("Y-m-d");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Orders</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/orders_page.css" />
    <!-- <link rel="stylesheet" href="./css/orderDark.css" /> -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <div class="container-fluid">
        <div class="row">


            <div class="position-fixed top-0 start-0 vw-100 vh-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center d-none" style="z-index: 2;" id="tourOrderModel">
                <div class="bg-white rounded shadow p-1 col-8 col-lg-6 col-xl-5" style="max-height: 70vh; overflow-y: auto; overflow-x: hidden;">
                    <div class="row px-2">
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span>Tour Order</span>
                            <iconify-icon icon="ic:round-close" class="c-pointer fs-5" onclick="tourOrderModel(false,false,'close');"></iconify-icon>
                        </div>
                        <div class="col-12" id="tourOrderFillContainer">

                        </div>
                    </div>
                </div>
            </div>

            <div class="position-fixed top-0 start-0 vw-100 vh-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center d-none" style="z-index: 2;" id="tourTableModel">
                <div class="bg-white rounded shadow p-1 col-8 col-lg-6 col-xl-5" style="max-height: 70vh; overflow-y: auto; overflow-x: hidden;">
                    <div class="row px-2">
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span>Tour Order</span>
                            <iconify-icon icon="ic:round-close" class="c-pointer fs-5" onclick="tourTableModel(false,false,'close');"></iconify-icon>
                        </div>
                        <div class="col-12" id="tableModelFillContainer">
                            
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column bg-orderP" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div>
                        <div class="col-12">
                            <div class="row m-0 p-0">

                                <div class="col-12">
                                    <div class="row justify-content-center">
                                        <div class="col-10 mt-lg-5 mt-3">
                                            <div class="row">

                                                <?php

                                                $top_tour = Database::search("SELECT *, COUNT(`tour_id`) AS `tour_count`,`tour_id`,`tour`.`name` AS `tour_name`, SUM(`members`) AS `total_members`, SUM(`cost`) AS `worth` 
                                            FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` GROUP BY `tour_id` ORDER BY `tour_count` DESC LIMIT 1");
                                                $top_tour_data = $top_tour->fetch_assoc();

                                                ?>

                                                <div class="col-8 offset-2 offset-lg-0 col-lg-6 col-xxl-4">
                                                    <div class="row">
                                                        <div class="img-component-container col-12">
                                                            <div class="img-component" style="background-image: url('../assets/img/shashank-hudkar-KYBc1eq0dJo-unsplash.jpg');"></div>
                                                            <img src="../assets/img/shashank-hudkar-KYBc1eq0dJo-unsplash.jpg" alt="" />
                                                            <img src="../assets/img/shashank-hudkar-KYBc1eq0dJo-unsplash.jpg" alt="" />
                                                            <img src="../assets/img/shashank-hudkar-KYBc1eq0dJo-unsplash.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 py-2 px-3 mt-3 mt-lg-0">
                                                    <div class="row" style="line-height: 0.4in;">
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Tour Name :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;"><?php echo $top_tour_data["tour_name"]; ?></span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Tour Count :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;">1<?php echo $top_tour_data["tour_count"]; ?></span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Total Members :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;"><?php echo $top_tour_data["total_members"]; ?></span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Worth :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;">$ <?php echo $top_tour_data["worth"]; ?></span></span>
                                                        </div>
                                                        <div class="">
                                                            <button class="ordersPg_R_moreBTN">read more <iconify-icon icon="ep:right" class="pt-1" style="color: #9D3DE9;"></iconify-icon></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="row px-3">

                                        <div class="col-12 bg-white rounded shadow p-3 mt-2 overflow-auto">
                                            <table class="table table-bordered">
                                                <thead class="table_header">
                                                    <tr>
                                                        <th class="fw-normal quicksand-SemiBold">Tour Plan</th>
                                                        <th class="fw-normal quicksand-SemiBold">Tour Guide</th>
                                                        <th class="fw-normal quicksand-SemiBold">Members</th>
                                                        <th class="fw-normal quicksand-SemiBold">Timeline</th>
                                                        <th class="fw-normal quicksand-SemiBold">Status</th>
                                                        <th class="fw-normal quicksand-SemiBold">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $order_query = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide`,`order`.`id` AS `order_id` FROM `tour`
                                                                INNER JOIN `order` ON `tour`.`id`=`order`.`tour_id`
                                                                INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id`
                                                                INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
                                                                ORDER BY `start_date` ASC";

                                                    $ct_order_query = "SELECT *,`employee`.`name` AS `guide`,`custom_tour`.`id` AS `order_id` FROM `custom_tour`
                                                                INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
                                                                INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
                                                                ORDER BY `start_date` ASC";

                                                    $orderList = getOrders::getOrderList($order_query, $ct_order_query);

                                                    for ($order_iteration = 0; $order_iteration < sizeof($orderList); $order_iteration++) {
                                                        $order_data = $orderList[$order_iteration];

                                                        $start_date = $order_data["start_date"];
                                                        $convert_start_date = date("d M, Y", strtotime(timeConverter::convert($start_date)));

                                                        $end_date = $order_data["end_date"];
                                                        $convert_end_date = date("d M, Y", strtotime(timeConverter::convert($end_date)));

                                                    ?>
                                                        <tr>
                                                            <td><?php echo ($order_data["tour_name"]); ?></td>
                                                            <td><?php echo ($order_data["guide"]); ?></td>
                                                            <td><?php echo ($order_data["members"]); ?></td>
                                                            <td><?php echo ($convert_start_date . " - " . $convert_end_date); ?></td>
                                                            <td class="<?php
                                                                        if ($today >= $start_date && $today < $end_date) {
                                                                            echo ("text-success");
                                                                        } else if ($today < $start_date && $today < $end_date) {
                                                                            echo ("text-warning");
                                                                        }
                                                                        ?>"><?php
                                                                            if ($today >= $start_date && $today < $end_date) {
                                                                                echo ("Ongoing");
                                                                            } else if ($today < $start_date && $today < $end_date) {
                                                                                echo ("Pending");
                                                                            } else if ($today > $start_date && $today > $end_date) {
                                                                                echo ("Complete");
                                                                            }
                                                                            ?></td>
                                                            <td class="fs-5 text-dark text-opacity-75">
                                                                <span class="d-flex justify-content-center align-items-center" onclick="tourTableModel('<?php echo ($order_data['order_id']); ?>','<?php echo ($order_data['tour_name']); ?>');">
                                                                    <iconify-icon icon="solar:eye-bold" class="c-pointer px-2"></iconify-icon>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12 mt-3 mb-3">
                                    <div class="row d-flex flex-column flex-column-reverse flex-md-row px-3">

                                        <div class="col-12 col-lg-6">
                                            <div class="row pe-0 pe-lg-2 pb-4 pb-lg-0">
                                                <div class="col-12 bg-white rounded pb-2 c-pointer">
                                                    <div class="py-1 pb-3 quicksand-SemiBold">Unassigned Tours</div>
                                                    <div class="px-2" style="max-height: 300px; height: 300px; overflow-y: auto;">
                                                        <?php

                                                        $unAssigned_order_query = "SELECT *,`tour`.`name` AS `tour_name`,`order`.`id` AS `order_id` FROM `order`
                                                                            INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id`
                                                                            INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id`
                                                                            WHERE `order_status`.`name`='Unassigned' ORDER BY `order`.`date_time` ASC";

                                                        $unAssigned_ct_order_query = "SELECT *,`custom_tour`.`id` AS `order_id` FROM `custom_tour`
                                                                            INNER JOIN `order_status` ON `order_status`.`id`=`custom_tour`.`order_status_id`
                                                                            WHERE `order_status`.`name`='Unassigned'
                                                                            ORDER BY `custom_tour`.`date_time` ASC";

                                                        $unAssigned_orderList = getOrders::getOrderList($unAssigned_order_query, $unAssigned_ct_order_query);

                                                        for ($unassign_iteration = 0; $unassign_iteration < sizeof($unAssigned_orderList); $unassign_iteration++) {
                                                            $unassigne_tour_data = $unAssigned_orderList[$unassign_iteration];

                                                            $date_time = $unassigne_tour_data["date_time"];
                                                            $convert_date_time = date("Y-m-d", strtotime(timeConverter::convert($date_time)));

                                                        ?>
                                                            <div class="col-12 bg-secondary bg-opacity-10 rounded d-flex align-items-center gap-2 hover-shadow mb-3 py-2" style="height: fit-content;" onclick="tourOrderModel('<?php echo ($unassigne_tour_data['order_id']); ?>','<?php echo ($unassigne_tour_data['tour_name']); ?>');">
                                                                <img src="../assets/img/profile/empty_profile.jpg" alt="" style="width: 3rem; clip-path: circle(); max-height: 3rem;">
                                                                <div class="w-100">
                                                                    <div class="border-bottom border-secondary d-flex justify-content-between px-2">
                                                                        <span class="sub-heading"><?php echo ($unassigne_tour_data["tour_name"]); ?></span>
                                                                        <span class="content-heading text-black-50"><?php echo ($convert_date_time); ?></span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between p-1 align-items-center">
                                                                        <!-- <span style="width: 90%; max-width: 90%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="content-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde iste laudantium ipsum sint error molestias, obcaecati culpa vitae, odit eaque nam maiores in exercitationem minima at. Explicabo, repellat rem ut fugit nostrum delectus fuga perferendis quas enim laborum quos amet.</span> -->
                                                                        <div class="content-heading" style="display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 2;"><?php echo ($unassigne_tour_data["request_message"]); ?></div>
                                                                        <iconify-icon icon="mingcute:warning-fill" style="width: 5%; color: #E45200;" class="fs-5"></iconify-icon>
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
                                        <div class="col-12 col-lg-6">
                                            <div class="row ps-0 ps-lg-2 pb-4 pb-lg-0">
                                                <div class="col-12 bg-white rounded pb-2 c-pointer">
                                                    <div class="py-1 pb-3 quicksand-SemiBold">Assigned Tours</div>
                                                    <div class="px-2" style="max-height: 300px; height: 300px; overflow-y: auto;">
                                                        <?php

                                                        $Assigned_order_query = "SELECT *,`tour`.`name` AS `tour_name`,`order`.`id` AS `order_id`,`employee`.`name` AS `employee` FROM `order`
                                                                                INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id`
                                                                                INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id`
                                                                                INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id`
                                                                                INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
                                                                                WHERE `order_status`.`name`='Assigned' AND `order`.`start_date` >= '" . $today . "'
                                                                                ORDER BY `order`.`start_date` ASC";

                                                        $Assigned_ct_order_query = "SELECT *,`custom_tour`.`id` AS `order_id`,`employee`.`name` AS `employee` FROM `custom_tour`
                                                                                INNER JOIN `order_status` ON `order_status`.`id`=`custom_tour`.`order_status_id`
                                                                                INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
                                                                                INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
                                                                                WHERE `order_status`.`name`='Assigned' AND `custom_tour`.`start_date` >= '" . $today . "'
                                                                                ORDER BY `custom_tour`.`start_date` ASC";

                                                        $Assigned_orderList = getOrders::getOrderList($Assigned_order_query, $Assigned_ct_order_query);

                                                        for ($assign_iteration = 0; $assign_iteration < sizeof($Assigned_orderList); $assign_iteration++) {
                                                            $assigne_tour_data = $Assigned_orderList[$assign_iteration];

                                                            $date_time = $assigne_tour_data["start_date"];
                                                            $convert_date_time = date("Y-m-d", strtotime(timeConverter::convert($date_time)));

                                                        ?>
                                                            <div class="col-12 bg-secondary bg-opacity-10 rounded d-flex align-items-center gap-2 hover-shadow mb-3 py-2" style="height: fit-content;" onclick="tourOrderModel('<?php echo ($assigne_tour_data['order_id']); ?>','<?php echo ($assigne_tour_data['tour_name']); ?>');">
                                                                <img src="../assets/img/profile/empty_profile.jpg" alt="" style="width: 3rem; clip-path: circle(); max-height: 3rem;">
                                                                <div class="w-100">
                                                                    <div class="border-bottom border-secondary d-flex justify-content-between px-2">
                                                                        <span class="sub-heading"><?php echo ($assigne_tour_data["tour_name"]); ?></span>
                                                                        <span class="content-heading text-black-50">Start: <?php echo ($convert_date_time); ?></span>
                                                                    </div>
                                                                    <div class="d-flex p-1 justify-content-between align-items-center">
                                                                        <span class="" style="display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 2;">Guide : <?php echo ($assigne_tour_data["employee"]); ?></span>
                                                                        <iconify-icon icon="fluent-mdl2:completed-solid" style="width: 5%;" class="text-success fs-5"></iconify-icon>
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

                            </div>
                        </div>
                    </div>
                    <!-- Page Content / body content eka methanin liyanna -->

                </div>

            </div>

        </div>
    </div>

    <script src="../js/orders.js"></script>
    <script src="../js/adminTemplate.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>