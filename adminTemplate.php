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
                        <iconify-icon icon="dashicons:text-page"></iconify-icon>
                        <iconify-icon icon="icon-park-solid:setting-two"></iconify-icon>
                    </div>
                </div>

            </div>
            <!-- Side Menu -->

            <!-- Mobile Side Bar Model -->
            <div class="position-fixed top-0 start-0 bg-dark bg-opacity-75 w-100 h-100 d-none d-lg-none" id="mobileSideBarModel">
                <div class="col-9 h-100 ms-auto px-2 pt-2 mobileMenu" id="mobileMenu" style="background-color: white;">
                    <div class="admin_mobile_menu_header rounded d-flex justify-content-between align-items-center px-2">
                        <div class="fs-4 d-flex gap-2">
                            <iconify-icon icon="ph:bell"></iconify-icon>
                            <iconify-icon icon="ic:outline-mail"></iconify-icon>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="" style="width: 35px; height: 35px; clip-path: circle(); background-color: gray;"></div>
                            <div class="d-flex flex-column quicksand-semibold">
                                <span class="">Admin Name</span>
                                <span class="">Type</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 mt-5 d-flex flex-column align-items-center">
                        <div class="" style="width: 100px; height: 100px; clip-path: circle(); background-color: gray;"></div>
                        <span class="lemon mt-2 fs-4">Lankan Tours</span>
                    </div>
                    <hr>
                    <div class="d-flex flex-column gap-5 quicksand-semibold ps-3 pt-3 mobileMenuIconList">
                        <div class="d-flex gap-3 align-items-center">
                            <iconify-icon icon="ic:round-dashboard" class="fs-4"></iconify-icon>
                            <div class="">Dashboard</div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <iconify-icon icon="ic:baseline-admin-panel-settings" class="fs-4"></iconify-icon>
                            <div class="">Admin</div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <iconify-icon icon="dashicons:admin-users" class="fs-4"></iconify-icon>
                            <div class="">Guide</div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <iconify-icon icon="fa-solid:hiking" class="fs-4"></iconify-icon>
                            <div class="">Tourist</div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <iconify-icon icon="material-symbols:travel" class="fs-4"></iconify-icon>
                            <div class="">Tour Plan</div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <iconify-icon icon="mingcute:mail-send-fill" class="fs-4"></iconify-icon>
                            <div class="">Orders</div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <iconify-icon icon="dashicons:text-page" class="fs-4"></iconify-icon>
                            <div class="">Pages</div>
                        </div>
                        <div class="d-flex gap-3 align-items-center pb-5">
                            <iconify-icon icon="icon-park-solid:setting-two" class="fs-4"></iconify-icon>
                            <div class="">Setting</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Side Bar Model -->

        