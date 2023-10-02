<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Plans</title>
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/newHeader.css">
    <link rel="stylesheet" href="./css/tour.css">
    <link rel="stylesheet" href="./css/scrolbar.css">
</head>

<body class=" c-default" style="background-color: #DCDCDC;">
    <?php
    include "./components/newHeader.php";
    ?>
    <div class="container-fluid pt-3 pb-3">
        <div class="px-4 rounded py-2 mt-1" style="background-color: #FFFFFF;">

            <!-- Popular Tour Contene -->
            <div class="px-2 py-2 col-12 mt-3 tour_popular-tours" style="background-color: #EBEBEB;">
                <div class="d-flex gap-2 align-items-center">
                    <div class="" style="min-width: fit-content;">Popular Tours</div>
                    <hr class="w-100">
                </div>
                <div class="d-flex p-2 overflow-auto">
                    <?php
                    for ($x = 0; $x < 6; $x++) {
                    ?>
                        <div class="tour_popular-tours-items">
                            <div class="item">

                                <!-- Image Slider Container -->
                                <div class="slider overflow-hidden position-relative">
                                    <!-- Arrow Buttons -->
                                    <iconify-icon icon="mingcute:left-line" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'left');" class="position-absolute top-50 fs-5 text-white start-0 c-pointer rounded-start" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <iconify-icon icon="mingcute:right-line" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'right');" class="position-absolute top-50 fs-5 text-white end-0 c-pointer rounded-end" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <!-- Arrow Buttons -->
                                    <div class="slides d-flex overflow-hidden" style="width: 500%;" id="slide<?php echo ($x); ?>Container" data-marginLeft="0" data-maxWidth="500" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,<?php echo ($x); ?>)">
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (1).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (2).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (3).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (4).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (5).jpg');">
                                        </div>
                                    </div>
                                    <!-- Image Number -->
                                    <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1" style="text-shadow: 0px 0px 5px black; z-index: 2;">
                                        <span class="text-white" id="slide<?php echo ($x); ?>ImageNumber" data-imageNumber="1">1</span>
                                        <span class="text-white"> / 5</span>
                                    </div>
                                    <!-- Image Number -->

                                    <!-- Number of Days in a tour -->
                                    <div class="bg-primary text-uppercase rounded mt-2 position-absolute top-0 start-50 px-4 py-1 text-white quicksand-SemiBold fst-italic text-center" style="width: 80%; transform: translateX(-50%); z-index: 2; box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.5); background-image: radial-gradient(#2662BD,#0048B5);">- 11 Days -</div>
                                    <!-- Number of Days in a tour -->

                                </div>
                                <!-- Image Slider Container -->

                                <div class="quicksand-Medium mt-2">
                                    <div class="">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id iusto tenetur commodi ducimus laborum qui quod voluptatibus deserunt esse!</span>
                                    </div>
                                    <a class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:airplane"></iconify-icon>
                                        <span>Travel to read more...</span>
                                    </a>
                                    <div class="d-flex flex-column text-black-50 mt-2">
                                        <div class="" title="View Count">
                                            <iconify-icon icon="gridicons:visible"></iconify-icon>
                                            <span class="">2351</span>
                                        </div>

                                        <div class="" title="Purchase Count">
                                            <iconify-icon icon="wi:time-9"></iconify-icon>
                                            <span class="">4581</span>
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
            <!-- Popular Tour Contene -->

            <!-- Tour Plans Content -->
            <div class="px-2 pt-1 pb-3 col-12 mt-3 tour_popular-tours" style="background-color: #EBEBEB;">
                <div class="d-flex gap-2 align-items-center">
                    <div class="" style="min-width: fit-content;">Popular Tours</div>
                    <hr class="w-100">
                </div>

                <div class="tour-plan-grid">
                    <?php
                    for ($i = 6; $i < 12; $i++) {
                    ?>
                        <div class="tour_popular-tours-items">
                            <div class="item" style="border: none;">

                                <!-- Image Slider Container -->
                                <div class="slider overflow-hidden position-relative">
                                    <!-- Arrow Buttons -->
                                    <iconify-icon icon="mingcute:left-line" onclick="tourPlanSlideMover(<?php echo ($i); ?>,'left');" class="position-absolute top-50 fs-5 text-white start-0 c-pointer rounded-start" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <iconify-icon icon="mingcute:right-line" onclick="tourPlanSlideMover(<?php echo ($i); ?>,'right');" class="position-absolute top-50 fs-5 text-white end-0 c-pointer rounded-end" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <!-- Arrow Buttons -->
                                    <div class="slides d-flex overflow-hidden" style="width: 500%;" id="slide<?php echo ($i); ?>Container" data-marginLeft="0" data-maxWidth="500" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,<?php echo ($i); ?>)">
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (1).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (2).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (3).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (4).jpg');">
                                        </div>
                                        <div class="image" style="width: 100%; background-image: url('./assets/img/tour_plan/img (5).jpg');">
                                        </div>
                                    </div>
                                    <!-- Image Number -->
                                    <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1" style="text-shadow: 0px 0px 5px black; z-index: 2;">
                                        <span class="text-white" id="slide<?php echo ($i); ?>ImageNumber" data-imageNumber="1">1</span>
                                        <span class="text-white"> / 5</span>
                                    </div>
                                    <!-- Image Number -->

                                    <!-- Number of Days in a tour -->
                                    <div class="bg-primary text-uppercase rounded mt-2 position-absolute top-0 start-50 px-4 py-1 text-white quicksand-SemiBold fst-italic text-center" style="width: 80%; transform: translateX(-50%); z-index: 2; box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.5); background-image: radial-gradient(#2662BD,#0048B5);">- 11 Days -</div>
                                    <!-- Number of Days in a tour -->

                                </div>
                                <!-- Image Slider Container -->

                                <div class="quicksand-Medium mt-2">
                                    <div class="">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id iusto tenetur commodi ducimus laborum qui quod voluptatibus deserunt esse!</span>
                                    </div>
                                    <a class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:airplane"></iconify-icon>
                                        <span>Travel to read more...</span>
                                    </a>
                                    <div class="d-flex flex-column text-black-50 mt-2">
                                        <div class="" title="View Count">
                                            <iconify-icon icon="gridicons:visible"></iconify-icon>
                                            <span class="">2351</span>
                                        </div>

                                        <div class="" title="Purchase Count">
                                            <iconify-icon icon="wi:time-9"></iconify-icon>
                                            <span class="">4581</span>
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
            <!-- Tour Plans Content -->

        </div>
    </div>

    <script src="./js/newHeader.js"></script>
    <script src="./js/tour.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>