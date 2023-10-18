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
</head>

<body>
    <div class="container-fluid guide_login-background">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 justify-content-center align-items-center text-center">
                <div class="guide_login-title">
                    <span class="text-white fs-5 segoeui-bold">Guide Login</span>
                </div>
                <div class="guide_login-user-image">
                </div>
                <div class="offset-1 col-10 guide_login-input position-relative">
                    <input type="text" class="form-control border-0 pe-5 quicksand-Medium" placeholder="Username">
                    <iconify-icon icon="material-symbols:mail" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <div class="offset-1 col-10 guide_login-input position-relative">
                    <input type="text" class="form-control border-0 mt-3 pe-5 quicksand-Medium" placeholder="Password">
                    <iconify-icon icon="material-symbols:lock" class="position-absolute end-0 top-50 me-2" style="color: #fff; transform: translateY(-50%);"></iconify-icon>
                </div>
                <div class="offset-1 col-10 text-start mt-2">
                    <input type="checkbox" class="form-check-input" style="border-radius: 100%;">
                    <span class="text-white fs-6 quicksand-Medium">Keep Me Logged In</span>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn guide_login-btn quicksand-Medium d-flex justify-content-center gap-2 align-items-center text-white">
                        <span>Login</span>                        
                        <iconify-icon icon="ph:arrow-circle-right-fill" class="pt-1" style="color: #fff;"></iconify-icon>
                    </button>
                </div>
                <div class="offset-1 col-10">
                    <hr class="guide_login-hr-break">
                </div>
                <div>
                    <span class="text-danger quicksand-Medium">Forgot Password?</span>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>

