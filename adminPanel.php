<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/adminPanel.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/scrolbar.css">
</head>

<body style="background-color: #EAEAEA;" onload="chartResize();">

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto; min-height: 100vh;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div class="col-12 px-3 pt-2 pb-3">
                        <div class="row">

                            <div class="admin_header-grid">
                                <div class="admin_grid-item">
                                    <lottie-player src="https://lottie.host/7b556494-d0aa-430b-b797-c51341a0eb05/QVy6bSZRqZ.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Overall Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="https://lottie.host/793904a4-bfaa-46db-9c5b-6cc343cfd45a/1a0aNjUjgZ.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Yearly Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="https://lottie.host/d80c84e5-62c6-4d6b-ad66-a17b8561c4a2/8dc9pToLL5.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <div class="content p-3">
                                        <img src="../assets/img/girl_profile_picture.jpg" alt="" class="admin_panel-profile-image">
                                        <div class="admin-name">
                                            <span class="name segoeui-bold">John Luther</span>
                                            <span class="type quicksand-SemiBold">Owner</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="https://lottie.host/000a5a10-3d7e-4b10-9145-ee04763b6dab/o6A00e1V8J.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Today Engagement</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">08</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="https://lottie.host/793904a4-bfaa-46db-9c5b-6cc343cfd45a/1a0aNjUjgZ.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Monthly Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="https://lottie.host/49328183-94d0-4da0-9e0f-6919d9b58c1f/Siryo4hOJs.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Outgoing Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="https://lottie.host/1d5241c3-2472-4564-a8ef-95a7f70daf2f/d0dTQ3Jiur.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Total Engagements</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">1352</span>
                                </div>
                            </div>

                            <hr>

                            <div class="admin_body-container">
                                <div class="admin_body-grid">
                                    <div class="position-relative"> <!-- Income Chart (According to the months) -->
                                        <span class="fst-italic quicksand-Medium" style="z-index: 1; font-size: 16px;">- Year : 2023 -</span>
                                        <div class="w-100 h-100">
                                            <canvas id="canvas" class="rounded p-2"></canvas>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="fst-italic quicksand-Medium" style="z-index: 1; font-size: 16px;">- Visiters -</span>
                                        <div class="p-2 chart-container w-100 h-100">
                                            <canvas id="myChart" style="width: 100%; height: 100%; position: relative;"></canvas>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="quicksand-Bold">Messages</span>
                                            <hr style="width: 100%;">
                                        </div>
                                        <div class="d-flex flex-column gap-3 admin_panel_scroll-boxes" style="overflow-y: auto;">
                                            <?php
                                            for ($x = 0; $x < 10; $x++) {
                                            ?>
                                                <div class="msg-box px-3 rounded">
                                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                                        <span class="quicksand-SemiBold fs-6">Sahan Perera</span>
                                                        <span style="font-size: 14px;" class="text-black-50 quicksand-Regular">2023-06-06</span>
                                                    </div>
                                                    <div class="pt-2 quicksand-SemiBold position-relative">
                                                        <span class="text-black-50 admin_panel-msg-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit officiis voluptatum vitae! Provident repellat suscipit praesentium, vero commodi debitis consectetur magnam quos in nulla. Sunt, porro neque, sed nulla perferendis fugiat nostrum delectus numquam, iusto ipsa modi at tenetur nobis.</span>
                                                        <a class="text-decoration-none" style="font-size: 14px;" href="#">View more...</a>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="quicksand-Bold" style="min-width: max-content; display: block;">Ongoing Tours</span>
                                            <hr style="width: 100%;">
                                        </div>
                                        <div class="d-flex flex-column gap-3 admin_panel_scroll-boxes" style="overflow-y: auto;">
                                            <?php
                                            for ($x = 0; $x < 10; $x++) {
                                            ?>
                                                <div class="ongoing-tour-box px-3 rounded d-flex align-items-center gap-2">
                                                    <img src="../assets/img/girl_profile_picture.jpg" class="" style="width: 50px; clip-path: circle();" />
                                                    <div class="w-100 p-1">
                                                        <div class="w-100 d-flex justify-content-between">
                                                            <span class="quicksand-SemiBold">7 Day Premium Plan</span>
                                                            <span style="font-size: 14px;" class="text-black-50 quicksand-Medium">2 Days Left</span>
                                                        </div>
                                                        <div class="w-100 p-1">
                                                            <span class="quicksand-Medium">Assigned Guide : Mr. Blake Michael</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
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
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart JS Link -->
    <script src="../js/adminPanel.js"></script>
    <script src="../js/visiterChart.js"></script>
</body>

</html>