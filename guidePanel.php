<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/adminPanel.css">
    <link rel="stylesheet" href="../css/guidePanel.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/scrolbar.css">
</head>

<body style="background-color: #EAEAEA;" onload="chartResize();">

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/guideSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto; min-height: 100vh;">
                    <?php
                    include "./components/guideHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div class="col-12 px-3 pt-2 pb-3">
                        <div class="row">

                            <div class="admin_header-grid">
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/overall_income.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal" disableCheck="false"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Tours</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/income.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal" disableCheck="false"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Overall Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/profile_card.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal" disableCheck="false"></lottie-player>
                                    <div class="content p-3">
                                        <img src="../assets/img/girl_profile_picture.jpg" alt="" class="admin_panel-profile-image">
                                        <div class="admin-name">
                                            <span class="name segoeui-bold">John Luther</span>
                                            <span class="type quicksand-SemiBold">Owner</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/cancel_animation.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal" disableCheck="false"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Canceled Tours</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">08</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/income.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal" disableCheck="false"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Yearly Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/overall_outgoing.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal" disableCheck="false"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Monthly Income</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">$120'000</span>
                                </div>
                                <div class="admin_grid-item">
                                    <lottie-player src="../assets/animations/Ranking_animation.json" background="transparent" speed="1" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; opacity: 0.5;" loop autoplay direction="1" mode="normal" disableCheck="false"></lottie-player>
                                    <span class="position-absolute text-white segoeui-bold top-0 start-0 m-3">Ranking</span>
                                    <span class="position-absolute text-white segoeui-bold bottom-0 end-0 m-3">02</span>
                                </div>
                            </div>

                            <hr>

                            <div class="admin_body-container">
                                <div class="guide_body-grid">
                                    <div class="">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="quicksand-Bold" style="min-width: max-content;">Assign Tours</span>
                                            <hr style="width: 100%;">
                                        </div>
                                        <div class="guide_assign-tour-box px-2">
                                            <?php
                                            for ($x = 0; $x < 8; $x++) {
                                            ?>
                                                <div class="msg-box px-2 quicksand-Medium">
                                                    <div class="border-bottom d-flex justify-content-between">
                                                        <span>Tour Plan Name</span>
                                                        <span style="color: #797979; font-size: 14px;">2023-05-05</span>
                                                    </div>
                                                    <div class="mt-1" style="font-size: 15px;">
                                                        <span class="tour-details-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, asperiores! Esse autem laboriosam aperiam blanditiis numquam dicta ab officiis asperiores!</span>
                                                        <a href="#">View more...</a>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="quicksand-Bold">Rating</span>
                                            <hr style="width: 100%;">
                                        </div>
                                        <div class="w-100 px-2 quicksand-Medium">
                                            <div class="">
                                                <span>4.2/5</span>
                                                <iconify-icon icon="material-symbols:star"></iconify-icon>
                                            </div>
                                            <div class="d-flex justify-content-between gap-1 mt-4">
                                                <div class="w-100 d-flex flex-column gap-2">
                                                    <div class="d-flex gap-2  mt-3">
                                                        <span style="width: 70px;">5 Star</span>
                                                        <div class="d-flex gap-1">
                                                            <iconify-icon icon="material-symbols:star" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <span style="width: 70px;">4 Star</span>
                                                        <div class="d-flex gap-1">
                                                            <iconify-icon icon="material-symbols:star" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <span style="width: 70px;">3 Star</span>
                                                        <div class="d-flex gap-1">
                                                            <iconify-icon icon="material-symbols:star" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <span style="width: 70px;">2 Star</span>
                                                        <div class="d-flex gap-1">
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <span style="width: 70px;">1 Star</span>
                                                        <div class="d-flex gap-1">
                                                            <iconify-icon icon="material-symbols:star-outline" class=""></iconify-icon>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 h-100">
                                                    <div class="p-1" style="max-height: 95%;">
                                                        <canvas id="myChart" class="w-100 h-auto"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="quicksand-Bold" style="min-width: max-content;">Customer Feedback</span>
                                            <hr style="width: 100%;">
                                        </div>
                                        <div class="guide_customer-feedback-grid p-2">
                                            <?php
                                            for ($x = 0; $x < 5; $x++) {
                                            ?>
                                                <div class="customer-feedback p-1">
                                                    <div class="d-flex justify-content-between flex-column flex-md-row">
                                                        <span class="d-block quicksand-Bold">Tour plan Name Lorem, ipsum.</span>
                                                        <span class="d-block d-flex align-items-center gap-2">
                                                            <iconify-icon icon="octicon:dot-fill-24" class="text-success"></iconify-icon>
                                                            <span class="text-success">Positive</span>
                                                        </span>
                                                    </div>
                                                    <div class="mt-2 quicksand-Bold" style="line-height: 1.2rem;">
                                                        <span class="fs-3">"</span>
                                                        <span class="feedback-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam ipsa error nam repellat magni aliquam iste officiis adipisci perspiciatis earum? Recusandae doloremque quam facere itaque ad accusamus, architecto sapiente tempora.</span>
                                                        <span class="fs-3">"</span>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <span class="ms-auto text-black-50 quicksand-SemiBold">2023-06-06</span>
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
    <script src="./js/guidePanel_chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script>
        const ctx = document.getElementById("myChart");

        new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Rated Tours", "Non-Rated Tours"],
                datasets: [{
                    label: "100 of Votes",
                    data: [65, 35],
                    borderWidth: 1,
                    backgroundColor: ["#F24B4B", "#B7B7B7"],
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        display: false,
                    },
                },
            },
        });
    </script>

</body>

</html>