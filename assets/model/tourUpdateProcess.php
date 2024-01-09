<?php

require "./sqlConnection.php";

$tour_id = $_GET["tId"];

$tourUpdate_rs = Database::search("SELECT * FROM `tour` WHERE `id`='" . $tour_id . "'");
$tourUpdate_data = $tourUpdate_rs->fetch_assoc();

$tour_name = $tourUpdate_data["name"];
$duration = $tourUpdate_data["date_count"];

$wherePlace_rs = Database::search("SELECT *, `place`.`name` AS `place_name`, `city`.`name` AS `city_name` FROM `tour_has_place`
                                   INNER JOIN `place` ON `tour_has_place`.`place_id`=`place`.`id`
                                   INNER JOIN `city` ON `place`.`city_id`=`city`.`id` 
                                   WHERE `tour_id`='" . $tour_id . "'");

$wherePlace_num = $wherePlace_rs->num_rows;

?>

<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content mt-modal-bgC">
        <div class="modal-header">
            <span class="mt-modal-titleC" style="font-family: 'Inter'; font-size: calc(0.67rem + 0.67vh); font-weight: 500;">Tour Plan Manage</span>
            <button type="button" class="closeBtn2" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="col-12 pb-3">
                <div class="row justify-content-center">
                    <div class="col-11 p-3 mt-blog-cont4" style="border-radius: 6px;">
                        <div class="row pb-2 d-flex align-items-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="row justify-content-center gap-3">
                                            <div class="col-5">
                                                <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Name Of Tour</span>
                                                <input type="text" class="input-MTP" value="<?php echo $tour_name; ?>">
                                            </div>
                                            <div class="col-5">
                                                <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Duration</span>
                                                <input type="text" class="input-MTP" id="dur_tour1" value="<?php echo $duration; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3 pt-2">
                                        <button class="addTourBtn1 col-12 d-grid" on>Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="row justify-content-center gap-3">

                                            <?php

                                            $tourCity_rs = Database::search("SELECT * FROM `city`");
                                            $tourCity_num = $tourCity_rs->num_rows;
                                            ?>

                                            <div class="col-5">
                                                <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">City</span>
                                                <select class="selectorModalMTP_ord" id="selectCity" onchange="loadPlaces();" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                    <option selected>Select</option>

                                                    <?php
                                                    for ($ct = 0; $ct < $tourCity_num; $ct++) {
                                                        $tourCity_data = $tourCity_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo $tourCity_data["id"]; ?>"><?php echo $tourCity_data["name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                            </div>

                                            <div class="col-5">

                                                <?php

                                                $tourPlace_rs = Database::search("SELECT * FROM `place`");
                                                $tourPlace_num = $tourPlace_rs->num_rows;

                                                ?>

                                                <span class="mt-modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Visit Place</span>
                                                <select class="selectorModalMTP_ord" id="selectPlace" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                    <option selected>Select</option>

                                                    <?php

                                                    for ($pl = 0; $pl < $tourPlace_num; $pl++) {
                                                        $tourPlace_data = $tourPlace_rs->fetch_assoc();

                                                    ?>

                                                        <option value="<?php echo $tourPlace_data["id"]; ?>"><?php echo $tourPlace_data["name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2 mt-3 pt-2">
                                        <button class="addTourBtn1 col-12 d-grid" onclick="addToModalTab();">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4 pt-3">
                                <div class="row justify-content-center">
                                    <div class="col-11 pt-4 mt-modal-tab-blog" style="overflow-y: auto; height: 231px; border-radius: 6px;">
                                        <table class="table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                            <thead>
                                                <tr>
                                                    <div class="row">
                                                        <th class="col-2 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">City</span></th>
                                                        <th class="col-4 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Place</span></th>
                                                        <th class="col-1 py-3 text-center mt-modal-tab-textC"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Action</span></th>
                                                    </div>
                                                </tr>
                                            </thead>
                                            <tbody id="tableC&P">

                                                <?php

                                                for ($p = 0; $p < $wherePlace_num; $p++) {

                                                    $wherePlace_data = $wherePlace_rs->fetch_assoc();

                                                ?>

                                                    <tr id="deletePlRow_<?php echo $p; ?>">
                                                        <td class="col-2 py-2 text-center fw-normal mt-modal-tab-textC"><?php echo $wherePlace_data["city_name"]; ?></td>
                                                        <td class="col-4 py-2 text-center mt-modal-tab-textC"><?php echo $wherePlace_data["place_name"]; ?></td>
                                                        <td><button class="text-center addTourBtnDel1 px-4 py-1" onclick="deleteNewAdded('<?php echo ('deletePlRow' . '_' . $p); ?>' , '<?php echo $wherePlace_data['place_id']; ?>');">Delete</button></td>
                                                    </tr>

                                                <?php
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <span class="mt-modal-cont-textC" style="font-size: calc(0.56rem + 0.57vh); font-family: 'Inter';">Description</span>
                                        <textarea class="col-12 px-2 py-1" style="height: 130px; overflow-y: scroll; border: none; font-size: calc(0.6rem + 0.6vh);"><?php echo $tourUpdate_data["description"]; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="row">


                                            <?php

                                            $placeImg1_rs = Database::search("SELECT * FROM `tour_has_place` 
                                                                            INNER JOIN `place` ON `tour_has_place`.`place_id`=`place`.`id` 
                                                                            INNER JOIN `place_image` ON `place_image`.`place_id`=`place`.`id` 
                                                                            WHERE `tour_id`='" . $tour_id . "' ORDER BY RAND() LIMIT 1");

                                            $placeImg1_num = $placeImg1_rs->num_rows;

                                            if ($placeImg1_num == 0) {

                                            ?>

                                                <div class="col-6">
                                                    <div class="col-12" style="background-color: #FFFFFF;">
                                                        <div class="row justify-content-center p-3">
                                                            <img src="../assets/img/manageTours_IMG/img_search.svg" class="search1">
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php


                                            } else {

                                                $placeImg1_data = $placeImg1_rs->fetch_assoc();

                                            ?>
                                                <div class="col-6">
                                                    <div class="col-12" style="background-color: #FFFFFF;">
                                                        <div class="row p-3">
                                                            <img src="../assets/img/places/<?php echo $placeImg1_data[ "path"];?>" style="width: 100%; height: 185px;">
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php

                                            }

                                            ?>

                                            <div class="col-4 d-flex align-items-center offset-lg-1">
                                                <button class="col-11 py-2 px-3 hoverUPBtn2" id="updateBtn" onclick="updateTour(<?php echo $tour_id; ?>);">Update Tour</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>