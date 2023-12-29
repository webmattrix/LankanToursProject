<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/TouristLoginPage.css">
    <link rel="stylesheet" href="./css/font.css">

</head>

<body class="LoginBackground ">
    <div class="col-1 Logincard2 d-block " style=" position: absolute;z-index:-5; ">
    </div>
    <h6 class="p-3  d-inline-block text-white c-pointer" style="font-family: QuickSand;" onclick="login();"><i class="bi bi-arrow-right-circle-fill"></i>&nbsp; Registration</h6>

    <div class=" LoginBox p-3 p-md-5">

        <div class="   Logincard p-lg-5 p-2 mb-3 ">
            <div class="row align-content-center ">
                <div class="col-12 mt-2 mt-lg-0 ">
                    <h1 class="text-center" style="font-family: QuickSand;">Login</h1>
                </div>
                <span id="L_AlertMSG" class="L_alertMSG d-none " style="color: rgb(118, 18, 18);font-family:QuickSand;"> </span>
                <div class="col-12 g-5 ">
                    <div class="row">
                        <?php

                        $email = "";
                        $password = "";

                        if (isset($_COOKIE["lt_tourist_email"])) {
                            $email = $_COOKIE["lt_tourist_email"];
                        }
                        if (isset($_COOKIE["lt_tourist_password"])) {
                            $password = $_COOKIE["lt_tourist_password"];
                        }
                        ?>

                        <div class="col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">Email</h6>
                            <input type="text" class="form-control inputFeild" style="font-family: QuickSand;" id="L_Email" value="<?php echo $email ?>">
                        </div>

                        <div class="col-12 mb-4">
                            <h6 class="text-start mb-2" style="font-family: QuickSand;">Password</h6>
                            <input type="password" class="form-control inputFeild" style="font-family: QuickSand;" id="L_Password" value="<?php echo $password ?>">
                        </div>
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-lg-6 col-12 col-md-6 text-start mb-2">
                                    <div class=" form-check">
                                        <input class="form-check-input inputFeild" type="checkbox" id="L_RememberMe">
                                        <label class="form-check-label  " style="font-family: QuickSand;">Remember ME</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 col-md-6  text-lg-end  text-md-end text-start">
                                    <a href="#" class=" text-decoration-none " style="color: rgb(248, 103, 103);font-family:QuickSand;" onclick="L_ForgotPassword();">Forget Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 offset-lg-3 mt-3 mb-3 mb-lg-0">
                            <button class="form-control text-white " style="font-family: QuickSand;  background-color: rgba(247, 247, 247, 0.415);" onclick="Login();">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- model 01-->
    <div class="modal" tabindex="-1" id="T_forgotPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: QuickSand;">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-lable" style="font-family: QuickSand;">New password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="npInput" style="font-family: QuickSand;">
                                <button class="btn btn-outline-secondary" type="button" id="T_newPassword" onclick="T_ShowPassword1();"><i id="eye1" class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-lable" style="font-family: QuickSand;">Retype New password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnpInput" style="font-family: QuickSand;">
                                <button class="btn btn-outline-secondary" type="button" id="T_reNewPassword" onclick="T_ShowPassword2();"><i id="eye2" class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-lable" style="font-family: QuickSand;">verification code</label>
                            <input type="text" class="form-control" id="T_vcode" style="font-family: QuickSand;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-family: QuickSand;">Close</button>
                    <button type="button" class="btn btn-primary" onclick="T_resetPW();" style="font-family: QuickSand;">Reset Password</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model 01-->

    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/login.js"></script>

</body>

</html>