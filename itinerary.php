<?php

$tid = $_GET["tour_id"];
session_start();
require "./assets/model/sqlConnection.php";

$tour_views_table = Database::search("SELECT * FROM `tour` WHERE `tour`.`id`='" . $tid . "'");
$tour_views_table_data = $tour_views_table->fetch_assoc();
$tour_view_count = $tour_views_table_data["views"];
// Database::iud("UPDATE `tour` SET `views`='" . ($tour_view_count + 1) . "' WHERE `tour`.`id`='" . $tid . "'");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Itinerary</title>

    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/scrolbar.css" />
    <link rel="stylesheet" href="../css/newHeader.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/font.css" />
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <?php
    if (isset($_COOKIE["lt_theme"])) {
        if ($_COOKIE["lt_theme"] === 'light') {
    ?>
            <link rel="stylesheet" href="../css/itinerary.css" />
        <?php
        } else {
        ?>
            <link rel="stylesheet" href="../css/itineraryDark.css" />
        <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="../css/itinerary.css" />
    <?php
    }
    ?>



</head>

<body onload="homeOnloadFunction();">

    <?php

    $location = "secondary";

    include "./components/newHeader.php";
    ?>

    <div class="container-fluid">
        <div class="row">


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
                                                        <button class="btn col-12 text-white justify-content-center" style="background-color: #1546F4; display: flex; align-items: center;" onclick="viewMyTours();">Watch your tour&nbsp;&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>
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

                    <?php

                    $tour_table = Database::search("SELECT *,`city`.`name` AS `city`,`place`.`name` AS `place`,`place`.`id` AS `place_id`,`tour`.`name` AS `tour` FROM `tour` 
                                                INNER JOIN `tour_has_place` ON `tour_has_place`.`tour_id`=`tour`.`id` 
                                                INNER JOIN `place` ON `tour_has_place`.`place_id`=`place`.`id`
                                                INNER JOIN `city` ON `city`.`id`=`place`.`city_id`
                                                WHERE `tour`.`id`='" . $tid . "' ORDER BY RAND()");
                    $tour_table_rows = $tour_table->num_rows;

                    if ($tour_table_rows == 0) {
                        echo ("No tour places..");
                    } else {

                    ?>

                        <div class="col-12">
                            <div class="row">

                                <div class="itinerary-image-slider p-0">
                                    <div class="position-absolute segoeui-bold sub-heading text-white text-center w-100 fs-3 fst-italic" style="z-index: 2;">- <?php echo ($tour_views_table_data["name"]); ?> -</div>
                                    <div class="itinerary-slides">

                                        <?php

                                        for ($x = 0; $x < 5; $x++) {

                                            $tour_table_data = $tour_table->fetch_assoc();

                                            $place_image_table = Database::search("SELECT * FROM `place`
                                            INNER JOIN `place_image` ON `place_image`.`place_id`=`place`.`id`
                                            WHERE `place`.`id`='" . $tour_table_data['place_id'] . "' LIMIT 1");

                                            $place_image_table_data = $place_image_table->fetch_assoc();

                                        ?>

                                            <div class="itinerary-slide <?php
                                                                        if ($x == 0) {
                                                                            echo ('active');
                                                                        }
                                                                        ?>" id="itinerary-slide<?php echo ($x + 1); ?>">
                                                <img src="../assets/img/places/<?php echo ($place_image_table_data["path"]); ?>" alt="Home Slider Image" />
                                                <div class="itinerary-slide-content">
                                                    <h1 style="font-family: 'Segoe'; font-weight: 900; padding-bottom: 3%;"><?php echo ($tour_table_data["city"]); ?></h1>
                                                    <span class="fs-4 text-white" style="font-family: 'Segoe'; font-weight: 400;"><?php echo ($tour_table_data["place"]) ?></span>

                                                    <button type="button" onclick="tourRequest(<?php echo $tid; ?>);" class="btn my-2 py-2" style="background-color: #1546F4; color: #FFFFFF; display: flex; align-items: center;">Start Your Tour&nbsp;<iconify-icon icon="mdi:flight" style="color: #FFFFFF;"><iconify-icon icon="mdi:flight" style="color: #FFFFFF;"></iconify-icon></button>
                                                </div>
                                            </div>

                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                    }

                    ?>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 after-slider-cont-bg">
                                <div class="row justify-content-center">

                                    <?php

                                    $city_table = Database::search("SELECT DISTINCT(`city`.`name`),`city`.`id` FROM `tour`
                                                                INNER JOIN `tour_has_place` ON `tour_has_place`.`tour_id`=`tour`.`id`
                                                                INNER JOIN `place` ON `place`.`id`=`tour_has_place`.`place_id`
                                                                INNER JOIN `city` ON `city`.`id`=`place`.`city_id`
                                                                WHERE `tour`.`id`='" . $tid . "'");

                                    $city_table_rows = $city_table->num_rows;

                                    for ($city_iteration = 0; $city_iteration < $city_table_rows; $city_iteration++) {

                                        $city_table_data = $city_table->fetch_assoc();

                                        $city_details_table = Database::search("SELECT * FROM `city` WHERE `city`.`id`='" . $city_table_data["id"] . "'");
                                        $city_details_table_data = $city_details_table->fetch_assoc();

                                        $place_table = Database::search("SELECT *,`place`.`name` AS `place` FROM `tour`
                                                                    INNER JOIN `tour_has_place` ON `tour_has_place`.`tour_id`=`tour`.`id`
                                                                    INNER JOIN `place` ON `place`.`id`=`tour_has_place`.`place_id`
                                                                    INNER JOIN `city` ON `city`.`id`=`place`.`city_id`
                                                                    WHERE `tour`.`id`='" . $tid . "' AND `city`.`id`='" . $city_table_data["id"] . "'");

                                        $place_table_rows = $place_table->num_rows;

                                    ?>

                                        <div class="col-11 mt-5 py-4 d-lg-grid bg-blog-cont1" style="border-radius: 6px;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex flex-column flex-column-reverse flex-lg-row <?php
                                                                                                                    if (($city_iteration % 2) == 1) {
                                                                                                                        echo ("flex-lg-row-reverse");
                                                                                                                    }
                                                                                                                    ?>">
                                                        <!-- <div class="d-flex flex-column flex-column-reverse justify-content-center gap-3 flex-md-row"> -->
                                                        <div class="col-12 col-lg-6 p-4">
                                                            <div class="row">
                                                                <span class="fs-4 text-center fw-bold blog-place-textC" style="font-family: 'Segoe';"><?php echo ($city_table_data["name"]); ?></span>
                                                                <p class="fs-6 pt-lg-3 pt-2 blog-place-desc" style="font-family: 'Segoe';"><?php echo ($city_details_table_data["description"]); ?></p>
                                                                <div class="col-12 mt-1 pt-2 pb-3">
                                                                    <div class="row" style="line-height: 0.28in;">
                                                                        <?php
                                                                        for ($place_iteration = 0; $place_iteration < $place_table_rows; $place_iteration++) {
                                                                            $place_table_data = $place_table->fetch_assoc();
                                                                        ?>
                                                                            <span class="fs-6">
                                                                                <i class="bi bi-geo-alt-fill icon-style2 me-2"></i>
                                                                                <span class="fs-6 places-marked" style="font-family: 'Segoe';"><?php echo ($place_table_data["place"]); ?></span>
                                                                            </span>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 p-4">
                                                            <div class="row">
                                                                <div class="col-12 d-flex justify-content-center align-items-center">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12 col-lg-8 mt-4 d-flex flex-column justify-content-center align-items-center">
                                                                            <?php
                                                                            $city_image_table = Database::search("SELECT * FROM `city_image` WHERE `city_id`='" . $city_table_data["id"] . "' LIMIT 1");
                                                                            $city_image_table_data = $city_image_table->fetch_assoc();
                                                                            ?>
                                                                            <!-- <a href="#" class="text-decoration-none text-white">
                                                                                <i class="bi bi-arrow-right-circle fs-4 fw-bold text-white px-2"></i>
                                                                            </a> -->
                                                                            <img src="../assets/img/City/<?php echo ($city_image_table_data["path"]); ?>" class="itinerary_image" alt="" style="width: 100%;">
                                                                        </div>
                                                                        <div class="row">
                                                                            <span class="fs-5 text-center pt-2 city-desc fst-italic content-heading" style="font-family: 'Segoe';">- <?php echo ($city_table_data["name"]); ?> -</span>
                                                                        </div>
                                                                    </div>
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



                                    <div class="col-12 mb-lg-0 mb-sm-0 mb-3 d-flex justify-content-center" style="padding-top: 5%; padding-bottom: 5%;">
                                        <div id="map" style="width: 85vw; min-height: 450px; height: 70vh;"></div>
                                    </div>

                                    <!-- <div class="col-12 mb-4">
                                        <div class="row justify-content-center">
                                            <div class="col-11 mb-4 pb-3 pt-1 bg-blog-cont1" style="border-radius: 6px; box-shadow: 0 3px 10px -6px #222;">
                                                <div class="row">
                                                    <span class="fs-3 fw-bold pb-3 d-lg-grid d-sm-grid d-none ts-feedback" style="font-family: 'Segoe';">Tourist Feedback</span>
                                                    <span class="fs-5 fw-bold pb-1 d-lg-none d-sm-none d-grid ts-feedback" style="font-family: 'Segoe';">Tourist Feedback</span>
                                                    <div class="col-12">

                                                        <div class="col-12 mb-3 blog-cont-feedB" style="border-radius: 5px; box-shadow: 0 4px 8px -6px #222;">
                                                            <div class="row">
                                                                <span class="fs-5 ps-4 py-2 d-lg-grid d-sm-grid d-none feedB-date1" style="font-family: 'Segoe'; font-weight: 400;">date_time</span>
                                                                <span class="ps-4 py-2 d-lg-none d-sm-none d-grid feedB-date1" style="font-family: 'Segoe'; font-weight: 400; font-size: calc(0.66rem + 0.73vh);">date_time</span>
                                                                <hr class="col-9 col-lg-11 col-sm-11 ms-4" style="border-width: 2px; border-color: #D7D7D7;">
                                                            </div>
                                                            <div class="col-12 col-lg-8 col-sm-8 ps-3">
                                                                <div class="row">
                                                                    <p class="feedB-cont-desc" style="font-size: calc(0.6rem + 0.63vh); font-weight: 400; font-family: 'Segoe';">Message</p>
                                                                </div>
                                                            </div>
                                                        </div>

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
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php include "./components/footer.php"; ?>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="../js/itinerary.js"></script>
    <!-- <script src="js/home.js"></script> -->
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/footer.js"></script>
    <script src="../js/newHeader.js"></script>

    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })({
            key: "AIzaSyAoXfg49XVMibkAH5WSiSnm7JO1TWUTgjg",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });


        let map;
        // initMap is now async
        async function initMap() {

            var markerPositions = [];

            var req = new XMLHttpRequest();

            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        try {
                            const response = JSON.parse(req.responseText);
                            if (response !== '1') {
                                markerPositions = response;
                                initializeMap();
                            } else {
                                alert("There was an error!!");
                            }
                        } catch (error) {
                            console.error(error);
                        }
                    } else {
                        console.error("Failed to fetch marker positions. Status: " + req.status);
                    }
                }
            };

            req.open("GET", "../assets/model/itineraryPlaceLocationsLoader.php?id=<?php echo ($tid); ?>", true);
            req.send();


            async function initializeMap() {
                // Request libraries when needed, not in the script tag.
                const {
                    Map
                } = await google.maps.importLibrary("maps");
                const {
                    AdvancedMarkerElement
                } = await google.maps.importLibrary("marker");
                // Short namespaces can be used.
                map = new Map(document.getElementById("map"), {
                    center: {
                        lat: 7.0000,
                        lng: 80.0000
                    },
                    zoom: 10,
                    mapId: "DEMO_MAP_ID",
                });

                markerPositions.forEach(position => {
                    const marker = new AdvancedMarkerElement({
                        map: map,
                        position: {
                            lat: parseFloat(position.lat),
                            lng: parseFloat(position.lng)
                        },
                        title: position.title,
                    });
                });
            }
        }

        initMap();
    </script>

</body>

</html>