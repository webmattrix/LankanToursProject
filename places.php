<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Places</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="css/places.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

    <?php include "./components/newHeader.php";?>

            <div class="col-12">
                <div class="row">
                    <div class="col-12 m-0 p-0">
                        <div class="row">
                            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="col-12">
                                            <img src="./assets/img/itinerary_IMG/seegiriya.png" style="width: 100%; height: 80vh;" alt="...">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/img/itinerary_IMG/temple of tooth.jpg" style="width: 100%; height: 80vh;" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/img/itinerary_IMG/matara.jpg" style="width: 100%; height: 80vh;" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <p class="with-line mt-4">Most Famous Cities<span class="line"></span></p>

                                    <div class="col-12 my-3 my-lg-3 pt-lg-1 pb-lg-4">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-lg-10">
                                                <div class="row" style="padding-left: 8%;">
                                                    <div class="col-12 col-lg-3">
                                                        <div class="card1">
                                                            <div class="card1-inner">
                                                                <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                                                <div class="card1-content">
                                                                    <p>Matara</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="card1">
                                                            <div class="card1-inner">
                                                                <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                                                <div class="card1-content">
                                                                    <p>Matara</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="card1">
                                                            <div class="card1-inner">
                                                                <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                                                <div class="card1-content">
                                                                    <p>Matara</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="card1">
                                                            <div class="card1-inner">
                                                                <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                                                <div class="card1-content">
                                                                    <p>Matara</p>
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

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row city_container p-3" style="background-color:#dedede">
                                            <div class="col-12" style="background-color:#ffffff">
                                                <div class="row">
                                                    <div class="col-12 my-lg-5 py-lg-3">
                                                        <div class="col-10 col-md-8 col-lg-6 offset-lg-3 offset-md-2 offset-1 city_image">
                                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="">
                                                            <div class="image-text">Matara</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="card-slider">
                                                            <div class="btn-container mt-3">
                                                                <span>Things To Do In Matara</span>
                                                                <div class="button-group">
                                                                    <button class="btn btn-sm" id="prev-btn"><iconify-icon icon="grommet-icons:previous"></iconify-icon></iconify-icon></button>
                                                                    <button class="btn btn-sm" id="next-btn"><iconify-icon icon="grommet-icons:next"></iconify-icon></button>
                                                                </div>
                                                            </div>
                                                            <div class="cards mt-2">
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                                                    <div class="card-overlay">
                                                                        <span>Whale Watching</span>
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

                </div>
            </div>

            <?php include "./components/footer.php";?>

        </div>
    </div>


    <!-- <div class="row">

        <?php include "./components/newHeader.php"; ?>

        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./assets/img/itinerary_IMG/seegiriya.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/itinerary_IMG/temple of tooth.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/img/itinerary_IMG/matara.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-12 px-4">
                    <p class="with-line mt-4">Most Famous Cities<span class="line"></span></p>
                </div>

                <div class="col-12">
                    <div class="row justify-content-center text-center">
                        <div class="col-12">
                            <div class="row align-items-center p-4">
                                <div class="col-6 col-md-4 col-lg-3 d-flex justify-content-center align-items-center py-3">
                                    <div class="card1">
                                        <div class="card1-inner">
                                            <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                            <div class="card1-content">
                                                <p>Matara</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-flex justify-content-center align-items-center py-3">
                                    <div class="card1">
                                        <div class="card1-inner">
                                            <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                            <div class="card1-content">
                                                <p>Matara</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-flex justify-content-center align-items-center py-3">
                                    <div class="card1">
                                        <div class="card1-inner">
                                            <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                            <div class="card1-content">
                                                <p>Matara</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 d-flex justify-content-center align-items-center py-3">
                                    <div class="card1">
                                        <div class="card1-inner">
                                            <img class="card1-img" src="./assets/img/itinerary_IMG/matara.jpg" alt="Image">
                                            <div class="card1-content">
                                                <p>Matara</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row city_container p-3" style="background-color:#dedede">
                        <div class="col-12" style="background-color:#ffffff">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <div class="col-10 col-md-8 col-lg-6 offset-lg-3 offset-md-2 offset-1 city_image">
                                        <img src="./assets/img/itinerary_IMG/matara.jpg" alt="">
                                        <div class="image-text">Matara</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card-slider">
                                    <div class="btn-container mt-3">
                                        <span>Things To Do In Matara</span>
                                        <div class="button-group">
                                            <button class="btn btn-sm" id="prev-btn"><iconify-icon icon="grommet-icons:previous"></iconify-icon></iconify-icon></button>
                                            <button class="btn btn-sm" id="next-btn"><iconify-icon icon="grommet-icons:next"></iconify-icon></button>
                                        </div>
                                    </div>
                                    <div class="cards mt-2">
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="./assets/img/itinerary_IMG/matara.jpg" alt="Card 1">
                                            <div class="card-overlay">
                                                <span>Whale Watching</span>
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
    </div> -->



    <script src="js/places.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>

</html>