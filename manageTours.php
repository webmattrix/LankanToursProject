<?php

require "./assets/model/sqlConnection.php";
require "./assets/model/timeZoneConverter.php";
require "./assets/model/getTourViews.php";

session_start();

$admin = $_SESSION["lt_admin"];

$employee_rs = Database::search("SELECT *, `employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`,`employee`.`id` AS `emp_id` 
                                     FROM `employee` 
                                     INNER JOIN `admin` ON `employee`.`id`=`admin`.`employee_id` 
                                     INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` 
                                     WHERE `employee`.`id`='" . $admin["employee_id"] . "'");

$employee_data = $employee_rs->fetch_assoc();

$x = TourViews::getViews('project');

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
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content mt-modal-bgC">
                                                    <div class="modal-header">
                                                        <span class="mt-modal-titleC" style="font-family: 'Inter'; font-size: calc(0.67rem + 0.67vh); font-weight: 500;">Tour Plan Manage</span>
                                                        <button type="button" class="closeBtn2" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12 pb-3 d-none d-lg-grid d-sm-none">
                                                            <div class="row justify-content-center">
                                                                <div class="col-11 p-3 mt-blog-cont4" style="border-radius: 6px;">
                                                                    <div class="row pb-2 d-flex align-items-center">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-9">
                                                                                    <div class="row justify-content-center gap-3">
                                                                                        <div class="col-5">
                                                                                            <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Name Of Tour</span>
                                                                                            <input type="text" class="input-MTP" id="nm_tour1">
                                                                                        </div>
                                                                                        <div class="col-5">
                                                                                            <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Duration</span>
                                                                                            <input type="text" class="input-MTP" id="dur_tour1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2 mt-3 pt-2">
                                                                                    <button class="addTourBtn1 col-12 d-grid" on>Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row">
                                                                                <div class="col-9">
                                                                                    <div class="row justify-content-center gap-3">

                                                                                        <?php

                                                                                        $tourCity_rs = Database::search("SELECT * FROM `city`");
                                                                                        $tourCity_num = $tourCity_rs->num_rows;
                                                                                        ?>

                                                                                        <div class="col-5">
                                                                                            <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">City</span>
                                                                                            <select class="selectorModalMTP_ord" id="selectCity" onchange="loadPlaces();" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                                                                <option selected>Select</option>

                                                                                                <?php
                                                                                                for ($ct = 0; $ct < $tourCity_num; $ct++) {
                                                                                                    $tourCity_data = $tourCity_rs->fetch_assoc();
                                                                                                ?>

                                                                                                    <option value="<?php echo $tourCity_data["id"]; ?>"><?php echo $tourCity_data["name"]; ?></option>

                                                                                                <?php

                                                                                                }

                                                                                                ?>

                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="col-5">

                                                                                            <?php

                                                                                            $tourPlace_rs = Database::search("SELECT * FROM `place`");
                                                                                            $tourPlace_num = $tourPlace_rs->num_rows;

                                                                                            ?>

                                                                                            <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Visit Place</span>
                                                                                            <select class="selectorModalMTP_ord" id="selectPlace" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                                                                <option selected>Select</option>

                                                                                                <?php

                                                                                                for ($pl = 0; $pl < $tourPlace_num; $pl++) {
                                                                                                    $tourPlace_data = $tourPlace_rs->fetch_assoc();

                                                                                                ?>

                                                                                                    <option value="<?php echo $tourPlace_data["id"];?>"><?php echo $tourPlace_data["name"];?></option>

                                                                                                <?php

                                                                                                }

                                                                                                ?>

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="col-2 mt-3 pt-2">
                                                                                    <button class="addTourBtn1 col-12 d-grid" onclick="addToModalTab();">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4 pt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11 pt-4 mt-modal-tab-blog" style="overflow-y: auto; height: 231px; border-radius: 6px;">
                                                                                    <table class="table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">City</span></th>
                                                                                                    <th class="col-4 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Place</span></th>
                                                                                                    <th class="col-1 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Action</span></th>
                                                                                                </div>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody id="tableC&P">
                                                                                            <!-- <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 py-2 text-center fw-normal mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Kandy</th>
                                                                                                    <td class="col-4 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">dalada maligawa</td>
                                                                                                    <td class="col-1 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 py-2 text-center fw-normal mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Galle</th>
                                                                                                    <td class="col-4 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">galle fort</td>
                                                                                                    <td class="col-1 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 py-2 text-center fw-normal mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Colombo</th>
                                                                                                    <td class="col-4 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">gangarama temple</td>
                                                                                                    <td class="col-1 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr> -->
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11">
                                                                                    <span class="mt-modal-cont-textC" style="font-size: calc(0.56rem + 0.57vh); font-family: 'Inter';">Description</span>
                                                                                    <textarea class="col-12 px-2 py-1" style="height: 130px; overflow-y: scroll; border: none; font-size: calc(0.54rem + 0.55vh);"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11">
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <div class="col-12" style="background-color: #FFFFFF;">
                                                                                                <div class="row justify-content-center p-3">
                                                                                                    <img src="../assets/img/manageTours_IMG/img_search.svg" class="search1">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-4 d-flex align-items-center offset-lg-1">
                                                                                            <button class="col-11 py-2 px-3 hoverUPBtn2" onclick="updateTour();">Update Tour</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- View Modal for small devices -->

                                                        <div class="col-12 pb-3 d-grid d-sm-grid d-lg-none">
                                                            <div class="row justify-content-center">
                                                                <div class="col-11 mt-blog-cont4" style="border-radius: 6px;">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="col-12">
                                                                                <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Name Of Tour</span>
                                                                                <input type="text" class="input-MTP">
                                                                            </div>
                                                                            <div class="col-12 mt-2">
                                                                                <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Duration</span>
                                                                                <input type="text" class="input-MTP">
                                                                            </div>
                                                                            <div class="col-6 mt-3 pt-2">
                                                                                <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Day</span>
                                                                                    <select class="selectorModalMTP_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                                        <option selected>Select</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="3">4</option>
                                                                                        <option value="3">5</option>
                                                                                        <option value="3">6</option>
                                                                                        <option value="3">7</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 mt-2">
                                                                                    <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Visit Place</span>
                                                                                    <select class="selectorModalMTP_ord" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                                                        <option selected>Select</option>
                                                                                        <option value="1">Colombo</option>
                                                                                        <option value="2">Kandy</option>
                                                                                        <option value="3">Galle</option>
                                                                                        <option value="3">Mount Lavinia</option>
                                                                                        <option value="3">Nuwara Eliya</option>
                                                                                        <option value="3">Anuradhapura</option>
                                                                                        <option value="3">Jaffna</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6 mt-3 pt-2">
                                                                                    <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4 pt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11 pt-4 mt-modal-tab-blog" style="overflow-y: auto; height: 231px; border-radius: 6px;">
                                                                                    <div class="row">
                                                                                        <table class="table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Place</span></th>
                                                                                                        <th class="col-3 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Day</span></th>
                                                                                                        <th class="col-1 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Action</span></th>
                                                                                                    </div>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 py-2 text-center fw-normal mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Kandy</th>
                                                                                                        <td class="col-3 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">2 Day</td>
                                                                                                        <td class="col-1 py-2 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                            <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                        </td>
                                                                                                    </div>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 py-2 text-center fw-normal mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Galle</th>
                                                                                                        <td class="col-3 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                        <td class="col-1 py-2 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                            <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                        </td>
                                                                                                    </div>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 py-2 text-center fw-normal mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Colombo</th>
                                                                                                        <td class="col-3 py-2 text-center mt-modal-tab-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                        <td class="col-1 py-2 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                            <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                        </td>
                                                                                                    </div>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11">
                                                                                    <span class="mt-modal-cont-textC" style="font-size: calc(0.56rem + 0.57vh); font-family: 'Inter';">Description</span>
                                                                                    <textarea class="col-12 px-2 py-1" style="height: 130px; overflow-y: scroll; border: none; font-size: calc(0.54rem + 0.55vh);"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="col-12" style="background-color: #FFFFFF;">
                                                                                                <div class="row justify-content-center p-3">
                                                                                                    <img src="../assets/img/manageTours_IMG/img_search.svg" class="search1">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="row justify-content-center">
                                                                                        <div class="col-8 d-flex align-items-center my-3 py-1">
                                                                                            <button class="col-12 py-2 px-3 hoverUPBtn2">Update Tour</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- View Modal for small devices -->

                                                    </div>
                                                </div>
                                            </div>
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

                                                                $start_plan_date = $mpt_plan_data["start_date"];
                                                                $end_plan_date = $mpt_plan_data["end_date"];

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
                                                                <img src="../assets/img/manageTours_IMG/Badulla.png" class="topTour1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
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
                                                                                                <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">1320</span>
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

                                                            $start_plan_date2 = $mpt_plan_data2["start_date"];
                                                            $end_plan_date2 = $mpt_plan_data2["end_date"];

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
                                                                <img src="../assets/img/manageTours_IMG/Dambulla.png" class="leastTour1" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" alt="">
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
                                                                                                <span class="text-center mt-collapse-cont-textC" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">425</span>
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
                                                                <div class="col-12 mt-lg-4 d-none d-lg-grid d-sm-none">
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

                                                                                    $count_ord_rs = Database::search("SELECT *, COUNT(`saving_amount`) AS `buy_count`,`saving_amount` FROM `order` WHERE `tour_id`='" . $tour_plan_data["id"] . "'");
                                                                                    $count_ord_num = $count_ord_rs->num_rows;

                                                                                    $count_ord_data = $count_ord_rs->fetch_assoc();

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
                                                                                            <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $x;?></td>
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
                                                                                <!-- <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 py-2 text-center fw-normal mt-tab-textC">11 Day</th>
                                                                                        <td class="col-2 py-2 text-center mt-tab-textC">1547</td>
                                                                                        <td class="col-2 py-2 text-center mt-tab-textC">24</td>
                                                                                        <td class="col-3 py-2 text-center mt-tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 py-2 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 py-2 text-center fw-normal mt-tab-textC">Luxury 5 Day</th>
                                                                                        <td class="col-2 py-2 text-center mt-tab-textC">465</td>
                                                                                        <td class="col-2 py-2 text-center mt-tab-textC">14</td>
                                                                                        <td class="col-3 py-2 text-center mt-tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 py-2 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr> -->
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-4 d-grid d-lg-none d-sm-grid">
                                                                    <div class="row">
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
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 py-2 text-center fw-normal mt-tab-textC">6 Day</th>
                                                                                        <td class="col-3 py-2 text-center mt-tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 py-2 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 py-2 text-center fw-normal mt-tab-textC">11 Day</th>
                                                                                        <td class="col-3 py-2 text-center mt-tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 py-2 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 py-2 text-center fw-normal mt-tab-textC">Luxury 5 Day</th>
                                                                                        <td class="col-3 py-2 text-center mt-tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 py-2 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
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