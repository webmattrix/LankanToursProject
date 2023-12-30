<?php require "./assets/model/sqlConnection.php"; 
session_start();
$admin = $_SESSION["lt_admin"];


if (isset($_SESSION["lt_admin"])) {
    $data = $_SESSION["lt_admin"]; 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Page</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/GuidPage.css">
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
                                                <img src="../assets/img/GuidePage_IMG/bohemian-man-with-his-arms-crossed.jpg"
                                                    class="img-fluid " style="border-radius:5px; object-fit: cover; ">
                                            </div>
                                            <div class="col-lg-8 col-12">
                                                <?php

                                                $guide01_rs = Database::search("SELECT COUNT(`guide_id`)AS`tour_count`,`guide_id` FROM `order` GROUP BY `guide_id` ORDER BY `tour_count` DESC LIMIT 1 ");
                                                $guide_data01 = $guide01_rs->fetch_assoc();
                                                $guide02_rs = Database::search("SELECT * FROM `employee` INNER JOIN `guide` ON employee.id = guide.employee_id WHERE `guide`.`id`='" . $guide_data01["guide_id"] . "'");
                                                $n = $guide02_rs->num_rows;
                                                $guide_data02 = $guide02_rs->fetch_assoc();
                                                if($n==0){
                                                    ?>
                                                    <h5 class="text-lg-end mt-3 mt-lg-0" style="font-family:QuickSand;">Most
                                                    Famouse Tour Guide</h5>
                                                <h6 class="text-lg-end mt-3" style="font-family:QuickSand;">
                                                Not enough information
                                                </h6>
                                                <h6 class="text-lg-end" style="font-family:QuickSand;"><i
                                                        class="bi bi-star-fill  text-warning"></i>&nbsp;&nbsp;
                                                        0/5
                                                </h6>
                                                <h6 class="text-lg-end" style="font-family:QuickSand;"><i
                                                        class="bi bi-telephone-inbound-fill"></i>&nbsp;&nbsp;
                                                        Not mentioned
                                                </h6>
                                                    <?php
                                                }else{
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
                                                    
                                                    <?php
                                                }


                                                ?>
                                                
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
                                                <img src="../assets/img/GuidePage_IMG/bohemian-man-with-his-arms-crossed.jpg"
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

                                                        if (isset($_GET["page_no"])) {
                                                            $page_no = $_GET["page_no"];
                                                        } else {
                                                            $page_no = 1;
                                                        }

                                                        $guideTable_rs = Database::search($query);
                                                        $n = $guideTable_rs->num_rows;
                                                      
                                                        $result_per_page = 5;
                                                        $number_of_pages = ceil($n / $result_per_page);
                                                        $offset = ($page_no - 1) * $result_per_page;
                                                        $guideTable_rs = Database::search($query . " LIMIT " . $result_per_page . " OFFSET " . $offset . "");
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
                                                    <td><button class=" btn btn-danger">Unverified</button>

                                                        <?php
                                                } else {
                                                    ?>

                                                    <td><button class="btn btn-primary">Verified</button>

                                                        <?php
                                                }
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                        } ?>

                                    </tbody>
                                </table>
                               <!-- Pagination -->
<div style="display: flex; justify-content: center;">
    <div class="p_nation">

        <?php

        $middle_page;
        $middle_left;
        $middle_right;

        if ($page_no <= 1) {
            $middle_page = ceil($number_of_pages / 2);
        } else if ($page_no >= $number_of_pages) {
            $middle_page = ceil($number_of_pages / 2);
        } else {
            $middle_page = $page_no;
        }

        $middle_left = $middle_page - 1;
        $middle_right = $middle_page + 1;


        ?>

        <!--  -->
        <a class="text-decoration-none p_nation_prev" href="?page_no=<?php
                                                                        if ($page_no > 1) {
                                                                            echo ($page_no - 1);
                                                                        } else {
                                                                            echo ("1");
                                                                        }
                                                                        ?>" <?php
                                                                            if ($page_no == 1) {
                                                                            ?> style="opacity: 0.5;" <?php
                                                                                                    }
                                                                                                        ?>>
            <span class="d-none d-lg-block">Prev</span>
            <i class="icon-arrow_circle_left_black_24dp d-block d-lg-none"></i>
        </a>


        <!-- First Page of the Pagination -->
        <a href="?page_no=1" <?php
                                if ($page_no == "1") {
                                ?> style="background-color: #0c0091; color: white;" <?php
                                                                                }
                                                                                    ?>>1</a>
        <!-- First Page of the Pagination -->


        <!-- Inter ... of the Pagination -->
        <?php
        if (($middle_left != 2) && ($middle_left > 1)) {
        ?>
            <a href="">...</a>
        <?php
        }
        ?>
        <!-- Inter ... of the Pagination -->


        <!-- Middle Left Button of the Pagination -->
        <?php
        if ($middle_left > 1) {
        ?>
            <a href="?page_no=<?php echo ($middle_left); ?>" <?php
                                                                if ($page_no == $middle_left) {
                                                                ?> style="background-color: #0c0091; color: white;" <?php
                                                                                                                }
                                                                                                                    ?>><?php echo ($middle_left); ?></a>
        <?php
        }
        ?>
        <!-- Middle Left Button of the Pagination -->

        <!-- Middle Button of the Pagination -->
        <?php
        if ($number_of_pages > 2) {
        ?>
            <a href="?page_no=<?php echo ($middle_page); ?>" <?php
                                                                if ($page_no == $middle_page) {
                                                                ?> style="background-color: #0c0091; color: white;" <?php
                                                                                                                }
                                                                                                                    ?>><?php echo ($middle_page); ?></a>
        <?php
        }
        ?>
        <!-- Middle Button of the Pagination -->


        <!-- Middle Right Button of the Pagination -->
        <?php
        if ($middle_right < $number_of_pages) {
        ?>
            <a href="?page_no=<?php echo ($middle_right); ?>" <?php
                                                                if ($page_no == $middle_right) {
                                                                ?> style="background-color: #0c0091; color: white;" <?php
                                                                                                                }
                                                                                                                    ?>><?php echo ($middle_right); ?></a>
        <?php
        }
        ?>
        <!-- Middle Right Button of the Pagination -->


        <!-- Inter ... of the pagination -->
        <?php
        if ($middle_right != ($number_of_pages - 1) && ($middle_right < ($number_of_pages - 1))) {
        ?>
            <a href="">...</a>
        <?php
        }
        ?>
        <!-- Inter ... of the pagination -->


        <!-- Last page of the pagination -->
        <?php
        if ($number_of_pages > 1) {
        ?>
            <a href="?page_no=<?php echo ($number_of_pages); ?>" <?php
                                                                    if ($page_no == $number_of_pages) {
                                                                    ?> style="background-color: #0c0091; color: white;" <?php
                                                                                                                    }
                                                                                                                        ?>><?php echo ($number_of_pages); ?></a>
        <?php
        }
        ?>
        <!-- Last page of the pagination -->


        <!-- Next Button of the pagination -->
        <a class="text-decoration-none p_nation_next" href="?page_no=<?php
                                                                        if ($page_no < $number_of_pages) {
                                                                            echo ($page_no + 1);
                                                                        } else if ($number_of_pages == 0) {
                                                                            echo ("1");
                                                                        } else {
                                                                            echo ($number_of_pages);
                                                                        }
                                                                        ?>" <?php
                                                                            if (($page_no == $number_of_pages) || ($number_of_pages == 0)) {
                                                                            ?> style="opacity: 0.5;" <?php
                                                                                                    }
                                                                                                        ?>>
            <span class="d-none d-lg-block">Next</span>
            <i class="icon-arrow_circle_right_black_24dp1 d-block d-lg-none"></i>
        </a>
        <!-- Next Button of the pagination -->

    </div>
</div>
<!-- Pagination -->
                            </div>
                        </div>



                        <!-- <div class="col-12 mt-4">
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
                        </div> -->


                        

                    </div>
                    <!-- Page Content / body content eka methanin liyanna -->

                </div>
            </div>
        </div>
    </div>
    <script src="../js/adminTemplate.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/manageGuide.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>
<?php
    } else {
       header("Location: ./Admin");       
    } ?>