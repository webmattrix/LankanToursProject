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
</head>

<body style="background-color: #EAEAEA;">

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
                    <div class="col-12 px-2 pt-2">

                        <div class="admin_header-grid">
                            <div class="admin_grid-item">
                                <lottie-player src="https://lottie.host/7b556494-d0aa-430b-b797-c51341a0eb05/QVy6bSZRqZ.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                <span class="position-absolute text-white fs-4 segoeui-bold top-0 start-0 m-3">Overall Income</span>
                                <span class="position-absolute text-white fs-4 segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                            </div>
                            <div class="admin_grid-item">
                                <lottie-player src="https://lottie.host/793904a4-bfaa-46db-9c5b-6cc343cfd45a/1a0aNjUjgZ.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                <span class="position-absolute text-white fs-4 segoeui-bold top-0 start-0 m-3">Yearly Income</span>
                                <span class="position-absolute text-white fs-4 segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                            </div>
                            <div class="admin_grid-item">
                                <lottie-player src="https://lottie.host/d80c84e5-62c6-4d6b-ad66-a17b8561c4a2/8dc9pToLL5.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                <div class="content p-3">
                                    <img src="../assets/img/girl_profile_picture.jpg" alt="" class="admin_panel-profile-image">
                                    <div class="">
                                        <span class="segoeui-bold text-primary fs-4">John Luther</span>
                                    </div>
                                    <div class="">
                                        <span class="text-warning quicksand-Medium">Owner</span>
                                    </div>
                                </div>
                            </div>
                            <div class="admin_grid-item">
                                <lottie-player src="https://lottie.host/000a5a10-3d7e-4b10-9145-ee04763b6dab/o6A00e1V8J.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                <span class="position-absolute text-white fs-4 segoeui-bold top-0 start-0 m-3">Today Engagement</span>
                                <span class="position-absolute text-white fs-4 segoeui-bold bottom-0 end-0 m-3">08</span>
                            </div>
                            <div class="admin_grid-item">
                                <lottie-player src="https://lottie.host/793904a4-bfaa-46db-9c5b-6cc343cfd45a/1a0aNjUjgZ.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                <span class="position-absolute text-white fs-4 segoeui-bold top-0 start-0 m-3">Monthly Income</span>
                                <span class="position-absolute text-white fs-4 segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                            </div>
                            <div class="admin_grid-item">
                                <lottie-player src="https://lottie.host/49328183-94d0-4da0-9e0f-6919d9b58c1f/Siryo4hOJs.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                <span class="position-absolute text-white fs-4 segoeui-bold top-0 start-0 m-3">Outgoing Income</span>
                                <span class="position-absolute text-white fs-4 segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                            </div>
                            <div class="admin_grid-item">
                            <lottie-player src="https://lottie.host/1d5241c3-2472-4564-a8ef-95a7f70daf2f/d0dTQ3Jiur.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal"></lottie-player>
                                <span class="position-absolute text-white fs-4 segoeui-bold top-0 start-0 m-3">Total Engagements</span>
                                <span class="position-absolute text-white fs-4 segoeui-bold bottom-0 end-0 m-3">1352</span>
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
</body>

</html>