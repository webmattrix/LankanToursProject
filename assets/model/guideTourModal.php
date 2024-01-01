<?php
require "../model/sqlConnection.php";

$tour_name = $_POST["T_name"];
$orderId = $_POST["orderId"];


if ($tour_name == "Custom Tour") {
    $rs01 = Database::search("SELECT * FROM `custom_tour`
    WHERE `custom_tour`.`id` = '".$orderId."'");

    $guide_data = $rs01->fetch_assoc();

} else {
    
    $rs01 = Database::search("SELECT *,`tour`.`name` AS `tour_name`FROM `order` 
    INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
    WHERE `order`.`id` = '".$orderId."' ");
    $guide_data = $rs01->fetch_assoc();
}


?>

<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content bg-modalC">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 modal-titleC" id="exampleModalLabel">Tours
                                                        Details</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 ">
                                                                <div class="row p-lg-3"
                                                                    style="line-height: 0.4in; border: 1px solid #A29A9A; border-radius: 6px;">
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span class="modal-cont-textC"
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour
                                                                                Plan Name</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span class="modal-cont-textC"
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);"><?php echo ($tour_name) ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span class="modal-cont-textC"
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">start
                                                                                of tour</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span class="modal-cont-textC"
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);"><?php echo ($guide_data["start_date"]) ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span class="modal-cont-textC"
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">end
                                                                                of tour</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span class="modal-cont-textC"
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">
                                                                                <?php echo ($guide_data["end_date"]) ?></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span class="modal-cont-textC"
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Rating</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <span
                                                                                style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">
                                                                                <?php echo ($guide_data["star"]) ?>/5
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