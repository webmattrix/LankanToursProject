<?php

// session_start();
if (isset($_SESSION["lt_admin"])) {
    $admin = $_SESSION["lt_admin"];

    // require "assets/model/sqlConnection.php";
    $employee_rs = Database::search("SELECT *,`employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`
    FROM `employee`
    INNER JOIN `admin` ON `employee`.`id`=`admin`.`employee_id`
    INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` WHERE `employee`.`id`='" . $admin["employee_id"] . "'");
    $employee_data = $employee_rs->fetch_assoc();
} else {
    $admin = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="d-flex justify-content-between align-items-center w-100 px-3 py-2 border-bottom bg-white" style="height: fit-content;">

        <div class="d-flex align-items-center gap-2" id="adminHomeBtn" style="cursor: pointer;">
            <iconify-icon icon="solar:home-bold" class="fs-5 page-icon"></iconify-icon>
            <span class="page-name quicksand-SemiBold fs-5">Dashboard</span>
        </div>
        <iconify-icon icon="line-md:menu" class="d-block d-lg-none fs-5 text-dark" style="cursor: pointer;" id="viewMobileMenu"></iconify-icon>
        <div class="align-items-center d-none d-lg-flex">
            <div class="border-end border-1 px-3 fs-5 d-flex gap-3">
                <iconify-icon icon="mdi:bell-outline"></iconify-icon>
                <iconify-icon icon="material-symbols:mail-outline"></iconify-icon>
            </div>
            <div class="d-flex px-2 gap-2 align-items-center position-relative" style="cursor: pointer;">
                <div class="bg-secondary bg-opacity-25" style="width: 30px; height: 30px; clip-path: circle();">
                    <img src="<?php
                                if (empty($employee_data["profile_picture"])) {
                                    echo ("../assets/img/profile/empty_profile.jpg");
                                } else {
                                    echo ("../assets/img/profile/admin/" . $employee_data["profile_picture"]);
                                }
                                ?>" alt="" style="object-fit: cover; width: 100%; height: 100%;">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <span style="font-size: 12px; font-family: sans-serif; font-weight: bold; border-bottom: 1px solid #888888;"><?php echo ($employee_data["emp_name"]); ?></span>
                    <span style="font-size: 12px; font-family: sans-serif;"><?php echo ($employee_data["emp_type"]); ?></span>
                </div>
                <div class="profile-menu-icon d-flex justify-content-center align-items-center p-1 rounded" onclick="viewProfileModel();">
                    <iconify-icon icon="mingcute:down-fill"></iconify-icon>
                </div>


                <div class="guide-profile-model d-flex flex-column align-items-center d-none" id="headerProfileModel">
                    <img src="<?php
                                if (empty($employee_data["profile_picture"])) {
                                    echo ("../assets/img/profile/empty_profile.jpg");
                                } else {
                                    echo ("../assets/img/profile/admin/" . $employee_data["profile_picture"]);
                                }
                                ?>">

                    <div class="w-100 mt-3 d-flex align-items-center gap-2 px-3 py-1 rounded" onclick="viewAdminProfile();">
                        <iconify-icon icon="iconamoon:profile-thin"></iconify-icon>
                        <span>Profile</span>
                    </div>
                    <div class="w-100 mt-1 d-flex align-items-center gap-2 px-3 py-1 rounded" onclick="adminLogOut();">
                        <iconify-icon icon="clarity:logout-line"></iconify-icon>
                        <span>Log Out</span>
                    </div>

                </div>


            </div>
        </div>
    </div>



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
                <div class="d-flex gap-3 align-items-center" onclick="openAdminDashboard();">
                    <iconify-icon icon="ic:round-dashboard" class="fs-4"></iconify-icon>
                    <div class="">Dashboard</div>
                </div>
                <div class="d-flex gap-3 align-items-center" onclick="openManageAdmin();">
                    <iconify-icon icon="ic:baseline-admin-panel-settings" class="fs-4"></iconify-icon>
                    <div class="">Admin</div>
                </div>
                <div class="d-flex gap-3 align-items-center" onclick="openManageGuide();">
                    <iconify-icon icon="dashicons:admin-users" class="fs-4"></iconify-icon>
                    <div class="">Guide</div>
                </div>
                <div class="d-flex gap-3 align-items-center" onclick="openManageTourist();">
                    <iconify-icon icon="fa-solid:hiking" class="fs-4"></iconify-icon>
                    <div class="">Tourist</div>
                </div>
                <div class="d-flex gap-3 align-items-center" onclick="openManageTour();">
                    <iconify-icon icon="material-symbols:travel" class="fs-4"></iconify-icon>
                    <div class="">Tour Plan</div>
                </div>
                <div class="d-flex gap-3 align-items-center" onclick="openManageOrders();">
                    <iconify-icon icon="mingcute:mail-send-fill" class="fs-4"></iconify-icon>
                    <div class="">Orders</div>
                </div>
                <div class="d-flex gap-3 align-items-center pb-5 disabled">
                    <iconify-icon icon="icon-park-solid:setting-two" class="fs-4"></iconify-icon>
                    <div class="">Setting</div>
                </div>
            </div>
        </div>
    </div>



    <script src="../js/adminTemplate.js"></script>
</body>

</html>