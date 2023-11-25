<?php require "./assets/model/sqlConnection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Page</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/GuidPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body style="background-color: #EAEAEA;">

    <div class="container-fluid">
        <div class="row ">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div class="col-12  container-fluid">
                        <div class="row mt-3 mb-3">
                            <div class="col-lg-5 offset-lg-1  col-md-5 offset-md-1 col-sm-5 offset-sm-1">
                                <div class="GuidCard">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-12">
                                                <img src="./assets/img/GuidePage_IMG/bohemian-man-with-his-arms-crossed.jpg"
                                                    class="img-fluid " style="border-radius:5px; object-fit: cover; ">
                                            </div>
                                            <div class="col-lg-8 col-12">
                                                <?php

                                                $guide01_rs = Database::search("SELECT COUNT(`guide_id`)AS`tour_count`,`guide_id` FROM `order` GROUP BY `guide_id` ORDER BY `tour_count` DESC LIMIT 1 ");
                                                $guide_data01 = $guide01_rs->fetch_assoc();
                                                $guide02_rs = Database::search("SELECT * FROM `employee` INNER JOIN `guide` ON employee.id = guide.employee_id WHERE `guide`.`id`='" . $guide_data01["guide_id"] . "'");
                                                $guide_data02 = $guide02_rs->fetch_assoc();


                                                ?>
                                                <h5 class="text-lg-end mt-3 mt-lg-0" style="font-family:QuickSand;">Most
                                                    Famouse Tour Guide</h5>
                                                <h6 class="text-lg-end mt-3" style="font-family:QuickSand;">
                                                    <?php echo $guide_data02["name"] ?>
                                                </h6>
                                                <h6 class="text-lg-end" style="font-family:QuickSand;"><i
                                                        class="bi bi-star-fill  text-warning"></i>&nbsp;&nbsp;
                                                    <?php echo $guide_data02["rating"] ?>/5
                                                </h6>
                                                <h6 class="text-lg-end" style="font-family:QuickSand;"><i
                                                        class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;
                                                    <?php echo $guide_data02["mobile"] ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5  col-md-5 col-sm-5">
                                <div class=" GuidCard">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-12">
                                                <img src="./assets/img/GuidePage_IMG/bohemian-man-with-his-arms-crossed.jpg"
                                                    class="img-fluid " style=" border-radius: 5px; object-fit: cover; ">
                                            </div>
                                            <div class="col-lg-8 col-12">
                                                <?php

                                                $guide_rs = Database::search("SELECT * FROM `employee` INNER JOIN `guide` ON employee.id = guide.employee_id ORDER BY `rating` DESC LIMIT 1 ");
                                                $guide_data = $guide_rs->fetch_assoc();
                                                $guide_rs = Database::search("SELECT * FROM `employee` INNER JOIN `guide` ON employee.id = guide.employee_id ORDER BY `rating` DESC LIMIT 1 ");
                                                $guide_data = $guide_rs->fetch_assoc();

                                                ?>
                                                <h5 class="text-lg-end mt-3 mt-lg-0" style="font-family:QuickSand;">
                                                    Highest Rating Tour Guide</h5>
                                                <h6 class="text-lg-end mt-3" style="font-family:QuickSand;">
                                                    <?php echo $guide_data["name"] ?>
                                                </h6>
                                                <h6 class="text-lg-end" style="font-family:QuickSand;"><i
                                                        class="bi bi-star-fill  text-warning"></i>&nbsp;&nbsp;
                                                    <?php echo $guide_data["rating"] ?>/5
                                                </h6>
                                                <h6 class="text-lg-end" style="font-family:QuickSand;"><i
                                                        class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;
                                                    <?php echo $guide_data["mobile"] ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-3 mt-3 mb-3  "
                        style="border-radius: 10px; background-color:rgb(255, 255, 255) ">
                        <div class="col-lg-3 offset-lg-9 col-10 offset-1  mb-3">
                            <input type="text" class="form-control" placeholder=" Type Name ..." id="searchInput"
                                onkeyup="searchGuide();">
                        </div>
                        <div id="ViewArea">
                            <div class="col-12 table-responsive ">
                                <table class="table  align-middle table-hover   mb-3"
                                    style="background-color:#E8E8E8; border-radius: 5px; font-family:Inter;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Guid Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Rating</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM `employee` INNER JOIN `guide` ON employee.id = guide.employee_id ";

                                        $pageno;

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }
                            
                                        $G_rs = Database::search($query);
                                        $n = $G_rs->num_rows;
                            
                                        $results_per_page = 1;
                                        $number_of_pages = ceil($n / $results_per_page);
                                        $page_results = ($pageno - 1) * $results_per_page;
                                        $guideTable_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                                        $guideTable_num = $guideTable_rs->num_rows;

                                        for ($x = 0; $x < $guideTable_num; $x++) {
                                            $guideTable_data = $guideTable_rs->fetch_assoc();

                                            ?>
                                            <tr style="font-size: small;">
                                                <td>
                                                    <?php echo $guideTable_data["name"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $guideTable_data["address"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $guideTable_data["mobile"] ?>
                                                </td>
                                                <th>
                                                    <?php echo $guideTable_data["rating"] ?>
                                                </th>

                                                <?php if ($guideTable_data["status"] == 0) {
                                                    ?>
                                                    <td><button class="btn btn-primary ">Available</button>

                                                        <?php
                                                } else {
                                                    ?>

                                                    <td><button class="btn btn-danger">Unavailable</button>

                                                        <?php
                                                }
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                        } ?>

                                    </tbody>
                                </table>
                                <!-- pagination -->
                                <div class="col-10 offset-1 mt-3 d-flex justify-content-center align-content-center ">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination  justify-content-center ">
                                            <li class="page-item ">
                                                <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                                    <span aria-hidden="true"><i
                                                            class="bi bi-arrow-left-circle-fill"></i></span>
                                                </a>
                                            </li>
                                            <?php

                                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                                if ($x == $pageno) {
                                                    ?>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>">
                                                            <?php echo $x; ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>">
                                                            <?php echo $x; ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }

                                            ?>

                                            <li class="page-item">
                                                <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                                    <span aria-hidden="true"><i
                                                            class="bi bi-arrow-right-circle-fill"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- pagination -->
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <h2 class="text-center" style="font-family: Inter;">Add New Guide</h2>
                        </div>
                        <div class="col-12 mb-4 mt-4">
                            <div class="row">
                                <div class="col-10 offset-1 offset-lg-0">
                                    <input type="text " class=" form-control" placeholder=" Enter Email..">
                                </div>
                                <div class="col-lg-2 offset-lg-0 col-10 offset-1 d-grid mt-lg-0 mt-2">
                                    <button class="btn btn-primary" style="font-family: Inter;">Send
                                        Application</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 table-responsive">
                            <table class="table  align-middle table-hover  mb-2"
                                style="background-color: #E8E8E8; border-radius: 5px; font-family: Inter;">
                                <thead>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">send</th>
                                        <th scope="col">Submit</th>
                                        <th scope="col">Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($x = 0; $x < 2; $x++) {
                                        ?>
                                        <tr style="font-size: small;">
                                            <td>UserEmail@gmail.com</td>
                                            <td>07/08/2023</td>
                                            <td>24/08/2023</td>
                                            <td><button class="btn btn-primary">view</button></i>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Page Content / body content eka methanin liyanna -->

                </div>
            </div>
        </div>
    </div>
    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/manageGuide.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>