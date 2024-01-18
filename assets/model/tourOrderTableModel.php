<?php

require "./sqlConnection.php";

session_start();

$tour_name = $_GET["tourName"];
$tour_id = $_GET["tourId"];

if ($tour_name == 'Custom Tour') {
    $query = "SELECT *,`employee`.`name` AS `employee`,`custom_tour`.`id` AS `tour_id` FROM `custom_tour` 
            INNER JOIN `user` ON `user`.`id` = `custom_tour`.`user_id` 
            INNER JOIN `guide` ON `guide`.`id` = `custom_tour`.`guide_id` 
            INNER JOIN `employee` ON `employee`.`id` = `guide`.`employee_id`
            WHERE `custom_tour`.`id`='" . $tour_id . "'";
    $table = "custom_order";
} else {
    $query = "SELECT *,`employee`.`name` AS `employee` FROM `order`
        INNER JOIN `user` ON `user`.`id`=`order`.`user_id`
        INNER JOIN `guide` ON `guide`.`id` = `order`.`guide_id` 
        INNER JOIN `employee` ON `employee`.`id` = `guide`.`employee_id`
        WHERE `order`.`id`='" . $tour_id . "'";
    $table = "order";
}

$tour_order_table = Database::search($query);
$tour_order_table_data = $tour_order_table->fetch_assoc();

$order_tour_id = $tour_order_table_data["tour_id"];

$today = new DateTime();
$today->setTimezone(new DateTimeZone($_SESSION["timeZone"]));
$today = $today->format("Y-m-d");

?>

<hr>

<div class="row px-3">
    <div class="col-12">
        <div class="d-flex flex-column fs-5 quicksand-SemiBold">
            <span class=""><?php echo ($tour_name); ?></span>
            <span class="text-primary">
                <span class="text-primary">$<?php echo ($tour_order_table_data["saving_amount"]); ?></span> / <span class="text-success">$<?php echo ($tour_order_table_data["cost"]); ?></span>
            </span>
        </div>
        <div class="d-flex mt-3 justify-content-between w-100" style="width: fit-content;">
            <div class="">
                <div class="d-flex gap-5 justify-content-between">
                    <span class="">Payment Status</span>
                    <span class=""><?php
                                    if ($tour_order_table_data["saving_amount"] > 0) {
                                        echo ("Complete");
                                    } else {
                                        echo ("Incomplete");
                                    } ?></span>
                </div>
                <div class="d-flex gap-5 justify-content-between">
                    <span class="">Start Date</span>
                    <span class=""><?php echo ($tour_order_table_data["start_date"]); ?></span>
                </div>
                <div class="d-flex gap-5 justify-content-between">
                    <span class="">End Date</span>
                    <span class=""><?php echo ($tour_order_table_data["end_date"]); ?></span>
                </div>
                <div class="d-flex gap-5 justify-content-between">
                    <span class="">Members</span>
                    <span class=""><?php echo ($tour_order_table_data["members"]); ?></span>
                </div>
            </div>
            <div class="d-flex align-items-end flex-column">
                <label for="" class="form-label">Saving Amount</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" name="" id="" class="form-control" />
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-primary" onclick="viewTourTableModelPlaces();">View Tour Places</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-lg-6 pe-0 pe-lg-3">
                <div class="d-flex flex-column">
                    <label for="">Tour Guide</label>
                    <input type="text" name="" id="" disabled class="form-control" value="<?php echo ($tour_order_table_data["employee"]); ?>">
                </div>
                <div class="d-flex flex-column mt-2">
                    <textarea name="" id="" cols="30" rows="10" class="form-control p-1" disabled><?php echo ($tour_order_table_data["guide_message"]); ?></textarea>
                </div>
            </div>
            <div class="col-12 col-lg-6 ps-0 ps-lg-3 d-flex justify-content-between flex-column">
                <div class="d-flex flex-column">
                    <label for="" class="">Tourist Message</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control p-1" disabled><?php echo ($tour_order_table_data["request_message"]); ?></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-success" onclick="updateTourPayment('<?php echo ($table); ?>','<?php echo ($tour_id); ?>');">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Places Slider -->

<?php

if ($table == 'order') {
    $place_query = "SELECT * FROM `tour_has_place` 
        INNER JOIN `place` ON `place`.`id`=`tour_has_place`.`place_id`
        WHERE `tour_has_place`.`tour_id`='" . $order_tour_id . "'";
} else {
    $place_query = "SELECT * FROM `custom_tour_has_place`
        INNER JOIN `place` ON `place`.`id`=`custom_tour_has_place`.`place_id`
        WHERE `custom_tour_has_place`.`custom_tour_id`='" . $order_tour_id . "'";
}

$tour_place_table = Database::search($place_query);
$tour_place_table_rows = $tour_place_table->num_rows;

?>

<div class="position-fixed vw-100 vh-100 bg-black bg-opacity-50 d-flex justify-content-center align-items-center top-0 start-0 d-none" style="z-index: 3;" id="tourTablePlacesModel">
    <div class="position-absolute top-0 end-0 m-4 bg-white bg-opacity-25 p-2 rounded border border-white border-1 d-flex justify-content-center align-items-center" onclick="viewTourTableModelPlaces();">
        <iconify-icon icon="ic:round-close" class="text-white fs-5 c-pointer"></iconify-icon>
    </div>
    <div class="slider-container">
        <span class="arrows left" onclick="sliderMover('left',1);">
            <iconify-icon icon="mingcute:left-line"></iconify-icon>
        </span>
        <span class="arrows right" onclick="sliderMover('right',1);">
            <iconify-icon icon="mingcute:right-line"></iconify-icon>
        </span>

        <div class="slides" style="width: <?php echo ($tour_place_table_rows * 75); ?>%;" data-currentMargin="12.5" id="slider1" data-imageNumber="1" data-slideCount="<?php echo ($tour_place_table_rows); ?>">

            <?php
            for ($tour_place_iteration = 0; $tour_place_iteration < $tour_place_table_rows; $tour_place_iteration++) {
                $tour_place_table_data = $tour_place_table->fetch_assoc();

                $place_image_table = Database::search("SELECT * FROM `place_image`
                                                WHERE `place_id`='" . $tour_place_table_data["place_id"] . "' ORDER BY RAND() LIMIT 1");
                $place_image_table_data = $place_image_table->fetch_assoc();

            ?>
                <div class="slide active position-relative" id="slide<?php echo ($tour_place_iteration + 1); ?>_1">
                    <img src="../assets/img/places/<?php echo ($place_image_table_data["path"]); ?>" />
                    <span class="text-white fw-bold segoeui-bold fs-3 position-absolute top-0 start-0 w-100 text-center" style="text-shadow: 0px 0px 3px black;"><?php echo ($tour_place_table_data["name"]); ?></span>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>