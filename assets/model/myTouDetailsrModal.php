
 <?php
require "assets/model/getOrdersList.php";
$tour_name = $_GET["T_name"];
$userId = $_GET["userId"];
$main_data["tour_name"] != "Custom Tour";

// $date = new DateTime();
// $today = $date->setTimezone(new DateTimeZone("Asia/Colombo"));
// $today = $today->format("Y-m-d");
if($tour_name=="Custom Tour"){
    $rs01 = Database::search("SELECT *,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `Orderstatus` FROM `custom_tour`
    INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
    INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
    INNER JOIN `order_status` ON `order_status`.`id`=`custom_tour`.`order_status_id` 
    WHERE `custom_tour`.`user_id` = '" . $userId ."");
$admin_data01 = $rs01->fetch_assoc();
    
}else{
    $rs02 = Database::search("SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `Orderstatus` FROM `order` 
    INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
    INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
    INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id` 
    INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
    WHERE `order`.`user_id` = '" . $userId ." ");
$admin_data02 = $rs02->fetch_assoc();
}

// $order_query = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `Orderstatus` FROM `order` 
// INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
// INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
// INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id` 
// INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
// WHERE `order`.`start_date` <= '" . $today . "' AND `order`.`end_date` >= '" . $today . "' 
// ORDER BY `start_date` ASC";

// $ct_order_query = "SELECT *,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `Orderstatus` FROM `custom_tour`
// INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
// INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
// INNER JOIN `order_status` ON `order_status`.`id`=`custom_tour`.`order_status_id` 
// WHERE `custom_tour`.`start_date` <= '" . $today . "' AND `custom_tour`.`end_date` >= '" . $today . "' ORDER BY `start_date` ASC";


    ?>

<div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header modelBackGround ">
            <h1 class="modal-title fs-5 text-white">Tour Details</h1>
            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  rounded-3 myToursD-modal">
            <div class="col-12 ">
                <div class="row p-3 g-2">
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span class="">Tour Name </span>
                    </div>
                    <div class="col-7 ">
                        <span> <b> 12 day tour</b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Guide Name</span>
                    </div>
                    <div class="col-7">
                        <span> <b> Mr . Grimble</b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Cost</span>
                    </div>
                    <div class="col-7 ">
                        <span> <b> 1200$</b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Time Line</span>
                    </div>
                    <div class="col-7">
                        <span> <b>2023-06-23 ➝ 2023-06-30</b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Type</span>
                    </div>
                    <div class="col-7">
                        <span><b> Custom Tour</b></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>