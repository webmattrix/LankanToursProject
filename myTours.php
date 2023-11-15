<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyTours</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/MyTours.css">
</head>

<body  class="c-default MyToursBackground">
    <?php
    include "./components/newHeader.php";
    ?>
    <div class="container-fluid">
        <div class="col-12 mt-4">
            <button class="  myToursTitle_button" style=" font-family:Quicksand-Medium">Active Tours</button>
            <hr class="mt-0  mb-2 ">
        </div>
        <div class=" myToursBg1 p-3 rounded-2">
            <?php

            require "assets/model/getOrdersList.php";

            $date = new DateTime();
            $today = $date->setTimezone(new DateTimeZone("Asia/Colombo"));
            $today = $today->format("Y-m-d");
            $user_id=2;

            $order_query = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `Orderstatus` FROM `order` 
INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id` 
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
WHERE  `order`.`start_date` <= '" . $today . "' AND `order`.`end_date` >= '" . $today . "' 
ORDER BY `start_date` ASC";

            $ct_order_query = "SELECT *,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `Orderstatus` FROM `custom_tour`
INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
INNER JOIN `order_status` ON `order_status`.`id`=`custom_tour`.`order_status_id` 
WHERE  `custom_tour`.`start_date` <= '" . $today . "' AND `custom_tour`.`end_date` >= '" . $today . "'  ORDER BY `start_date` ASC";

            $ongoingTourList = getOrders::getOrderList($order_query, $ct_order_query);


            for ($ongoing_iteration = 0; $ongoing_iteration < sizeof($ongoingTourList); $ongoing_iteration++) {
                $main_data = $ongoingTourList[$ongoing_iteration];
                ?>
                <div class="col-12 myToursBg2 rounded-2 p-3 mb-3 border border-3">
                    <div class="row">
                        <div class="col-lg-3 col-12 ">
                            <!-- slide -->
                            <div class="tour-plan-slider position-relative">
                                <?php
                                if ( $main_data["tour_name"] != "Custom Tour") {
                                    ?>
                                    <div class="position-absolute top-20 w-100 px-2 fs-5 d-flex " style="z-index: 3;">
                                        <div class="row" style=" font-family:Quicksand-Medium">
                                            <span class="text-white fs-6 mt-1">&nbsp;<iconify-icon icon="mdi:eye"
                                                    class=" text-white c-pointer  "></iconify-icon> &nbsp;&nbsp;
                                                <?php echo ($main_data["views"]); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <?php

                                } else {
                                   
                                }
                                ?>

                                <div class="position-absolute top-50 text-white w-100 px-2 fs-5 d-flex justify-content-between home_tour-plan-arrow-container"
                                    style="z-index: 3;">
                                    <iconify-icon icon="mingcute:left-line" class="text-white c-pointer"
                                        onclick="tourPlanSlideMover(<?php echo ($x); ?>,'left');"></iconify-icon>
                                    <iconify-icon icon="mingcute:right-line" class="text-white c-pointer"
                                        onclick="tourPlanSlideMover(<?php echo ($x); ?>,'right');"></iconify-icon>
                                </div>
                                <div class="slides" style="width: 300%;" id="slide<?php echo ($x); ?>Container"
                                    data-marginLeft="0" data-maxWidth="300" ontouchstart="touchStartDetector(event);"
                                    ontouchend="touchEndDetector(event,<?php echo ($x); ?>)">
                                    <div class="slide" id="sliderSlide1"
                                        style="background-image: url('./assets/img/Mytours_IMG/wp1857982.jpg');">
                                    </div>
                                    <div class="slide" id="sliderSlide2"
                                        style="background-image: url('./assets/img/Mytours_IMG/sigiriya-srilanka-.-oc-wallpaper_.jpg');">
                                    </div>
                                    <div class="slide" id="sliderSlide3"
                                        style="background-image: url('./assets/img/Mytours_IMG/a_wooden_house_forest-wallpaper-3554x1999.jpg');">
                                    </div>
                                </div>
                                <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1"
                                    style="text-shadow: 0px 0px 5px black;">
                                    <span class="text-white" id="slide<?php echo ($x); ?>ImageNumber"
                                        data-imageNumber="1">1</span>
                                    <span class="text-white"> / 3</span>
                                </div>
                            </div>
                            <!-- slide -->
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="col-lg-11 offset-lg-1 col-12">
                                <div class="row mt-2 mt-lg-0">
                                    <div class="col-lg-8 col-12 text-start">
                                        <h5 style=" font-family:Segoe UI">
                                            <?php echo ($main_data["tour_name"]); ?>
                                        </h5>
                                    </div>
                                    <div class="col-lg-4 col-12 text-start text-lg-end">
                                        <a href="" class="text-primary text-decoration-none" style=" font-family:Segoe UI">
                                            View tour </a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-11 offset-lg-1 col-12" style=" font-family:Quicksand-Medium">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h6>Request Date : <span class="text-warning"></span>
                                            <?php echo ($main_data["date_time"]); ?>/ <?php echo ($main_data["user_id"]); ?>
                                        </h6>
                                        <h6>Request Status : <span class="text-warning">
                                                <?php echo ($main_data["Orderstatus"]); ?>
                                            </span> </h6>
                                        <h6>Tour Guide : <span class="text-warning">
                                                <?php echo ($main_data["guide_name"]); ?>
                                            </span> </h6>
                                        <h6>Payment : <span class="text-warning">
                                                <?php echo ($main_data["tour_name"]); ?>
                                            </span> </h6>
                                    </div>
                                    <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                        <h6>Your Message</h6>
                                        <div class="col-12 p-2 rounded-2 myTourMsgBox">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam nulla eius,
                                                beatae placeat fugiat neque. Sint voluptas doloremque
                                                facilis officiis dolore, cumque sed odit, neque consectetur itaque,
                                                excepturi quis ullam.</p>
                                        </div>
                                        <div class=" col-12 text-end mt-2 ">
                                            <!-- small device -->
                                            <div class="row d-block d-md-none d-lg-none ">
                                                <div class=" col-md-4 offset-md-0 col-10 offset-1  mt-3">
                                                    <button class="btn btn-secondary MytoursButton" style="width: 100%;"
                                                        onclick="feedbackModal( '<?php echo $main_data['tour_name']; ?>');"><i
                                                            class="bi bi-chat-left-quote text-white"></i>
                                                        &nbsp;Feedback</button>
                                                </div>
                                                <div class=" col-md-4  offset-md-0  col-10 offset-1  mt-2">
                                                    <button class="btn btn-danger MytoursButton" style="width: 100%;"><i
                                                            class="bi bi-trash3-fill text-white"></i> &nbsp;Delete</button>

                                                </div>
                                                <div class=" col-md-4   offset-md-0 col-10 offset-1  mt-2">
                                                    <button class="btn btn-primary MytoursButton" style="width: 100%;"
                                                        onclick="messageModal();"><i class="bi bi-envelope text-white"></i>
                                                        Message&nbsp;&nbsp;03</button>

                                                </div>
                                            </div>
                                            <!-- small device -->

                                            <!-- large device -->
                                            <div class=" col-12 text-end mt-4 d-lg-block d-md-block d-none ">
                                                <button class="btn btn-secondary MytoursButton"
                                                    onclick="feedbackModal();"><i
                                                        class="bi bi-chat-left-quote text-white"></i>
                                                    &nbsp;Feedback</button>
                                                <button class="btn btn-danger MytoursButton">&nbsp;<i
                                                        class="bi bi-trash3-fill text-white"></i>&nbsp; </button>
                                                <button class="btn btn-primary MytoursButton" onclick="messageModal();"><i
                                                        class="bi bi-envelope text-white"></i> &nbsp;&nbsp;3</button>
                                            </div>
                                            <!-- large device -->
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
        <div class="col-12 mt-4">
            <button class="myToursTitle_button" style=" font-family:Quicksand-Medium">pervious Tours</button>
            <hr class="mt-0  mb-2">
        </div>
        <div class="p-lg-5 p-2 rounded-2 myToursD_table1 mb-3">
            <!-- Large Device -->
            <div class="col-12 table-responsive d-none d-lg-block " style=" font-family:Quicksand-Medium">
                <table class="table  align-middle  myToursD_table2   mb-3" style=" border-radius: 5px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tour name</th>
                            <th scope="col">Guide Name</th>
                            <th scope="col">cost</th>
                            <th scope="col">Timeline</th>
                            <th scope="col">Type</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $order_query02 = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name`FROM `order` 
INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
WHERE  `order`.`end_date` < '" . $today . "' ORDER BY `start_date` ASC";

                        $ct_order_query02 = "SELECT *,`employee`.`name` AS `guide_name`FROM `custom_tour`
INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
WHERE  `custom_tour`.`end_date` < '" . $today . "' ORDER BY `start_date` ASC";

                        $ongoingTourList02 = getOrders::getOrderList($order_query02, $ct_order_query02);


                        for ($ongoing_iteration02 = 0; $ongoing_iteration02 < sizeof($ongoingTourList02); $ongoing_iteration02++) {
                            $main_data02 = $ongoingTourList02[$ongoing_iteration02];
                            ?>
                            <tr>
                                <td>
                                    <?php echo ($ongoing_iteration02 + 1); ?>
                                </td>
                                <td>
                                    <?php echo ($main_data02["tour_name"]); ?>
                                </td>
                                <td>
                                    <?php echo ($main_data02["guide_name"]); ?>
                                </td>
                                <td>$
                                    <?php echo ($main_data02["cost"]); ?>
                                </td>
                                <td>
                                    <?php echo ($main_data02["start_date"]); ?> ➝
                                    <?php echo ($main_data02["end_date"]); ?>
                                </td>
                                <td>Custom Plane</td>
                                <td> <button type="button" class="btn"
                                        onclick="myTourmodal01('<?php echo $main_data02['tour_name']; ?>,<?php echo $main_data02['user_id']; ?>');">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Large Device -->

            <!-- small divice -->
            <div class="col-12 table-responsive  d-block d-lg-none" style=" font-family:Quicksand-Medium">
                <table class="table  align-middle  myToursD_table2    mb-3" style=" border-radius: 5px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tour name</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($ongoing_iteration02 = 0; $ongoing_iteration02 < sizeof($ongoingTourList02); $ongoing_iteration02++) {
                            $main_data02 = $ongoingTourList02[$ongoing_iteration02];
                            ?>
                            <tr>
                                <td>
                                    <?php echo ($ongoing_iteration02 + 1); ?>
                                </td>
                                <td>
                                    <?php echo ($main_data02["tour_name"]); ?>
                                </td>
                                <td> <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- small device -->
        </div>
    </div>
    <?php
    include "./components/footer.php";
    ?>

    <!-- Modal01 -->
    <div class="modal fade " id="myTourDetails" tabindex="-1"  style=" font-family:Quicksand-Medium">
        <div id="viewArea01">
            
        </div>
    </div>
    <!-- Modal01 -->

    <!-- Modal02 -->
    <div class="modal" id="feedbackModal" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1"
        style=" font-family:Quicksand-Medium">
        <div class="modal-dialog ">
            <div class="modal-content" style=" font-family:Quicksand-Medium" style=" font-family:Quicksand-Medium">
                <div class="modal-header modelBackGround ">
                    <span class="modal-title  text-white fs-4" id="exampleModalLabel">Feedback</span>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  rounded-3 ">
                    <div class="col-12 ">
                        <div class="row  p-lg-3 p-2">

                            <span class=" mt-0 "> • Rating </span>
                            <div class=" mt-0">
                                <span onclick="Fstar(1)" class="star">★
                                </span>
                                <span onclick="Fstar(2)" class="star">★
                                </span>
                                <span onclick="Fstar(3)" class="star">★
                                </span>
                                <span onclick="Fstar(4)" class="star">★
                                </span>
                                <span onclick="Fstar(5)" class="star">★
                                </span>
                                <span class="bg-primary rounded-3 text-white  p-1 feedbackCount">&nbsp;&nbsp;&nbsp;<b
                                        id="output" class="text-white">0</b><b
                                        class="text-white">/5</b>&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <hr class=" mt-3 border border-2">

                            <span class=" mt-3 mb-3 ">• Type Feedback</span>
                            <textarea name="" id="" cols="10" rows="5" placeholder="Describe Your Experience Here ..."
                                class=" border border-2 rounded-2"></textarea>
                            <button class="btn btn-primary text-center mt-3 mb-1">Submit</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal02 -->

    <!-- Modal03 -->
    <div class="modal" id="messageModal" tabindex="-1" style=" font-family:Quicksand-Medium">
        <div class="modal-dialog ">
            <div class="modal-content" style=" font-family:Quicksand-Medium" style=" font-family:Quicksand-Medium">
                <div class="modal-header modelBackGround ">
                    <span class="modal-title  text-white fs-4" id="exampleModalLabel">Message</span>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="p-3  border border-3 mb-3  rounded-3">
                        <p> • Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, vel? Quis dolor
                            deserunt, aliquid ex
                            voluptatibus inventore quia minima fugit eos sunt nulla, quos, exercitationem minus quae
                            laudantium molestias itaque?</p>
                    </div>
                    <div class="p-3  border border-3 mb-3 rounded-3">
                        <p>• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, vel? Quis dolor
                            deserunt, aliquid ex
                            voluptatibus inventore quia minima fugit eos sunt nulla, quos, exercitationem minus quae
                            laudantium molestias itaque?</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal03 -->
    <script src="./js/MyTours.js"></script>
    <script src="./js/newHeader.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>


</body>

</html>