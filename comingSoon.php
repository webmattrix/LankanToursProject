<?php
$location = "primary";
session_start();
if (isset($_SESSION["lt_tourist"])) {
    $data = $_SESSION["lt_tourist"]; ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coming Soon</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/font.css">
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <?php
        if (isset($_COOKIE["lt_theme"])) {
            if ($_COOKIE["lt_theme"] === 'light') {
                ?>
                <link rel="stylesheet" href="./css/comingSoon.css">
                <?php
            } else {
                ?>
                <link rel="stylesheet" href="./css/comingSoonDark.css">
                <?php
            }
        } else {
            ?>
            <link rel="stylesheet" href="./css/comingSoon.css">
            <?php
        }
        ?>


    </head>

    <body class="bgclr">
        <?php
        include "./components/newHeader.php";
        ?>

        <div class="container-fluid quicksand-SemiBold">
            <div class="col-12  mt-lg-2 mt-5 p-lg-4 p-5">
                <div class="box1  ">
                    <img src="./assets/img/comingSoon_IMG/coming-soon.png" class="img-fluid">
                </div>
                <div class="box1 mt-4 txtclr">
                    <p class=" text-center "> Stay Connected !!</p>
                </div>
                <div class="box1">
                    <button class="btn btn-danger">Travel to Home Page &nbsp; <i class="bi bi-arrow-bar-right"></i></button>
                </div>
            </div>
        </div>


        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        <script src="./js/newHeader.js"></script>
        <script src="./js/bootstrap.bundle.js"></script>
        <script src="./js/bootstrap.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ./Login");
} ?>