<?php

session_start();

$location = 'primary';


require "./assets/model/sqlConnection.php";
require "./assets/model/hideEmail.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/touristGallery.css">
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/scrolbar.css" />
</head>

<body>
    <div class="container-fluid" style="margin:0; padding:0;">
        <div class="col-12 overflow-hidden">
            <div class="row">
                <?php
                $location = "primary";
                include "./components/newHeader.php";
                ?>
                <div class="body_container">
                    <?php
                    $sql = "SELECT *
                    FROM `gallery` ORDER BY `date_time` DESC";
                    
                    $result = Database::search($sql);

                    if ($result->num_rows > 0) {
                        $images = $result->fetch_all(MYSQLI_ASSOC);


                        $imageGroups = [];
                        foreach ($images as $image) {
                            $uploadDate = new DateTime($image['date_time']);
                            $year = $uploadDate->format('Y');
                            $month = $uploadDate->format('F');

                            if (!isset($imageGroups[$year])) {
                                $imageGroups[$year] = [];
                            }

                            if (!isset($imageGroups[$year][$month])) {
                                $imageGroups[$year][$month] = [];
                            }

                            $imageGroups[$year][$month][] = $image;
                        }

                    ?>
                        <div class="col-12">
                            <div class="row">
                                <div class="offset-9 col-2">
                                    <select id="yearFilter" class="form-select" style="background-color: #c9c6da;">
                                        <option value="all">Show All Years</option>
                                        <?php
                                        $uniqueYears = array_keys($imageGroups);
                                        foreach ($uniqueYears as $year) {
                                            echo "<option value='$year'>$year</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="gallery_container">
                            <?php
                            foreach ($imageGroups as $year => $months) {
                            ?>
                                <div class='year_container' data-year='<?php echo $year ?>'>
                                    <div class="text-start p-1" style="margin-top: 20px;">
                                        <span class="fs-3" style="color: #ce43ff;">
                                            <?php echo $year ?>
                                        </span>
                                    </div>
                                    <?php
                                    foreach ($months as $month => $images) {
                                    ?>
                                        <div class="month text-center p-1">
                                            <span>
                                                <?php echo $month ?>
                                            </span>
                                            <img src="./assets/img/touristGallery/solar_gallery-bold.png" alt="">
                                        </div>
                                        <div class="month_container row">
                                            <?php
                                            foreach ($images as $image) {
                                            ?>

                                                <div class="image_container col-6 col-md-4 col-lg-3">
                                                    <img src="./assets/img/touristGallery/<?php echo $image['path'] ?>" alt="">
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div style="height: 50vh; display: flex; justify-content: center; align-items: center">
                            <span class="fs-3" style="color: #ce43ff;">No Images Found</span>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <?php include "./components/footer.php"; ?>

        </div>
    </div>

    </div>
    <script src="./js/adminTemplate.js"></script>
    <script src="./js/touristGallery.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>