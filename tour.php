<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Plans</title>
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/newHeader.css">
    <!-- <link rel="stylesheet" href="./css/tour.css"> -->
    <link rel="stylesheet" href="./css/tourDark.css">
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body class=" c-default" id="body">
    <?php
    include "./components/newHeader.php";
    ?>

    <div class="container-fluid pt-3">
        <div class="px-4 rounded py-2 mt-1 main-content">

            <!-- Popular Tour Contene -->
            <div class="px-2 py-2 col-12 mt-3 tour_popular-tours">
                <div class="d-flex gap-2 align-items-center">
                    <div class="main-heading" style="min-width: fit-content;">Popular Tours</div>
                    <hr class="w-100">
                </div>
                <div class="d-flex p-2 overflow-auto">
                    <?php
                    for ($x = 0; $x < 5; $x++) {
                    ?>
                        <div class="tour_popular-tours-items">
                            <div class="item white-item">

                                <!-- Image Slider Container -->
                                <div class="slider overflow-hidden position-relative">
                                    <!-- Arrow Buttons -->
                                    <iconify-icon icon="mingcute:left-line" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'left');" class="position-absolute top-50 fs-5 text-white start-0 c-pointer rounded-start" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <iconify-icon icon="mingcute:right-line" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'right');" class="position-absolute top-50 fs-5 text-white end-0 c-pointer rounded-end" style="z-index: 1; transform: translateY(-50%);"></iconify-icon>
                                    <!-- Arrow Buttons -->
                                    <div class="slides d-flex overflow-hidden" style="width: 500%;" id="slide<?php echo ($x); ?>Container" data-marginLeft="0" data-maxWidth="500">
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
                                    <div class="content-heading">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id iusto tenetur commodi ducimus laborum qui quod voluptatibus deserunt esse!</span>
                                    </div>
                                    <a class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:airplane"></iconify-icon>
                                        <span class="content-heading">Travel to read more...</span>
                                    </a>
                                    <div class="d-flex flex-column text-black-50 mt-2">
                                        <div class="" title="View Count">
                                            <iconify-icon icon="gridicons:visible"></iconify-icon>
                                            <span class="content-heading">2351</span>
                                        </div>

                                        <div class="" title="Purchase Count">
                                            <iconify-icon icon="wi:time-9"></iconify-icon>
                                            <span class="content-heading">4581</span>
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
            <div class="px-2 pt-1 pb-3 col-12 mt-3 tour_popular-tours">
                <div class="d-flex gap-2 align-items-center">
                    <div class="main-heading" style="min-width: fit-content;">Popular Tours</div>
                    <hr class="w-100">
                </div>

                <div class="tour-plan-grid">
                    <?php
                    for ($i = 6; $i < 12; $i++) {
                    ?>
                        <div class="tour_popular-tours-items">
                            <div class="item dark-item p-0" style="border: none; ">

                                <div class="p-2 item-header" style="border-radius: 0 0 10px 10px;">
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
                                        <div class="position-absolute top-0 w-100 text-uppercase text-center segoeui-bold fs-2 text-white" style="text-shadow: 0px 0px 5px rgba(00, 00, 00, 0.8);">- 12 Days -</div>
                                        <!-- Number of Days in a tour -->

                                    </div>
                                    <!-- Image Slider Container -->

                                    <div class="quicksand-Medium mt-2 p-2 tour-desc">
                                        <div class="">
                                            <span class="theme-text content-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id iusto tenetur commodi ducimus laborum qui quod voluptatibus deserunt esse!</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between px-3 py-2 content-heading">
                                    <div class="text-white d-flex flex-column align-items-center quicksand-SemiBold">
                                        <span>20+</span>
                                        <span>Tour Places</span>
                                    </div>
                                    <div class="text-white d-flex flex-column align-items-center quicksand-SemiBold">
                                        <span>4.7/5</span>
                                        <span>Ratings</span>
                                    </div>
                                    <div class="text-white d-flex flex-column align-items-center quicksand-SemiBold">
                                        <span>3K+</span>
                                        <span>Tours</span>
                                    </div>
                                </div>

                                <div class="tour-bottom-section">
                                    <div class="">
                                        <span>
                                            <span>
                                                <iconify-icon icon="mdi:airplane"></iconify-icon>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="">
                                        <span>
                                            <span>
                                                <iconify-icon icon="basil:location-solid"></iconify-icon>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="">
                                        <span>
                                            <span>
                                                <iconify-icon icon="solar:heart-bold"></iconify-icon>
                                            </span>
                                        </span>
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
        <?php include "./components/footer.php"; ?>
    </div>

    <script src="./js/newHeader.js"></script>
    <script src="./js/tour.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>