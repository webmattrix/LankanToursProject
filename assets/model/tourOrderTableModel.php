<?php

require "./sqlConnection.php";

session_start();

$tour_name = $_GET["tourName"];
$tour_id = $_GET["tourId"];

if ($tour_name == 'Custom Tour') {
    $query = "SELECT *,`employee`.`name` AS `employee` FROM `custom_tour` 
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
            <div class="col-12 col-lg-6 pe-0 pe-lg-3">
                <div class="d-flex flex-column">
                    <label for="">Tour Guide</label>
                    <input type="text" name="" id="" disabled class="form-control" value="<?php echo ($tour_order_table_data["employee"]); ?>">
                </div>
                <div class="d-flex flex-column mt-2">
                    <textarea name="" id="" cols="30" rows="10" class="form-control" disabled><?php echo ($tour_order_table_data["guide_message"]); ?></textarea>
                </div>
            </div>
            <div class="col-12 col-lg-6 ps-0 ps-lg-3 d-flex justify-content-between flex-column">
                <div class="d-flex flex-column">
                    <label for="" class="">Tourist Message</label>
                    <textarea name="" id="" cols="30" rows="10" disabled><?php echo ($tour_order_table_data["request_message"]); ?></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-success" onclick="updateTourPayment('<?php echo ($table); ?>','<?php echo ($tour_id); ?>');">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>