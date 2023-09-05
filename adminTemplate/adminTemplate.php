<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./adminTemplate.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="overflow-hidden">

    <div class="container-fluid ps-0 overflow-auto">
        <div class="d-flex">

            <!-- Side Menu -->
            <div class="side_menu w-auto" id="sideMenu">
                <div class="arrow_cotnainer" onclick="sideMenuMover();">
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
                        <div class="listItem" data-value="dashboardSubContent" statusNumber="0" id="dashboard" onclick="viewSubMenu('dashboard');">
                            <span>Dashboard</span>
                            <iconify-icon icon="mingcute:right-fill" id="dashboardIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="dashboardSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                        <!--  -->
                        <div class="listItem" data-value="adminSubContent" statusNumber="0" id="admin" onclick="viewSubMenu('admin');">
                            <span>Admin</span>
                            <iconify-icon icon="mingcute:right-fill" id="adminIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="adminSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                        <!--  -->
                        <div class="listItem" data-value="guideSubContent" statusNumber="0" id="guide" onclick="viewSubMenu('guide');">
                            <span>Guide</span>
                            <iconify-icon icon="mingcute:right-fill" id="guideIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="guideSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                        <!--  -->
                        <div class="listItem" data-value="touristSubContent" statusNumber="0" id="tourist" onclick="viewSubMenu('tourist');">
                            <span>Tourist</span>
                            <iconify-icon icon="mingcute:right-fill" id="touristIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="touristSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                        <!--  -->
                        <div class="listItem" data-value="tourPlanSubContent" statusNumber="0" id="tourPlan" onclick="viewSubMenu('tourPlan');">
                            <span>Tour Plan</span>
                            <iconify-icon icon="mingcute:right-fill" id="tourPlanIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="tourPlanSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                        <!--  -->
                        <div class="listItem" data-value="ordersSubContent" statusNumber="0" id="order" onclick="viewSubMenu('order');">
                            <span>Orders</span>
                            <iconify-icon icon="mingcute:right-fill" id="orderIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="ordersSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                        <!--  -->
                        <div class="listItem" data-value="pagesdSubContent" statusNumber="0" id="pages" onclick="viewSubMenu('pages');">
                            <span>Pages</span>
                            <iconify-icon icon="mingcute:right-fill" id="pagesIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="pagesdSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                        <!--  -->
                        <div class="listItem" data-value="settingSubContent" statusNumber="0" id="setting" onclick="viewSubMenu('setting');">
                            <span>Setting</span>
                            <iconify-icon icon="mingcute:right-fill" id="settingIcon"></iconify-icon>
                        </div>
                        <div class="SubContent ps-3" id="settingSubContent">
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                            <div>Lorem, ipsum dolor.</div>
                        </div>

                    </div>

                </div>

                <div class="mobileMode d-none" id="mobileMode">
                    <div class="site_details">
                        <div class="siteLogo"></div>
                    </div>
                    <hr style="margin-top: 100px;">

                    <div class="d-flex flex-column align-items-center row-gap-5 fs-3 icon-list">
                        <iconify-icon icon="ic:round-dashboard"></iconify-icon>
                        <iconify-icon icon="ic:baseline-admin-panel-settings"></iconify-icon>
                        <iconify-icon icon="dashicons:admin-users"></iconify-icon>
                        <iconify-icon icon="fa-solid:hiking"></iconify-icon>
                        <iconify-icon icon="material-symbols:travel"></iconify-icon>
                        <iconify-icon icon="mingcute:mail-send-fill"></iconify-icon>
                        <iconify-icon icon="el:inbox"></iconify-icon>
                        <iconify-icon icon="dashicons:text-page"></iconify-icon>
                        <iconify-icon icon="icon-park-solid:setting-two"></iconify-icon>
                    </div>
                </div>

            </div>
            <!-- Side Menu -->

            <div class="d-flex flex-column w-100 px-5">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center w-100 py-2 border-bottom" style="height: fit-content;">

                    <div class="">Dashboard</div>
                    <div class="d-flex align-items-center">
                        <div class="border-end border-1 border-secondary border-opacity-25 px-3 fs-5">
                            <iconify-icon icon="mdi:bell-outline"></iconify-icon>
                            <iconify-icon icon="material-symbols:mail-outline"></iconify-icon>
                        </div>
                        <div class="d-flex px-2 gap-2 align-items-center" style="cursor: pointer;">
                            <div class="bg-secondary bg-opacity-25" style="width: 30px; height: 30px; clip-path: circle();"></div>
                            <div class="d-flex flex-column justify-content-center">
                                <span style="font-size: 12px; font-family: sans-serif; font-weight: bold; border-bottom: 1px solid #888888;">Vihanga Heshan</span>
                                <span style="font-size: 12px; font-family: sans-serif;">Super Admin</span>
                            </div>
                            <div class="">
                                <iconify-icon icon="mingcute:down-fill"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header -->



                <!-- Page Content -->

                <!-- Page Content -->

            </div>

        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="adminTemplate.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>