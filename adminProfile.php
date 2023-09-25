<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/adminProfile.css">
</head>

<body style="background-color: #EAEAEA;">

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; min-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div class="col-12 px-3 pt-2 pb-3">
                        <div class="row p-1 p-lg-3">

                            <div class="rounded py-2" style="background-color: white;">
                                <span class="quicksand-SemiBold">Profile</span>

                                <!-- Profile Image -->
                                <div class="d-flex gap-3 pt-3 admin-profile">
                                    <img src="../assets/img/boy_profile_picture.png" alt="" style="height: 150px; width: 150px; object-fit: cover; border-radius: 4px;" />
                                    <div class="d-flex flex-column quicksand-SemiBold">
                                        <span class="fs-5">Vihanga Heshan</span>
                                        <span class="text-black-50">vihangaheshan@gmail.com</span>
                                        <span class="text-black-50">0712345678</span>
                                    </div>
                                </div>
                                <!-- Profile Image -->

                                <div class="profile-panel mt-4 rounded">
                                    <div class="header">
                                        <div class="active">
                                            <iconify-icon icon="ph:note" class="text-white"></iconify-icon>
                                        </div>
                                        <div class="">
                                            <iconify-icon icon="uil:setting" class="text-white"></iconify-icon>
                                        </div>
                                        <div class="">
                                            <iconify-icon icon="mdi:internet" class="text-white"></iconify-icon>
                                        </div>
                                    </div>

                                    <div class="d-flex overflow-hidden">

                                        <div class="body p-2" style="min-width: 100%; margin-left: -100%;">
                                            <div class="w-50 quicksand-SemiBold">
                                                <h3 class="segoeui-bold">Owner</h3>
                                                <div class="d-flex">
                                                    <span class="" style="width: 200px;">Name</span>
                                                    <span>: &nbsp; Vihanga Heshan</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Email</span>
                                                    <span>: &nbsp; vihangaheshan@gmail.com</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Mobile</span>
                                                    <span>: &nbsp; 0712345678</span>
                                                </div>

                                                <hr class="w-75">

                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Name</span>
                                                    <span>: &nbsp; Vihanga Heshan</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Email</span>
                                                    <span>: &nbsp; vihangaheshan@gmail.com</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Mobile</span>
                                                    <span>: &nbsp; 0712345678</span>
                                                </div>

                                                <hr class="w-75">

                                                <div class="d-flex mt-4">
                                                    <span class="" style="width: 200px;">Notification</span>
                                                    <div class="switch-notification position-relative" id="notificationSwitch" data-switch_status="ON" onclick="notificationSwitch();">
                                                        <div class="switch-thumb left" id="notificationThumb"></div>
                                                    </div>
                                                </div>
                                                <span class="text-black-50" style="font-size: 12px;">Email notification and push notifications will be enabled/disabled</span>

                                                <div class="d-flex mt-4">
                                                    <span class="" style="width: 200px;">Privacy</span>
                                                    <div class="switch-notification position-relative" id="privacySwitch" data-switch_status="ON" onclick="privacySwitch();">
                                                        <div class="switch-thumb left" id="privacyThumb"></div>
                                                    </div>
                                                </div>
                                                <span class="text-black-50" style="font-size: 12px;">Allow or deny users to view admins' information
                                                    Such as Admin Name, Mobile number and profile picture.</span>
                                            </div>

                                        </div>

                                        <div class="body p-2" style="min-width: 100%;">
                                            <div class="w-50 quicksand-SemiBold">
                                                <div class="d-flex flex-column">
                                                    <span class="">Profile Picture</span>
                                                    <label for="adminProfilePicture" id="adminProfileViewImage" class="admin-profile-picture d-flex justify-content-center align-items-center">
                                                        <iconify-icon icon="ph:camera-fill"></iconify-icon>
                                                    </label>
                                                    <input type="file" name="" id="adminProfilePicture" class="d-none" onchange="changeImageUploader();"/>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="body p-2" style="min-width: 100%;">
                                            <div class="w-50 quicksand-SemiBold">
                                                <h3 class="segoeui-bold">Owner</h3>
                                                <div class="d-flex">
                                                    <span class="" style="width: 200px;">Name</span>
                                                    <span>: &nbsp; Vihanga Heshan</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Email</span>
                                                    <span>: &nbsp; vihangaheshan@gmail.com</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Mobile</span>
                                                    <span>: &nbsp; 0712345678</span>
                                                </div>

                                                <hr class="w-75">

                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Name</span>
                                                    <span>: &nbsp; Vihanga Heshan</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Email</span>
                                                    <span>: &nbsp; vihangaheshan@gmail.com</span>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <span class="" style="width: 200px;">Mobile</span>
                                                    <span>: &nbsp; 0712345678</span>
                                                </div>

                                                <hr class="w-75">

                                                <div class="d-flex mt-4">
                                                    <span class="" style="width: 200px;">Notification</span>
                                                    <div class="switch-notification position-relative" id="notificationSwitch" data-switch_status="ON" onclick="notificationSwitch();">
                                                        <div class="switch-thumb left" id="notificationThumb"></div>
                                                    </div>
                                                </div>
                                                <span class="text-black-50" style="font-size: 12px;">Email notification and push notifications will be enabled/disabled</span>

                                                <div class="d-flex mt-4">
                                                    <span class="" style="width: 200px;">Privacy</span>
                                                    <div class="switch-notification position-relative" id="privacySwitch" data-switch_status="ON" onclick="privacySwitch();">
                                                        <div class="switch-thumb left" id="privacyThumb"></div>
                                                    </div>
                                                </div>
                                                <span class="text-black-50" style="font-size: 12px;">Allow or deny users to view admins' information
                                                    Such as Admin Name, Mobile number and profile picture.</span>
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
    <script src="../js/adminProfile.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>