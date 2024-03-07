<?php
session_start(); ?>
<?php
require "assets/model/sqlConnection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Places || Lankan Travel</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <?php
    if (isset($_COOKIE["lt_theme"])) {
        if ($_COOKIE["lt_theme"] === 'light') {
    ?>
            <link rel="stylesheet" href="css/places.css">
        <?php
        } else {
        ?>
            <link rel="stylesheet" href="css/placesDark.css">
        <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="css/places.css">
    <?php
    }
    ?>
    <link rel="stylesheet" href="./css/newHeader.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/place-scroll.css" />
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">

    <script src="./js/places.js"></script>
    
</head>

<body class="container-fluid" style="margin:0; background-color: #DEDEDE; padding:0;" onload="homeOnloadFunction();">
    <?php
    $location = "primary";
    include "./components/newHeader.php";
    ?>
    <div class="col-12 overflow-hidden">
        <div class="row">

            <div class="col-12">
                <div class="home-image-slider p-0">
                    <div class="slides">
                        <div class="slide active" id="slide1">
                            <img src="./assets/img/home-slider/img (1).jpg" alt="Home Slider Image">
                        </div>
                        <div class="slide" id="slide2">
                            <img src="./assets/img/home-slider/img (2).jpg" alt="Home Slider Image">
                        </div>
                        <div class="slide" id="slide3">
                            <img src="./assets/img/home-slider/img (3).jpg" alt="Home Slider Image">
                        </div>
                        <div class="slide" id="slide4">
                            <img src="./assets/img/home-slider/img (4).jpg" alt="Home Slider Image">
                        </div>
                        <div class="slide" id="slide5">
                            <img src="./assets/img/home-slider/img (5).jpg" alt="Home Slider Image">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-lg-4 py-3">
                        <div class="row mx-lg-4 mx-2">
                            <div class="col-12 py-lg-4 py-3" style="background-color: #FFF;">
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-12 d-grid d-lg-grid d-md-grid d-sm-grid">
                                        <span class="quicksand-SemiBold text-dark" style="font-size: calc(0.78rem + 0.78vh);">Tour Places</span>
                                    </div>
                                    <div class="col-lg-11 col-md-10 d-none d-md-grid d-sm-grid d-lg-grid">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.30);;">
                                    </div>
                                    <div class="col-12">
                                        <div class="row">


                                            <div class="col-12">
                                                <div class="row my-1 g-4">

                                                    <!-- single card -->

                                                    <!-- use for loop | -->
                                                    <?php

                                                    $place_table = Database::search("SELECT * FROM `place` ORDER BY `rating` DESC");
                                                    $place_table_rows = $place_table->num_rows;

                                                    for ($place_iteration = 0; $place_iteration < $place_table_rows; $place_iteration++) {

                                                        $place_table_data = $place_table->fetch_assoc();

                                                        $place_image_table = Database::search("SELECT * FROM `place_image` WHERE `place_id`='" . $place_table_data["id"] . "'");
                                                        $place_image_table_rows = $place_image_table->num_rows;

                                                        if ($place_image_table_rows == 0) {
                                                            continue;
                                                        }
                                                        if ($place_table_data["description"] == NULL || $place_table_data["description"] == "" || empty($place_table_data["description"])) {
                                                            continue;
                                                        }


                                                    ?>
                                                        <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                                                            <div class="card" style="height: 100%;">

                                                                <div class="tour-plan-slider position-relative">
                                                                    <div class="wrapper2 position-absolute">
                                                                        <span class="imgCounts d-flex">
                                                                            <span id="imageCount<?php echo ($place_iteration); ?>" data-image-view-number="1">1</span>
                                                                            /
                                                                            <span><?php echo ($place_image_table_rows); ?></span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="position-absolute top-50 text-white w-100 px-2 fs-5 d-flex justify-content-between home_tour-plan-arrow-container" style="z-index: 3;">
                                                                        <iconify-icon icon="mingcute:left-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($place_iteration); ?>,'left');"></iconify-icon>
                                                                        <iconify-icon icon="mingcute:right-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($place_iteration); ?>,'right');"></iconify-icon>
                                                                    </div>
                                                                    <!-- <div class="wrapper position-absolute">
                                                                        <input type="checkbox" id="check1">
                                                                        <label for="check1"></label>
                                                                    </div> -->
                                                                    <div class="wrapper3 position-absolute">
                                                                        <div class="row">
                                                                            <span class="placeProp text-center"><?php echo ($place_table_data["name"]) ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="slides" style="width: <?php echo $place_image_table_rows ?>00%;" id="slide<?php echo ($place_iteration); ?>Container" data-marginLeft="0" data-maxWidth="<?php echo $place_image_table_rows ?>00" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,<?php echo ($place_iteration); ?>)">

                                                                        <?php
                                                                        for ($x1 = 0; $x1 < $place_image_table_rows; $x1++) {
                                                                            $place_image_table_data = $place_image_table->fetch_assoc();
                                                                        ?>
                                                                            <div class="slide" id="sliderSlide1" style="background-image: url('./assets/img/places/<?php echo ($place_image_table_data["path"]); ?>');"></div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                </div>
                                                                <!-- slide -->

                                                                <div class="card-body">
                                                                    <div class="col-12 p-0 m-0">
                                                                        <div class="row">
                                                                            <div class="col-9">
                                                                                <div class="row">
                                                                                    <span class="text-start quicksand-SemiBold" style="font-size: calc(0.68rem + 0.68vh); color: #000;"><?php echo ($place_table_data["name"]); ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <div class="row">
                                                                                    <span class="text-end quicksand-SemiBold" style="font-size: calc(0.68rem + 0.68vh); color: #000;"><?php echo ($place_table_data["rating"]); ?>/5</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.75);">
                                                                    </div>
                                                                    <p class="card-text" style="max-height: 250px; overflow-y: auto;"><?php echo (nl2br($place_table_data["description"])); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                    <!-- use for loop ^
                                                                      | 
                                                    -->

                                                    <!-- single card -->

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

            <!-- <div class="col-12 py-4">
                <div class="row px-4">

                    <div class="col-12 place-container">
                        <div class="place-heading">
                            <span class="quicksand-SemiBold text-dark">Tour Places</span>
                        </div>
                    </div>

                </div>
            </div> -->


            <?php include "./components/footer.php"; ?>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="./js/newHeader.js"></script>
</body>

</html>