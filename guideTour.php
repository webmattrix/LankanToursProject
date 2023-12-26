<?php

require "./assets/model/sqlConnection.php";

session_start();

$guide = $_SESSION["lt_guide"];

$employee_rs = Database::search("SELECT *, `employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`,`employee`.`id` AS `emp_id` 
                                     FROM `employee` 
                                     INNER JOIN `guide` ON `employee`.`id`=`guide`.`employee_id` 
                                     INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` 
                                     WHERE `employee`.`id`='" . $guide["employee_id"] . "'");

$employee_data = $employee_rs->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Panel | Tours Page</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/guideP_TourPage.css" />
    <!-- <link rel="stylesheet" href="./css/guideTourDark.css"/> -->
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php

                include "./components/guideSidebar.php";
                ?>

                <div class="d-flex w-100 flex-column bg-content" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/guideHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div>

                        <div class="col-12">
                            <div class="row p-0 m-0">

                                <!-- view Modal for small devices -->

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content bg-modalC">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 modal-titleC" id="exampleModalLabel">Tours Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 col-lg-11 d-none d-sm-grid d-lg-grid">
                                                            <div class="row p-3" style="line-height: 0.4in; border: 1px solid #A29A9A; border-radius: 6px;">
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">11 Day</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Timeline of tour</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">2023/06/12 - 2023/06/14</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan ID</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">TO_001</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Rating</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">
                                                                            <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-half" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-border" class="icon-style"></iconify-icon>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row justify-content-end pt-3 pt-lg-2">
                                                                        <button class="btn col-lg-3 col-sm-3" data-bs-dismiss="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #228622; color: #fff;">Ok</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-11 d-grid d-sm-none d-lg-none">
                                                            <div class="row p-3" style="line-height: 0.3in; border: 1px solid #A29A9A; border-radius: 6px;">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">11 Day</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Timeline of tour</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">2023/06/12 - 2023/06/14</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan ID</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">TO_001</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="modal-cont-textC" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Rating</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">
                                                                            <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-half" class="icon-style"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-border" class="icon-style"></iconify-icon>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row justify-content-end pt-3 pt-lg-2">
                                                                        <button class="btn col-4" data-bs-dismiss="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #228622; color: #fff;">Ok</button>
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

                                <!-- view Modal for small devices -->


                                <div class="col-12 mt-lg-5">
                                    <div class="row justify-content-center gap-lg-5">
                                        <div class="col-10 col-lg-4 my-3 my-lg-0" style="height: 25vh; border-radius: 10px; background: linear-gradient(104deg, #D850EE 0%, #900FA5 100%);">

                                        </div>
                                        <div class="col-10 col-lg-4 mb-3 mb-lg-0" style="height: 25vh; border-radius: 10px; background: linear-gradient(104deg, #0094FF 0%, #0C5CD4 100%);">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-lg-5 mt-2">
                                    <div class="row justify-content-center">
                                        <div class="col-11 pt-5 px-5 pb-2 blog-background">
                                            <div class="row justify-content-center">
                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row d-flex align-items-center">
                                                                <div class="col-12 col-sm-5 col-lg-5 my-sm-2">
                                                                    <span class="d-flex align-items-center"><iconify-icon icon="material-symbols:tune" class="fs-5 icon-filter"></iconify-icon> &nbsp;<span class="filter-textC" style="font-family: 'Segoe'; font-size: calc(0.64rem + 0.68vh);">Filter</span>
                                                                        <div class="col-lg-6 col-7 col-sm-9 ps-3">
                                                                            <select class="selector" style="cursor: pointer; font-family: 'Segoe';" aria-label="Default select example">
                                                                                <option selected>Select</option>
                                                                                <option value="1">One</option>
                                                                                <option value="2">Two</option>
                                                                                <option value="3">Three</option>
                                                                            </select>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                                <div class="col-10 col-lg-7 col-sm-7 my-sm-2  mt-3 mt-lg-0 mt-sm-0">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-12 col-lg-6 col-sm-8">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="type tour plan name or ID...." style="font-family: 'Segoe'; background-color: #E3E3E3;">
                                                                                <span class="input-group-text"><a href="#" style="color: #858585;"><iconify-icon icon="fe:search"></iconify-icon></a></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-lg-5 d-none d-lg-grid d-sm-none">
                                                            <div class="row">

                                                                <table class="table-bordered tab-view">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-1 py-3 text-center tab-textC">ID</th>
                                                                                <th class="col-3 text-center py-3 tab-textC">Tour Plan Name</th>
                                                                                <th class="col-3 text-center py-3 tab-textC">Timeline</th>
                                                                                <th class="col-2 text-center py-3 tab-textC">Rating</th>
                                                                                <th class="col-1 text-center py-3 tab-textC">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-1 fw-normal py-2 text-center tab-textC">TO_001</th>
                                                                                <td class="col-3 text-center py-2 tab-textC">11 Day</td>
                                                                                <td class="col-3 text-center py-2 tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 text-center py-2">
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star-half" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star-border" class="icon-style"></iconify-icon>
                                                                                </td>
                                                                                <td class="col-1 text-center py-2">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-1 fw-normal py-2 text-center tab-textC">TO_002</th>
                                                                                <td class="col-3 text-center py-2 tab-textC">12 Day</td>
                                                                                <td class="col-3 text-center py-2 tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 text-center py-2">
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star-half" class="icon-style"></iconify-icon>
                                                                                </td>
                                                                                <td class="col-1 text-center py-2">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-1 fw-normal py-2 text-center tab-textC">TO_003</th>
                                                                                <td class="col-3 text-center py-2 tab-textC">6 Day</td>
                                                                                <td class="col-3 text-center py-2 tab-textC">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 text-center py-2">
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star-half" class="icon-style"></iconify-icon>
                                                                                    <iconify-icon icon="ic:baseline-star-border" class="icon-style"></iconify-icon>
                                                                                </td>
                                                                                <td class="col-1 text-center py-2">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- small devices -->
                                                        <div class="col-12 mt-4 pt-2 pt-lg-0 pt-sm-0 mt-sm-3 mt-lg-0 d-grid d-lg-none d-sm-grid">
                                                            <div class="row">

                                                                <table class="table-hover table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-4 text-center py-3 tab-textC">Tour Plan Name</th>
                                                                                <th class="col-2 text-center py-2 tab-textC">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center py-2 tab-textC">11 Day</td>
                                                                                <td class="col-1 text-center py-2">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center py-2 tab-textC">12 Day</td>
                                                                                <td class="col-1 text-center py-2">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center py-2 tab-textC">6 Day</td>
                                                                                <td class="col-1 text-center py-2">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- small devices -->
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 pt-1">
                                                    <div class="row">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-center">
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                </li>
                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Page Content / body content eka methanin liyanna -->

                </div>

            </div>

        </div>
    </div>

    <script src="../js/adminTemplate.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>