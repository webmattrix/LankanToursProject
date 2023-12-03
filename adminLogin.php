<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/AdminLogin.css">
    <link rel="stylesheet" href="./css/font.css">
</head>

<body>
    <div class="container-fluid admin_login-background">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 justify-content-center align-items-center text-center">
                <div class="admin_login-title">
                    <span class="text-white fs-5 segoeui-bold">Admin Login</span><br>
                    <span class="text-danger" id="message"></span>
                </div>
                <div class="admin_login-user-image">
                </div>
                <?php

                $email = "";
                $password = "";

                if (isset($_COOKIE["lt_admin_email"])) {
                    $email = $_COOKIE["lt_admin_email"];
                }
                if (isset($_COOKIE["lt_admin_password"])) {
                    $password = $_COOKIE["lt_admin_password"];
                }
                ?>
                <div class="offset-1 col-10 admin_login-input position-relative">
                    <input type="email" id="admin_email" class="form-control border-0 pe-5 quicksand-Medium" placeholder="Email" value="<?php echo $email ?>">
                    <iconify-icon icon="material-symbols:mail" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <div class="offset-1 col-10 admin_login-input position-relative">
                    <input type="password" id="admin_password" class="form-control border-0 mt-3 pe-5 quicksand-Medium" placeholder="Password" value="<?php echo $password ?>">
                    <iconify-icon icon="material-symbols:lock" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <div class="offset-1 col-10 text-start mt-2">
                    <input type="checkbox" id="admin_remember" class="form-check-input" style="border-radius: 100%;">
                    <span class="text-white fs-6 quicksand-Medium">Keep Me Logged In</span>
                </div>
                <div class="d-flex justify-content-center">
                    <button onclick="adminLogin();" class="btn admin_login-btn quicksand-Medium d-flex justify-content-center gap-2 align-items-center text-white">
                        <span>Login</span>
                        <iconify-icon icon="ph:arrow-circle-right-fill" class="pt-1" style="color: #fff;"></iconify-icon>
                    </button>
                </div>
                <div class="offset-1 col-10">
                    <hr class="admin_login-hr-break">
                </div>
                <div>
                    <span class="text-danger quicksand-Medium" style="cursor:pointer" onclick="adminForgotPassword();">Forgot Password?</span>
                </div>

                <!-- modal -->
                <div class="modal" tabindex="-1" id="fogotPasswordModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12 text-start">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="new_password">
                                            <button class="btn btn-secondary" type="button" id="new_password_btn" onclick="showpassword1();"><iconify-icon icon="mdi:eye"></iconify-icon></button>
                                        </div>

                                    </div>

                                    <div class="col-12 text-start">
                                        <label class="form-label">Re-type Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="re_new_password">
                                            <button class="btn btn-secondary" type="button" id="re_new_password_btn" onclick="showpassword2();"><iconify-icon icon="mdi:eye"></iconify-icon></button>
                                        </div>
                                    </div>

                                    <div class="col-12 text-start">
                                        <label class="form-label">Verification Code</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="vc">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-sm" onclick="resetpassword();">Reset Password</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->

                <!-- modal 02-->
                <div class="modal" tabindex="-1" id="verifyModel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modelBackGround " style="background-color: #0F6884;">
                                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">OTP Verification</h1>
                                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="px-2 pb-3 pt-5 d-flex flex-column gap-2">
                                    <input type="text" class="form-control" placeholder="OTP Code" id="adminVerificationCode">
                                    <span class="text-black-50 ps-2 content-heading">Check your email to get the OTP code</span>
                                    <button class="btn px-4 text-white col-6 offset-3" style="background-color: #0F6884;" onclick="adminVerify();">Verify</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- modal 02-->

            </div>
        </div>
    </div>

    <script src="./js/bootstrap.js"></script>
    <script src="js/adminLogin.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>