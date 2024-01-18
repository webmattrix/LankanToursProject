<?php
session_start(); ?>
<?php
require "assets/model/sqlConnection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Places</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <?php
    if (isset($_COOKIE["lt_theme"])) {
        if ($_COOKIE["lt_theme"] === 'light') {
    ?>
            <link rel="stylesheet" href="css/places.css">
        <?php
        } else {
        ?>
            <link rel="stylesheet" href="css/placesDark.css">
        <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="css/places.css">
    <?php
    }
    ?>
    <link rel="stylesheet" href="./css/newHeader.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/scrolbar.css" />
</head>

<body class="container-fluid" style="margin:0; padding:0;" onload="homeOnloadFunction();">
    <div class="col-12 overflow-hidden">
        <div class="row">
            <?php
            $location = "primary";
            include "./components/newHeader.php";
            ?>

            <div class="col-12">
                <div class="home-image-slider p-0">
                    <div class="slides">
                        <div class="slide active" id="slide1">
                            <img src="./assets/img/home-slider/img (1).jpg" alt="Home Slider Image">
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


            <div class="col-12 py-4">
                <div class="row px-4">

                    <div class="col-12 place-container">
                        <div class="place-heading">
                            <span class="quicksand-SemiBold text-dark">Tour Places</span>
                        </div>
                    </div>

                </div>
            </div>


            <?php include "./components/footer.php"; ?>
        </div>
    </div>

    <script src="./js/places.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>