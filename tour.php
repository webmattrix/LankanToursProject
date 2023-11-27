<?php
session_start();
require "assets/model/sqlConnection.php";

$location = "primary";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Plans</title>
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/newHeader.css">
    <?php
    if (isset($_COOKIE["lt_theme"])) {
        if ($_COOKIE["lt_theme"] === 'light') {
    ?>
            <link rel="stylesheet" href="./css/tour.css">
        <?php
        } else {
        ?>
            <link rel="stylesheet" href="./css/tourDark.css">
        <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="./css/tour.css">
    <?php
    }
    ?>
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body class="c-default" id="body" onload="dataLoader();">
    <?php
    include "./components/newHeader.php";
    ?>

    <div class="container-fluid pt-3">
        <div class="px-4 rounded py-2 mt-1 main-content">

            <div class="custom-tour tour_popular-tours px-2 py-2" id="custom_tour">
                <div class="d-flex gap-2 align-items-center">
                    <div class="main-heading" style="min-width: fit-content;">Popular Tours</div>
                    <hr class="w-100">
                </div>
                <div class="grid-template">
                    <div class="form-area">
                        <div class="p-2"> <!-- Column 01 -->
                            <div class="d-flex flex-column">
                                <label for="tourist content-heading quicksand-Medium">Tourist</label>
                                <input type="text" name="" id="tourist" class="text-dark w-100 p-2 rounded border-0" placeholder="Your name">
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <label for="tourLevel content-heading quicksand-Medium">Tour Level</label>
                                <select id="tourLevel" class="text-dark w-100 p-2 rounded border-0">
                                    <option value="0">Select</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <span class="">Tour Places</span>
                                <div class="d-flex gap-2">
                                    <?php
                                    $ct_place_rs = Database::search("SELECT * FROM `place` ORDER BY `name` ASC");
                                    $ct_place_num = $ct_place_rs->num_rows;
                                    ?>
                                    <select id="addTourPlace" class="text-dark w-100 p-2 rounded border-0">
                                        <option value="0" class="text-dark">Select</option>
                                        <?php
                                        for ($ct_place_iteration = 0; $ct_place_iteration < $ct_place_num; $ct_place_iteration++) {
                                            $ct_place_data = $ct_place_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo ($ct_place_data["id"]); ?>" class="text-dark"><?php echo ($ct_place_data["name"]); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <button class="border-0 px-4 rounded" onclick="addTourPlace();" id="addTourPlaceBtn">
                                        <iconify-icon icon="carbon:add-filled" class="text-success"></iconify-icon>
                                    </button>
                                </div>

                                <div class="tour-plan-slider position-relative my-2" data-status="0" id="ct_places">
                                    <div class="position-absolute top-50 text-white w-100 px-2 fs-5 d-flex justify-content-between home_tour-plan-arrow-container" style="z-index: 3;">
                                        <iconify-icon icon="mingcute:left-line" class="text-white c-pointer" onclick="tourPlanSlideMover(99,'left');"></iconify-icon>
                                        <iconify-icon icon="mingcute:right-line" class="text-white c-pointer" onclick="tourPlanSlideMover(99,'right');"></iconify-icon>
                                    </div>
                                    <div class="slides" style="width: 100%;" id="slide99Container" data-marginLeft="0" data-maxWidth="100" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,99)">
                                        <div class="slide fs-4 segoeui-bold d-flex justify-content-center" id="ctSlide0" style="background-image: url('./assets/img/tour_plan_images/img (1).jpg'); text-shadow: 0px 0px 4px rgba(0,0,0,0.5);">Sri Lanka</div>
                                    </div>
                                    <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1" style="text-shadow: 0px 0px 5px black;">
                                        <span class="text-white" id="slide99ImageNumber" data-imageNumber="1">1</span>
                                        <span class="text-white" id="ct_sliderCount" data-ctSliderCount="1"> / 1</span>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 mt-1">
                                    <select id="removeTourPlace" class="text-dark w-100 p-2 rounded border-0">
                                        <option value="0" class="text-dark">Select</option>
                                    </select>
                                    <button class="border-0 px-4 rounded" onclick="removeTourPlace();" id="removeTourPlaceBtn">
                                        <iconify-icon icon="ep:remove-filled" class="text-danger"></iconify-icon>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- Column 01 -->
                        <div class="p-2"> <!-- Column 02 -->
                            <div class="mt-2">
                                <div class="">
                                    <label for="">Contact Method</label>
                                    <select id="" class="text-dark w-100 p-2 rounded border-0">
                                        <option value="0">Select</option>
                                    </select>
                                </div>
                                <div class=" mt-1">
                                    <label for="">Events</label>
                                    <select id="" class="text-dark w-100 p-2 rounded border-0" disabled>
                                        <option value="0">Select</option>
                                    </select>
                                </div>
                                <div class="mt-1">
                                    <label for="">Member Count</label>
                                    <div class="count-switch">
                                        <button class="rounded-start fs-4 p-2 fw-bold">-</button>
                                        <input type="text" class="p-2" />
                                        <button class="rounded-end fs-4 p-2 fw-bold">+</button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Column 02 -->
                        <div class="p-2"> <!-- Column 03 -->

                        </div> <!-- Column 03 -->
                    </div> <!-- Form Area -->
                    <div class=""></div> <!-- Request Message Area -->
                </div>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <a class="btn btn-primary" href="#custom_tour">Customize Your Tour</a>
            </div>

            <!-- Popular Tour Contene -->
            <div class="px-2 py-2 col-12 mt-3 tour_popular-tours">
                <div class="d-flex gap-2 align-items-center">
                    <div class="main-heading" style="min-width: fit-content;">Popular Tours</div>
                    <hr class="w-100">
                </div>
                <div class="d-flex p-2 overflow-auto">
                    <?php

                    // this will give us only most purchase count tours and limit for 5 rows
                    // column (`purchase_count`,`tour_id`)
                    $tour_rs = Database::search("SELECT COUNT(`order`.`tour_id`) AS `purchase_count`,`order`.`tour_id` 
                    FROM `order` 
                    GROUP BY `order`.`tour_id`
                    ORDER BY `purchase_count` DESC
                    LIMIT 5");

                    for ($x = 0; $x < $tour_rs->num_rows; $x++) {
                        $tour_data = $tour_rs->fetch_assoc();

                        $tour_detail_rs = Database::search("SELECT * FROM `tour` WHERE `tour`.`id`='" . $tour_data["tour_id"] . "'");
                        $tour_detail_data = $tour_detail_rs->fetch_assoc();

                        $tour_place_rs = Database::search("SELECT * FROM `tour_has_place` 
                        INNER JOIN `place` ON `place`.`id`=`tour_has_place`.`place_id` 
                        WHERE `tour_has_place`.`tour_id`='" . $tour_data["tour_id"] . "' LIMIT 5");

                        $tour_place_count = $tour_place_rs->num_rows;

                    ?>
                        <div class="tour_popular-tours-items">
                            <div class="item white-item">

                                <!-- Image Slider Container -->
                                <div class="slider overflow-hidden position-relative">
                                    <!-- Arrow Buttons -->
                                    <iconify-icon icon="mingcute:left-line" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'left');" class="position-absolute top-50 fs-5 text-white start-0 c-pointer rounded-start" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <iconify-icon icon="mingcute:right-line" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'right');" class="position-absolute top-50 fs-5 text-white end-0 c-pointer rounded-end" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <!-- Arrow Buttons -->
                                    <div class="slides d-flex overflow-hidden" style="width: <?php echo ($tour_place_count); ?>00%;" id="slide<?php echo ($x); ?>Container" data-marginLeft="0" data-maxWidth="<?php echo ($tour_place_count); ?>00">
                                        <?php
                                        for ($tour_places_iteration = 0; $tour_places_iteration < $tour_place_count; $tour_places_iteration++) {
                                            $tour_place_data = $tour_place_rs->fetch_assoc();
                                            $place_image_rs = Database::search("SELECT * FROM `place_image` WHERE `place_id`='" . $tour_place_data["place_id"] . "' LIMIT 1");
                                            $place_image_data = $place_image_rs->fetch_assoc();
                                        ?>
                                            <div class="image" style="width: 100%; background-image: url('./assets/img/places/<?php echo ($place_image_data["path"]); ?>');">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- Image Number -->
                                    <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1" style="text-shadow: 0px 0px 5px black; z-index: 2;">
                                        <span class="text-white" id="slide<?php echo ($x); ?>ImageNumber" data-imageNumber="1">1</span>
                                        <span class="text-white"> / <?php echo ($tour_place_count); ?></span>
                                    </div>
                                    <!-- Image Number -->

                                    <!-- Number of Days in a tour -->
                                    <div class="bg-primary text-uppercase rounded mt-2 position-absolute top-0 start-50 px-4 py-1 text-white quicksand-SemiBold fst-italic text-center" style="width: 80%; transform: translateX(-50%); z-index: 2; box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.5); background-image: radial-gradient(#2662BD,#0048B5);">- <?php echo ($tour_detail_data["date_count"]); ?> Days -</div>
                                    <!-- Number of Days in a tour -->

                                </div>
                                <!-- Image Slider Container -->

                                <div class="quicksand-Medium mt-2">
                                    <div class="content-heading">
                                        <span><?php echo ($tour_detail_data["description"]); ?></span>
                                    </div>
                                    <a class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:airplane"></iconify-icon>
                                        <span class="content-heading">Travel to read more...</span>
                                    </a>
                                    <div class="d-flex flex-column text-black-50 mt-2">
                                        <div class="" title="View Count">
                                            <iconify-icon icon="gridicons:visible"></iconify-icon>
                                            <span class="content-heading"><?php echo ($tour_detail_data["views"]); ?></span>
                                        </div>

                                        <div class="" title="Purchase Count">
                                            <iconify-icon icon="wi:time-9"></iconify-icon>
                                            <span class="content-heading"><?php echo ($tour_data["purchase_count"]); ?></span>
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
            <!-- Popular Tour Contene -->

            <!-- Tour Plans Content -->
            <div class="px-2 pt-1 pb-3 col-12 mt-3 tour_popular-tours">
                <div class="d-flex gap-2 align-items-center">
                    <div class="main-heading pb-2" style="min-width: fit-content;">All Tours</div>
                    <hr class="w-100">
                </div>

                <div class="tour-plan-grid">
                    <?php

                    $all_tour_rs = Database::search("SELECT * FROM `tour`");

                    for ($i = 6; $i < (($all_tour_rs->num_rows) + 6); $i++) {
                        $all_tour_data = $all_tour_rs->fetch_assoc();

                        $all_tour_place_rs = Database::search("SELECT * FROM `tour_has_place` 
                        INNER JOIN `place` ON `place`.`id`=`tour_has_place`.`place_id` 
                        WHERE `tour_has_place`.`tour_id`='" . $all_tour_data["id"] . "' LIMIT 5");

                        $all_tour_place_count = $all_tour_place_rs->num_rows;


                    ?>
                        <div class="tour_popular-tours-items">
                            <div class="item dark-item p-0" style="border: none; ">

                                <div class="p-2 item-header" style="border-radius: 0 0 10px 10px;">
                                    <!-- Image Slider Container -->
                                    <div class="slider overflow-hidden position-relative">
                                        <!-- Arrow Buttons -->
                                        <iconify-icon icon="mingcute:left-line" onclick="tourPlanSlideMover(<?php echo ($i); ?>,'left');" class="position-absolute top-50 fs-5 text-white start-0 c-pointer rounded-start" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                        <iconify-icon icon="mingcute:right-line" onclick="tourPlanSlideMover(<?php echo ($i); ?>,'right');" class="position-absolute top-50 fs-5 text-white end-0 c-pointer rounded-end" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                        <!-- Arrow Buttons -->
                                        <div class="slides d-flex overflow-hidden" style="width: <?php echo ($all_tour_place_count); ?>00%;" id="slide<?php echo ($i); ?>Container" data-marginLeft="0" data-maxWidth="<?php echo ($all_tour_place_count); ?>00" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,<?php echo ($i); ?>)">
                                            <?php

                                            for ($all_tour_places_iteration = 0; $all_tour_places_iteration < $all_tour_place_count; $all_tour_places_iteration++) {
                                                $all_tour_place_data = $all_tour_place_rs->fetch_assoc();
                                                $all_place_image_rs = Database::search("SELECT * FROM `place_image` WHERE `place_id`='" . $all_tour_place_data["place_id"] . "' LIMIT 1");
                                                $all_place_image_data = $all_place_image_rs->fetch_assoc();
                                            ?>

                                                <div class="image" style="width: 100%; background-image: url('./assets/img/places/<?php echo ($all_place_image_data["path"]); ?>');">
                                                </div>

                                            <?php
                                            }

                                            ?>
                                        </div>
                                        <!-- Image Number -->
                                        <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1" style="text-shadow: 0px 0px 5px black; z-index: 2;">
                                            <span class="text-white" id="slide<?php echo ($i); ?>ImageNumber" data-imageNumber="1">1</span>
                                            <span class="text-white"> / <?php echo ($all_tour_place_count); ?></span>
                                        </div>
                                        <!-- Image Number -->

                                        <!-- Number of Days in a tour -->
                                        <div class="position-absolute top-0 w-100 text-uppercase text-center segoeui-bold fs-2 text-white" style="text-shadow: 0px 0px 5px rgba(00, 00, 00, 0.8);">- <?php echo ($all_tour_data["date_count"]) ?> Days -</div>
                                        <!-- Number of Days in a tour -->

                                    </div>
                                    <!-- Image Slider Container -->

                                    <div class="quicksand-Medium mt-2 p-2 tour-desc">
                                        <div class="">
                                            <span class="theme-text content-heading"><?php echo ($all_tour_data["description"]); ?></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between px-3 py-2 content-heading">

                                    <?php
                                    $places_rs = Database::search("SELECT * FROM `tour_has_place` 
                                INNER JOIN `place` ON `place`.`id`=`tour_has_place`.`place_id` 
                                WHERE `tour_has_place`.`tour_id`='" . $all_tour_data["id"] . "'");
                                    $order_rs = Database::search("SELECT * FROM `order` WHERE `tour_id`='" . $all_tour_data["id"] . "'");
                                    ?>

                                    <div class="text-white d-flex flex-column align-items-center quicksand-SemiBold">
                                        <span><?php echo (floor($places_rs->num_rows / 5) * 5); ?>+</span>
                                        <span>Tour Places</span>
                                    </div>
                                    <div class="text-white d-flex flex-column align-items-center quicksand-SemiBold">
                                        <span>.../5</span>
                                        <span>Ratings</span>
                                    </div>
                                    <div class="text-white d-flex flex-column align-items-center quicksand-SemiBold">
                                        <span><?php if ((floor($order_rs->num_rows / 5) * 5) == 0) {
                                                    echo ('5');
                                                } else {
                                                    echo (($order_rs->num_rows / 5) * 5);
                                                }; ?>+</span>
                                        <span>Tours</span>
                                    </div>
                                </div>

                                <div class="tour-bottom-section">
                                    <div class="">
                                        <span>
                                            <span>
                                                <iconify-icon icon="mdi:airplane"></iconify-icon>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="">
                                        <span>
                                            <span>
                                                <iconify-icon icon="basil:location-solid"></iconify-icon>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="">
                                        <span>
                                            <span>
                                                <iconify-icon icon="solar:heart-bold"></iconify-icon>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
            <!-- Tour Plans Content -->



        </div>

        <?php include "./components/footer.php"; ?>
    </div>

    <script src="./js/newHeader.js"></script>
    <script src="./js/tour.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>