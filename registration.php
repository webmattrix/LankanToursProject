<?php require "./assets/model/sqlConnection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/TouristRegistrationPage.css">

</head>

<body class="registerBackground">
    <div class="col-1 Registercard2  d-block" style=" position: absolute; z-index:-5;">
    </div>
    <h6 class="p-3 text-white  d-inline-block" style="font-family: QuickSand;" onclick="register()"><i class="bi bi-arrow-left-circle-fill"></i>&nbsp; Back to Login</h6>

    <div class=" RegisterBox p-3 p-md-5 mb-2">
        <div class="  p-lg-4 p-md-5 p-3 Registercard ">
            <div class="row ">
                <div class="col-12 mt-2 mt-lg-0">
                    <h1 style="font-family: QuickSand;">Registration</h1>
                </div>
                <span id="AlertMSG" class="alertMSG  d-none"></span>
                <div class="col-12 g-3 g-lg-5 ">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">First Name</h6>
                            <input type="text" class="form-control inputFeild" style="font-family: QuickSand;" id="F_Name">
                        </div>

                        <div class="col-lg-6 col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">Last Name</h6>
                            <input type="text" class="form-control inputFeild" style="font-family: QuickSand;" id="L_Name">
                        </div>
                        <div class="col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">Email</h6>
                            <input type="text" class="form-control inputFeild" style="font-family: QuickSand;" id="Email">
                        </div>

                        <div class="col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">Password</h6>
                            <input type="password" class="form-control inputFeild" style="font-family: QuickSand;" id="Password">
                        </div>
                        <div class="col-12 mb-2">
                            <h6 class="text-start " style="font-family: QuickSand;">Country</h6>
                            <select class="form-select  text-white-70 inputFeild" style="font-family: QuickSand;" id="Country">
                                <option value="0">Select country</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `country`");
                                $n = $rs->num_rows;
                                ?> <?php
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6 offset-lg-3 col-10 offset-1 mt-3 mb-2 mb-lg-0 ">
                            <button class="form-control text-white" style="font-family: QuickSand; background-color: rgba(247, 247, 247, 0.415);" onclick="Register();"> Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- model 02-->
    <div class="modal" tabindex="-1" id="T_verifyModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: QuickSand;">Verify Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <span>Check your email to get the OTP code</span>
                        <input type="text" class=" form-control" id="modalInput" placeholder="OTP code ...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="modalRegister();" style="font-family: QuickSand;">Login</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model 02 -->

    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/registration.js"></script>

</body>

</html>