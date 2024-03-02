<?php
$location = "primary";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 ERROR</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <?php
    if (isset($_COOKIE["lt_theme"])) {
        if ($_COOKIE["lt_theme"] === 'light') {
    ?>
            <link rel="stylesheet" href="./css/404.css">
        <?php
        } else {
        ?>
            <link rel="stylesheet" href="./css/404Dark.css">
        <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="./css/404.css">
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
                <img src="./assets/img/404_IMG/404-error.png" class="img-fluid">
            </div>
            <div class="box1 mt-4 txtclr">
                <p class=" text-center "> OOPS!, the page you are looking for does not exist or you don’t have access to the page.</p>
            </div>
            <div class="box1">
                <a href="./Home">
                    <button class="btn btn-danger">Travel to Home Page &nbsp; <i class="bi bi-arrow-bar-right"></i></button>
                </a>
            </div>
        </div>
    </div>


    <!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> -->
    <script src="./js/newHeader.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>

</html>