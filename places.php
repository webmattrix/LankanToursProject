<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Places</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- apply if it is dark theme -->
    <!-- <link rel="stylesheet" href="css/placesDark.css"> -->
    <link rel="stylesheet" href="css/places.css">
    <link rel="stylesheet" href="./css/newHeader.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/scrolbar.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row background">
            <?php include "./components/newHeader.php"; ?>

            <div class="col-12">
                <div class="row">
                    <div id="carouselExampleIndicators" class="col-12 carousel slide custom-carousel p-0" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner p-0">
                            <div class="carousel-item active">
                                <div style="position: relative;">
                                    <img class="d-block w-100" src="./assets/img/itinerary_IMG/matara.jpg" alt="Second slide">
                                    <div class="text-overlay">
                                        <h3 class="text-right">Second Slide Title</h3>
                                        <p class="text-right">Some description for the second slide.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div style="position: relative;">
                                    <img class="d-block w-100" src="./assets/img/itinerary_IMG/mountlavinia.jpg" alt="Second slide">
                                    <div class="text-overlay">
                                        <h3 class="text-right">Second Slide Title</h3>
                                        <p class="text-right">Some description for the second slide.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div style="position: relative;">
                                    <img class="d-block w-100" src="./assets/img/itinerary_IMG/matara.jpg" alt="Second slide">
                                    <div class="text-overlay">
                                        <h3 class="text-right">Second Slide Title</h3>
                                        <p class="text-right">Some description for the second slide.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="row city_container p-3">
                        <div class="col-12 section">
                            <div class="row">

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

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row city_container p-3">
                        <div class="col-12 section">
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
                                    <div class="cards mt-2 mb-4">
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

    </div>

    <script src="js/places.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>