<?php

require "./assets/model/sqlConnection.php";
require "./assets/model/timeZoneConverter.php";
require "./assets/model/getTourViews.php";

session_start();

if (empty($_SESSION["lt_admin"])) {
    header("Location: ../404_II");
} else {
    $admin = $_SESSION["lt_admin"];

    $employee_rs = Database::search("SELECT *, `employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`,`employee`.`id` AS `emp_id` 
                                     FROM `employee` 
                                     INNER JOIN `admin` ON `employee`.`id`=`admin`.`employee_id` 
                                     INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` 
                                     WHERE `employee`.`id`='" . $admin["employee_id"] . "'");

    $employee_data = $employee_rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Manage Tour</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/adminTemplate.css">
        <link rel="stylesheet" href="../css/manageTours.css" />
        <!-- <link rel="stylesheet" href="../css/manageToursDark.css" /> -->
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="d-flex p-0">
                    <?php
                    include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                    ?>

                    <div class="d-flex w-100 flex-column bg-MT-C" style="max-height: 100vh; min-height: 100vh; overflow-y: auto;">
                        <?php
                        include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                        ?>

                        <!-- Page Content / body content eka methanin liyanna -->
                        <div>

                            <div class="col-12">
                                <div class="row m-0 p-0">

                                    <div class="col-12">
                                        <div class="row">

                                            <!-- View Action Modal -->

                                            <div class="modal fade" id="tbUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <!-- innerHTML from tourUpdateProcess file -->

                                            </div>

                                            <!-- View Action Modal -->

                                            <div class="col-12 my-3 my-lg-4">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">

                                                                <?php

                                                                $mpt_plan_rs = Database::search("SELECT *, COUNT(`tour_id`) AS `top_tour`,`tour_id`,`tour`.`name` AS `tour_name` 
                                                            FROM `order` 
                                                            INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
                                                            GROUP BY `order`.`tour_id` 
                                                            ORDER BY `top_tour` 
                                                            DESC LIMIT 1");

                                                                $mpt_plan_num = $mpt_plan_rs->num_rows;

                                                                if ($mpt_plan_num = 1) {

                                                                    $mpt_plan_data = $mpt_plan_rs->fetch_assoc();

                                                                    $placeImage_rs = Database::search("SELECT * FROM `tour_has_place` 
                                                                                                   INNER JOIN `place` ON `tour_has_place`.`place_id`=`place`.`id`
                                                                                                   INNER JOIN `place_image` ON `place_image`.`place_id`=`place`.`id` 
                                                                                                   WHERE `tour_id`='" . $mpt_plan_data["tour_id"] . "' ORDER BY RAND() LIMIT 1");
                                                                    $placeImage_num = $placeImage_rs->num_rows;

                                                                    if ($placeImage_num == 1) {

                                                                        $placeImage_data = $placeImage_rs->fetch_assoc();
                                                                    }


                                                                    $start_plan_date = $mpt_plan_data["start_date"];
                                                                    $end_plan_date = $mpt_plan_data["end_date"];

                                                                    $viewCount = $mpt_plan_data["views"];

                                                                    $plan_duration = date_diff(new DateTime($start_plan_date), new DateTime($end_plan_date))->d;

                                                                    $purchase_count_rs = Database::search("SELECT COUNT(`saving_amount`) AS `purc_count`,`saving_amount` FROM `order` GROUP BY `tour_id` ORDER BY `purc_count` DESC LIMIT 1");
                                                                    $purchase_count_data = $purchase_count_rs->fetch_assoc();

                                                                    $count;

                                                                    if ($purchase_count_data["saving_amount"] > 0) {
                                                                        $count = $purchase_count_data["purc_count"];
                                                                    } else if ($purchase_count_data["saving_amount"] == 0) {
                                                                        $count = 0;
                                                                    }

                                                                ?>



                                                                    <span class="mt-poptp-textC" style="font-family: 'Inter'; font-weight: 400; font-size: calc(0.62rem + 0.63vh);">Most Popular Tour Plan</span>
                                                                    <img src="../assets/img/places/<?php echo $placeImage_data["path"]; ?>" class="topTour1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                    <div class="collapse" id="collapseExample">
                                                                        <div class="card card-body mt-collapse-bg" style="box-shadow: 0 2px 6px 0 rgba(0, 0, 0,0.4); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
                                                                            <div class="col-12">
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-11">
                                                                                        <div class="row" style="line-height: 0.3in;">
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Plan Name</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $mpt_plan_data["tour_name"]; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Duration</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $plan_duration; ?> Day</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">View Count</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $viewCount; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Purchasing Count</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $count; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Rating</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">
                                                                                                        <iconify-icon icon="ic:baseline-star" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star-half" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star-border" class="mt-icon-style5"></iconify-icon>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
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
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">

                                                            <?php

                                                            $mpt_plan_rs2 = Database::search("SELECT *, COUNT(`tour_id`) AS `least_tour`,`tour_id`,`tour`.`name` AS `tour_name` 
                                                            FROM `order` 
                                                            INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
                                                            GROUP BY `order`.`tour_id` 
                                                            ORDER BY `least_tour` 
                                                            ASC LIMIT 1");

                                                            $mpt_plan_num2 = $mpt_plan_rs2->num_rows;

                                                            if ($mpt_plan_num2 = 1) {

                                                                $mpt_plan_data2 = $mpt_plan_rs2->fetch_assoc();

                                                                $placeImage2_rs = Database::search("SELECT * FROM `tour_has_place` 
                                                                                                   INNER JOIN `place` ON `tour_has_place`.`place_id`=`place`.`id`
                                                                                                   INNER JOIN `place_image` ON `place_image`.`place_id`=`place`.`id` 
                                                                                                   WHERE `tour_id`='" . $mpt_plan_data2["tour_id"] . "' ORDER BY RAND() LIMIT 1");
                                                                $placeImage2_num = $placeImage2_rs->num_rows;

                                                                if ($placeImage2_num == 1) {

                                                                    $placeImage2_data = $placeImage2_rs->fetch_assoc();
                                                                }

                                                                $start_plan_date2 = $mpt_plan_data2["start_date"];
                                                                $end_plan_date2 = $mpt_plan_data2["end_date"];

                                                                $viewCount1 = $mpt_plan_data2["views"];

                                                                $plan_duration2 = date_diff(new DateTime($start_plan_date2), new DateTime($end_plan_date2))->d;

                                                                $purchase_count_rs2 = Database::search("SELECT COUNT(`saving_amount`) AS `purc_count`,`saving_amount` FROM `order` GROUP BY `tour_id` ORDER BY `purc_count` ASC LIMIT 1");
                                                                $purchase_count_data2 = $purchase_count_rs2->fetch_assoc();

                                                                $count2;

                                                                if ($purchase_count_data2["saving_amount"] > 0) {
                                                                    $count2 = $purchase_count_data2["purc_count"];
                                                                } else if ($purchase_count_data2["saving_amount"] == 0) {
                                                                    $count2 = 0;
                                                                }

                                                            ?>

                                                                <div class="col-12">
                                                                    <span class="mt-poptp-textC" style="font-family: 'Inter'; font-weight: 400; font-size: calc(0.62rem + 0.63vh);">Least Popular Tour Plan</span>
                                                                    <img src="../assets/img/places/<?php echo $placeImage2_data["path"]; ?>" class="leastTour1" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" alt="">
                                                                    <div class="collapse" id="collapseExample1">
                                                                        <div class="card card-body mt-collapse-bg" style="box-shadow: 0 2px 6px 0 rgba(0, 0, 0,0.4); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
                                                                            <div class="col-12">
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-11">
                                                                                        <div class="row" style="line-height: 0.3in;">
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Plan Name</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $mpt_plan_data2["tour_name"]; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Duration</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $plan_duration2; ?> Day</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">View Count</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $viewCount1; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Purchasing Count</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;"><?php echo $count2; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <span class="mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Rating</span>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="row">
                                                                                                    <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">
                                                                                                        <iconify-icon icon="ic:baseline-star" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star-half" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star-border" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star-border" class="mt-icon-style5"></iconify-icon>
                                                                                                        <iconify-icon icon="ic:baseline-star-border" class="mt-icon-style5"></iconify-icon>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
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
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <div class="row">
                                                            <div class="col-12 mt-3 mt-lg-4 pt-5 px-5 pb-2 mt-blog-cont2" style="border-radius: 6px;">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-5 col-lg-5 my-sm-2 mt-lg-0">
                                                                        <span class="d-flex align-items-center"><iconify-icon icon="material-symbols:tune" class="fs-5 mt-filter-icon3"></iconify-icon> &nbsp;<span class="mt-filter-textC" style="font-family: 'Segoe'; font-size: calc(0.64rem + 0.68vh);">Filter</span>
                                                                            <div class="col-lg-6 col-9 col-sm-9 ps-3">
                                                                                <select class="selectorMTP_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                                    <option selected>Select</option>
                                                                                    <option value="1">One</option>
                                                                                    <option value="2">Two</option>
                                                                                    <option value="3">Three</option>
                                                                                </select>
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-12 col-lg-7 col-sm-7 my-sm-2 mt-3 mt-lg-0 mt-sm-0">
                                                                        <div class="row justify-content-end">
                                                                            <div class="col-12 col-lg-6 col-sm-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control textInputDet2" placeholder="search here...">
                                                                                    <span class="input-group-text"><a href="#" style="color: #858585;"><iconify-icon icon="fe:search"></iconify-icon></a></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mt-lg-4 d-none d-lg-grid d-md-grid d-xl-grid">
                                                                        <div class="row">

                                                                            <?php

                                                                            $tour_plan_rs = Database::search("SELECT * FROM `tour`");
                                                                            $tour_plan_num = $tour_plan_rs->num_rows;

                                                                            ?>

                                                                            <table class="table-bordered" style=" font-family: 'Inter'; border: 1px solid #858585;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <div class="row">
                                                                                            <th class="col-3 py-3 text-center mt-tab-textC">Tour Name</th>
                                                                                            <th class="col-2 py-3 text-center mt-tab-textC">Views</th>
                                                                                            <th class="col-2 py-3 text-center mt-tab-textC">Purchased Count</th>
                                                                                            <th class="col-2 py-3 text-center mt-tab-textC">Duration of tour</th>
                                                                                            <th class="col-1 py-3 text-center mt-tab-textC">Action</th>
                                                                                        </div>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    <?php

                                                                                    for ($c = 0; $c < $tour_plan_num; $c++) {

                                                                                        $tour_plan_data = $tour_plan_rs->fetch_assoc();

                                                                                        $count_ord_rs = Database::search("SELECT *, COUNT(`saving_amount`) AS `buy_count`,`saving_amount` FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` WHERE `tour_id`='" . $tour_plan_data["id"] . "'");
                                                                                        $count_ord_num = $count_ord_rs->num_rows;

                                                                                        $count_ord_data = $count_ord_rs->fetch_assoc();

                                                                                        $views;

                                                                                        if ($count_ord_data["views"] > 0) {
                                                                                            $views = $count_ord_data["views"];
                                                                                        } else if ($count_ord_data["views"] == 0) {
                                                                                            $views  = 0;
                                                                                        }

                                                                                        if ($count_ord_data["saving_amount"] > 0) {

                                                                                            $purchased_count = $count_ord_data["buy_count"];
                                                                                        } else if ($count_ord_data["saving_amount"] == 0) {
                                                                                            $purchased_count = 0;
                                                                                        }

                                                                                        $start_date = $count_ord_data["start_date"];
                                                                                        $end_date = $count_ord_data["end_date"];

                                                                                        $duration = date_diff(new DateTime($start_date), new DateTime($end_date))->d;

                                                                                    ?>

                                                                                        <tr>
                                                                                            <div class="row">
                                                                                                <th class="col-3 py-2 text-center fw-normal mt-tab-textC"><?php echo $tour_plan_data["name"]; ?></th>
                                                                                                <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $views; ?></td>
                                                                                                <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $purchased_count; ?></td>
                                                                                                <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $duration; ?></td>
                                                                                                <td class="col-1 py-2 text-center">
                                                                                                    <iconify-icon icon="bi:eye-fill" onclick="tourUpdate(<?php echo $tour_plan_data['id']; ?>);" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
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
                                                                    <div class="col-12 mt-4 d-grid d-lg-none d-sm-grid d-md-none d-xl-none">
                                                                        <div class="row">

                                                                            <?php

                                                                            $tour_plan_rs2 = Database::search("SELECT * FROM `tour`");
                                                                            $tour_plan_num2 = $tour_plan_rs2->num_rows;

                                                                            ?>

                                                                            <table class="table-bordered" style="font-family: 'Segoe'; border: 1px solid #A29A9A;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <div class="row">
                                                                                            <th class="col-2 py-3 text-center mt-tab-textC">Tour Plan</th>
                                                                                            <th class="col-3 py-3 text-center mt-tab-textC">Duration</th>
                                                                                            <th class="col-1 py-3 text-center mt-tab-textC">Action</th>
                                                                                        </div>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    <?php

                                                                                    for ($c = 0; $c < $tour_plan_num2; $c++) {

                                                                                        $tour_plan_data2 = $tour_plan_rs2->fetch_assoc();

                                                                                        $count_ord_rs2 = Database::search("SELECT *, COUNT(`saving_amount`) AS `buy_count`,`saving_amount` FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` WHERE `tour_id`='" . $tour_plan_data2["id"] . "'");
                                                                                        $count_ord_num2 = $count_ord_rs2->num_rows;

                                                                                        $count_ord_data2 = $count_ord_rs2->fetch_assoc();

                                                                                        $start_date2 = $count_ord_data2["start_date"];
                                                                                        $end_date2 = $count_ord_data2["end_date"];

                                                                                        $duration2 = date_diff(new DateTime($start_date2), new DateTime($end_date2))->d;

                                                                                    ?>

                                                                                        <tr>
                                                                                            <div class="row">
                                                                                                <th class="col-2 py-2 text-center fw-normal mt-tab-textC"><?php echo $tour_plan_data2["name"]; ?></th>
                                                                                                <td class="col-3 py-2 text-center mt-tab-textC"><?php echo $duration2; ?></td>
                                                                                                <td class="col-1 py-2 text-center">
                                                                                                    <iconify-icon icon="bi:eye-fill" onclick="tourUpdate(<?php echo $tour_plan_data['id']; ?>);" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
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
                                                                    <div class="col-12 mt-4 pt-3">
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

        <script src="../js/adminTemplate.js"></script>
        <script src="./js/bootstrap.js"></script>
        <!-- <script src="../js/bootstrap.js"></script> -->
        <script src="../js/manageTour.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    </body>

    </html>

<?php
}
