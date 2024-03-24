<?php require "./assets/model/sqlConnection.php";
session_start();

if (empty($_SESSION["lt_admin"])) {
    header("Location: ../404_II");
} else {
    if (isset($_SESSION["lt_admin"])) {
        $data01 = $_SESSION["lt_admin"];
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Page</title>
            <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
            <link rel="stylesheet" href="../css/bootstrap.css">
            <link rel="stylesheet" href="../css/adminTemplate.css">
            <link rel="stylesheet" href="../css/AdminPage.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        </head>

        <body style="background-color: #EAEAEA;">
            <div class="container-fluid">
                <div class="row">

                    <div class="d-flex p-0">
                        <?php
                        include "./components/adminSidebar.php";
                        ?>

                        <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto;">
                            <?php
                            include "./components/adminHeader.php";
                            ?>

                            <!-- Page Content / body content eka methanin liyanna -->
                            <div class="container-fluid ">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4 offset-lg-2 col-md-6 col-sm-6">
                                            <div class=" AdminCard" style="max-width: 30rem;">

                                                <h4 class="card-title" style="font-family: Inter;">Registerd Admins</h4>
                                                <?php

                                                $rs1 = Database::search("SELECT * FROM `employee` WHERE `employe_type_id`='2' ");
                                                $number1 = $rs1->num_rows;
                                                ?>
                                                <h5 class="card-title" style="font-family: Inter;">
                                                    <?php echo $number1 ?>
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 offset-lg-0 mb-3 mb-lg-0 col-md-6  col-sm-6">
                                            <div class=" AdminCard" style="max-width: 30rem;">
                                                <?php
                                                $admin_rs2 = Database::search("SELECT * FROM `employee` WHERE `employe_type_id`='2' AND `status`='1' ");
                                                $number2 = $admin_rs2->num_rows;
                                                ?>
                                                <h4 class="card-title" style="font-family: Inter;">Active Admins</h4>
                                                <h5 class="card-title" style="font-family: Inter;">
                                                    <?php echo $number2 ?>
                                                </h5>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 mt-3 mb-3 bg-white " style=" border-radius: 10px;">
                                        <div class="row p-3">

                                            <div class="col-lg-4 col-12">
                                                <div class="AddAdminCard" style=" background-color: rgb(200, 200, 200);font-size: 14px;">
                                                    <img src="../assets/img/AdminPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="card-img-top mb-2   " style="border-radius: 50%; height: 150px; width: 150px; margin: auto;">

                                                    <div class="col-12 mb-2 mt-2" style="font-family: QuickSand;">
                                                        <div class="row">
                                                            <!-- <span class="text-start" style="font-family: QuickSand;">Full name</span> -->
                                                            <input type="text" class=" form-control " id="A_Name" placeholder="Full name..">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2" style="font-family: QuickSand;">
                                                        <div class="row">
                                                            <!-- <span class="text-start" >Email</span> -->
                                                            <input type="text" class=" form-control " id="A_Email" placeholder="Email..">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mb-2" style="font-family: QuickSand;">
                                                        <div class="row">
                                                            <!-- <span class="text-start" >NIC</span> -->
                                                            <input type="text" class=" form-control " id="A_NIC" placeholder="NIC..">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2" style="font-family: QuickSand;">
                                                        <div class="row">
                                                            <!-- <span class="text-start" >Mobile</span> -->
                                                            <input type="text" class=" form-control " id="A_Mobile" placeholder="Mobile..">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-4" style="font-family: QuickSand;">
                                                        <div class="row">
                                                            <!-- <span class="text-start" >Address</span> -->
                                                            <input type="text" class=" form-control " id="A_Address" placeholder="Address..">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 ">
                                                        <button class="form-control fw-bold AdminButton text-white" style="font-family: Inter;" onclick="adminReister();">Register
                                                            Admin</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-block d-lg-none  mt-4">
                                                <hr class="" style=" border-width: 3px">
                                            </div>

                                            <div class="col-lg-8 col-12   ">
                                                <div class="col-12  mt-2 mb-2" style="border-radius: 5px; background-color: rgb(200, 200, 200);">
                                                    <div class="row">
                                                        <div class="col-10 offset-1 mt-3 mb-3">
                                                            <input type="text" class="form-control" placeholder="Enter name.." id="searchIpnut" onkeyup="searchAdmin();">
                                                        </div>
                                                        <div class="col-1 mt-3 mb-3  d-none d-lg-block">
                                                            <iconify-icon icon="fluent:person-search-32-filled" class="fs-3"></iconify-icon>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div id="viewArea1">
                                                    <div class="col-12 table-responsive  ">
                                                        <table class="table  align-middle table-hover table-striped " style="background-color: rgb(200, 200, 200); border-radius: 10px; font-family: QuickSand;font-size: 14px;">
                                                            <thead class="thead ">
                                                                <tr class="">
                                                                    <th scope="col">#</th>
                                                                    <th scope="col ">Email</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Mobile</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query = "SELECT * FROM `employee` INNER JOIN `admin` ON `employee`.`id` = `admin`.`employee_id`";




                                                                if (isset($_GET["page_no"])) {
                                                                    $page_no = $_GET["page_no"];
                                                                } else {
                                                                    $page_no = 1;
                                                                    // header("Location :/1");
                                                                }

                                                                $admin_rs = Database::search($query);
                                                                $n = $admin_rs->num_rows;

                                                                $result_per_page = 5;
                                                                $number_of_pages = ceil($n / $result_per_page);
                                                                $offset = ($page_no - 1) * $result_per_page;
                                                                $admin_rs = Database::search($query . " LIMIT " . $result_per_page . " OFFSET " . $offset . "");
                                                                $admin_num = $admin_rs->num_rows;

                                                                for ($x = 0; $x < $admin_num; $x++) {
                                                                    $admin_data = $admin_rs->fetch_assoc();
                                                                ?>
                                                                    <tr>

                                                                        <td>
                                                                            <?php echo $x + 1 ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $admin_data["email"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $admin_data["name"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $admin_data["mobile"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="btn" onclick="modalView('<?php echo $admin_data['email']; ?>');">
                                                                                <i class="bi bi-eye-fill fs-4"></i>
                                                                            </button>

                                                                        </td>
                                                                    </tr>
                                                                <?php }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
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
                                                                <i class="bi bi-arrow-left-circle-fill d-block d-lg-none"></i>
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
                                                                <i class="bi bi-arrow-right-circle-fill d-block d-lg-none"></i>
                                                            </a>
                                                            <!-- Next Button of the pagination -->

                                                        </div>
                                                    </div>
                                                    <!-- Pagination -->
                                                </div>
                                            </div>

                                            <!-- modal -->
                                            <div class="modal" tabindex="-1" id="ViewModel">
                                                <div id="viewArea2">

                                                </div>
                                            </div>
                                            <!-- modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page Content / body content eka methanin liyanna -->
                    </div>
                </div>
            </div>

            <script src="../js/adminTemplate.js"></script>
            <script src="../js/bootstrap.js"></script>
            <script src="../js/bootstrap.bundle.js"></script>
            <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
            <script src="../js/manageAdmin.js"></script>


        </body>

        </html>
    <?php
    } else {
        header("Location: ../404");
    } ?>

<?php
}
