<?php

require "../model/sqlConnection.php";
$id = $_GET["id"];
$rs = Database::search("SELECT *,`tour`.`name` AS `tour_name`FROM `order` 
INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
WHERE `order`.`id`='" . $id . "' ");
$order_data = $rs->fetch_assoc();
;


?>
<div class="modal-dialog ">
    <div class="modal-content" style=" font-family:Quicksand-Medium" style=" font-family:Quicksand-Medium">
        <div class="modal-header modelBackGround ">
            <span class="modal-title  text-white fs-4" id="exampleModalLabel">Feedback modal</span>
            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  rounded-3 ">
            <div class="col-12 ">
                <div class="row  p-lg-3 p-2">
                    <h5 class=" fw-bold text-center"> <b class=""> <?php echo $order_data['tour_name'] ?> </b> </h5>
                    <hr class=" mt-3  border border-4 rounded-2  ">

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
                    <!-- <hr class=" mt-3 border border-2 bg-black"> -->

                    <span class=" mt-3 mb-3 ">• Type Feedback</span>
                    <textarea name="" id="feedbackMessage" cols="10" rows="5"
                        placeholder="Describe Your Experience Here ..." class=" border border-2 rounded-2"></textarea>
                    <button class="btn btn-primary text-center mt-3 mb-1"
                        onclick="feedbackSubmit( <?php echo $id ?>);">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>