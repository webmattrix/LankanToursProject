<?php
require "assets/model/sqlConnection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/newTourPlan.css">
</head>

<body class="body_container">

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">

                <?php
                include "./components/adminSidebar.php";
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>
                    <!-- Page Content -->
                    <div class="p-4">
                        <div class="col-12 py-2 px-3 title_container">
                            <span>Add New Tour Plan</span>
                        </div>
                        <div class="col-12 py-3 px-5 content_container">
                            <div class="row">
                                <div class="col-12 col-lg-6 mt-3">
                                    <span>Name of Tour Plan</span>
                                    <input type="text" id="tour_name" class="form-control mt-1 input_field">
                                </div>
                                <div class="col-12 col-lg-6 mt-3">
                                    <span>Duration</span>
                                    <input type="text" id="duration" class="form-control mt-1 input_field">
                                </div>
                                <div class="col-12 mt-3">
                                    <span>Place to visit</span>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <select name="" id="place" class="form-select input_field mt-1">
                                                <?php
                                                $resultset = Database::search("SELECT * FROM `place`");
                                                $places = $resultset->fetch_all(MYSQLI_ASSOC);

                                                foreach ($places as $place) {
                                                    $r = Database::search("SELECT * FROM `city` WHERE `id`='" . $place['city_id'] . "'");
                                                    $city = $r->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $place['id'] ?>">
                                                        <?php
                                                        echo $place['name'] . " - " . $city['name'];
                                                        ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6 col-lg-2 text-center text-lg-end mt-2 mt-lg-0">
                                            <button class="btn add_btn mt-1" onclick="addPlace()">Add</button>
                                        </div>
                                        <div class="col-6 col-lg-3 text-center text-lg-end mt-2 mt-lg-0">
                                            <button class="btn btn-success mt-1" onclick="addNewPlace()">Add New Place</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal -->
                                <div class="modal" tabindex="-1" id="addNewPlaceModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: white;">
                                                <span class="fw-bold">Add New Place</span>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <div class="col-12 text-start">
                                                        <label class="form-label">Select City</label>
                                                        <div class="input-group mb-3">
                                                            <select name="" id="city" class="form-select input_field mt-1">
                                                                <?php
                                                                $results = Database::search("SELECT * FROM `city`");
                                                                $cities = $results->fetch_all(MYSQLI_ASSOC);

                                                                foreach ($cities as $city) {
                                                                ?>
                                                                    <option value="<?php echo $city['id'] ?>">
                                                                        <?php
                                                                        echo $city['name'];
                                                                        ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 text-start">
                                                        <label class="form-label">Place Name</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="place_name" class="form-control">
                                                        </div>
                                                    </div>

                                                    <input type="file" class="form-control form-control-sm" id="place_image" accept="image/jpeg" />

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-sm" onclick="createNewPlace();">Add New Place</button>
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal -->

                                <div class="col-12 mt-3">
                                    <table class="styled-table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Id</th>
                                                <th>Place</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <!-- and so on... -->
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-12">
                                    <span>Add Description</span>
                                    <textarea cols="12" id="description" rows="5" class="form-control mt-1"></textarea>
                                </div>

                                <div class="col-12 col-lg-6 new_plan_container">
                                    <button class="btn add_new_plan" onclick="addNewTourPlan()">Add New Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Content -->
                </div>
            </div>
        </div>
    </div>

    <script src="./js/newTourPlan.js"></script>
    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>