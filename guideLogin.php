<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Login</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/guideLogin.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">

</head>

<body>
    <div class="container-fluid guide_login-background">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 justify-content-center align-items-center text-center">
                <div class="guide_login-title">
                    <span class="text-white fs-5 segoeui-bold">Guide Login</span><br>
                    <span class="text-danger" id="message"></span>
                </div>
                <div class="guide_login-user-image">
                </div>
                <div class="offset-1 col-10 guide_login-input position-relative">
                    <?php
                    if(isset($_COOKIE["lt_guide_email"])){
                    ?>
                    <input type="email" id="guide_email" class="form-control border-0 pe-5 quicksand-Medium" placeholder="Email" value="<?php echo $_COOKIE["lt_guide_email"]?>">
                    <?php
                    }else{
                    ?>
                    <input type="email" id="guide_email" class="form-control border-0 pe-5 quicksand-Medium" placeholder="Email">
                    <?php
                    }
                    ?>
                    <iconify-icon icon="material-symbols:mail" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <div class="offset-1 col-10 guide_login-input position-relative">
                <?php
                    if(isset($_COOKIE["lt_guide_password"])){
                    ?>
                    <input type="password" id="guide_password" class="form-control border-0 mt-3 pe-5 quicksand-Medium" placeholder="Password" value="<?php echo $_COOKIE["lt_guide_password"]?>">
                    <?php
                    }else{
                    ?>
                    <input type="password" id="guide_password" class="form-control border-0 mt-3 pe-5 quicksand-Medium" placeholder="Password">
                    <?php
                    }
                    ?>
                    <iconify-icon icon="material-symbols:lock" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <!-- <div class="offset-1 col-10 text-start mt-2">
                    <input type="checkbox" id="guide_remember" class="form-check-input" style="border-radius: 100%;">
                    <label class="text-white fs-6 quicksand-Medium" for="guide_remember">Keep Me Logged In</label>
                </div> -->
                <div class="d-flex justify-content-center">
                    <button onclick="guideSignIn();" class="btn guide_login-btn quicksand-Medium d-flex justify-content-center gap-2 align-items-center text-white">
                        <span>Login</span>
                        <iconify-icon icon="ph:arrow-circle-right-fill" class="pt-1" style="color: #fff;"></iconify-icon>
                    </button>
                </div>
                <div class="offset-1 col-10">
                    <hr class="guide_login-hr-break">
                </div>
                <div>
                    <span class="text-danger quicksand-Medium" style="cursor:pointer" onclick="guideForgotPassword();">Forgot Password?</span>
                </div>

                <!-- verification modal -->
                <div class="modal" tabindex="-1" id="verificationModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row g-3">

                                    <div class="col-12 text-start">
                                        <label class="form-label">OTP Verification</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="otp">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-sm" onclick="verifyGuide();">Verify</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- verification model -->

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

            </div>
        </div>
    </div>

    <script src="./js/bootstrap.js"></script>
    <script src="./js/guideLogin.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>

