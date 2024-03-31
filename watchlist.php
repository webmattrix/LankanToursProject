<?php

session_start();

if (isset($_SESSION["lt_tourist"])) {

    $user = $_SESSION["lt_tourist"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script src="./js/script.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Watchlist</title>
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/newHeader.css" />
        <link rel="stylesheet" href="./css/footer.css" />
        <link rel="stylesheet" href="./css/scrolbar.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
        <?php
        if (isset($_COOKIE["lt_theme"])) {
            if ($_COOKIE["lt_theme"] === 'light') {
        ?>
                <link rel="stylesheet" href="./css/watchlist.css" />
            <?php
            } else {
            ?>
                <link rel="stylesheet" href="./css/watchlistDark.css" />
            <?php
            }
        } else {
            ?>
            <link rel="stylesheet" href="./css/watchlist.css" />
        <?php
        }
        ?>
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
                            <hr class="mt-4" style="border: 1px solid #7B7B7B;" />
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-3 mb-lg-4">
                                    <div class="col-12 wt-blog-cont4" style="border-radius: 5px;">
                                        <div class="row p-lg-4 pb-4" style="row-gap: 0.3in;">
                                            <?php

                                            $watchlist_rs = Database::search("SELECT *, `tour`.`name` AS `t_name`, `tour`.`id` AS `t_id` FROM `watchlist` 
                                            INNER JOIN `tour` ON `watchlist`.`tour_id`=`tour`.`id`
                                            WHERE `watchlist`.`user_id` = '" . $user['id'] . "'");
                                            $watchlist_num = $watchlist_rs->num_rows;

                                            if ($watchlist_num > 0) {
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
                                                                                <span class="arrows left" onclick="sliderMover('left',<?php echo ($watchlist_iteration); ?>);">
                                                                                    <iconify-icon icon="mingcute:left-line"></iconify-icon>
                                                                                </span>
                                                                                <span class="arrows right" onclick="sliderMover('right',<?php echo ($watchlist_iteration); ?>);">
                                                                                    <iconify-icon icon="mingcute:right-line"></iconify-icon>
                                                                                </span>

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



                                                                                        <div class="slide <?php
                                                                                                            if ($pn == 0) {
                                                                                                                echo ("active");
                                                                                                            }
                                                                                                            ?>" id="slide<?php echo (($pn + 1) . "_" . $watchlist_iteration); ?>">

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
                                                                                            <div class="gap-4 d-flex px-2">
                                                                                                <div class="d-flex px-4 py-1 align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                                    <iconify-icon icon="carbon:view-filled" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                                    <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;"><?php echo ($watchlist_data["views"]); ?></span>
                                                                                                </div>

                                                                                                <?php
                                                                                                $tour_table = Database::search("SELECT COUNT(*) AS `purchase_count` FROM `order` WHERE `tour_id`='" . $watchlist_data["tour_id"] . "'");
                                                                                                $tour_table_data = $tour_table->fetch_assoc();
                                                                                                ?>

                                                                                                <div class="d-flex px-4 py-1 align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                                    <iconify-icon icon="bxs:purchase-tag" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                                    <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;"><?php echo ($tour_table_data["purchase_count"]) ?></span>
                                                                                                </div>
                                                                                                <div class="d-flex px-4 py-1 align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                                    <iconify-icon icon="material-symbols:star" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                                    <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">...</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="row mt-lg-5 mt-3">

                                                                                <?php

                                                                                $vst_place_rs = Database::search("SELECT *, `place`.`name` AS `placeName` FROM `tour_has_place` 
                                                                                INNER JOIN `place` ON `tour_has_place`.`place_id`=`place`.`id` 
                                                                                WHERE `tour_id`='" . $watchlist_data["t_id"] . "'");

                                                                                $vst_place_num = $vst_place_rs->num_rows;



                                                                                ?>

                                                                                <div class="col-12">
                                                                                    <div class="row px-2">
                                                                                        <span class="wt-slide-cont-textC" style="font-family: 'Quicksand'; font-size: calc(0.61rem + 0.61vh); font-weight: 600;">Visiting Places</span>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="row gap-3 mt-2">

                                                                                                    <div class="watchlist-place-grid px-4">
                                                                                                        <?php
                                                                                                        for ($place_iteration = 0; $place_iteration < $vst_place_num; $place_iteration++) {
                                                                                                            $place_data = $vst_place_rs->fetch_assoc();
                                                                                                        ?>
                                                                                                            <span class="placesText1"><?php echo ($place_data["placeName"]); ?></span>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 mt-3">
                                                                                    <div class="row">
                                                                                        <div class="col-12 d-flex justify-content-end">
                                                                                            <div class="row gap-3">
                                                                                                <a href="Itinerary/<?php echo ($watchlist_data["tour_id"]); ?>" class="col-3 includeIconBlog1 animatedBtn1">
                                                                                                    <iconify-icon class="py-2 px-3" icon="ic:baseline-location-on" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                                </a>
                                                                                                <div class="col-3 includeIconBlog1 animatedBtn2">
                                                                                                    <iconify-icon class="py-2 px-3" icon="mdi:airplane" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                                </div>
                                                                                                <div class="col-3 includeIconBlog1 animatedBtn3" onclick="deleteWatchlistItem('<?php echo ($watchlist_data['tour_id']); ?>');">
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
                                            } else {
                                                ?>
                                                <img src="./assets/img/TourismBag.png" alt="Tourism Bag" style="max-height: 60vh; object-fit: contain;" />
                                                <div class="d-flex align-items-center w-100 flex-column">
                                                    <span class="content-heading mb-2" style="color: #4478FF;">Your watchlist is empty. Make it colourful</span>
                                                    <a href="Home">
                                                        <button class="btn btn-danger px-4" style="width: fit-content;">Travel to Home</button>
                                                    </a>
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
            </div>
        </div>
        <?php include "./components/footer.php"; ?>

        <script src="./js/newHeader.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        <script src="./js/watchlist.js"></script>
        <script src="./js/footer.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location: Login");
}

?>