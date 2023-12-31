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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Orders</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <?php

    if (isset($_COOKIE["lt_theme"])) {
        if ($_COOKIE["lt_theme"] === 'light') {
    ?>
            <link rel="stylesheet" href="./css/orders_page.css">
        <?php
        } else {
        ?>
            <link rel="stylesheet" href="./css/orderDark.css">
        <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="./css/orders_page.css">
    <?php
    }

    ?>

    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/orders_page.css" />
    <!-- <link rel="stylesheet" href="./css/orderDark.css" /> -->
</head>

<body>

    <div class="container-fluid">
        <div class="row">

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

                                <!-- Open modal from unassign tours -->

                                <div class="col-12">
                                    <div class="row justify-content-center">
                                        <div class="col-10 mt-lg-5 mt-3">
                                            <div class="row">

                                                <?php

                                                $top_tour = Database::search("SELECT *, COUNT(`tour_id`) AS `tour_count`,`tour_id`,`tour`.`name` AS `tour_name`, SUM(`members`) AS `total_members`, SUM(`cost`) AS `worth` 
                                            FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` GROUP BY `tour_id` ORDER BY `tour_count` DESC LIMIT 1");
                                                $top_tour_data = $top_tour->fetch_assoc();

                                                ?>

                                                <div class="col-12 col-lg-4">
                                                    <div class="row">
                                                        <img src="../assets/img/ordersPg_IMG/tour_plan_pack.png" style="width: 100%; height: 100%;" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-8 py-2 px-3">
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
                                                        <div class="col-12 col-sm-4 col-lg-4">
                                                            <button class="ordersPg_R_moreBTN">read more <iconify-icon icon="ep:right" class="pt-1" style="color: #9D3DE9;"></iconify-icon></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-lg-5 mb-lg-5 mt-2 mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-lg-11 pt-5 px-5 pb-2 blog-ord-bg-cont1">
                                            <div class="row justify-content-center">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <!-- <div class="col-12 col-sm-5 col-lg-5 my-sm-2 mt-lg-0">
                                                            <span class="d-flex align-items-center"><iconify-icon icon="material-symbols:tune" class="fs-5 icon-style3"></iconify-icon> &nbsp;<span class="filter-textC2" style="font-family: 'Segoe'; font-size: calc(0.64rem + 0.68vh);">Filter</span>
                                                                <div class="col-lg-6 col-9 col-sm-9 ps-3">
                                                                    <select class="selector_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                        <option selected>Select</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div class="col-11 col-lg-7 col-sm-7 my-sm-2 mt-3 mt-lg-0 mt-sm-0">
                                                            <div class="row justify-content-end">
                                                                <div class="col-12 col-lg-6 col-sm-8">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" onkeyup="searchFiltering();" id="searchAnyInp" placeholder="search here..." style="font-family: 'Segoe'; background-color: #E3E3E3;">
                                                                        <span class="input-group-text"><a href="#" style="color: #858585;"><iconify-icon icon="fe:search"></iconify-icon></a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-12 mt-lg-4 d-none d-lg-grid d-sm-none">
                                                            <div class="row">
                                                                <table class="table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-3 py-3 text-center tab-ord-textC">Tour Plan</th>
                                                                                <th class="col-3 py-3 text-center tab-ord-textC">Tour Guide</th>
                                                                                <th class="col-1 py-3 text-center tab-ord-textC">Members</th>
                                                                                <th class="col-3 py-3 text-center tab-ord-textC">Date Duration</th>
                                                                                <th class="col-1 py-3 text-center tab-ord-textC">Status</th>
                                                                                <th class="col-1 py-3 text-center tab-ord-textC">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php

                                                                        $date = new DateTime();
                                                                        $tz = new DateTimeZone("Asia/Colombo");
                                                                        $date->setTimezone($tz);
                                                                        $formatDate = $date->format("Y-m-d");

                                                                        $order_rs = "SELECT *,`tour`.`name` AS `tour_name`,`order`.`id` AS `order_id`,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `order_st_name` 
                                                                        FROM `order` INNER JOIN `tour` 
                                                                        ON `order`.`tour_id`=`tour`.`id` INNER JOIN `guide` 
                                                                        ON `order`.`guide_id`=`guide`.`id` INNER JOIN `employee` 
                                                                        ON `guide`.`employee_id`=`employee`.`id` INNER JOIN `order_status` 
                                                                        ON `order`.`order_status_id`=`order_status`.`id` 
                                                                        WHERE `end_date`>='" . $formatDate . "' AND `order_status`.`name`='Assigned' ORDER BY `start_date` ASC";

                                                                        $ct_order_rs = "SELECT *,`employee`.`name` AS `guide_name`,`custom_tour`.`id` AS `order_id`,`order_status`.`name` AS `order_st_name` 
                                                                        FROM `custom_tour` INNER JOIN `guide` 
                                                                        ON `custom_tour`.`guide_id`=`guide`.`id` INNER JOIN `employee` 
                                                                        ON `guide`.`employee_id`=`employee`.`id` INNER JOIN `order_status` 
                                                                        ON `custom_tour`.`order_status_id`=`order_status`.`id` 
                                                                        WHERE `end_date`>='" . $formatDate . "' AND `order_status`.`name`='Assigned' ORDER BY `start_date` ASC";

                                                                        $orderList = getOrders::getOrderList($order_rs, $ct_order_rs);

                                                                        ?>
                                                                        <?php

                                                                        for ($x = 0; $x < sizeof($orderList); $x++) {

                                                                            $table_row = $orderList[$x];

                                                                            $timeSetStart = timeConverter::convert($table_row["start_date"]);
                                                                            $timeSetEnd = timeConverter::convert($table_row["end_date"]);

                                                                            $new_status;

                                                                            if ($timeSetStart < $formatDate) {
                                                                                $new_status = "Ongoing";
                                                                            } else {
                                                                                $new_status = "Pending";
                                                                            }
                                                                        ?>

                                                                            <tr>
                                                                                <div class="row">
                                                                                    <th class="col-3 py-2 text-center fw-normal tab-ord-textC"><?php echo $table_row["tour_name"]; ?></th>
                                                                                    <td class="col-3 py-2 text-center tab-ord-textC"><?php echo $table_row["guide_name"]; ?></td>
                                                                                    <td class="col-1 py-2 text-center tab-ord-textC"><?php echo $table_row["members"]; ?></td>
                                                                                    <td class="col-3 py-2 text-center tab-ord-textC"><?php echo date("d M, Y", strtotime($timeSetStart)) . " - " . (date("d M, Y", strtotime($timeSetEnd))); ?></td>
                                                                                    <td class="col-1 py-2 text-center <?php if ($new_status == "Pending") {
                                                                                                                            echo ("tab-ord-sts-pend-textC");
                                                                                                                        } else {
                                                                                                                            echo ("tab-ord-sts-ong-textC");
                                                                                                                        } ?>"><?php echo $new_status; ?></td>
                                                                                    <td class="col-1 text-center">
                                                                                        <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" onclick="tableModalOpen('<?php echo $table_row['order_id']; ?>','<?php echo $table_row['tour_name']; ?>');" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                    </td>
                                                                                </div>
                                                                            </tr>

                                                                        <?php

                                                                        }

                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- small devices -->
                                                        <div class="col-12 mt-3 mt-lg-0 d-grid d-lg-none d-sm-grid">
                                                            <div class="row">
                                                                <table class="table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-4 py-3 text-center tab-ord-textC">Tour Plan Name</th>
                                                                                <th class="col-2 py-3 text-center tab-ord-textC">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">11 Day</td>
                                                                                <td class="col-1 py-2 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">12 Day</td>
                                                                                <td class="col-1 py-2 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">6 Day</td>
                                                                                <td class="col-1 py-2 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- small devices -->
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-2 pt-1">
                                                    <div class="row">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-center">
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                </li>
                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="col-12 my-3 my-lg-5">
                                                    <div class="row justify-content-center gap-lg-4 gap-5 gap-sm-3">
                                                        <div class="col-12 col-lg-5 unsg-ord-blog1" style="border-radius: 10px; height: 28vh; overflow-y: scroll;">
                                                            <div class="row py-2">

                                                                <?php

                                                                $ung_tour_rs = "SELECT *, `order_status`.`name` AS `status`,`tour`.`name` AS `tour_name` FROM `order` 
                                                                INNER JOIN `order_status` ON `order`.`order_status_id`=`order_status`.`id` 
                                                                INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
                                                                WHERE `order_status`.`name`='Unassigned' ORDER BY `date_time` ASC";

                                                                $ct_ung_tour_rs = "SELECT *, `order_status`.`name` AS `status` FROM `custom_tour` 
                                                                INNER JOIN `order_status` ON `custom_tour`.`order_status_id`=`order_status`.`id` 
                                                                WHERE `order_status`.`name`='Unassigned' ORDER BY `date_time` ASC";

                                                                $orderList1 = getOrders::getOrderList($ung_tour_rs, $ct_ung_tour_rs);

                                                                ?>

                                                                <div class="col-12 my-2">
                                                                    <span class="unsg-blog-title1" style="font-family: 'Segoe'; font-weight: 800; font-size: calc(0.64rem + 0.63vh);">Unassigned Tours</span>
                                                                </div>
                                                                <div class="col-12">

                                                                    <?php

                                                                    for ($y = 0; $y < sizeof($orderList1); $y++) {

                                                                        $ung_tour_data = $orderList1[$y];

                                                                    ?>

                                                                        <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="assignOpenModel(<?php echo $ung_tour_data['id']; ?>);" style="border-radius: 4px; cursor: pointer;">
                                                                            <div class="row px-2 pb-3">
                                                                                <div class="col-2 pt-4 pt-lg-3">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <div class="row">
                                                                                        <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh);"><?php echo $ung_tour_data["date_time"]; ?></span>
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);"><?php echo $ung_tour_data["tour_name"]; ?></span>
                                                                                    </div>
                                                                                    <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-10">
                                                                                            <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);"><?php echo $ung_tour_data["request_message"]; ?></span>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <div class="row">
                                                                                                <span class="text-end mt-1"><iconify-icon icon="mingcute:information-fill" style="color: #e45200;"></iconify-icon></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    <?php

                                                                    }

                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-5 unsg-ord-blog1" style="border-radius: 10px; height: 28vh; overflow-y: scroll;">
                                                            <div class="row py-2">
                                                                <div class="col-12 my-2">
                                                                    <span class="unsg-blog-title1" style="font-family: 'Segoe'; font-weight: 800; font-size: calc(0.64rem + 0.63vh);">Assigned Tours</span>
                                                                </div>
                                                                <div class="col-12">

                                                                    <?php

                                                                    $asg_tours = Database::search("SELECT *,`tour`.`name` AS `tour_name` FROM `order` 
                                                                  INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
                                                                  INNER JOIN `order_status` ON `order`.`order_status_id`=`order_status`.`id` 
                                                                  WHERE `order_status`.`name`='Assigned' ORDER BY `date_time` DESC");

                                                                    $asg_num = $asg_tours->num_rows;

                                                                    ?>

                                                                    <?php

                                                                    for ($t = 0; $t < $asg_num; $t++) {
                                                                        $asg_data = $asg_tours->fetch_assoc();
                                                                    ?>

                                                                        <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="assignOpenModel(<?php echo $asg_data['tour_id']; ?>);" style="border-radius: 4px;">
                                                                            <div class="row px-2 pb-3">
                                                                                <div class="col-2 pt-4 pt-lg-3">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon2.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon2.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <div class="row">
                                                                                        <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh);"><?php echo $asg_data["date_time"]; ?></span>
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);"><?php echo $asg_data["tour_name"]; ?></span>
                                                                                    </div>
                                                                                    <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-10">
                                                                                            <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);"><?php echo $asg_data["request_message"]; ?></span>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <div class="row">
                                                                                                <span class="text-end mt-1"><iconify-icon icon="fluent-mdl2:completed-solid" style="color: #158921;"></iconify-icon></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
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