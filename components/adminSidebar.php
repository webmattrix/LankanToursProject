<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/adminTemplate.css"> -->
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
</head>

<body>

    <div class="side_menu sideMenu-enable w-auto bg-white" id="sideMenu">
        <div class="arrow_cotnainer d-none d-xl-flex" onclick="sideMenuMover();">
            <iconify-icon icon="icon-park-outline:double-left" id="adminPanelSideBarIcon"></iconify-icon>
        </div>
        <div class="desktopMode" id="desktopMode">

            <div class="site_details px-4" style="margin-top: 30px;">
                <div class="site_logo"></div>
                <div class="site_name">Lankan Tours</div>
            </div>

            <hr style="margin-top: 10px;">

            <div class="sideMenuList">

                <!--  -->
                <!-- <div class="listItem" data-value="dashboardSubContent" statusNumber="0" id="dashboard" onclick="viewSubMenu('dashboard');"> -->
                <div class="listItem" data-value="dashboardSubContent" statusNumber="0" id="dashboard" onclick="openAdminDashboard();">
                    <span>Dashboard</span>
                    <iconify-icon icon="mingcute:right-fill" id="dashboardIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="dashboardSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <!-- <div class="listItem" data-value="adminSubContent" statusNumber="0" id="admin" onclick="viewSubMenu('admin');"> -->
                <div class="listItem" data-value="adminSubContent" statusNumber="0" id="admin" onclick="openManageAdmin();">
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
                <div class="listItem" data-value="guideSubContent" statusNumber="0" id="guide" onclick="openManageGuide();">
                    <span>Guide</span>
                    <iconify-icon icon="mingcute:right-fill" id="guideIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="guideSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <!-- <div class="listItem" data-value="touristSubContent" statusNumber="0" id="tourist" onclick="viewSubMenu('tourist');"> -->
                <div class="listItem" data-value="touristSubContent" statusNumber="0" id="tourist" onclick="openManageTourist();">
                    <span>Tourist</span>
                    <iconify-icon icon="mingcute:right-fill" id="touristIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="touristSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <div class="listItem" data-value="tourPlanSubContent" statusNumber="0" id="tourPlan" onclick="viewSubMenu('tourPlan');">
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
                                        ?>" data-value="ordersSubContent" statusNumber="0" id="order" onclick="openManageOrders();">
                    <span>Orders</span>
                    <iconify-icon icon="mingcute:right-fill" id="orderIcon"></iconify-icon>
                </div>
                <!-- <div class="SubContent ps-3" id="ordersSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div> -->

                <!--  -->
                <div class="listItem" data-value="pagesdSubContent" statusNumber="0" id="pages" onclick="viewSubMenu('pages');">
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
                <div class="listItem opacity-50" style="cursor: default;" data-value="settingSubContent" statusNumber="0" id="setting">
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
                <iconify-icon icon="ic:round-dashboard" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Dashboard"></iconify-icon>
                <iconify-icon icon="ic:baseline-admin-panel-settings" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Admin"></iconify-icon>
                <iconify-icon icon="dashicons:admin-users" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Guide"></iconify-icon>
                <iconify-icon icon="fa-solid:hiking" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Tourist"></iconify-icon>
                <iconify-icon icon="material-symbols:travel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Tour Plans"></iconify-icon>
                <iconify-icon icon="mingcute:mail-send-fill" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Orders"></iconify-icon>
                <iconify-icon icon="dashicons:text-page" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Pages"></iconify-icon>
                <iconify-icon icon="icon-park-solid:setting-two" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Setting" class="opacity-50"></iconify-icon>
            </div>
        </div>

    </div>

    <script src="../js/adminTemplate.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>