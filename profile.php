<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/scrolbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/profile.css">
</head>

<body class="c-default" style="background-color: #E7E7E7;">

    <body onload="homeOnloadFunction();" class="c-default" style="background-color: #E7E7E7;">

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
                            <input type="file" name="" id="profileImage" class="d-none">
                        </div>

                        <div class="d-flex w-100 justify-content-between position-absolute top-0 start-0 px-3 pt-3 profile_header_icon_container">
                            <span>
                                <iconify-icon icon="uil:arrow-left"></iconify-icon>
                            </span>
                            <label for="profileBackground">
                                <iconify-icon icon="solar:camera-bold"></iconify-icon>
                            </label>

                            <!-- Image Uploader for Profile background image -->
                            <input type="file" name="" id="profileBackground" class="d-none">
                            <!-- Image Uploader for Profile background image -->
                        </div>
                    </div>

                    <div class="profile_content d-flex justify-content-center quicksand-SemiBold">
                        <div class="">
                            <div class="d-flex flex-column align-items-center">
                                <iconify-icon icon="ep:user-filled" style="font-size: 50px;"></iconify-icon>
                                <span class="quicksand-SemiBold fs-5">Profile</span>
                            </div>
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
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </body>

</body>

</html>