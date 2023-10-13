<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Itinerary Page</title>

    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./css/itinerary.css" />
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/newHeader.css">
    <link rel="stylesheet" href="./css/footer.css">

</head>

<body onload="homeOnloadFunction();">


    <div class="container-fluid">
        <div class="row">

            <?php
            include "./components/newHeader.php";
            ?>


            <div class="col-12">
                <div class="row">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="fs-5 fw-bold" style="font-family: 'Quicksand'; color: #333;" id="exampleModalLabel">Make it Yours</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row pt-1">
                                                            <span class="fw-bold ps-3" style="font-family: 'Quicksand'; font-size: calc(0.6rem + 0.6vh);">Tour Plan</span>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control" placeholder="Day 11 Tour Plan" readonly style="font-family: 'Quicksand'; cursor: default; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;" />
                                                            </div>
                                                            <div class="col-12 mt-4 pt-2">
                                                                <input type="text" class="form-control" placeholder="Members" style="font-family: 'Quicksand'; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;" />
                                                            </div>
                                                            <div class="col-12 mt-4 pt-2">
                                                                <select class="form-select" aria-label="Tour Level" style="font-family: 'Quicksand'; cursor: pointer; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;">
                                                                    <option value="1">Tour Level</option>
                                                                    <option value="2">Small</option>
                                                                    <option value="3">Medium</option>
                                                                    <option value="4">Comfortable</option>
                                                                    <option value="5">Luxury</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 mt-4 pt-2">
                                                                <select class="form-select" aria-label="How do we contact you?" style="font-family: 'Quicksand'; cursor: pointer; font-size: calc(0.61rem + 0.65vh); border-radius: 8px; border: 1px solid #44B0FF;">
                                                                    <option value="1">How do we contact you?</option>
                                                                    <option value="2">option1</option>
                                                                    <option value="3">option2</option>
                                                                    <option value="4">option3</option>
                                                                    <option value="5">option4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-7">
                                                        <div class="row">
                                                            <div class="col-12 mt-4">
                                                                <textarea class="form-control" placeholder="Your Message.." id="#" cols="30" rows="11" style="font-family: 'Quicksand'; font-size: calc(0.57rem + 0.55vh); border-radius: 8px; border: 1px solid #44B0FF; background: #EBEBEB;"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-4">
                                                            <div class="row justify-content-center justify-content-lg-end">
                                                                <div class="col-9 col-lg-5 col-sm-4">
                                                                    <button type="button" class="btn text-white col-12 p-2 justify-content-center" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="request" style="font-size: calc(0.54rem + 0.56vh); background-color: #1546F4; display: flex; align-items: center;">Send Request&nbsp;&nbsp;<iconify-icon icon="mdi:email-send-outline" class="fs-5"></iconify-icon></button>
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

                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-5">
                                                <img src="./assets/img/itinerary_IMG/complete.png" style="width: 100%; height: 100%;" alt="">
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
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="row">

                            <div class="itinerary-image-slider p-0">
                                <div class="itinerary-slides">
                                    <div class="itinerary-slide active" id="itinerary-slide1">
                                        <img src="./assets/img/itinerary_IMG/colombo.png" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 01</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button type="button" class="btn my-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Tour" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>
                                        </div>

                                    </div>
                                    <div class="itinerary-slide" id="itinerary-slide2">
                                        <img src="./assets/img/itinerary_IMG/temple of tooth.jpg" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 02</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button class="col-12 btn my-2 py-2" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>

                                        </div>
                                    </div>
                                    <div class="itinerary-slide" id="itinerary-slide3">
                                        <img src="./assets/img/itinerary_IMG/seegiriya.png" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 03</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button type="button" class="btn my-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Tour" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>

                                        </div>
                                    </div>
                                    <div class="itinerary-slide" id="itinerary-slide4">
                                        <img src="./assets/img/itinerary_IMG/mountlavinia.jpg" alt="Home Slider Image" />
                                        <div class="itinerary-slide-content">
                                            <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;">Day 04</h1>
                                            <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;">Tour Place</span>

                                            <button type="button" class="btn my-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Tour" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>

                                        </div>
                                    </div>

                                    <div class="itinerary-slide" id="itinerary-slide5">
                                        <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Home Slider Image" />
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
                            <div class="col-12" style="background-color: #2c2c2c;">
                                <div class="row justify-content-center">

                                    <div class="col-11 mt-5 py-4 d-lg-grid d-none d-sm-none" style="background-color: #3E3E3E; border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold" style="color: #446ffd; font-family: 'Segoe';">Day 01</span>
                                                            <p class="fs-6 pt-lg-3 pt-2" style="font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-3">
                                                                <div class="row" style="line-height: 0.28in;">
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6" style="font-weight: 600; font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6" style="font-weight: 600; font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6" style="font-weight: 600; font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6" style="font-weight: 600; font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur.</span></span>
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
                                                                        <img src="./assets/img/itinerary_IMG/colombo_2.jpg" style="width: 100%; height: 30vh; border-radius: 6px;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2" style="font-family: 'Segoe'; color: #FFFFFF;">Colombo</span>
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

                                    <div class="col-11 mt-5 py-4 d-lg-none d-grid" style="background-color: #3E3E3E; border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-lg-8 mt-4">
                                                                        <a href="#" class="text-decoration-none text-white"><i class="bi bi-arrow-right-circle fs-4 fw-bold text-white position-absolute px-2"></i></a>
                                                                        <img src="./assets/img/itinerary_IMG/colombo_2.jpg" style="width: 100%; height: 30vh; border-radius: 6px; object-fit: cover;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2" style="font-family: 'Segoe'; color: #FFFFFF;">Colombo</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold" style="color: #446ffd; font-family: 'Segoe';">Day 01</span>
                                                            <p class="pt-lg-3 pt-2" style="font-family: 'Segoe'; color: #FFFFFF; font-size: calc(0.6rem + 0.6vh);">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-3">
                                                                <div class="row" style="line-height: 0.24in;">
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Small Devices -->


                                    <div class="col-11 mt-4 py-4 d-lg-grid d-none d-sm-none" style="background-color: #3E3E3E; border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-lg-8 mt-4">
                                                                        <a href="#" class="text-decoration-none text-white"><i class="bi bi-arrow-right-circle fs-4 fw-bold text-white position-absolute px-2"></i></a>
                                                                        <img src="./assets/img/itinerary_IMG/seegiriya.png" style="width: 100%; height: 30vh; border-radius: 6px; object-fit: cover;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2" style="font-family: 'Segoe'; color: #FFFFFF;">Seegiriya</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold" style="color: #446ffd; font-family: 'Segoe';">Day 02</span>
                                                            <p class="fs-6 pt-lg-3 pt-2" style="font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-2">
                                                                <div class="row" style="line-height: 0.28in;">
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6 text-white" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6 text-white" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6 text-white" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span class="fs-6"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="fs-6 text-white" style="font-weight: 600; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Small Device -->

                                    <div class="col-11 d-lg-none d-grid d-sm-none" style="background-color: #3E3E3E; border-radius: 6px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-center gap-3">
                                                    <div class="col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-lg-8 mt-4">
                                                                        <a href="#" class="text-decoration-none text-white"><i class="bi bi-arrow-right-circle fs-4 fw-bold text-white position-absolute px-2"></i></a>
                                                                        <img src="./assets/img/itinerary_IMG/seegiriya.png" style="width: 100%; height: 30vh; border-radius: 6px;" alt="">
                                                                    </div>
                                                                    <div class="row">
                                                                        <span class="fs-5 text-center pt-2" style="font-family: 'Segoe'; color: #FFFFFF;">Seegiriya</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row">
                                                            <span class="fs-4 text-center fw-bold" style="color: #446ffd; font-family: 'Segoe';">Day 02</span>
                                                            <p class="pt-lg-3 pt-2" style="font-family: 'Segoe'; color: #FFFFFF; font-size: calc(0.6rem + 0.6vh);">Lorem ipsum dolor sit amet consectetur. Vel volutpat at fermentum augue. Mattis accumsan urna lacus tellus.
                                                                Sed nulla at pretium vestibulum eleifend pharetra magna maecenas vel. Viverra pellentesque risus consectetur habitasse
                                                                congue senectus. Enim posuere viverra consequat quis urna leo iaculis ut. Velit id consectetur ut et. Egestas in nibh et
                                                                fermentum in integer augue ullamcorper massa. Lectus vitae venenatis ullamcorper pellentesque commodo.
                                                            </p>
                                                            <div class="col-12 mt-1 pt-2 pb-3">
                                                                <div class="row" style="line-height: 0.24in;">
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
                                                                    <span style="font-size: calc(0.64rem + 0.64vh);"><i class="bi bi-geo-alt-fill text-white me-2"></i><span class="text-white" style="font-weight: 600; font-family: 'Segoe'; font-size: calc(0.64rem + 0.64vh);">Lorem ipsum dolor sit amet consectetur.</span></span>
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
                                                <img src="./assets/img/itinerary_IMG/basemap.png" style="width: 100%; height: auto;" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="row justify-content-center">
                                            <div class="col-11 mb-4 pb-3 pt-1" style="background-color: #3E3E3E; border-radius: 6px; box-shadow: 0 3px 10px -6px #222;">
                                                <div class="row">
                                                    <span class="fs-3 fw-bold pb-3 d-lg-grid d-sm-grid d-none" style="font-family: 'Segoe'; color: #FFFFFF;">Tourist Feedback</span>
                                                    <span class="fs-5 fw-bold pb-1 d-lg-none d-sm-none d-grid" style="font-family: 'Segoe'; color: #FFFFFF;">Tourist Feedback</span>
                                                    <div class="col-12">
                                                        <div class="col-12 mb-3" style="background-color: #242424; border-radius: 5px; box-shadow: 0 4px 8px -6px #222;">
                                                            <div class="row">
                                                                <span class="fs-5 ps-4 py-2 d-lg-grid d-sm-grid d-none" style="font-family: 'Segoe'; font-weight: 400; color: rgba(255, 255, 255, 0.50);">2023-08-08</span>
                                                                <span class="ps-4 py-2 d-lg-none d-sm-none d-grid" style="font-family: 'Segoe'; font-weight: 400; color: rgba(255, 255, 255, 0.50); font-size: calc(0.66rem + 0.73vh);">2023-08-08</span>
                                                                <hr class="col-9 col-lg-11 col-sm-11 ms-4" style="border-width: 2px; background-color: #D7D7D7;">
                                                            </div>
                                                            <div class="col-12 col-lg-8 col-sm-8 ps-3">
                                                                <div class="row">
                                                                    <p style="font-size: calc(0.6rem + 0.63vh); font-weight: 400; font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur. Lectus imperdiet fames quam pretium lacus ac.
                                                                        Ultrices eleifend erat orci molestie laoreet habitant euismod pellentesque. Placerat a mi.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3" style="background-color: #242424; border-radius: 5px; box-shadow: 0 4px 8px -6px #222;">
                                                            <div class="row">
                                                                <span class="fs-5 ps-4 py-2 d-lg-grid d-sm-grid d-none" style="font-family: 'Segoe'; font-weight: 400; color: rgba(255, 255, 255, 0.50);">2023-08-08</span>
                                                                <span class="ps-4 py-2 d-lg-none d-sm-none d-grid" style="font-family: 'Segoe'; font-weight: 400; color: rgba(255, 255, 255, 0.50); font-size: calc(0.66rem + 0.73vh);">2023-08-08</span>
                                                                <hr class="col-9 col-lg-11 col-sm-11 ms-4" style="border-width: 2px; background-color: #D7D7D7;;">
                                                            </div>
                                                            <div class="col-12 col-lg-8 col-sm-8 ps-3">
                                                                <div class="row">
                                                                    <p style="font-size: calc(0.6rem + 0.63vh); font-weight: 400; font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur. Lectus imperdiet fames quam pretium lacus ac.
                                                                        Ultrices eleifend erat orci molestie laoreet habitant euismod pellentesque. Placerat a mi.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3" style="background-color: #242424; border-radius: 5px; box-shadow: 0 4px 8px -6px #222;">
                                                            <div class="row">
                                                                <span class="fs-5 ps-4 py-2 d-lg-grid d-sm-grid d-none" style="font-family: 'Segoe'; color: rgba(255, 255, 255, 0.50); font-weight: 400;">2023-08-08</span>
                                                                <span class="ps-4 py-2 d-lg-none d-sm-none d-grid" style="font-family: 'Segoe'; font-weight: 400; color: rgba(255, 255, 255, 0.50); font-size: calc(0.66rem + 0.73vh);">2023-08-08</span>
                                                                <hr class="col-9 col-lg-11 col-sm-11 ms-4" style="border-width: 2px; background-color: #D7D7D7;">

                                                            </div>
                                                            <div class="col-12 col-lg-8 col-sm-8 ps-3">
                                                                <div class="row">
                                                                    <p style="font-size: calc(0.6rem + 0.63vh); font-weight: 400; font-family: 'Segoe'; color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur. Lectus imperdiet fames quam pretium lacus ac.
                                                                        Ultrices eleifend erat orci molestie laoreet habitant euismod pellentesque. Placerat a mi.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2 pt-3">
                                                        <div class="row justify-content-center">
                                                            <div class="col-8 col-lg-2 col-sm-3 position-absolute d-lg-grid d-sm-grid d-none">
                                                                <button class="btn text-white col-12" style="background-color: #2c2c2c; border-radius: 40px; border: 6px solid #242424; font-family: 'Segoe';">view more</button>
                                                            </div>
                                                            <div class="col-6 col-lg-2 col-sm-3 position-absolute d-grid d-lg-none d-sm-none">
                                                                <button class="btn text-white col-12" style="background-color: #2c2c2c; border-radius: 40px; border: 6px solid #242424; font-family: 'Segoe'; font-size: calc(0.57rem + 0.59vh);">view more</button>
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
    <script src="js/itinerary.js"></script>
    <script src="js/home.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/newHeader.js"></script>
</body>

</html>