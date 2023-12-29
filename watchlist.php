<?php

session_start();

if (isset($_SESSION["lt_tourist"])) {

    $user = $_SESSION["lt_tourist"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Watchlist</title>
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/watchlist.css" />
        <!-- <link rel="stylesheet" href="./css/watchlistDark.css" /> -->
        <link rel="stylesheet" href="./css/newHeader.css" />
        <link rel="stylesheet" href="./css/footer.css" />
        <link rel="stylesheet" href="./css/scrolbar.css" />
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    </head>

    <body class="bg-watchlist">



        <?php

        $location = "primary";

        include "./components/newHeader.php";

        require "./assets/model/sqlConnection.php";

        ?>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row justify-content-center" style="height: auto;">
                                <div class="col-lg-7 mt-4 pt-2 mt-lg-5">
                                    <div class="col-12 search_bar1" style="background-color: #fff; border-radius: 50px; border: 1px solid #2452F2;">
                                        <div class="row">
                                            <div class="col-8 col-lg-7">
                                                <input type="text" id="search_field" class="search_field1" placeholder="search here..." onkeyup="filterSection();" />
                                            </div>
                                            <div class="col-4 col-lg-5">
                                                <div class="row">
                                                    <div class="col-11 col-lg-6 col-sm-7 selectDrop_area1">
                                                        <div class="selectDrop1" id="select_text">
                                                            <span id="textInc" class="input_textP" style="font-family: 'Inter';">Places</span>
                                                            <iconify-icon id="iconShow" icon="mingcute:down-line" style="font-size: 20px;"></iconify-icon>
                                                        </div>
                                                        <ul id="openList" class="dropList list-unstyled">
                                                            <li class="selectItem">Places</li>
                                                            <li class="selectItem">11</li>
                                                            <li class="selectItem">22</li>
                                                            <li class="selectItem">33</li>
                                                            <li class="selectItem">44</li>
                                                            <li class="selectItem">55</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-4 col-sm-5 d-none d-lg-grid d-sm-grid">
                                                        <iconify-icon class="icon_Sbtn1" icon="ic:round-search"></iconify-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2 pt-1 d-grid d-sm-none d-lg-none">
                                        <span class="text-white icon_Sbtn1" style="font-family: 'Segoe'; font-size: calc(0.72rem + 0.72vh);">search &nbsp;<iconify-icon icon="ic:round-search" class="pt-1" style="font-size: calc(0.82rem + 0.82vh);"></iconify-icon></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4" style="border: 1px solid #7B7B7B;" />
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-3 mb-lg-4">
                                    <div class="col-12 wt-blog-cont4" style="border-radius: 5px; height: 72.1vh; overflow-y: auto; overflow-x: hidden;">
                                        <div class="row p-lg-4" style="row-gap: 0.3in;">
                                            <?php

                                            $watchlist_rs = Database::search("SELECT *, `tour`.`name` AS `t_name`, `tour`.`id` AS `t_id` FROM `watchlist` INNER JOIN `tour` ON `watchlist`.`tour_id`=`tour`.`id`");
                                            $watchlist_num = $watchlist_rs->num_rows;



                                            for ($watchlist_iteration = 0; $watchlist_iteration < $watchlist_num; $watchlist_iteration++) {

                                                $watchlist_data = $watchlist_rs->fetch_assoc();

                                            ?>

                                                <script>
                                                    (function() {

                                                        var first_slide = document.getElementById("slide1_" + <?php echo ($watchlist_iteration); ?>);
                                                        first_slide.classList.add("active");
                                                    }());
                                                </script>

                                                <?php

                                                ?>
                                                <div class="col-12">
                                                    <div class="col-12 py-3 wt-blog-area-field" style="border-radius: 6px; box-shadow: 1px 2px 4px 0px rgba(0, 0, 0, 0.50);">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-5">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-11">
                                                                        <div class="slider-container">
                                                                            <span class="arrows left" onclick="sliderMover('left',<?php echo ($watchlist_iteration); ?>);"><iconify-icon icon="mynaui:arrow-left-square" style="color: white;"></iconify-icon></span>
                                                                            <span class="arrows right" onclick="sliderMover('right',<?php echo ($watchlist_iteration); ?>);"><iconify-icon icon="mynaui:arrow-right-square" style="color: white;"></iconify-icon></span>


                                                                            <?php

                                                                            $place_img_rs = Database::search("SELECT * FROM `tour_has_place` INNER JOIN `place` ON `place`.`id`=`tour_has_place`.`place_id` WHERE `tour_has_place`.`tour_id`='" . $watchlist_data["t_id"] . "' LIMIT 5");
                                                                            $place_img_num = $place_img_rs->num_rows;

                                                                            ?>


                                                                            <div class="slides" style="width: 375%;" data-currentMargin="12.5" id="slider<?php echo ($watchlist_iteration); ?>" data-imageNumber="1">

                                                                                <?php

                                                                                for ($pn = 0; $pn < $place_img_num; $pn++) {

                                                                                    $place_img_data = $place_img_rs->fetch_assoc();

                                                                                    $img_path_rs = Database::search("SELECT * FROM `place_image` WHERE `place_id`='" . $place_img_data["place_id"] . "' LIMIT 1");

                                                                                    $img_path_num = $img_path_rs->num_rows;
                                                                                ?>



                                                                                    <div class="slide active" id="slide<?php echo (($pn + 1) . "_" . $watchlist_iteration); ?>">

                                                                                        <?php

                                                                                        if ($img_path_num == 0) {
                                                                                        ?>

                                                                                            <img src="./assets/img/itinerary_IMG/seegiriya.png" />

                                                                                        <?php

                                                                                        } else {

                                                                                            $img_path_data = $img_path_rs->fetch_assoc();

                                                                                        ?>

                                                                                            <img src="./assets/img/places/<?php echo $img_path_data["path"]; ?>" />

                                                                                        <?php
                                                                                        }

                                                                                        ?>

                                                                                    </div>

                                                                                <?php
                                                                                }

                                                                                ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-7 my-2 wt-slide-borderC">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row ms-lg-3 mt-2">
                                                                            <div class="col-12 col-lg-7 m-2 m-lg-0 p-lg-0">
                                                                                <div class="row">
                                                                                    <span class="wt-slide-cont-textC pb-2" style="font-family: 'Quicksand'; font-size: calc(0.61rem + 0.61vh); font-weight: 700;"><?php echo $watchlist_data["t_name"]; ?></span>
                                                                                    <p class="wt-slide-cont-textC2" style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 400;"><?php echo $watchlist_data["description"]; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-lg-4">
                                                                                        <div class="row gap-4">
                                                                                            <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                                <iconify-icon icon="carbon:view-filled" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                                <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">1320</span>
                                                                                            </div>
                                                                                            <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                                <iconify-icon icon="bxs:purchase-tag" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                                <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">689</span>
                                                                                            </div>
                                                                                            <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                                <iconify-icon icon="material-symbols:star" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                                <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">4.7/5</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row mt-lg-5">

                                                                            <?php

                                                                            $vst_place_rs = Database::search("SELECT *, `place`.`name` AS `placeName` FROM `tour_has_place` INNER JOIN `place` ON `tour_has_place`.`place_id`=`place`.`id` WHERE `tour_id`='" . $watchlist_data["t_id"] . "'");

                                                                            $vst_place_num = $vst_place_rs->num_rows;



                                                                            ?>

                                                                            <div class="col-12 col-lg-8 mt-3 m-2 m-lg-0 mt-lg-0">
                                                                                <div class="row">
                                                                                    <span class="wt-slide-cont-textC" style="font-family: 'Quicksand'; font-size: calc(0.61rem + 0.61vh); font-weight: 600;">Visiting Places</span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-lg-6">
                                                                                            <div class="row justify-content-center gap-3 mt-2">

                                                                                                <?php

                                                                                                for ($n = 0; $n < $vst_place_num; $n++) {

                                                                                                    $vst_place_data = $vst_place_rs->fetch_assoc();

                                                                                                ?>

                                                                                                    <div class="col-3 includeBlog1">
                                                                                                        <span class="placesText1"><?php echo $vst_place_data["placeName"];?></span>
                                                                                                    </div>

                                                                                                <?php
                                                                                                }

                                                                                                ?>

                                                                                                <!-- <div class="col-3 includeBlog1">
                                                                                                    <span class="placesText1">Colombo</span>
                                                                                                </div>
                                                                                                <div class="col-3 includeBlog1">
                                                                                                    <span class="placesText1">Ella</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row justify-content-center gap-3 mt-2">
                                                                                                <div class="col-3 includeBlog1">
                                                                                                    <span class="placesText1">Kandy</span>
                                                                                                </div>
                                                                                                <div class="col-3 includeBlog1">
                                                                                                    <span class="placesText1">Mirissa</span>
                                                                                                </div>
                                                                                                <div class="col-3 includeBlog1">
                                                                                                    <span class="placesText1">Anuradhapura</span>
                                                                                                </div> -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 d-flex align-items-end d-none d-sm-none d-lg-grid">
                                                                                <div class="row justify-content-end">
                                                                                    <div class="col-12">
                                                                                        <div class="row gap-3">
                                                                                            <div class="col-3 includeIconBlog1 animatedBtn1">
                                                                                                <iconify-icon class="py-2 px-3" icon="ic:baseline-location-on" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                            </div>
                                                                                            <div class="col-3 includeIconBlog1 animatedBtn2">
                                                                                                <iconify-icon class="py-2 px-3" icon="mdi:airplane" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                            </div>
                                                                                            <div class="col-3 includeIconBlog1 animatedBtn3">
                                                                                                <iconify-icon class="py-2 px-3" icon="material-symbols:delete" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 mt-5 d-grid d-sm-grid d-lg-none">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row justify-content-center gap-3">
                                                                                            <div class="col-3 includeIconBlog1 animatedBtn1">
                                                                                                <iconify-icon class="py-2 px-3" icon="ic:baseline-location-on" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                            </div>
                                                                                            <div class="col-3 includeIconBlog1 animatedBtn2">
                                                                                                <iconify-icon class="py-2 px-3" icon="mdi:airplane" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                            </div>
                                                                                            <div class="col-3 includeIconBlog1 animatedBtn3">
                                                                                                <iconify-icon class="py-2 px-3" icon="material-symbols:delete" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
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
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php include "./components/footer.php"; ?>

                    </div>
                </div>
            </div>
        </div>

        <script src="./js/newHeader.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        <script src="./js/watchlist.js"></script>
        <script src="./js/footer.js"></script>
    </body>

    </html>

<?php

} else {

    header('./login.php');
}

?>