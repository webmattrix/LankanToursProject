<?php

$tid = $_GET["tour_id"];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Itinerary Page</title>

    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/itinerary.css" />
    <!-- <link rel="stylesheet" href="../css/itineraryDark.css" /> -->
    <link rel="stylesheet" href="../css/scrolbar.css" />
    <link rel="stylesheet" href="../css/newHeader.css" />
    <link rel="stylesheet" href="../css/footer.css" />

</head>

<body onload="homeOnloadFunction();">

    <div class="container-fluid">
        <div class="row">

            <?php

            $location = "secondary";

            include "./components/newHeader.php";
            require "./assets/model/sqlConnection.php";
            ?>

            <div class="col-12">
                <div class="row">
                    <div class="modal fade" id="reqTourModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="fs-5 fw-bold" style="font-family: 'Quicksand'; color: #333;" id="exampleModalLabel">Make it Yours</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="row">

                                            <?php

                                            $contact_rs = Database::search("SELECT * FROM `contact_method`");
                                            $contact_num = $contact_rs->num_rows;

                                            ?>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row pt-1">
                                                            <span class="fw-bold ps-3" style="font-family: 'Quicksand'; font-size: calc(0.6rem + 0.6vh);">Tour Plan</span>
                                                            <div class="col-12">
                                                                <input type="text" id="to_name" class="form-control" placeholder="Day 11 Tour Plan" readonly style="font-family: 'Quicksand'; cursor: default; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;" />
                                                            </div>
                                                            <div class="col-12 mt-4 pt-2">
                                                                <input type="text" id="jn_members" class="form-control" placeholder="Members" style="font-family: 'Quicksand'; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;" />
                                                            </div>

                                                            <div class="col-12 mt-4 pt-2">
                                                                <select class="form-select" id="star_level" aria-label="Tour Level" style="font-family: 'Quicksand'; cursor: pointer; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;">
                                                                    <option value="0">Tour Level</option>
                                                                    <option value="1">1 Star</option>
                                                                    <option value="2">2 Star</option>
                                                                    <option value="3">3 Star</option>
                                                                    <option value="4">4 Star</option>
                                                                    <option value="5">5 Star</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-12 mt-4 pt-2">
                                                                <select class="form-select" id="contact_meth" aria-label="How do we contact you?" style="font-family: 'Quicksand'; cursor: pointer; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;">
                                                                    <option value="0">How do we contact you?</option>
                                                                    <?php

                                                                    for ($coM = 0; $coM < $contact_num; $coM++) {
                                                                        $contact_data = $contact_rs->fetch_assoc();

                                                                    ?>
                                                                        <option value="<?php echo $contact_data["id"]; ?>"><?php echo $contact_data["name"]; ?></option>
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-7">
                                                        <div class="row">
                                                            <div class="col-12 mt-4">
                                                                <textarea class="form-control" placeholder="Your Message.." id="message_ovw" cols="30" rows="11" style="font-family: 'Quicksand'; font-size: calc(0.57rem + 0.55vh); border-radius: 8px; border: 1px solid #44B0FF; background: #EBEBEB;"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-4">
                                                            <div class="row justify-content-center justify-content-lg-end">
                                                                <div class="col-9 col-lg-5 col-sm-4">
                                                                    <button type="button" onclick="tourReqProcessing(<?php echo $tid; ?>);" class="btn text-white col-12 p-2 justify-content-center" data-bs-dismiss="modal" style="font-size: calc(0.54rem + 0.56vh); background-color: #1546F4; display: flex; align-items: center;">Send Request&nbsp;&nbsp;<iconify-icon icon="mdi:email-send-outline" class="fs-5"></iconify-icon></button>
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

                    <div class="modal fade" id="doneModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12 afterProcess1">
                                        <div class="row justify-content-center">
                                            <div class="col-5">
                                                <img src="../assets/img/itinerary_IMG/complete.png" style="width: 100%; height: 100%;" alt="">
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <span class="text-center" style="color: #3FAB46; font-family: 'Segoe'; font-size: calc(0.7rem + 0.68vh);">Request was send</span>
                                                    <span class="text-center" style="color: #3FAB46; font-family: 'Segoe'; font-size: calc(0.7rem + 0.68vh);">We will contact you soon as possible</span>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 mb-2">
                                                <div class="row justify-content-center">
                                                    <div class="col-9 col-sm-6 col-lg-5">
                                                        <button class="btn col-12 text-white justify-content-center" style="background-color: #1546F4; display: flex; align-items: center;">Watch your tour&nbsp;&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 reqProcess1" style="padding: 18%;">
                                        <div class="row">
                                            <span class="text-center">
                                                <span class="spinner-border pb-3" style="color: #1546F4;" aria-hidden="true"></span>
                                            </span>
                                            <span class="text-center px-4 pb-4 pt-1 fs-5" style="color: #1546F4; font-family: 'Quicksand';">
                                                <span role="status">Request Processing...</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="row">

                            <div class="itinerary-image-slider p-0">
                                <div class="itinerary-slides">
                                    <div class="itinerary-slide active" id="itinerary-slide1">
                                        <img src="../assets/img/itinerary_IMG/colombo.png" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 01</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button type="button" onclick="tourRequest(<?php echo $tid; ?>);" class="btn my-2 py-2" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>
                                        </div>

                                    </div>
                                    <div class="itinerary-slide" id="itinerary-slide2">
                                        <img src="../assets/img/itinerary_IMG/temple of tooth.jpg" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 02</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button class="col-12 btn my-2 py-2" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>

                                        </div>
                                    </div>
                                    <div class="itinerary-slide" id="itinerary-slide3">
                                        <img src="../assets/img/itinerary_IMG/seegiriya.png" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 03</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button type="button" class="btn my-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Tour" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>

                                        </div>
                                    </div>
                                    <div class="itinerary-slide" id="itinerary-slide4">
                                        <img src="../assets/img/itinerary_IMG/mountlavinia.jpg" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 04</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button type="button" class="btn my-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Tour" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>

                                        </div>
                                    </div>

                                    <div class="itinerary-slide" id="itinerary-slide5">
                                        <img src="../assets/img/itinerary_IMG/matara.jpg" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 05</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button type="button" class="btn my-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Tour" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 after-slider-cont-bg">
                                <div class="row justify-content-center">

                                    <div class="col-11 mt-5 py-4 d-lg-grid d-none d-sm-none bg-blog-cont1" style="border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold blog-place-textC" style="font-family: 'Segoe';">Day 01</span>
                                                            <p class="fs-6 pt-lg-3 pt-2 blog-place-desc" style="font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-3">
                                                                <div class="row" style="line-height: 0.28in;">
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-lg-8 mt-4">
                                                                        <a href="#" class="text-decoration-none text-white"><i class="bi bi-arrow-right-circle fs-4 fw-bold text-white position-absolute px-2"></i></a>
                                                                        <img src="../assets/img/itinerary_IMG/colombo_2.jpg" style="width: 100%; height: 30vh; border-radius: 6px;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2 city-desc" style="font-family: 'Segoe';">Colombo</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Small Devices -->

                                    <div class="col-11 mt-5 py-4 d-lg-none d-grid bg-blog-cont1" style="border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-lg-8 mt-4">
                                                                        <a href="#" class="text-decoration-none text-white"><i class="bi bi-arrow-right-circle fs-4 fw-bold text-white position-absolute px-2"></i></a>
                                                                        <img src="../assets/img/itinerary_IMG/colombo_2.jpg" style="width: 100%; height: 30vh; border-radius: 6px; object-fit: cover;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2 city-desc" style="font-family: 'Segoe';">Colombo</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold blog-place-textC" style="font-family: 'Segoe';">Day 01</span>
                                                            <p class="pt-lg-3 pt-2 blog-place-desc" style="font-family: 'Segoe'; font-size: calc(0.6rem + 0.6vh);">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-3">
                                                                <div class="row" style="line-height: 0.24in;">
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Small Devices -->


                                    <div class="col-11 mt-4 py-4 d-lg-grid d-none d-sm-none bg-blog-cont1" style="border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-lg-8 mt-4">
                                                                        <a href="#" class="text-decoration-none text-white"><i class="bi bi-arrow-right-circle fs-4 fw-bold text-white position-absolute px-2"></i></a>
                                                                        <img src="../assets/img/itinerary_IMG/seegiriya.png" style="width: 100%; height: 30vh; border-radius: 6px; object-fit: cover;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2 city-desc" style="font-family: 'Segoe';">Seegiriya</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold blog-place-textC" style="font-family: 'Segoe';">Day 02</span>
                                                            <p class="fs-6 pt-lg-3 pt-2 blog-place-desc" style="font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-2">
                                                                <div class="row" style="line-height: 0.28in;">
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="fs-6 places-marked" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Small Device -->

                                    <div class="col-11 d-lg-none d-grid d-sm-none bg-blog-cont1" style="border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-lg-8 mt-4">
                                                                        <a href="#" class="text-decoration-none text-white"><i class="bi bi-arrow-right-circle fs-4 fw-bold text-white position-absolute px-2"></i></a>
                                                                        <img src="../assets/img/itinerary_IMG/seegiriya.png" style="width: 100%; height: 30vh; border-radius: 6px;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2 city-desc" style="font-family: 'Segoe';">Seegiriya</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold blog-place-textC" style="font-family: 'Segoe';">Day 02</span>
                                                            <p class="pt-lg-3 pt-2 blog-place-desc" style="font-family: 'Segoe'; font-size: calc(0.6rem + 0.6vh);">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-3">
                                                                <div class="row" style="line-height: 0.24in;">
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill icon-style2 me-2"></i><span class="places-marked" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Small Device -->

                                    <div class="col-12 mb-lg-0 mb-sm-0 mb-3" style="padding-top: 5%; padding-bottom: 5%;">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-lg-5 col-sm-7">
                                                <img src="../assets/img/itinerary_IMG/basemap.png" style="width: 100%; height: auto;" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="row justify-content-center">
                                            <div class="col-11 mb-4 pb-3 pt-1 bg-blog-cont1" style="border-radius: 6px; box-shadow: 0 3px 10px -6px #222;">
                                                <div class="row">
                                                    <span class="fs-3 fw-bold pb-3 d-lg-grid d-sm-grid d-none ts-feedback" style="font-family: 'Segoe';">Tourist Feedback</span>
                                                    <span class="fs-5 fw-bold pb-1 d-lg-none d-sm-none d-grid ts-feedback" style="font-family: 'Segoe';">Tourist Feedback</span>
                                                    <div class="col-12">

                                                        <?php

                                                        $tst_feedback_rs = Database::search("SELECT *,`feedback`.`date_time` AS `date_ob` FROM `feedback` INNER JOIN `order` ON `feedback`.`order_id`=`order`.`id` WHERE `order`.`tour_id`='" . $tid . "'");
                                                        $tst_feedback_num = $tst_feedback_rs->num_rows;

                                                        ?>
                                                        <?php

                                                        for ($fd = 0; $fd < $tst_feedback_num; $fd++) {

                                                            $tst_feedback_data = $tst_feedback_rs->fetch_assoc();

                                                        ?>
                                                        
                                                        <div class="col-12 mb-3 blog-cont-feedB" style="border-radius: 5px; box-shadow: 0 4px 8px -6px #222;">
                                                            <div class="row">
                                                                <span class="fs-5 ps-4 py-2 d-lg-grid d-sm-grid d-none feedB-date1" style="font-family: 'Segoe'; font-weight: 400;"><?php echo $tst_feedback_data["date_ob"];?></span>
                                                                <span class="ps-4 py-2 d-lg-none d-sm-none d-grid feedB-date1" style="font-family: 'Segoe'; font-weight: 400; font-size: calc(0.66rem + 0.73vh);"><?php echo $tst_feedback_data["date_ob"];?></span>
                                                                <hr class="col-9 col-lg-11 col-sm-11 ms-4" style="border-width: 2px; border-color: #D7D7D7;">
                                                            </div>
                                                            <div class="col-12 col-lg-8 col-sm-8 ps-3">
                                                                <div class="row">
                                                                    <p class="feedB-cont-desc" style="font-size: calc(0.6rem + 0.63vh); font-weight: 400; font-family: 'Segoe';"><?php echo $tst_feedback_data["feedback"];?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php

                                                        }

                                                        ?>

                                                        <!-- <div class="col-12 mb-3 blog-cont-feedB" style="border-radius: 5px; box-shadow: 0 4px 8px -6px #222;">
                                                            <div class="row">
                                                                <span class="fs-5 ps-4 py-2 d-lg-grid d-sm-grid d-none feedB-date1" style="font-family: 'Segoe'; font-weight: 400;">2023-08-08</span>
                                                                <span class="ps-4 py-2 d-lg-none d-sm-none d-grid feedB-date1" style="font-family: 'Segoe'; font-weight: 400; font-size: calc(0.66rem + 0.73vh);">2023-08-08</span>
                                                                <hr class="col-9 col-lg-11 col-sm-11 ms-4" style="border-width: 2px; border-color: #D7D7D7;">
                                                            </div>
                                                            <div class="col-12 col-lg-8 col-sm-8 ps-3">
                                                                <div class="row">
                                                                    <p class="feedB-cont-desc" style="font-size: calc(0.6rem + 0.63vh); font-weight: 400; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur. Lectus imperdiet fames quam pretium lacus ac.
                                                                        Ultrices eleifend erat orci molestie laoreet habitant euismod pellentesque. Placerat a mi.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3 blog-cont-feedB" style="border-radius: 5px; box-shadow: 0 4px 8px -6px #222;">
                                                            <div class="row">
                                                                <span class="fs-5 ps-4 py-2 d-lg-grid d-sm-grid d-none feedB-date1" style="font-family: 'Segoe'; font-weight: 400;">2023-08-08</span>
                                                                <span class="ps-4 py-2 d-lg-none d-sm-none d-grid feedB-date1" style="font-family: 'Segoe'; font-weight: 400; font-size: calc(0.66rem + 0.73vh);">2023-08-08</span>
                                                                <hr class="col-9 col-lg-11 col-sm-11 ms-4" style="border-width: 2px; border-color: #D7D7D7;">

                                                            </div>
                                                            <div class="col-12 col-lg-8 col-sm-8 ps-3">
                                                                <div class="row">
                                                                    <p class="feedB-cont-desc" style="font-size: calc(0.6rem + 0.63vh); font-weight: 400; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur. Lectus imperdiet fames quam pretium lacus ac.
                                                                        Ultrices eleifend erat orci molestie laoreet habitant euismod pellentesque. Placerat a mi.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <div class="col-12 mb-2 pt-3">
                                                        <div class="row justify-content-center">
                                                            <div class="col-8 col-lg-2 col-sm-3 position-absolute d-lg-grid d-sm-grid d-none">
                                                                <button class="col-12 viewMore-Btn py-2" style="border-radius: 40px; font-family: 'Segoe';">view more</button>
                                                            </div>
                                                            <div class="col-6 col-lg-2 col-sm-3 position-absolute d-grid d-lg-none d-sm-none">
                                                                <button class="col-12 viewMore-Btn py-2" style="border-radius: 40px; font-family: 'Segoe'; font-size: calc(0.57rem + 0.59vh);">view more</button>
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
            </div>

            <?php include "./components/footer.php"; ?>

        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="../js/itinerary.js"></script>
    <!-- <script src="js/home.js"></script> -->
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/newHeader.js"></script>

</body>

</html>