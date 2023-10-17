<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="" />
    <link rel="stylesheet" href="./css/TouristLoginPage.css">

</head>

<body class="LoginBackground ">
    <div class="col-1 Logincard2 d-lg-block  d-md-block d-none" style=" position: absolute;z-index:-5; ">
    </div>
    <h6 class="p-3 mb-5 text-white" style="font-family: QuickSand;"><i class="bi bi-arrow-right-circle-fill"></i>&nbsp; Registration</h6>

    <div class=" LoginBox p-3 p-md-5">

        <div class="   Logincard p-lg-5 p-2 mb-3 ">
            <div class="row align-content-center ">
                <div class="col-12 mt-2 mt-lg-0 ">
                    <h1 class="text-center" style="font-family: QuickSand;">Login</h1>
                </div>
                <div class="col-12 g-5 ">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">User Name</h6>
                            <input type="text" class="form-control inputFeild">
                        </div>

                        <div class="col-12 mb-4">
                            <h6 class="text-start mb-2" style="font-family: QuickSand;">Password</h6>
                            <input type="password" class="form-control inputFeild">
                        </div>
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-lg-6 col-12 col-md-6 text-start mb-2">
                                    <div class=" form-check">
                                        <input class="form-check-input inputFeild" type="checkbox" id="rememberme">
                                        <label class="form-check-label  " style="font-family: QuickSand;">Remember ME</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 col-md-6  text-lg-end  text-md-end text-start">
                                    <a href="#" class=" text-decoration-none " style="color: rgb(248, 103, 103);font-family:QuickSand;" onclick="forgotPassword();">Forget Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 offset-lg-3 mt-3 mb-3 mb-lg-0">
                            <button class="form-control text-white " style="font-family: QuickSand;  background-color: rgba(247, 247, 247, 0.415);">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="./js/bootstrap.bundle.js"></script>

</body>

</html>