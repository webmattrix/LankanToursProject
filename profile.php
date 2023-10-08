<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/profileDark.css">
</head>

<body class="c-default" id="body">


    <?php
    include "./components/newHeader.php";
    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 p-0">

                <div class="profile_header-container position-relative">
                    <div class="profile-background" style="background-image: url('./assets/img/profile/profile_background.png');"></div>
                    <div class="profile-image">
                        <img src="./assets/img/boy_profile_picture.png" alt="Profile Image" class="">
                        <label for="profileImage" class="position-absolute end-0 top-50">
                            <iconify-icon icon="solar:camera-bold"></iconify-icon>
                        </label>
                        <!-- Image Uploader for profile image -->
                        <input type="file" name="" id="profileImage" class="d-none">
                        <!-- Image Uploader for profile image -->
                    </div>

                    <div class="d-flex w-100 justify-content-between position-absolute top-0 start-0 px-3 pt-3 profile_header_icon_container">

                        <span id="backToHome">
                            <iconify-icon icon="uil:arrow-left"></iconify-icon> <!-- Back to home button -->
                        </span>
                        <label for="profileBackground">
                            <iconify-icon icon="solar:camera-bold"></iconify-icon>
                        </label>

                        <!-- Image Uploader for Profile background image -->
                        <input type="file" name="" id="profileBackground" class="d-none">
                        <!-- Image Uploader for Profile background image -->
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="profile_content d-flex justify-content-center quicksand-SemiBold">
                    <div class="">
                        <div class="d-flex flex-column align-items-center">
                            <iconify-icon icon="ep:user-filled" style="font-size: 50px;"></iconify-icon>
                            <span class="quicksand-SemiBold fs-5">Profile</span>
                        </div>

                        <!-- Profile Card -->
                        <div class="quicksand-Medium">
                            <div class="d-flex flex-column mt-3">
                                <label for="">Name</label>
                                <input type="text" disabled value="John Doe" class="bg-transparent border-0 border-bottom text-center mt-1" />
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <label for="">Mobile</label>
                                <input type="text" disabled value="0712345678" class="bg-transparent border-0 border-bottom text-center mt-1" />
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <label for="">Email</label>
                                <input type="text" disabled value="johndoe@gmail.com" class="bg-transparent border-0 border-bottom text-center mt-1" />
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <label for="">Date of Birth</label>
                                <input type="text" disabled value="2023-09-29" class="bg-transparent border-0 border-bottom text-center mt-1" />
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <label for="">Gender</label>
                                <input type="text" disabled value="Male" class="bg-transparent border-0 border-bottom text-center mt-1" />
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <label for="">Country</label>
                                <input type="text" disabled value="England" class="bg-transparent border-0 border-bottom text-center mt-1" />
                            </div>
                        </div>
                        <!-- Profile Card -->

                    </div>
                </div>
                <!-- Profile Content -->


                <!-- Profile setting content -->
                <div class="my-3 px-4">
                    <div class="profile-setting-container px-3">
                        <div class="header d-flex justify-content-between quicksand-Bold py-1 align-items-center" id="profileSettingHeader">
                            <span>Settings</span>
                            <iconify-icon icon="mingcute:down-line" class="fs-5" id="profileSettingIcon"></iconify-icon>
                        </div>
                        <div class="body quicksand-SemiBold" id="profileSettingBody" data-position="up">
                            <ul class="list-unstyled pt-3 pb-2">
                                <li class="">
                                    <iconify-icon icon="material-symbols:security"></iconify-icon>
                                    <span>Security</span>
                                    <ul class="list-unstyled ps-4">
                                        <li><span>Change Password</span></li>
                                        <li><span>Forgot Password</span></li>
                                    </ul>
                                </li>
                                <li class="mt-2">
                                    <iconify-icon icon="bxs:notification"></iconify-icon>
                                    <span>Notification</span>
                                </li>
                                <li class="mt-2">
                                    <iconify-icon icon="ic:round-account-box"></iconify-icon>
                                    <span>Account</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Profile setting content -->

                <!-- Change Profile Content -->
                <div class="my-3 px-4">
                    <div class="profile-change-container px-3">
                        <div class="header d-flex justify-content-between quicksand-Bold py-1 align-items-center" id="profileChangeHeader">
                            <span>Change Profile</span>
                            <iconify-icon icon="mingcute:down-line" class="fs-5" id="profileChangeIcon"></iconify-icon>
                        </div>
                        <div class="body quicksand-SemiBold" id="profileChangeBody" data-position="down" style="height: auto;">
                            <div class="pt-3 pb-2">
                                <div class="d-flex flex-column">
                                    <label for="">Name</label>
                                    <input type="text" />
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="">Mobile</label>
                                    <input type="tel" />
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="">Date of Birth</label>
                                    <input type="date" />
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="">Gender</label>
                                    <select>
                                        <option>Select</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="">Country</label>
                                    <select>
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-100 d-flex justify-content-end pb-2">
                                <button class="btn btn-secondary px-4">Cancel</button>
                                <button class="btn btn-success px-4">Change</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Change Profile Content -->

            </div>

        </div>

        <?php include "./components/footer.php"; ?>

    </div>
</body>

<script src="./js/profile.js"></script>
<script src="./js/newHeader.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>