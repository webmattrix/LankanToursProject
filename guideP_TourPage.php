<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Panel | Tours Page</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/guideP_TourPage.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/guideSidebar.php";
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/guideHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-lg-5">
                                    <div class="row justify-content-center gap-lg-5">
                                        <div class="col-12 col-lg-4" style="height: 25vh; border-radius: 10px; background: linear-gradient(104deg, #D850EE 0%, #900FA5 100%);">

                                        </div>
                                        <div class="col-12 col-lg-4" style="height: 25vh; border-radius: 10px; background: linear-gradient(104deg, #0094FF 0%, #0C5CD4 100%);">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 mt-lg-4 pt-lg-3">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <div class="col-12 col-lg-5">
                                                <span class="d-flex align-items-center"><iconify-icon icon="material-symbols:tune" class="fs-5"></iconify-icon> &nbsp;<span style="font-family: 'Segoe'; font-size: calc(0.7rem + 0.68vh);">Filter</span>
                                                    <div class="dropSelect">
                                                        <div class="selectArea">
                                                            <span class="selectCon">Select</span>
                                                            <div class="slecth"></div>
                                                        </div>
                                                        <ul class="selectMenu">
                                                            <li>Option 1</li>
                                                            <li>Option 1</li>
                                                            <li>Option 1</li>
                                                        </ul>
                                                    </div>
                                                </span>
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

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>