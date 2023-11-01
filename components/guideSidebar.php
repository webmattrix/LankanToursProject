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
                <div class="site_logo">
                    <img src="../assets/img/favicon.png" alt="" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <div class="site_name">Lankan Tours</div>
            </div>

            <hr style="margin-top: 10px;">

            <div class="sideMenuList">

                <!--  -->
                <!-- <div class="listItem" data-value="dashboardSubContent" statusNumber="0" id="dashboard" onclick="viewSubMenu('dashboard');"> -->
                <div class="listItem" data-value="dashboardSubContent" statusNumber="0" id="dashboard" onclick="viewGuideHome();">
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
                <div class="listItem" data-value="adminSubContent" statusNumber="0" id="admin" onclick="viewTours();">
                    <span>Tours</span>
                    <iconify-icon icon="mingcute:right-fill" id="adminIcon"></iconify-icon>
                </div>
                <div class="SubContent ps-3" id="adminSubContent">
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                    <div>Lorem, ipsum dolor.</div>
                </div>

                <!--  -->
                <!-- <div class="listItem" data-value="guideSubContent" statusNumber="0" id="guide" onclick="viewSubMenu('guide');">
                    <span>Gallery</span>
                    <iconify-icon icon="mingcute:right-fill" id="guideIcon"></iconify-icon>
                </div>
                <div class="SubContent ps-3" id="guideSubContent">
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
                <iconify-icon icon="ic:round-dashboard"></iconify-icon>
                <iconify-icon icon="mdi:flight"></iconify-icon>
                <iconify-icon icon="solar:gallery-bold"></iconify-icon>
            </div>
        </div>

    </div>

    <script src="../js/adminTemplate.js"></script>
</body>

</html>