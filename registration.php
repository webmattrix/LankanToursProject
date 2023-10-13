<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="" />
    <link rel="stylesheet" href="./css/TouristRegistrationPage.css">

</head>

<body class="registerBackground">
    <div class="col-1 Registercard2 d-lg-block d-md-block d-none" style=" position: absolute; z-index:-5;">
    </div>
    <h6 class="p-3 text-white" style="font-family: QuickSand;"><i class="bi bi-arrow-left-circle-fill"></i>&nbsp; Back to Login</h6>

    <div class=" LoginBox p-3 p-md-5 mb-2">
        <div class="  p-lg-5 p-3 Registercard ">
            <div class="row ">
                <div class="col-12 mt-2 mt-lg-0">
                    <h1  style="font-family: QuickSand;">Registration</h1>
                </div>
                <div class="col-12 g-3 g-lg-5 ">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">First Name</h6>
                            <input type="text" class="form-control inputFeild">
                        </div>

                        <div class="col-lg-6 col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">Last Name</h6>
                            <input type="text" class="form-control inputFeild">
                        </div>
                        <div class="col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">Email</h6>
                            <input type="text" class="form-control inputFeild">
                        </div>

                        <div class="col-12 mb-2">
                            <h6 class="text-start" style="font-family: QuickSand;">Password</h6>
                            <input type="password" class="form-control inputFeild">
                        </div>
                        <div class="col-12 mb-2">
                            <h6 class="text-start " style="font-family: QuickSand;">Country</h6>
                            <select class="form-select  text-black-50 inputFeild" id="g">

                                <option value="1">Select</option>
                                <option value="2">Srilanka</option>
                                <option value="2">Russia</option>
                                <option value="2">Japan</option>
                                <option value="2">America</option>
                            </select>

                        </div>
                        <div class="col-lg-6 offset-lg-3 col-10 offset-1 mt-3 ">
                            <button class="form-control text-white " style="font-family: QuickSand; background-color: rgba(247, 247, 247, 0.415);">Register</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.js"></script>

</body>

</html>