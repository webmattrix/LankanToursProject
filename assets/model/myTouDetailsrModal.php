<?php
require "../model/sqlConnection.php";

$tour_name = $_POST["T_name"];
$userId = $_POST["userId"];
$orderId = $_POST["orderId"];


if ($tour_name == "Custom Tour") {
    $rs01 = Database::search("SELECT *,`employee`.`name` AS `guide_name` FROM `custom_tour`
    INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
    INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
    WHERE `custom_tour`.`user_id` = '".$userId."' AND `custom_tour`.`id` = '".$orderId."'");
    $admin_data = $rs01->fetch_assoc();

} else {
    
    $rs01 = Database::search("SELECT *,`employee`.`name` AS `guide_name` FROM `order` 
    INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id`  
    INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
    WHERE `order`.`user_id` = '".$userId."'  AND `order`.`id` = '".$orderId."' ");
    $admin_data = $rs01->fetch_assoc();
}


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
                        <span> <b>
                                <?php echo ($tour_name); ?>
                            </b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Guide Name</span>
                    </div>
                    <div class="col-7">

                        <span> <b>
                        <?php echo ($admin_data["guide_name"]); ?>
                            </b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Cost</span>
                    </div>
                    <div class="col-7 ">
                        <span> <b>
                       $<?php echo ($admin_data["cost"]); ?>
                            </b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Time Line</span>
                    </div>
                    <div class="col-7">
                        <span> <b>
                        <?php echo ($admin_data["start_date"]); ?> ➝
                        <?php echo ($admin_data["end_date"]); ?>
                            </b> </span>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-5">
                        <span>Type</span>
                    </div>
                    <div class="col-7">
                        <span><b>
                        <?php echo ($admin_data["guide_name"]); ?>
                            </b></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>