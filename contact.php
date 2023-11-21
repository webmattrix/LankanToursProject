<?php $location ="primary";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>Contact </title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/Contact.css">
</head>

<body onload="homeOnloadFunction();" class="c-default ContactBackground" style="overflow-x: hidden;">
    <?php
    include "./components/newHeader.php";
    ?>
    <div class="container-fluid" >
        
        <h4 class=" fw-bold mt-4 mx-4 title" style="font-family: 'QuickSand';">Customer Service Team</h4>
        <div class="col-12 cards ">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4 mb-4 " style="margin: auto;">
                <?php
                for ($x = 0; $x < 5; $x++) {

                ?>
                    <div class="col">
                        <div class="col-12  p-4 contactCard ">
                            <div class="row" style="z-index: 100;">
                                <div class="col-2 ">
                                    <img src="./assets/img/ContactPage_IMG/photo-1494790108377-be9c29b29330.jpg" style=" width:59px; height:59px; border-radius:50%;">
                                </div>
                                <div class="col-9 offset-1" style="font-family: 'SegoeUI';">
                                    <h5 class=" mt-2"><b>Guide</b> Name</h5>
                                </div>
                            </div>
                            <div class="col-12" style="font-family: 'QuickSand';">
                                <h6 class="text-lg-start mt-3"> <i class="bi bi-envelope-fill"></i> &nbsp; &nbsp;EmailAddress@gmail.com</h6>
                                <h6 class="text-lg-start"><i class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;+94 765347479</h6>
                                <h6 class="text-lg-start"><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;+94 765347479</h6>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <h4 class=" fw-bold mx-4" style="font-family: 'QuickSand';">About Us</h4>
        <div class="col-12 p-4  mb-3" style="font-family: 'QuickSand';">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ad praesentium aliquam placeat excepturi
            architecto enim officia natus! Tempore explicabo,
            tempora architecto quae itaque officia! At rem consequatur similique! Optio? Lorem ipsum dolor, sit amet
            consectetur adipisicing elit. Asperiores veritatis repudiandae minima debitis libero est at ipsum et eaque.
            Molestias doloremque repellendus corporis sequi cum non eligendi quibusdam et recusandae! <br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum accusantium sit incidunt voluptatem veniam vel
            magnam nulla nostrum quod quisquam quam deserunt pariatur ad maxime cupiditate sint dolorum, quibusdam
            perferendis.
            <br>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, vero qui dolore sint quo illum facere
            necessitatibus itaque! Dignissimos quaerat hic in at cumque itaque ipsum architecto necessitatibus nesciunt
            harum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe illo impedit totam sed incidunt cumque non
            doloribus. Explicabo eaque corporis optio iure, vitae ut praesentium, sint aliquam ratione inventore culpa!
            Lorem ipsum
            dolor sit amet, consectetur adipisicing elit. Repellendus possimus libero dolor voluptates quasi blanditiis,
            magnam sed porro aperiam iusto sapiente nobis neque cum esse ipsa, sint, id iste perferendis.
        </div>
    </div>
    <?php
    include "./components/footer.php";
    
    ?>
     <script src="./js/newHeader.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
</body>
</html>