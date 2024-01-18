<?php

require "./sqlConnection.php";

session_start();

$tour_name = $_GET["tourName"];
$tour_id = $_GET["tourId"];

if ($tour_name == 'Custom Tour') {
    $query = "SELECT *,`custom_tour`.`id` AS `tour_id` FROM `custom_tour`
        INNER JOIN `user` ON `user`.`id`=`custom_tour`.`user_id`
        WHERE `custom_tour`.`id`='" . $tour_id . "'";
    $table = "custom_order";
} else {
    $query = "SELECT * FROM `order`
        INNER JOIN `user` ON `user`.`id`=`order`.`user_id`
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
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary" onclick="viewTourOrderModelPlaces();">View Tour Places</button>
        </div>
    </div>
</div>
<hr>

<div class="row px-3">
    <div class="col-12 col-md-6 col-xl-4">
        <div class="">
            <label for="" class="form-label">Tour Name</label>
            <input type="text" name="" id="" class="form-control" disabled value="<?php echo ($tour_name); ?>">
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Start Date</label>
            <input type="date" name="" id="unAssignTourStartDate" onchange="setOrderDuration();" class="form-control" value="<?php
                                                                                                                                if (!empty($tour_order_table_data["start_date"]) || $tour_order_table_data["start_date"] != '0000-00-00' || $tour_order_table_data["start_date"] != NULL) {
                                                                                                                                    echo ($tour_order_table_data["start_date"]);
                                                                                                                                }
                                                                                                                                ?>">
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Guide Name</label>
            <?php
            $guide_table = Database::search("SELECT *,`employee`.`id` AS `emp_id`,`employee`.`name` AS `emp_name` FROM `employee`
                                        INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id`
                                        WHERE `employe_type`.`name`='Guide' ORDER BY `employee`.`name` ASC");

            if (isset($tour_order_table_data["guide_id"]) && $tour_order_table_data["guide_id"] != 0 && $tour_order_table_data["guide_id"] != NULL) {
                if ($table == 'order') {
                    $guide_table_query = "SELECT * FROM `guide` WHERE `id`='" . $tour_order_table_data["guide_id"] . "'";
                } else {
                    $guide_table_query = "SELECT * FROM `guide` WHERE `id`='" . $tour_order_table_data["guide_id"] . "'";
                }

                // $guide
            }

            ?>
            <select name="" id="tourOrderGuide" class="form-control">
                <option value="0">Select</option>
                <?php
                for ($guide_iteration = 0; $guide_iteration < $guide_table->num_rows; $guide_iteration++) {
                    $guide_table_data = $guide_table->fetch_assoc();
                ?>
                    <option value="<?php echo ($guide_table_data["emp_id"]); ?>"><?php echo ($guide_table_data["emp_name"]); ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4">
        <div class="mt-2 mt-md-0">
            <label for="" class="form-label">Tour Duration</label>
            <input type="text" name="" id="date_duration" class="form-control" disabled value="<?php
                                                                                                if ((!empty($tour_order_table_data["start_date"]) && !empty($tour_order_table_data["end_date"])) || ($tour_order_table_data["start_date"] != '0000-00-00' && $tour_order_table_data["end_date"] != '0000-00-00') || ($tour_order_table_data["start_date"] != NULL && $tour_order_table_data["end_date"] != NULL)) {
                                                                                                    echo ((date_diff(new DateTime($tour_order_table_data["start_date"]), new DateTime($tour_order_table_data["end_date"])))->d);
                                                                                                }
                                                                                                ?>">
        </div>
        <div class="mt-2">
            <label for="" class="form-label">End Date</label>
            <input type="date" name="" id="unAssignTourEndDate" min="<?php echo ($today); ?>" onchange="setOrderDuration();" class="form-control" value="<?php
                                                                                                                                                            if (!empty($tour_order_table_data["end_date"]) || $tour_order_table_data["end_date"] != '0000-00-00' || $tour_order_table_data["end_date"] != NULL) {
                                                                                                                                                                echo ($tour_order_table_data["end_date"]);
                                                                                                                                                            }
                                                                                                                                                            ?>">
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Tourist Name</label>
            <input type="text" name="" id="" class="form-control" disabled value="<?php echo ($tour_order_table_data["f_name"] . " " . $tour_order_table_data["l_name"]); ?>">
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4">
        <div class="mt-2 mt-md-0">
            <label for="" class="form-label">Cost</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" name="" id="tourCost" class="form-control" value="<?php
                                                                                        if (!empty($tour_order_table_data["cost"]) || $tour_order_table_data["cost"] != '0' || $tour_order_table_data["cost"] != NULL) {
                                                                                            echo ($tour_order_table_data["cost"]);
                                                                                        }
                                                                                        ?>">
            </div>
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Saving Amount</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" name="" id="savingAmount" class="form-control" value="<?php
                                                                                            if (!empty($tour_order_table_data["saving_amount"]) || $tour_order_table_data["saving_amount"] != '0' || $tour_order_table_data["saving_amount"] != NULL) {
                                                                                                echo ($tour_order_table_data["saving_amount"]);
                                                                                            }
                                                                                            ?>">
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row px-2 mt-2">
            <label for="" class="form-label">Tourist Message</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control" disabled><?php echo ($tour_order_table_data["request_message"]); ?></textarea>
        </div>
        <div class="row px-2 mt-2">
            <label for="" class="form-label">Guide Message</label>
            <textarea name="" id="guideMessage" cols="30" rows="10" class="form-control"><?php echo ($tour_order_table_data["guide_message"]); ?></textarea>
        </div>
    </div>
    <div class="col-12 mt-4">
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3 bg-dark rounded py-4" style="background-image: url('../assets/img/Credit Card Transparent Vector.png'); background-size: contain; background-repeat: no-repeat; background-position: center; box-shadow: 3px 3px 10px 0px rgba(0,0,0,0.8);">
                <div class="d-flex justify-content-between">
                    <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">Payment</span>
                    <span class="content-heading quicksand-SemiBold text-success" style="text-shadow: 0px 0px 2px black;">$00</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">Paid Amount</span>
                    <span class="content-heading quicksand-SemiBold text-primary" style="text-shadow: 0px 0px 2px black;">$00</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">Payment Status</span>
                    <span class="content-heading quicksand-SemiBold text-warning" style="text-shadow: 0px 0px 2px black;">Pending</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4 mb-3">
        <button class="btn btn-outline-success col-4 offset-4 shadow" onclick="updateTourRequest('<?php echo ($table); ?>','<?php echo ($tour_id); ?>');">Update</button>
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

<div class="position-fixed vw-100 vh-100 bg-black bg-opacity-50 d-flex justify-content-center align-items-center top-0 start-0 d-none" style="z-index: 3;" id="tourOrderPlacesModel">
    <div class="position-absolute top-0 end-0 m-4 bg-white bg-opacity-25 p-2 rounded border border-white border-1 d-flex justify-content-center align-items-center" onclick="viewTourOrderModelPlaces();">
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