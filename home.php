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
</head>

<body onload="homeOnloadFunction();" class="c-default">
  <div class="container-fluid">

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
                <div class="">Welcomte to Sri Lanka</div>
                <div class="">
                  <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non totam dolorem quis voluptas. Earum, dignissimos ea cumque adipisci cupiditate ad deleniti culpa tenetur vero corrupti ratione maiores id iusto sit temporibus, omnis nisi dolores, odio incidunt. Totam repudiandae reiciendis quo quis, tempore accusantium modi itaque nam id suscipit nostrum similique?</span>
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
          <div class="title">Why Choosing Us</div>
          <div class="content">
            <img src="./assets/img/why-choosing-us.png" alt="Tourist in front of waterfall" />
            <div class="right-side">
              <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, sequi laborum. Accusantium saepe repudiandae sequi rem. Maxime explicabo, magnam esse voluptas facilis, accusamus doloremque perspiciatis voluptatum officiis, voluptates expedita optio error? Culpa doloremque nihil optio soluta necessitatibus ipsa tenetur mollitia esse nostrum unde itaque dolorum possimus praesentium, ex deserunt, suscipit, officiis corporis perferendis temporibus odit! Labore nihil doloribus eum exercitationem adipisci necessitatibus maiores distinctio porro! Corrupti, vel. Quis tempore dolore commodi sapiente nesciunt accusantium maxime labore quidem ducimus! Ab veritatis quia asperiores nesciunt deleniti id incidunt ratione. Aperiam corrupti quasi placeat nihil labore ipsa autem, fuga minus harum ducimus nostrum?</div>
              <div class="list">
                <div class="">
                  <iconify-icon icon="bx:trip" class="text-white"></iconify-icon>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


  </div>

  <script src="./js/bootstrap.js"></script>
  <script src="home.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>