<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyTours</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/MyTours.css">
</head>

<body onload="homeOnloadFunction();" class="c-default MyToursBackground">
    <?php
    include "./components/newHeader.php";
    ?>
    <div class="container-fluid">

        <div class="col-12 mt-4">
            <button class="  myToursTitle_button" style=" font-family:Quicksand-Medium">Active Tours</button>
            <hr class="mt-0  mb-2 ">
        </div>
        <div class=" myToursBg1 p-3 rounded-2">
            <?php
            for ($x = 0; $x < 2; $x++) {
            ?>
                <div class="col-12 myToursBg2 rounded-2 p-3 mb-3 border border-3">
                    <div class="row">
                        <div class="col-lg-3 col-12 ">
                            <!-- slide -->
                            <div class="tour-plan-slider position-relative">
                                <div class="position-absolute top-20 w-100 px-2 fs-5 d-flex " style="z-index: 3;">
                                    <div class="row" style=" font-family:Quicksand-Medium">
                                    <?php ?>
                                        <span class="text-white fs-6 mt-1">&nbsp;<iconify-icon icon="mdi:eye" class=" text-white c-pointer  "></iconify-icon> &nbsp;&nbsp;23748</span>
                                    </div>

                                </div>
                                <div class="position-absolute top-50 text-white w-100 px-2 fs-5 d-flex justify-content-between home_tour-plan-arrow-container" style="z-index: 3;">
                                    <iconify-icon icon="mingcute:left-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'left');"></iconify-icon>
                                    <iconify-icon icon="mingcute:right-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($x); ?>,'right');"></iconify-icon>
                                </div>
                                <div class="slides" style="width: 300%;" id="slide<?php echo ($x); ?>Container" data-marginLeft="0" data-maxWidth="300" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,<?php echo ($x); ?>)">
                                    <div class="slide" id="sliderSlide1" style="background-image: url('./assets/img/Mytours_IMG/wp1857982.jpg');">
                                    </div>
                                    <div class="slide" id="sliderSlide2" style="background-image: url('./assets/img/Mytours_IMG/sigiriya-srilanka-.-oc-wallpaper_.jpg');">
                                    </div>
                                    <div class="slide" id="sliderSlide3" style="background-image: url('./assets/img/Mytours_IMG/a_wooden_house_forest-wallpaper-3554x1999.jpg');">
                                    </div>
                                </div>
                                <div class="position-absolute end-0 bottom-0 quicksand-SemiBold me-2 mb-1" style="text-shadow: 0px 0px 5px black;">
                                    <span class="text-white" id="slide<?php echo ($x); ?>ImageNumber" data-imageNumber="1">1</span>
                                    <span class="text-white"> / 3</span>
                                </div>
                            </div>
                            <!-- slide -->
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="col-lg-11 offset-lg-1 col-12">
                                <div class="row mt-2 mt-lg-0">
                                    <div class="col-lg-8 col-12 text-start">
                                        <h5 style=" font-family:Segoe UI">7 Day premiume Plane</h5>
                                    </div>
                                    <div class="col-lg-4 col-12 text-start text-lg-end">
                                        <a href="" class="text-primary text-decoration-none" style=" font-family:Segoe UI"> View tour </a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-11 offset-lg-1 col-12" style=" font-family:Quicksand-Medium">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h6>Request Date : <span class="text-warning">2023/10/08</span> </h6>
                                        <h6>Request Status : <span class="text-warning">Pending</span> </h6>
                                        <h6>Tour Guide : <span class="text-warning">Unregistred</span> </h6>
                                        <h6>Payment : <span class="text-warning">Unassigned</span> </h6>
                                    </div>
                                    <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                        <h6>Your Message</h6>
                                        <div class="col-12 p-2 rounded-2 myTourMsgBox">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam nulla eius, beatae placeat fugiat neque. Sint voluptas doloremque
                                                facilis officiis dolore, cumque sed odit, neque consectetur itaque, excepturi quis ullam.</p>
                                        </div>
                                        <div class=" col-12 text-end mt-2 ">
                                            <!-- small device -->
                                            <div class="row d-block d-md-none d-lg-none ">
                                                <div class=" col-md-4 offset-md-0 col-10 offset-1  mt-3">
                                                    <button class="btn btn-secondary MytoursButton" style="width: 100%;"><i class="bi bi-chat-left-quote text-white"></i> &nbsp;FeedBack</button>
                                                </div>
                                                <div class=" col-md-4  offset-md-0  col-10 offset-1  mt-2">
                                                    <button class="btn btn-danger MytoursButton" style="width: 100%;"><i class="bi bi-trash3-fill text-white"></i> &nbsp;Delete</button>

                                                </div>
                                                <div class=" col-md-4   offset-md-0 col-10 offset-1  mt-2">
                                                    <button class="btn btn-primary MytoursButton" style="width: 100%;"><i class="bi bi-envelope text-white"></i> Message&nbsp;&nbsp;03</button>

                                                </div>
                                            </div>
                                            <!-- small device -->

                                            <!-- large device -->
                                            <div class=" col-12 text-end mt-4 d-lg-block d-md-block d-none ">
                                                <button class="btn btn-secondary MytoursButton"><i class="bi bi-chat-left-quote text-white"></i> &nbsp;FeedBack</button>
                                                <button class="btn btn-danger MytoursButton">&nbsp;<i class="bi bi-trash3-fill text-white"></i>&nbsp; </button>
                                                <button class="btn btn-primary MytoursButton"><i class="bi bi-envelope text-white"></i> &nbsp;&nbsp3</button>
                                            </div>
                                            <!-- large device -->
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
        <div class="col-12 mt-4">
            <button class="myToursTitle_button" style=" font-family:Quicksand-Medium">pervious Tours</button>
            <hr class="mt-0  mb-2">
        </div>
        <div class="p-lg-5 p-2 rounded-2 myToursD_table1 mb-3">
            <!-- Large Device -->
            <div class="col-12 table-responsive d-none d-lg-block " style=" font-family:Quicksand-Medium">
                <table class="table  align-middle  myToursD_table2   mb-3" style=" border-radius: 5px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tour name</th>
                            <th scope="col">Guide Name</th>
                            <th scope="col">cost</th>
                            <th scope="col">Timeline</th>
                            <th scope="col">Type</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($x = 0; $x < 5; $x++) {
                        ?>
                            <tr>
                                <td>1</td>
                                <td>10 Luxury Plane</td>
                                <td>Mr.Grimble</td>
                                <td>$150</td>
                                <td>20023-06-23 ➝ 2023-06-30</td>
                                <td>Custom Plane</td>
                                <td> <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Large Device -->

            <!-- small divice -->
            <div class="col-12 table-responsive  d-block d-lg-none" style=" font-family:Quicksand-Medium">
                <table class="table  align-middle  myToursD_table2    mb-3" style=" border-radius: 5px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tour name</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($x = 0; $x < 5; $x++) {

                        ?>
                            <tr>
                                <td>1</td>
                                <td>10 Luxury Plane</td>
                                <td> <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- small device -->
        </div>
        <!-- <div class="col-10 offset-1 mt-3 d-flex justify-content-center align-content-center ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-arrow-left-circle"></i></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-arrow-right-circle"></i></a></li>
                </ul>
            </nav>
        </div> -->
        <?php
        include "./components/footer.php";
        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style=" font-family:Quicksand-Medium">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header modelBackGround ">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tour Details</h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  rounded-3 myToursD-modal">
                    <div class="col-12 ">
                        <div class="row p-3 g-2">
                            <div class="col-lg-4 offset-lg-1 col-5">
                                <span class="">Tour Name </span>
                            </div>
                            <div class="col-7 ">
                                <span> <b> 12 day tour</b> </span>
                            </div>
                            <div class="col-lg-4 offset-lg-1 col-5">
                                <span>Guide Name</span>
                            </div>
                            <div class="col-7">
                                <span> <b> Mr . Grimble</b> </span>
                            </div>
                            <div class="col-lg-4 offset-lg-1 col-5">
                                <span>Cost</span>
                            </div>
                            <div class="col-7 ">
                                <span> <b> 1200$</b> </span>
                            </div>
                            <div class="col-lg-4 offset-lg-1 col-5">
                                <span>Time Line</span>
                            </div>
                            <div class="col-7">
                                <span> <b>20023-06-23 ➝ 2023-06-30</b> </span>
                            </div>
                            <div class="col-lg-4 offset-lg-1 col-5">
                                <span>Type</span>
                            </div>
                            <div class="col-7">
                                <span><b> Custom Tour</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="./js/MyTours.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    </div>
</body>

</html>