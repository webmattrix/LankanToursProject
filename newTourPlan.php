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
                                    <input type="text" class="form-control mt-1 input_field">
                                </div>
                                <div class="col-12 col-lg-6 mt-3">
                                    <span>Duration</span>
                                    <input type="text" class="form-control mt-1 input_field">
                                </div>
                                <div class="col-12 mt-3">
                                    <span>Place to visit</span>
                                    <div class="row">
                                        <div class="col-12 col-lg-9">
                                            <input type="text" class="form-control mt-1 input_field">
                                        </div>
                                        <div class="col-2 text-end mt-3">
                                            <button class="btn add_btn mt-1">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <table class="styled-table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Place</th>
                                                <th>Upload City Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td><input type="text" class="form-control table_input_field"></td>
                                                <td><button class="btn px-2 px-lg-5" style="background-color: #CECCCC;">Browse</button></td>
                                                <td><button class="btn px-2 px-lg-4 text-white" style="background-color: #EB4646;">Delete</button></td>
                                            </tr>
                                            <tr class="active-row text-center">
                                                <td><input type="text" class="form-control table_input_field"></td>
                                                <td><button class="btn px-2 px-lg-5" style="background-color: #CECCCC;">Browse</button></td>
                                                <td><button class="btn px-2 px-lg-4 text-white" style="background-color: #EB4646;">Delete</button></td>
                                            </tr>
                                            <!-- and so on... -->
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-12">
                                    <span>Add Description</span>
                                    <textarea cols="12" rows="5" class="form-control mt-1"></textarea>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <form class="custom__form">
                                        <p>Upload Main Image</p>
                                        <div class="custom__image-container">
                                            <label id="add-img-label" for="add-single-img">
                                                <img src="./Photo Gallery.png" alt="">
                                                <a class="btn btn-sm">Browse Image</a>
                                            </label>
                                            <input type="file" id="add-single-img" accept="image/jpeg" />
                                        </div>
                                        <input type="file" accept="image/jpeg" />
                                    </form>
                                </div>
                                <div class="col-12 col-lg-6 new_plan_container">
                                    <button class="btn add_new_plan">Add New Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Content -->
                </div>
            </div>
        </div>
    </div>

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>