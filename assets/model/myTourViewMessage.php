<?php
require "../model/sqlConnection.php";

$orderID = $_POST["order_Id"];
$orderName = $_POST["Order_name"];

if ($orderName == "Custom Tour") {
    ?>
    <div class="modal-dialog ">
        <div class="modal-content" style=" font-family:Quicksand-Medium" style=" font-family:Quicksand-Medium">
            <div class="modal-header modelBackGround ">
                <span class="modal-title  text-white fs-4" id="exampleModalLabel">Message</span>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <?php

                $rs01 = Database::search("SELECT * FROM `custom_order_response` WHERE `custom_tour_id` = '" . $orderID . "'");
                $message_num = $rs01->num_rows;
                if ($message_num == 0) {
                    ?>
                    <div class="p-3  border border-3 mb-3  rounded-3">
                        <p> empty messsage ... </p>
                    </div>
                    <?php

                } else {
                    for ($x = 0; $x < $message_num; $x++) {
                        $message_data = $rs01->fetch_assoc();
                        ?>
                        <div class="p-3  border border-3 mb-3  rounded-3">
                            <p><b>
                                <?php echo ($message_data["response_message"]); ?></b>
                            </p>
                        </div>
                        <?php
                    }
                } ?>

            </div>
        </div>
    </div>
    <?php
} else {

    ?>
    <div class="modal-dialog ">
        <div class="modal-content" style=" font-family:Quicksand-Medium" style=" font-family:Quicksand-Medium">
            <div class="modal-header modelBackGround ">
                <span class="modal-title  text-white fs-4" id="exampleModalLabel">Message</span>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <?php

                $rs01 = Database::search("SELECT * FROM `order_response` WHERE `order_id` = '" . $orderID . "'");
                $message_num = $rs01->num_rows;
                if ($message_num == 0) {
                    ?>
                    <div class="p-3  border border-3 mb-3  rounded-3">
                        <p> empty messsage ... </p>
                    </div>
                    <?php

                } else {
                    for ($x = 0; $x < $message_num; $x++) {
                        $message_data = $rs01->fetch_assoc();
                        ?>
                        <div class="p-2  border border-3 mb-3  rounded-3">
                            <p> <b>
                                <?php echo ($message_data["response_message"]); ?></b>
                            </p>
                        </div>
                        <?php
                    }
                } ?>

            </div>
        </div>
    </div>
    <?php
}

?>