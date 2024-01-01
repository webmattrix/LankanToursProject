<?php

require "assets/model/getOrdersList.php";


session_start();
if (isset($_SESSION["lt_guide"])) {
    $guide = $_SESSION["lt_guide"];
    // $guide_id = $_SESSION['lt_guide']['id'];
    $guide_id = $_SESSION['lt_guide']['employee_id'];
    // echo (json_encode($guide));

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
        <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


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

                                    <div class="modal fade" id="guideToursModal" tabindex="-1">
                                        <div id="viewArea01">

                                        </div>
                                    </div>

                                    <!-- view Modal for small devices -->


                                    <div class="col-12 mt-lg-5 mt-3 ">
                                        <div class="row justify-content-center gap-lg-5">

                                            <div class="col-10 col-lg-4 mb-3 mb-lg-0 text-white text-center row"
                                                style="height: 25vh; border-radius: 10px; background: linear-gradient(104deg, #0094FF 0%, #0C5CD4 100%); font-family:QuickSand;">
                                                <?php $guide_rs1 = Database::search("SELECT * FROM `employee`INNER JOIN `guide` ON employee.id = guide.employee_id WHERE  employee.id = '" . $guide_id . "' ");
                                                $guide_data1 = $guide_rs1->fetch_assoc(); ?>
                                                <h5 class="mt-3"> User Guide Account Name <br>
                                                    <?php echo $guide_data1["name"] ?>
                                                </h5>
                                                <h6>mobile ➜
                                                    <?php echo $guide_data1["mobile"] ?>
                                                </h6>
                                                <h6>Rating ➜
                                                    <?php echo $guide_data1["rating"] ?>/5
                                                </h6>

                                            </div>
                                            <div class="col-10 col-lg-4 my-3 my-lg-0 text-white text-center row"
                                                style="height: 25vh; border-radius: 10px; background: linear-gradient(104deg, #0094FF 0%, #0C5CD4 100%);font-family:QuickSand; ">
                                                <?php $guide_rs = Database::search("SELECT * FROM `employee` INNER JOIN `guide` ON employee.id = guide.employee_id ORDER BY `rating` DESC LIMIT 1 ");
                                                $guide_data = $guide_rs->fetch_assoc(); ?>
                                                <h5 class="mt-3"> Highest Rating Tour Guide <br>
                                                    <?php echo $guide_data["name"] ?>
                                                </h5>
                                                <h6>mobile ➜
                                                    <?php echo $guide_data["mobile"] ?>
                                                </h6>
                                                <h6>Rating ➜
                                                    <?php echo $guide_data["rating"] ?>/5
                                                </h6>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-lg-5 mt-2">
                                        <div class="row justify-content-center">
                                            <div class="col-11 pt-lg-5 pt-3 px-5 pb-2 blog-background">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <!-- <div class="col-12">
                                                                <div class="row d-flex align-items-center">
                                                                    <div class="col-12 col-sm-5 col-lg-5 my-sm-2">
                                                                        <span
                                                                            class="d-flex align-items-center"><iconify-icon
                                                                                icon="material-symbols:tune"
                                                                                class="fs-5 icon-filter"></iconify-icon>
                                                                            &nbsp;<span class="filter-textC"
                                                                                style="font-family: 'Segoe'; font-size: calc(0.64rem + 0.68vh);">Filter</span>
                                                                            <div class="col-lg-6 col-7 col-sm-9 ps-3">
                                                                                <select class="selector"
                                                                                    style="cursor: pointer; font-family: 'Segoe';"
                                                                                    aria-label="Default select example">
                                                                                    <option selected>Select</option>
                                                                                    <option value="1">One</option>
                                                                                    <option value="2">Two</option>
                                                                                    <option value="3">Three</option>
                                                                                </select>
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-6 offset-lg-6 col-10 offset-1 col-sm-7 my-sm-2  mt-3 mt-lg-0 mt-sm-0">
                                                                        <div class="row justify-content-end">
                                                                            <div class="col-12 col-lg-6 col-sm-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control"
                                                                                        placeholder="Type plan name .."
                                                                                        style="font-family: 'Segoe'; background-color: #E3E3E3;"
                                                                                        id="searchInput"
                                                                                        onkeyup="searchTour();">
                                                                                    <span class="input-group-text"><a
                                                                                            href="#"
                                                                                            style="color: #858585;"><iconify-icon
                                                                                                icon="fe:search"></iconify-icon></a></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <div id="ViewArea">
                                                                <div class="col-12 mt-lg-3 d-none d-lg-grid d-sm-none">
                                                                    <div class="row">
                                                                        <table class="table-bordered tab-view">
                                                                            <thead>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th
                                                                                            class="col-1 py-3 text-center tab-textC">
                                                                                            ID</th>
                                                                                        <th
                                                                                            class="col-3 text-center py-3 tab-textC">
                                                                                            Tour Plan Name</th>
                                                                                        <th
                                                                                            class="col-3 text-center py-3 tab-textC">
                                                                                            Timeline</th>
                                                                                        <th
                                                                                            class="col-2 text-center py-3 tab-textC">
                                                                                            Rating</th>
                                                                                        <th
                                                                                            class="col-1 text-center py-3 tab-textC">
                                                                                            View</th>
                                                                                    </div>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $pageno;

                                                                                if (isset($_GET["page_no"])) {
                                                                                    $page_no = $_GET["page_no"];
                                                                                } else {
                                                                                    $page_no = 1;
                                                                                }
                                                                                $order_query01 = "SELECT *,`tour`.`name` AS `tour_name`,`order`.`id` AS `orderID`FROM `order` 
                                                                                INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
                                                                                INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
                                                                                WHERE `order`.`guide_id` = '11'  ORDER BY `start_date` ASC ";
                                                                                
                                                                                $ct_order_query01 = "SELECT *,`custom_tour`.`id` AS `orderID`FROM `custom_tour`
                                                                                INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
                                                                                WHERE `custom_tour`.`guide_id` = '11'  ORDER BY `start_date` ASC ";

                                                                                $ongoingTourList01 = getOrders::getOrderList($order_query01, $ct_order_query01);
                                                                                $n=sizeof($ongoingTourList01);
                                                                                
                                                                                $result_per_page = 10;
                                                                                $number_of_pages = ceil($n / $result_per_page);
                                                                                $offset = ($page_no - 1) * $result_per_page;

                                                                                $order_query02 = $order_query01 ." LIMIT " . $result_per_page . " OFFSET " . $offset . "";
                                                                                
                                                                                $ct_order_query02 = $ct_order_query01 ." LIMIT " . $result_per_page . " OFFSET " . $offset . " ";
                                                                                $ongoingTourList02 = getOrders::getOrderList($order_query02, $ct_order_query02);

                                                                                for ($ongoing_iteration02 = 0; $ongoing_iteration02 < sizeof($ongoingTourList02); $ongoing_iteration02++) {
                                                                                    $main_data = $ongoingTourList02[$ongoing_iteration02];
                                                                                    ?>
                                                                                    <tr>
                                                                                        <div class="row">
                                                                                            <th
                                                                                                class="col-1 fw-normal py-2 text-center tab-textC">
                                                                                                <?php echo ($ongoing_iteration02 + 1) ?>
                                                                                            </th>
                                                                                            <td
                                                                                                class="col-3 text-center py-2 tab-textC">
                                                                                                <?php echo ($main_data["tour_name"]) ?>
                                                                                            </td>
                                                                                            <td
                                                                                                class="col-3 text-center py-2 tab-textC">
                                                                                                <?php echo ($main_data["start_date"]) ?>
                                                                                                -
                                                                                                <?php echo ($main_data["end_date"]) ?>
                                                                                            </td>
                                                                                            <td class="col-2 text-center py-2">
                                                                                                <?php echo ($main_data["star"]) ?>/5
                                                                                            </td>
                                                                                            <td class="col-1 text-center py-2">
                                                                                                <iconify-icon icon="bi:eye-fill"
                                                                                                    class="p-1 rounded-2"
                                                                                                    style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"
                                                                                                    onclick="guideTourmodal01('<?php echo $main_data['tour_name']; ?>' , '<?php echo $main_data['orderID']; ?>');"></iconify-icon>
                                                                                            </td>
                                                                                        </div>
                                                                                    </tr>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- small devices -->
                                                                <div
                                                                    class="col-12 mt-4 pt-2 pt-lg-0 pt-sm-0 mt-sm-3 mt-lg-0 d-grid d-lg-none d-sm-grid">
                                                                    <div class="row">

                                                                        <table class="table-hover table-bordered"
                                                                            style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th
                                                                                            class="col-4 text-center py-3 tab-textC">
                                                                                            Tour Plan Name</th>
                                                                                        <th
                                                                                            class="col-2 text-center py-2 tab-textC">
                                                                                            View</th>
                                                                                    </div>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php

                                                                                for ($ongoing_iteration02 = 0; $ongoing_iteration02 < sizeof($ongoingTourList02); $ongoing_iteration02++) {
                                                                                    $main_data = $ongoingTourList02[$ongoing_iteration02];
                                                                                    ?>
                                                                                    <tr>
                                                                                        <div class="row">
                                                                                            <td
                                                                                                class="col-3 text-center py-2 tab-textC">
                                                                                                <?php echo ($main_data["tour_name"]) ?>
                                                                                            </td>
                                                                                            <td class="col-1 text-center py-2">
                                                                                                <iconify-icon icon="bi:eye-fill"
                                                                                                    class="p-1 rounded-2"
                                                                                                    style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"
                                                                                                    onclick="guideTourmodal01('<?php echo $main_data['tour_name']; ?>' , '<?php echo $main_data['orderID']; ?>');"></iconify-icon>
                                                                                            </td>
                                                                                        </div>
                                                                                    </tr>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- small devices -->

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
                                                    </div>
                                                    <!-- <div class="col-12 mt-2 pt-1">
                                                        <div class="row">
                                                            <nav aria-label="Page navigation example">
                                                                <ul class="pagination justify-content-center">
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#" aria-label="Previous">
                                                                            <span aria-hidden="true">&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="page-item active"><a class="page-link"
                                                                            href="#">1</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">3</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#" aria-label="Next">
                                                                            <span aria-hidden="true">&raquo;</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div> -->
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
        <script src="../js/guideTour.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ./Guide");
} ?>