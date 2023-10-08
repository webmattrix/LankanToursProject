<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lankan Tours</title>

  <!-- CSS -->
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="./css/home.css"> -->
  <link rel="stylesheet" href="./css/homeDark.css">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/scrolbar.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/font.css">
</head>

<body onload="homeOnloadFunction();" class="c-default" id="body">

  <?php
  include "./components/newHeader.php";
  ?>

  <div class="container-fluid">


    <!-- Image Slider Content -->
    <div class="col-12">
      <div class="row">

        <div class="home-image-slider p-0">
          <!-- <div class="position-absolute end-0 top-0 search-box c-pointer" style="z-index: 8;">
            <input type="text" class="c-pointer d-none text-white" id="homeSearchField" value="Search here..." style="outline: none;" onfocus="setPlaceholder();" onfocusout="outFocusOut();">
            <div class="search-icon" onclick="openSearchBox();">
              <i class="bi bi-search"></i>
            </div>
          </div> -->
          <div class="slides">

            <div class="slide active" id="slide1">
              <img src="./assets/img/home-slider/img (1).jpg" alt="Home Slider Image">
              <div class="slide-content">
                <div class="text-white">Welcomte to Sri Lanka</div>
                <div class="">
                  <span class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non totam dolorem quis voluptas. Earum, dignissimos ea cumque adipisci cupiditate ad deleniti culpa tenetur vero corrupti ratione maiores id iusto sit temporibus, omnis nisi dolores, odio incidunt. Totam repudiandae reiciendis quo quis, tempore accusantium modi itaque nam id suscipit nostrum similique?</span>
                </div>
                <a href="#home_tour_plans">
                  <button class="get-start-btn">Get Start</button>
                </a>
              </div>
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
    </div>
    <!-- Image Slider Content -->

    <div class="col-12 mt-3">
      <div class="px-2 d-flex justify-content-center justify-content-md-end">
        <div class="search-box quicksand-Regular" id="searchBox">
          <input type="text" placeholder="Search here..." id="homeSearchField" />
          <iconify-icon icon="ic:round-search"></iconify-icon>
        </div>
      </div>
    </div>

    <div class="col-12 mt-3">
      <div class="row p-4">

        <div class="why-choosing-us">
          <div class="title segoeui-bold main-heading">Why Choosing Us</div>
          <div class="content">
            <img src="./assets/img/why-choosing-us.png" alt="Tourist in front of waterfall" />
            <div class="right-side">
              <div class="text-center quicksand-Medium sub-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, sequi laborum. Accusantium saepe repudiandae sequi rem. Maxime explicabo, magnam esse voluptas facilis, accusamus doloremque perspiciatis voluptatum officiis, voluptates expedita optio error? Culpa doloremque nihil optio soluta necessitatibus ipsa tenetur mollitia esse nostrum unde itaque dolorum possimus praesentium, ex deserunt, suscipit.</div>
              <div class="list ps-5 mt-2">
                <div class="d-flex gap-2">
                  <div class="d-flex justify-content-center align-items-center">
                    <iconify-icon icon="bx:trip" class="text-white"></iconify-icon>
                  </div>
                  <span class="quicksand-SemiBold content-heading">Lorem, ipsum dolor.</span>
                </div>
                <div class="d-flex gap-2">
                  <div class="d-flex justify-content-center align-items-center" sty>
                    <iconify-icon icon="bx:trip" class="text-white"></iconify-icon>
                  </div>
                  <span class="quicksand-SemiBold content-heading">Lorem, ipsum dolor.</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Activities -->
    <div class="col-12">
      <div class="row">

        <div class="text-center pb-2">
          <span class="segoeui-bold home_subtitle">Activities</span>
        </div>

        <div class="activies-panel" style="width: fit-content;">

          <div class="">
            <div class="rounded p-2 d-flex flex-column align-items-center">
              <iconify-icon style="font-size: 40px;" icon="fluent:beach-24-filled"></iconify-icon>
              <span>Beach</span>
            </div>
          </div>
          <div class="">
            <div class="rounded p-2 d-flex flex-column align-items-center">
              <iconify-icon style="font-size: 40px;" icon="icon-park-solid:mountain"></iconify-icon>
              <span>Mountain</span>
            </div>
          </div>
          <div class="">
            <div class="rounded p-2 d-flex flex-column align-items-center">
              <iconify-icon style="font-size: 40px;" icon="game-icons:hiking"></iconify-icon>
              <span>Hiking</span>
            </div>
          </div>
          <div class="">
            <div class="rounded p-2 d-flex flex-column align-items-center">
              <iconify-icon style="font-size: 40px;" icon="fluent:sport-soccer-24-filled"></iconify-icon>
              <span>Sports</span>
            </div>
          </div>
          <div class="">
            <div class="rounded p-2 d-flex flex-column align-items-center">
              <iconify-icon style="font-size: 40px;" icon="dashicons:food"></iconify-icon>
              <span>Restaurant</span>
            </div>
          </div>

        </div>

      </div>
    </div>
    <!-- Activities -->


    <!-- Most beautiful places & top tour plans -->
    <div class="col-12 p-4">
      <div class="row places-container rounded-3 p-2" style="box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.2);">

        <!-- Beautiful places -->
        <div class="col-12">
          <div class="segoeui-bold home_subtitle pb-3 main-content">Most Beautiful Places of SRI LANKA</div>
          <div class="home_places-grid">

            <?php
            for ($x = 0; $x < 8; $x++) {
            ?>

              <div class="place" style="background-image: url('./assets/img/places/Ella_Sri_Lanka.jpg');">
                <iconify-icon icon="carbon:touch-1-filled"></iconify-icon>
                <div class="home_place-name">Ella</div>
              </div>

            <?php
            }
            ?>

          </div>
        </div>
        <!-- Beautiful places -->

        <div class="home_load-more-btn" id="home_tour_plans">
          <span class="px-3 py-2">Load more...</span>
        </div>

        <hr>

        <!-- Top Tour Plans -->
        <div class="col-12">
          <div class="row">

            <div class="segoeui-bold home_subtitle pb-2 main-content">Feel the SRI LANKA with our top tour plan</div>

            <div class="home_tour-plan">
              <?php
              for ($x = 1; $x < 5; $x++) {
              ?>
                <div>
                  <div class="head position-relative">
                    <div class="position-absolute w-100 d-flex justify-content-between px-2 pt-2" style="z-index: 2;">
                      <iconify-icon icon="ph:heart-fill" class="text-white fs-4 c-pointer"></iconify-icon>
                      <span class="text-uppercase text-white segoeui-bold">12 Days</span>
                    </div>
                    <div class="tour-plan-slider position-relative">
                      <div class="position-absolute top-50 text-white w-100 px-2 fs-5 d-flex justify-content-between home_tour-plan-arrow-container" style="z-index: 3;">
                        <iconify-icon icon="mingcute:left-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'left');"></iconify-icon>
                        <iconify-icon icon="mingcute:right-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'right');"></iconify-icon>
                      </div>
                      <div class="slides" style="width: 300%;" id="slide<?php echo ($x); ?>Container" data-marginLeft="0" data-maxWidth="300" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,<?php echo ($x); ?>)">
                        <div class="slide" id="sliderSlide1" style="background-image: url('./assets/img/tour_plan_images/img (1).jpg');">
                        </div>
                        <div class="slide" id="sliderSlide2" style="background-image: url('./assets/img/tour_plan_images/img (2).jpg');">
                        </div>
                        <div class="slide" id="sliderSlide3" style="background-image: url('./assets/img/tour_plan_images/img (3).jpg');">
                        </div>
                      </div>
                      <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1" style="text-shadow: 0px 0px 5px black;">
                        <span class="text-white" id="slide<?php echo ($x); ?>ImageNumber" data-imageNumber="1">1</span>
                        <span class="text-white"> / 3</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="segoeui-bold text-center mt-1 fs-5">Plan Name</div>
                    <div class="quicksand-Medium sub-heading py-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eum similique ipsam, alias rem deserunt ab assumenda adipisci nesciunt dolore perspiciatis, id impedit praesentium dignissimos, cupiditate iusto quisquam ducimus mollitia libero voluptatem ex. Minima hic pariatur ipsam voluptate aut eaque?</div>
                    <div class="w-100 d-flex justify-content-center">
                      <a class="mt-2 view-itinerary d-flex gap-2 align-items-center quicksand-Regular ps-3 pe-4 pt-1 pb-1 text-decoration-none c-pointer" href="itinerary">
                        <span>View Ininerary</span>
                        <iconify-icon icon="ph:map-pin-line"></iconify-icon>
                      </a>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>

          </div>
        </div>
        <!-- Top Tour Plans -->

      </div>
    </div>
    <!-- Most beautiful places & top tour plans -->

    <?php include "./components/footer.php"; ?>

  </div>

  <script src="./js/bootstrap.js"></script>
  <script src="./js/home.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="./js/footer.js"></script>
  <script src="./js/newHeader.js"></script>
</body>

</html>