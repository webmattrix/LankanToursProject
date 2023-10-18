<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="" />
    <link rel="stylesheet" href="./css/AdminLogin.css">

</head>

<body class="AdminLoginBackground">

    <div class="container-fluid  d-flex justify-content-center  align-items-center ">
        <div class="col-md-6 col-12  p-lg-5 p-2 mt-4 mb-1  " style="text-align: center;">
            <div class="row align-content-center ">
                <div class="col-12 mt-5 mt-lg-0">
                    <h1 class="text-white" style="font-family: SegoeUI;">Admin Login</h1>
                </div>
                <div class="col-12 mt-2 mt-lg-0">
                    <img src="./assets/img/AdminLoginPage_IMG/Rectangle 431.png" style="width:100px; height:100px;">
                </div>
                <div class="col-12 g-5 ">
                    <div class="row">
                        <div class="col-12 mb-2 mb-4 ">
                            <div class=" AdminInputFeild  rounded-2 ">
                                <div class="row">
                                    <div class="col-lg-10 col-12">
                                        <input type="Text" class=" text-white border border-0   bg-transparent p-3 " placeholder="User Name" style="width: 100%;font-family: QuickSand;">
                                    </div>
                                    <div class="col-2 d-none d-lg-block">
                                        <span class=" input-group-text bg-transparent border border-0  text-start p-3 ">&nbsp;<i class="bi bi-envelope-fill text-white "></i></span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4 ">
                            <div class=" AdminInputFeild  rounded-2 ">
                                <div class="row">
                                    <div class="col-lg-10 col-12">
                                        <input type="password" class=" text-white border border-0   bg-transparent p-3 " placeholder="Password" style="width: 100%;font-family: QuickSand;">
                                    </div>
                                    <div class="col-2 d-none d-lg-block">
                                        <span class=" input-group-text bg-transparent border border-0  text-start p-3 ">&nbsp;<i class="bi bi-lock-fill text-white "></i></i></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="row">
                                <div class=" col-12  text-start mb-2">
                                    <div class=" form-check">
                                        <input class="form-check-input inputFeild" type="checkbox">
                                        <label class="form-check-label text-white " style="font-family: QuickSand;">Keep Me Logged In</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-12 offset-lg-3 mt-3 mb-3 mb-lg-0">
                            <button class="form-control AdminLoginButtonClr text-white border border-0 p-3" style="font-family: QuickSand;">Login &nbsp;&nbsp; <i class="bi bi-arrow-right-circle-fill text-white"></i></button>
                        </div>
                        <div class=" col-12  mt-3 mb-3 mb-lg-0">
                            <hr class=" text-white">
                        </div>
                        <div class=" col-12   mb-3 mb-lg-0">
                            <h6 class="" style="color: lightgreen;font-family: QuickSand;">Login success</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">OTP Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 p-3">
                        <input type="password" class=" t form-control" placeholder="Otp Here">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Verify</button>
                </div>
            </div>
        </div>
    </div>
        

    <script src="./js/bootstrap.bundle.js"></script>

</body>

</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/AdminLogin.css">
    <link rel="stylesheet" href="./css/font.css">
</head>

<body>
    <div class="container-fluid admin_login-background">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 justify-content-center align-items-center text-center gui">
                <div class="admin_login-title">
                    <span class="text-white fs-5 segoeui-bold">Admin Login</span>
                </div>
                <div class="admin_login-user-image">
                </div>
                <div class="offset-1 col-10 admin_login-input position-relative">
                    <input type="text" class="form-control border-0 pe-5 quicksand-Medium" placeholder="Username">
                    <iconify-icon icon="material-symbols:mail" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <div class="offset-1 col-10 admin_login-input position-relative">
                    <input type="text" class="form-control border-0 mt-3 pe-5 quicksand-Medium" placeholder="Password">
                    <iconify-icon icon="material-symbols:lock" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <div class="offset-1 col-10 text-start mt-2">
                    <input type="checkbox" class="form-check-input" style="border-radius: 100%;">
                    <span class="text-white fs-6 quicksand-Medium">Keep Me Logged In</span>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn admin_login-btn quicksand-Medium d-flex justify-content-center gap-2 align-items-center text-white" >
                        <span onclick="login();">Login</span>                        
                        <iconify-icon icon="ph:arrow-circle-right-fill" class="pt-1" style="color: #fff;"></iconify-icon>
                    </button>
                </div>
                <div class="offset-1 col-10">
                    <hr class="admin_login-hr-break">
                </div>
                <div>
                    <span class="text-danger quicksand-Medium" onclick="A_fogotPassword();">Forgot Password?</span>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/adminLogin.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>

