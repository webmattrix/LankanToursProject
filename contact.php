<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <!-- <h6 class="p-1"><i class="bi bi-arrow-left-circle-fill" style="font-family: 'QuickSand';"></i>&nbsp; Contact</h6> -->
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
=======
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="" />
    <link rel="stylesheet" href="./css/ConactPage.css">

</head>

<body class="" style="background-color: #E7E7E7;">
    <h5 class="p-3 " style="font-family: QuickSand;"><i class="bi bi-arrow-left-circle-fill"></i>&nbsp; Contact</h5>
    <div class="container-fluid">
        <h3 class="p-3 fw-bold mx-4" style="font-family: QuickSand;">Customer Service Team</h3>

        <div class="col-12 p-3">
            <div class="row  bg-white " style="border-radius: 12px;">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 mb-4 " style="margin: auto;">
                    
                    <div class="col ">
                        <div class=" ContactGuidCard">
                            <div class="col-12">
                                <div class="row">
                                    <div class=" col-12">
                                    <img src="./assets/img/ContactPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="img-fluid rounded-start" style="border-radius:50%; ">                                    </div>
                                    <div class="col-12" style="font-family: QuickSand;">
                                        <h5 class=" mt-3 text-lg-start" style="font-family: SegoeUI;"> Guide Name</h5>
                                        <h6 class="text-lg-start mt-3"> <i class="bi bi-envelope-fill"></i> &nbsp; &nbsp;Email Address</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;+94 765347479</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;+94 765347479</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <div class="col ">
                        <div class="ContactGuidCard">
                            <div class="col-12">
                                <div class="row">
                                    <div class=" col-12">
                                    <img src="./assets/img/ContactPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="img-fluid rounded-start" style="border-radius:50%; ">                                    </div>
                                    <div class="col-12" style="font-family: QuickSand;">
                                        <h5 class=" mt-3 text-lg-start" style="font-family: SegoeUI;"> Guide Name</h5>
                                        <h6 class="text-lg-start mt-3"> <i class="bi bi-envelope-fill"></i> &nbsp; &nbsp;Email Address</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;+94 765347479</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;+94 765347479</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <div class="col ">
                        <div class=" ContactGuidCard">
                            <div class="col-12">
                                <div class="row">
                                    <div class=" col-12">
                                    <img src="./assets/img/ContactPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="img-fluid rounded-start" style="border-radius:50%; ">                                    </div>
                                    <div class="col-12" style="font-family: QuickSand;">
                                        <h5 class=" mt-3 text-lg-start" style="font-family: SegoeUI;"> Guide Name</h5>
                                        <h6 class="text-lg-start mt-3"> <i class="bi bi-envelope-fill"></i> &nbsp; &nbsp;Email Address</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;+94 765347479</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;+94 765347479</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <div class="col ">
                        <div class=" ContactGuidCard">
                            <div class="col-12">
                                <div class="row">
                                    <div class=" col-12">
                                    <img src="./assets/img/ContactPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="img-fluid rounded-start" style="border-radius:50%; ">                                    </div>
                                    <div class="col-12" style="font-family: QuickSand;">
                                        <h5 class=" mt-3 text-lg-start" style="font-family: SegoeUI;"> Guide Name</h5>
                                        <h6 class="text-lg-start mt-3"> <i class="bi bi-envelope-fill"></i> &nbsp; &nbsp;Email Address</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;+94 765347479</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;+94 765347479</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <div class="col ">
                        <div class=" ContactGuidCard">
                            <div class="col-12">
                                <div class="row">
                                    <div class=" col-12">
                                        <img src="./assets/img/ContactPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="img-fluid rounded-start" style="border-radius:50%; ">
                                    </div>
                                    <div class="col-12" style="font-family: QuickSand;">
                                        <h5 class=" mt-3 text-lg-start" style="font-family: SegoeUI;"> Guide Name</h5>
                                        <h6 class="text-lg-start mt-3"> <i class="bi bi-envelope-fill"></i> &nbsp; &nbsp;Email Address</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;+94 765347479</h6>
                                        <h6 class="text-lg-start"><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;+94 765347479</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>


        <h3 class="p-3 fw-bold mx-4" style="font-family: QuickSand;">About Us</h3>
        <div class="col-12 p-3" style="font-family: QuickSand;">
>>>>>>> main
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
<<<<<<< HEAD
    <?php
    include "./components/footer.php";
    ?>
    <script src="./js/bootstrap.bundle.js"></script>
</body>
=======

    <script src="./js/bootstrap.bundle.js"></script>
    
</body>

>>>>>>> main
</html>