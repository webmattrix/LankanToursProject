<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/TouristRegistrationPage.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="" />
    <link rel="stylesheet" href="./css/bootstrap.css">

</head>

<body class="registerBackground">
    <div class="col-lg-3 col-6 col-sm-4  Registercard2" style=" position: absolute; ">
    </div>
    <h6 class="p-3  mb-5 text-white "><i class="bi bi-arrow-left-circle-fill"></i>&nbsp; Back to Login</h6>

    <div class="container-fluid  d-flex justify-content-center  ">
        <div class="col-lg-5 col-12 mt-5 mt-lg-4  p-lg-5 p-3 Registercard align-content-center">
            <div class="row ">
                <div class="col-12 mt-2 mt-lg-0">
                    <h1>Registration</h1>
                </div>
                <div class="col-12 g-3 g-lg-5 ">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-2">
                            <h6 class="text-start">First Name</h6>
                            <input type="text" class="form-control inputFeild">
                        </div>

                        <div class="col-lg-6 col-12 mb-2">
                            <h6 class="text-start">Last Name</h6>
                            <input type="text" class="form-control inputFeild">
                        </div>
                        <div class="col-12 mb-2">
                            <h6 class="text-start">Email</h6>
                            <input type="text" class="form-control inputFeild">
                        </div>

                        <div class="col-12 mb-2">
                            <h6 class="text-start">Password</h6>
                            <input type="password" class="form-control inputFeild">
                        </div>
                        <div class="col-12 mb-2">
                            <h6 class="text-start ">Country</h6>
                            <select class="form-select  text-black-50 inputFeild" id="g">

                                <option value="1">Select</option>
                                <option value="2">Srilanka</option>
                                <option value="2">Russia</option>
                                <option value="2">Japan</option>
                                <option value="2">America</option>
                            </select>

                        </div>
                        <div class="col-lg-6 offset-lg-3 col-10 offset-1 mt-3 mb-2 mt-lb-0">
                            <button class="form-control ">Register</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>