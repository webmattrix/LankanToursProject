<?php 
require "./assets/model/passwordGenerator.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/adminTemplate.css"> -->
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <link rel="stylesheet" href="../css/font.css">
</head>

<body>

    <div class="side_menu sideMenu-enable w-auto bg-white" id="sideMenu">
        <div class="arrow_cotnainer d-none d-xl-flex" onclick="sideMenuMover();">
            <iconify-icon icon="icon-park-outline:double-left" id="adminPanelSideBarIcon"></iconify-icon>
        </div>
        <div class="desktopMode" id="desktopMode">

            <div class="site_details px-4" style="margin-top: 30px;">
                <div class="site_logo"></div>
                <div class="site_name">Lankan Travel</div>
            </div>

            <hr style="margin-top: 10px;">

            <div class="sideMenuList">

                <!--  -->
                <!-- <div class="listItem" data-value="dashboardSubContent" statusNumber="0" id="dashboard" onclick="viewSubMenu('dashboard');"> -->
                <div class="listItem" data-value="dashboardSubContent" statusNumber="0" id="dashboard"
                    onclick="openAdminDashboard();">
                    <span>Dashboard</span>
                    <iconify-icon icon="mingcute:right-fill" id="dashboardIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="dashboardSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <?php

                    if($_SESSION["lt_admin"])
                
                ?>
                <!-- <div class="listItem" data-value="adminSubContent" statusNumber="0" id="admin" onclick="viewSubMenu('admin');"> -->
                <div class="listItem" data-value="adminSubContent" statusNumber="0" id="admin"
                    onclick="openManageAdmin();">
                    <span>Admin</span>
                    <iconify-icon icon="mingcute:right-fill" id="adminIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="adminSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <!-- <div class="listItem" data-value="guideSubContent" statusNumber="0" id="guide" onclick="viewSubMenu('guide');"> -->
                <div class="listItem" data-value="guideSubContent" statusNumber="0" id="guide"
                    onclick="viewSubMenu('guide');">
                    <span>Guide</span>
                    <iconify-icon icon="mingcute:right-fill" id="guideIcon"></iconify-icon>
                </div>
                <div class="SubContent ps-3" id="guideSubContent">
                    <div onclick="openManageGuide();" class="c-pointer">Manage Guide</div>
                    <div onclick="guideRegistrationModelToggle();" class="c-pointer">Register Guide</div>
                </div>

                <!--  -->
                <!-- <div class="listItem" data-value="touristSubContent" statusNumber="0" id="tourist" onclick="viewSubMenu('tourist');"> -->
                <div class="listItem" data-value="touristSubContent" statusNumber="0" id="tourist"
                    onclick="openManageTourist();">
                    <span>Tourist</span>
                    <iconify-icon icon="mingcute:right-fill" id="touristIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="touristSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <div class="listItem" data-value="tourPlanSubContent" statusNumber="0" id="tourPlan"
                    onclick="viewSubMenu('tourPlan');">
                    <span>Tour Plan</span>
                    <iconify-icon icon="mingcute:right-fill" id="tourPlanIcon"></iconify-icon>
                </div>
                <div class="SubContent ps-3" id="tourPlanSubContent">
                    <div class="c-pointer" onclick="openManageTour();">Manage Tour Plans</div>
                    <div class="c-pointer" onclick="openNewTour();">Add New Tour Plan</div>
                </div>

                <?php

                $order_table = Database::search("SELECT * FROM `order`
                INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id`
                WHERE `order_status`.`name` = 'Unassigned'
                ORDER BY `order`.`id` ASC");
                $order_table_rows = $order_table->num_rows;

                $custom_order_table = Database::search("SELECT * FROM `custom_tour`
                INNER JOIN `order_status` ON `order_status`.`id`=`custom_tour`.`order_status_id`
                WHERE `order_status`.`name`='Unassigned'
                ORDER BY `custom_tour`.`id` ASC");
                $custom_order_table_rows = $custom_order_table->num_rows;

                $total_orders = $order_table_rows + $custom_order_table_rows;

                ?>

                <!--  -->
                <!-- <div class="listItem" data-value="ordersSubContent" statusNumber="0" id="order" onclick="viewSubMenu('order');"> -->
                <div class="listItem <?php
                if ($total_orders > 0) {
                    echo ("bg-warning bg-opacity-25");
                }
                ?>" data-value="ordersSubContent" statusNumber="0" id="order"
                    onclick="openManageOrders();">
                    <span>Orders</span>
                    <iconify-icon icon="mingcute:right-fill" id="orderIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="ordersSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <div class="listItem" data-value="pagesdSubContent" statusNumber="0" id="pages"
                    onclick="viewSubMenu('pages');">
                    <span>Pages</span>
                    <iconify-icon icon="mingcute:right-fill" id="pagesIcon"></iconify-icon>
                </div>
                <div class="SubContent ps-3" id="pagesdSubContent">
                    <div class="c-pointer" onclick="openTouristHome();">Home</div>
                    <div class="c-pointer" onclick="openTouristTours();">Tours</div>
                    <div class="c-pointer" onclick="openTouristGallery();">Gallery</div>
                    <div class="c-pointer" onclick="openTouristContact();">Contact</div>
                    <div class="c-pointer" onclick="openTouristLogin();">Login</div>
                    <div class="c-pointer" onclick="openTouristRegistration();">Registration</div>
                </div>

                <!--  -->
                <!-- <div class="listItem" data-value="settingSubContent" statusNumber="0" id="setting" onclick="viewSubMenu('setting');"> -->
                <div class="listItem opacity-50" style="cursor: default;" data-value="settingSubContent"
                    statusNumber="0" id="setting">
                    <span>Setting</span>
                    <iconify-icon icon="mingcute:right-fill" id="settingIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="settingSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

            </div>

        </div>

        <div class="mobileMode d-block d-lg-block d-none d-xl-none" id="mobileMode">
            <div class="site_details">
                <div class="siteLogo"></div>
            </div>
            <hr style="margin-top: 100px;">

            <div class="d-flex flex-column gap-5 fs-3 icon-list">
                <iconify-icon icon="ic:round-dashboard" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Dashboard"
                    onclick="openAdminDashboard();"></iconify-icon>
                <iconify-icon icon="ic:baseline-admin-panel-settings" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Admin"
                    onclick="openManageAdmin();"></iconify-icon>
                <iconify-icon icon="dashicons:admin-users" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Guide"
                    onclick="openManageGuide();"></iconify-icon>
                <iconify-icon icon="fa-solid:hiking" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Tourist"
                    onclick="openManageTourist();"></iconify-icon>
                <iconify-icon icon="material-symbols:travel" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Tour Plans"
                    onclick="openManageTour();"></iconify-icon>
                <iconify-icon icon="mingcute:mail-send-fill" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Orders"
                    onclick="openManageOrders();"></iconify-icon>
                <iconify-icon icon="dashicons:text-page" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Pages"></iconify-icon>
                <iconify-icon icon="icon-park-solid:setting-two" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Setting" class="opacity-50"></iconify-icon>
            </div>
        </div>

    </div>


    <div class="position-fixed top-0 start-0 vh-100 vw-100 bg-black bg-opacity-50 d-flex justify-content-center align-items-center d-none"
        style="z-index: 1;" id="guideRegistrationModel">
        <div class="guideRegistrationModel position-relative">
            <dotlottie-player src="../assets/animations/Registration_Animation.json" background="transparent" speed="1"
                style="width: 100%; height: 100%; z-index: -1;" direction="1" mode="normal" loop autoplay
                class="position-absolute bg-white rounded"></dotlottie-player>
            <div
                class="text-center px-4 py-2 quicksand-SemiBold fs-5 d-flex align-items-center justify-content-center position-relative">
                <span>Guide Registration</span>
                <iconify-icon icon="ic:round-close" class="position-absolute end-0 me-2 c-pointer"
                    onclick="guideRegistrationModelToggle();"></iconify-icon>
            </div>
            <hr class="m-0">
            <?php 
            $d = new DateTime();
            $tzone = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tzone);
            $date = $d->format("Y-m-d ");

            $password = generatePassword(6);
            ?>
            <div class="py-2 d-flex flex-column gap-3">
                <div class="d-flex flex-column px-2">
                    <label for="" class="quicksand-SemiBold">Name</label>
                    <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary"
                        id="G_Name">
                </div>
                <div class="d-flex px-2 gap-2">
                    <div class="w-50">
                        <label for="" class="quicksand-SemiBold">Date of Birth</label>
                        <input type="date" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary"
                            id="G_Dob">
                    </div>
                    <div class="w-50">
                        <label for="" class="quicksand-SemiBold">Registration Date</label>
                        <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary" value="<?php echo($date)?> " id="G_rDate">
                    </div>
                </div>
                <div class="d-flex px-2 gap-2">
                    <div class="w-50">
                        <label for="" class="quicksand-SemiBold">Mobile</label>
                        <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary"
                            id="G_Mobile">
                    </div>
                    <div class="w-50">
                        <label for="" class="quicksand-SemiBold">NIC</label>
                        <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary"
                            id="G_Nic">
                    </div>
                </div>
                <hr class="m-0">
                <div class="d-flex flex-column px-2">
                    <label for="" class="quicksand-SemiBold">Email</label>
                    <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary"
                        id="G_Email">
                </div>
                <div class="d-flex flex-column px-2">
                    <label for="" class="quicksand-SemiBold">Password</label>
                    <?php  $password = generatePassword(6);?>
                    <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary" id="G_Password" value="<?php echo($password)?>">
                </div>
                <hr class="m-0">
                <div class="d-flex px-2 gap-2">
                    <div class="w-25">
                        <label for="" class="quicksand-SemiBold">City</label>
                        <!-- <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75"> -->
                        <select class="px-2 py-1 form-control bg-white bg-opacity-75 text-dark border border-primary"
                            id="G_City">
                            <option value="0">Select</option>

                            <?php
                            $rs = Database::search("SELECT * FROM `city`");
                            $n = $rs->num_rows;
                            ?>
                            <?php
                            for ($x = 0; $x < $n; $x++) {
                                $d = $rs->fetch_assoc();
                                ?>
                                <option value="<?php echo $d["id"]; ?>">
                                    <?php echo $d["name"]; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="w-75">
                        <label for="" class="quicksand-SemiBold">Address</label>
                        <input type="text" class="px-2 py-1 form-control bg-white bg-opacity-75 border border-primary"
                            id="G_Address">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary px-5" onclick="GuideRegister();">Register</button>
                </div>

            </div>
        </div>
    </div>

    <script src="../js/adminTemplate.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>