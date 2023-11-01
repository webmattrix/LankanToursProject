<?php require "./assets/model/sqlConnection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/AdminPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="background-color: #EAEAEA;">
    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
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
                                        <h5 class="card-title" style="font-family: Inter;"><?php echo $number1 ?></h5>

                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-0 mb-3 mb-lg-0 col-md-6  col-sm-6">
                                    <div class=" AdminCard" style="max-width: 30rem;">
                                        <?php
                                        $admin_rs2 = Database::search("SELECT * FROM `employee` WHERE `employe_type_id`='2' AND `status`='0' ");
                                        $number2 = $admin_rs2->num_rows;
                                        ?>
                                        <h4 class="card-title" style="font-family: Inter;">Active Admins</h4>
                                        <h5 class="card-title" style="font-family: Inter;"><?php echo $number2 ?></h5>

                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mt-3 mb-3 bg-white " style=" border-radius: 10px;">
                                <div class="row p-3">

                                    <div class="col-lg-4 col-12">
                                        <div class="AddAdminCard" style=" background-color: rgb(200, 200, 200);font-size: 14px;">
                                            <img src="./assets/img/AdminPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="card-img-top mb-2   " style="border-radius: 50%; height: 150px; width: 150px; margin: auto;">

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
                                                <button class="form-control fw-bold AdminButton text-white" style="font-family: Inter;" onclick="adminReister();">Register Admin</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-block d-lg-none  mt-4">
                                        <hr class="" style=" border-width: 3px">
                                    </div>

                                    <div class="col-lg-8 col-12   ">
                                        <div class="col-12  mt-2" style="border-radius: 5px; background-color: rgb(200, 200, 200);">
                                            <div class="row">
                                                <div class="col-10 offset-1 mt-3 mb-3">
                                                    <input type="text" class="form-control" placeholder="Enter name.." id="searchIpnut" onkeyup="searchAdmin();">
                                                </div>
                                                <div class="col-1 mt-3 mb-3  d-none d-lg-block">
                                                    <iconify-icon icon="fluent:person-search-32-filled" class="fs-3"></iconify-icon>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 offset-lg-6 col-12  text-end mt-2 mb-2">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 180px;background-color: rgb(200, 200, 200);">
                                                    Sort By &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </button>
                                                <ul class="dropdown-menu" style="font-family: QuickSand;">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
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
                                                        $query =  "SELECT * FROM `employee` INNER JOIN `admin` ON employee.id = admin.employee_id  ";

                                                        $pageno;

                                                        if (isset($_GET["page"])) {
                                                            $pageno = $_GET["page"];
                                                        } else {
                                                            $pageno = 1;
                                                        }

                                                        $admin_rs = Database::search($query);
                                                        $n = $admin_rs->num_rows;
                                                        $results_per_page = 3;
                                                        $number_of_pages = ceil($n / $results_per_page);
                                                        $page_results = ($pageno - 1) * $results_per_page;
                                                        $admin_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                                                        $admin_num = $admin_rs->num_rows;

                                                        for ($x = 0; $x < $admin_num; $x++) {
                                                            $admin_data = $admin_rs->fetch_assoc();
                                                        ?>
                                                            <tr>

                                                                <td><?php echo $x + 1 ?></td>
                                                                <td><?php echo $admin_data["email"] ?></td>
                                                                <td><?php echo $admin_data["name"] ?></td>
                                                                <td><?php echo $admin_data["mobile"] ?></td>
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
                                            <!-- pagination -->

                                            <div class="col-10 offset-1 mt-3 d-flex justify-content-center align-content-center">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination  justify-content-center">
                                                        <li class="page-item">
                                                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                                                <span aria-hidden="true"><i class="bi bi-arrow-left-circle-fill"></i></span>
                                                            </a>
                                                        </li>
                                                        <?php

                                                        for ($x = 1; $x <= $number_of_pages; $x++) {
                                                            if ($x == $pageno) {
                                                        ?>
                                                                <li class="page-item active">
                                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                                </li>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
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
                                                                <span aria-hidden="true"><i class="bi bi-arrow-right-circle-fill"></i></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <!-- pagination -->
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

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="./js/manageAdmin.js"></script>


</body>

</html>