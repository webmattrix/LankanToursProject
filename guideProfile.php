<?php

session_start();
if (!isset($_SESSION["lt_guide"]) || $_SESSION["lt_guide"] == null) {
    header("Location: ../guide");
} else {

    require "assets/model/sqlConnection.php";
    require "assets/model/timeZoneConverter.php";

    $guide = $_SESSION["lt_guide"];

    $employee_rs = Database::search("SELECT *,`employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`, `employee`.`id` AS `emp_id`
    FROM `employee`
    INNER JOIN `guide` ON `employee`.`id`=`guide`.`employee_id`
    INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` WHERE `employee`.`id`='" . $guide["employee_id"] . "'");
    $employee_data = $employee_rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guide Profile</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/adminTemplate.css">
        <link rel="stylesheet" href="../css/font.css">
        <link rel="stylesheet" href="../css/adminProfile.css">
        <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    </head>

    <body style="background-color: #EAEAEA;">

        <div class="container-fluid">
            <div class="row">

                <div class="d-flex p-0">
                    <?php
                    include "./components/guideSidebar.php"; // change if you using other component like "guideSidebar.php"
                    ?>

                    <div class="d-flex w-100 flex-column" style="max-height: 100vh; min-height: 100vh; overflow-y: auto;">
                        <?php
                        include "./components/guideHeader.php"; // change if you using other component like "guideHeader.php"
                        ?>

                        <!-- Page Content / body content eka methanin liyanna -->
                        <div class="col-12 px-3 pt-2 pb-3">
                            <div class="row p-1 p-lg-3">

                                <div class="rounded py-2" style="background-color: white;">
                                    <span class="quicksand-SemiBold">Profile</span>

                                    <!-- Profile Image -->
                                    <div class="d-flex gap-3 pt-3 admin-profile">
                                        <img src="<?php
                                                    if (empty($employee_data["profile_picture"])) {
                                                        echo ("../assets/img/profile/empty_profile.jpg");
                                                    } else {
                                                        echo ("../assets/img/profile/guide/" . $employee_data["profile_picture"]);
                                                    }
                                                    ?>" alt="" style="height: 150px; width: 150px; object-fit: cover; border-radius: 4px;" />
                                        <div class="d-flex flex-column quicksand-SemiBold">
                                            <span class="fs-5"><?php echo ($employee_data["emp_name"]); ?></span>
                                            <span class="text-black-50"><?php echo ($employee_data["email"]); ?></span>
                                            <span class="text-black-50"><?php echo ($employee_data["mobile"]); ?></span>
                                        </div>
                                    </div>
                                    <!-- Profile Image -->

                                    <div class="profile-panel mt-4 rounded">
                                        <div class="header">
                                            <div class="active" id="slide1Icon" onclick="guideProfileSlider(0);">
                                                <iconify-icon icon="ph:note" class="text-white" id="detailIcon"></iconify-icon>
                                            </div>
                                            <div class="" id="slide2Icon" onclick="guideProfileSlider(1);">
                                                <iconify-icon icon="uil:setting" class="text-white" id="settingIcon"></iconify-icon>
                                            </div>
                                            <div class="" id="slide3Icon" onclick="guideProfileSlider(2);">
                                                <iconify-icon icon="mdi:internet" class="text-white" id="socialIcon"></iconify-icon>
                                            </div>
                                        </div>

                                        <div class="d-flex overflow-hidden">

                                            <!-- Detail Slide -->
                                            <div class="body p-2" style="min-width: 100%;" id="profileSliderAnchor">
                                                <div class="quicksand-SemiBold">
                                                    <h3 class="segoeui-bold">Tour Guide</h3>
                                                    <div class="d-flex">
                                                        <span>Name</span>
                                                        <span>: &nbsp; <?php echo ($employee_data["emp_name"]); ?></span>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <span>Email</span>
                                                        <span>: &nbsp; <?php echo ($employee_data["email"]); ?></span>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <span>Mobile</span>
                                                        <span>: &nbsp; <?php echo ($employee_data["mobile"]); ?></span>
                                                    </div>

                                                    <hr class="w-75">

                                                    <div class="d-flex mt-2">
                                                        <span>Address</span>
                                                        <span>: &nbsp; <?php
                                                                        if (empty($employee_data["address"])) {
                                                                            echo ("...");
                                                                        } else {
                                                                            echo ($employee_data["address"]);
                                                                        }
                                                                        ?></span>
                                                    </div>
                                                    <!-- <div class="d-flex mt-2">
                                                        <span>Work Time</span>
                                                        <span>: &nbsp; coming soon...</span>
                                                    </div> -->
                                                    <div class="d-flex mt-2">
                                                        <span>Registered Date</span>
                                                        <span>: &nbsp; <?php echo (date("d M, Y", strtotime(timeConverter::convert($employee_data["reg_date"])))); ?></span>
                                                    </div>
                                                    <!-- <div class="d-flex mt-2">
                                                        <span>Gender</span>
                                                        <span>: &nbsp; ...</span>
                                                    </div> -->

                                                    <hr class="w-75">

                                                    <div class="d-flex mt-4">
                                                        <span style="width: 200px;">Notification</span>
                                                        <div class="switch-notification position-relative" id="notificationSwitch" data-switch_status="ON" onclick="notificationSwitch();">
                                                            <div class="switch-thumb left" id="notificationThumb"></div>
                                                        </div>
                                                    </div>
                                                    <span class="text-black-50" style="font-size: 12px;">Email notification and push notifications will be enabled/disabled</span>
                                                </div>
                                            </div>
                                            <!-- Detail Slide -->

                                            <!-- Setting Slide -->
                                            <div class="body" style="min-width: 100%;">
                                                <div class="quicksand-SemiBold">

                                                    <div class="d-flex flex-column">
                                                        <span class="d-block w-100">Profile Picture</span>
                                                        <label for="adminProfilePicture" id="adminProfileViewImage" class="admin-profile-picture d-flex justify-content-center align-items-center" style="<?php
                                                                                                                                                                                                            if (empty($employee_data["profile_picture"])) {
                                                                                                                                                                                                                echo ("background-image: url('../assets/img/profile/empty_profile.jpg');");
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo ("background-image: url('../assets/img/profile/guide/" . $employee_data["profile_picture"] . "');");
                                                                                                                                                                                                            }
                                                                                                                                                                                                            ?>">
                                                            <iconify-icon icon="ph:camera-fill"></iconify-icon>
                                                        </label>
                                                        <input type="file" id="adminProfilePicture" class="d-none" onchange="changeImageUploader();" accept="image/*" />
                                                    </div>
                                                    <div class="d-flex mt-4 flex-column">
                                                        <span class="">Name</span>
                                                        <input type="text" class="form-control" id="guideName" value="<?php echo ($employee_data["emp_name"]); ?>">
                                                    </div>
                                                    <div class="d-flex mt-4 flex-column">
                                                        <span class="">Mobile</span>
                                                        <input type="text" class="form-control" id="guideMobile" value="<?php echo ($employee_data["mobile"]); ?>">
                                                    </div>
                                                    <div class="d-flex mt-4 flex-column">
                                                        <span class="">Address</span>
                                                        <input type="text" class="form-control" id="guideAddress" value="<?php echo ($employee_data["address"]); ?>">
                                                    </div>
                                                    <div class="d-flex mt-5 flex-column">
                                                        <div class="d-flex mt-3 flex-column">
                                                            <span>Email</span>
                                                            <input type="text" class="form-control" id="guideEmail" disabled="true" value="<?php echo ($employee_data["email"]); ?>">
                                                        </div>
                                                        <div class="d-flex mt-3 flex-column">
                                                            <span>Password</span>
                                                            <div class="position-relative">
                                                                <input type="password" id="guidePassword" placeholder="********" class="form-control pe-5">
                                                                <iconify-icon icon="el:eye-close" id="passwordEye" class="position-absolute end-0 me-2" style="top: 50%; transform: translateY(-50%); color: #4a4a4a; cursor: pointer;"></iconify-icon>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end gap-2 mt-2">
                                                        <button class="btn btn-success px-4" id="changeProfileBtn">Change</button>
                                                        <button class="btn btn-primary px-4">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Setting Slide -->

                                            <!-- Social Media Slide -->
                                            <div class="body p-2" style="min-width: 100%;">
                                                <div class="quicksand-SemiBold socialMediaContainer">
                                                    <div class="socialMediaHeader">
                                                        <div class="active" onclick="socialMediaSlider(0);" id="socialMedia0Icon">
                                                            <iconify-icon icon="uim:whatsapp" class="text-white"></iconify-icon>
                                                        </div>
                                                        <div class="" onclick="socialMediaSlider(1);" id="socialMedia1Icon">
                                                            <iconify-icon icon="uil:facebook" class="text-white"></iconify-icon>
                                                        </div>
                                                        <div class="" onclick="socialMediaSlider(2);" id="socialMedia2Icon">
                                                            <iconify-icon icon="mdi:linkedin" class="text-white"></iconify-icon>
                                                        </div>
                                                        <div class="" onclick="socialMediaSlider(3);" id="socialMedia3Icon">
                                                            <iconify-icon icon="ri:instagram-fill" class="text-white"></iconify-icon>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <!-- 1st Slide -->
                                                        <div class="" style="min-width: 100%;" id="socialMediaAnchor">
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>Patform</span>
                                                                    <input type="text" value="Whatsapp" disabled class="bg-transparent">
                                                                </div>
                                                                <div class="d-flex flex-column mt-4">
                                                                    <span>URL</span>
                                                                    <input type="text" class="bg-transparent" />
                                                                </div>
                                                            </div>
                                                            <div class="hr"></div>
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>New URL</span>
                                                                    <input type="text" name="" id="" class="bg-transparent" />
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end gap-2 mt-3 me-2">
                                                                <button class="btn btn-success px-4">Change</button>
                                                                <button class="btn btn-primary px-4">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- 1st Slide -->

                                                        <!-- 2nd Slide -->
                                                        <div class="" style="min-width: 100%;">
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>Patform</span>
                                                                    <input type="text" value="Facebook" disabled class="bg-transparent">
                                                                </div>
                                                                <div class="d-flex flex-column mt-4">
                                                                    <span>URL</span>
                                                                    <input type="text" class="bg-transparent" />
                                                                </div>
                                                            </div>
                                                            <div class="hr"></div>
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>New URL</span>
                                                                    <input type="text" name="" id="" class="bg-transparent">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end gap-2 mt-3 me-2">
                                                                <button class="btn btn-success px-4">Change</button>
                                                                <button class="btn btn-primary px-4">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- 2nd Slide -->

                                                        <!-- 3rd Slide -->
                                                        <div class="" style="min-width: 100%;">
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>Patform</span>
                                                                    <input type="text" value="Instagram" disabled class="bg-transparent">
                                                                </div>
                                                                <div class="d-flex flex-column mt-4">
                                                                    <span>URL</span>
                                                                    <input type="text" class="bg-transparent" />
                                                                </div>
                                                            </div>
                                                            <div class="hr"></div>
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>New URL</span>
                                                                    <input type="text" name="" id="" class="bg-transparent">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end gap-2 mt-3 me-2">
                                                                <button class="btn btn-success px-4">Change</button>
                                                                <button class="btn btn-primary px-4">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- 3rd Slide -->

                                                        <!-- 4th Slide -->
                                                        <div class="" style="min-width: 100%;">
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>Patform</span>
                                                                    <input type="text" value="Linked In" disabled class="bg-transparent">
                                                                </div>
                                                                <div class="d-flex flex-column mt-4">
                                                                    <span>URL</span>
                                                                    <input type="text" class="bg-transparent" />
                                                                </div>
                                                            </div>
                                                            <div class="hr"></div>
                                                            <div class="socialMediaBody">
                                                                <div class="d-flex flex-column">
                                                                    <span>New URL</span>
                                                                    <input type="text" name="" id="" class="bg-transparent">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end gap-2 mt-3 me-2">
                                                                <button class="btn btn-success px-4">Change</button>
                                                                <button class="btn btn-primary px-4">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- 4th Slide -->

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Social Media Slide -->

                                        </div>

                                        <div class="position-fixed top-0 start-0 vh-100 vw-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center d-none" id="profileOtpModel">
                                            <div class="bg-white rounded overflow-hidden" style="height: fit-content; width: 500px; max-width: 80vw;">
                                                <div class="d-flex justify-content-between align-items-center px-3 py-2" style="background-color: #0F6884;">
                                                    <span class="text-white">OTP Verification</span>
                                                    <iconify-icon icon="ic:round-close" class="text-white fs-5 c-pointer" id="profileOtpModelToggle"></iconify-icon>
                                                </div>
                                                <div class="px-2 pb-3 pt-5 d-flex flex-column gap-2">
                                                    <input type="text" class="form-control" placeholder="OTP Code" id="guideVerificationCode">
                                                    <span class="text-black-50 ps-2 content-heading">Check your email to get the OTP code</span>
                                                    <button class="btn px-4 text-white col-6 offset-3" style="background-color: #0F6884;" onclick="changeGuideProfile();">Verify</button>
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
        <script src="../js/guideProfile.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    </body>

    </html>

<?php
}


?>