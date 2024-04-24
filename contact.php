<?php
$location = "primary";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="./js/script.js"></script>
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

    <?php
    if (isset($_COOKIE["lt_theme"])) {
        if ($_COOKIE["lt_theme"] === 'light') {
    ?>
            <link rel="stylesheet" href="./css/Contact.css">
        <?php
        } else {
        ?>
            <link rel="stylesheet" href="./css/ContactDark.css">
        <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="./css/Contact.css">
    <?php
    }
    ?>
</head>

<body onload="homeOnloadFunction();" class="c-default ContactBackground" style="overflow-x: hidden;">
    <?php
    include "./components/newHeader.php";
    ?>

    <div class="container-fluid">

        <h4 class=" fw-bold mt-4 mx-4 title" style="font-family: 'QuickSand';">Customer Service Team</h4>
        <div class="col-12 cards ">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4 mb-4 " style="margin: auto;">
                <?php
                $contact_details = array(
                    array(
                        "email" => "contact@lankantravel.com",
                        "mobile" => "+79533445831",
                        "wa" => "+79533445831",
                    ),
                    array(
                        "email" => "daisurulm@gmail.com",
                        "mobile" => "+79533445831",
                        "wa" => "+79533445831",
                    ),
                    array(
                        "email" => "akilabiman2002@gmail.com",
                        "mobile" => "+94704421409",
                        "wa" => "+94704421409",
                    ),
                    array(
                        "email" => "vihangaheshan37@gmail.com",
                        "mobile" => "+94719892932",
                        "wa" => "+94719892932",
                    ),
                );
                for ($x = 0; $x < sizeof($contact_details); $x++) {

                ?>
                    <div class="col">
                        <div class="col-12  p-4 contactCard ">
                            <div class="row" style="z-index: 100;">
                                <div class="col-2 ">
                                    <img src="./assets/img/favicon.png" style=" width:59px; border-radius:50%; object-fit: cover;">
                                </div>
                                <div class="col-9 offset-1" style="font-family: 'SegoeUI';">
                                    <h5 class=" mt-2"><b>Customer Service</b></h5>
                                </div>
                            </div>
                            <div class="col-12" style="font-family: 'QuickSand';">
                                <h6 class="text-lg-start mt-3"> <i class="bi bi-envelope-fill"></i> &nbsp;
                                    &nbsp;<a href="mailto:<?php echo ($contact_details[$x]["email"]); ?>"><?php echo ($contact_details[$x]["email"]); ?></a></h6>
                                <h6 class="text-lg-start"><i class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;<a href="tel:<?php echo ($contact_details[$x]["mobile"]); ?>"><?php echo ($contact_details[$x]["mobile"]); ?></a></h6>
                                <h6 class="text-lg-start"><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;<a href="https://wa.me/<?php echo ($contact_details[$x]["wa"]); ?>"><?php echo ($contact_details[$x]["wa"]); ?></a></h6>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <h4 class=" fw-bold mx-4" style="font-family: 'QuickSand';">About Us</h4>
        <div class="col-12 px-4 pt-1 mb-3 sub-heading" style="font-family: 'QuickSand';">
            <b>Welcome to LankanTravel - Your Gateway to Sri Lanka's Enchantment!</b>
            <br>
            Embark on unforgettable journeys meticulously crafted to fulfill your dreams. From the sun-kissed shores of pristine beaches to the mist-shrouded peaks of majestic mountains, immerse yourself in the mesmerizing beauty of <b>Sri Lanka</b> with us. Our bespoke experiences and unwavering commitment to responsible tourism ensure that every moment transcends expectations while safeguarding our rich cultural heritage. Explore, discover, and partake in the captivating magic of Sri Lanka with <b><u><a href="https://lankantravel.com/Home">LankanTravel.</a></u></b>

        </div>
    </div>
    <?php
    include "./components/footer.php";
    ?>
    <script>
        document.addEventListener('keydown', function(e) {
            // Check if the pressed key is F12 or Ctrl+Shift+I or Ctrl+Shift+J or Ctrl+Shift+C
            if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J' || e.key === 'C'))) {
                e.preventDefault(); // Prevent the default behavior
            }
        });

        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    </script>
    <script src="./js/newHeader.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <script src="./js/footer.js"></script>
</body>

</html>