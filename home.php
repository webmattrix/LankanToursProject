<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lankan Tours</title>

  <!-- CSS -->
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/home.css">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/scrolbar.css">
</head>

<body onload="homeOnloadFunction();" class="c-default" style="background-color: #E7E7E7;">
  <div class="container-fluid pb-5">

    <?php
    include "./components/header.php";
    ?>


    <!-- Image Slider Content -->
    <div class="col-12">
      <div class="row">

        <div class="home-image-slider p-0">
          <div class="position-absolute end-0 top-0 search-box c-pointer" style="z-index: 1;">
            <input type="text" class="c-pointer d-none text-white" id="homeSearchField" value="Search here..." style="outline: none;" onfocus="setPlaceholder();" onfocusout="outFocusOut();">
            <div class="search-icon" onclick="openSearchBox();">
              <i class="bi bi-search"></i>
            </div>
          </div>
          <div class="slides">

            <div class="slide active" id="slide1">
              <img src="./assets/img/home-slider/img (1).jpg" alt="Home Slider Image">
              <div class="slide-content">
                <div class="text-white">Welcomte to Sri Lanka</div>
                <div class="">
                  <span class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non totam dolorem quis voluptas. Earum, dignissimos ea cumque adipisci cupiditate ad deleniti culpa tenetur vero corrupti ratione maiores id iusto sit temporibus, omnis nisi dolores, odio incidunt. Totam repudiandae reiciendis quo quis, tempore accusantium modi itaque nam id suscipit nostrum similique?</span>
                </div>
                <button class="get-start-btn">Get Start</button>
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
      <div class="row p-4">

        <div class="why-choosing-us">
          <div class="title segoeui-bold">Why Choosing Us</div>
          <div class="content">
            <img src="./assets/img/why-choosing-us.png" alt="Tourist in front of waterfall" />
            <div class="right-side">
              <div class="text-center text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, sequi laborum. Accusantium saepe repudiandae sequi rem. Maxime explicabo, magnam esse voluptas facilis, accusamus doloremque perspiciatis voluptatum officiis, voluptates expedita optio error? Culpa doloremque nihil optio soluta necessitatibus ipsa tenetur mollitia esse nostrum unde itaque dolorum possimus praesentium, ex deserunt, suscipit.</div>
              <div class="list ps-5 mt-2">
                <div class="d-flex gap-2">
                  <div class="d-flex justify-content-center align-items-center" style="">
                    <iconify-icon icon="bx:trip" class="text-white"></iconify-icon>
                  </div>
                  <span class="quicksand-SemiBold">Lorem, ipsum dolor.</span>
                </div>
                <div class="d-flex gap-2">
                  <div class="d-flex justify-content-center align-items-center" style="">
                    <iconify-icon icon="bx:trip" class="text-white"></iconify-icon>
                  </div>
                  <span class="quicksand-SemiBold">Lorem, ipsum dolor.</span>
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

        <div class="fs-4 text-center pb-2">
          <span class="segoeui-bold">Activities</span>
        </div>

        <div class="activies-panel">

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
      <div class="row bg-white rounded-3 p-2" style="box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.2);">

        <!-- Beautiful places -->
        <div class="col-12">
          <div class="segoeui-bold fs-4 pb-3">Most Beautiful Places of SRI LANKA</div>
          <div class="home_places-grid">

            <?php
            for ($x = 0; $x < 12; $x++) {
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

        <div class="home_load-more-btn">
          <span class="bg-white px-3 py-2">Load more...</span>
        </div>
        
      </div>
    </div>
    <!-- Most beautiful places & top tour plans -->


  </div>

  <script src="./js/bootstrap.js"></script>
  <script src="./js/home.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>