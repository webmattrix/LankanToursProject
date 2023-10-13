<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/AdminPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="background-color: #EAEAEA;">
    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div class="container-fluid ">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 offset-lg-2 col-md-6 col-sm-6">
                                    <div class=" AdminCard" style="max-width: 30rem;">

                                        <h4 class="card-title" style="font-family: Inter;">Registerd Admins</h4>
                                        <h5 class="card-title" style="font-family: Inter;">20</h5>

                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-0 mb-3 mb-lg-0 col-md-6  col-sm-6">
                                    <div class="   AdminCard" style="max-width: 30rem;">

                                        <h4 class="card-title" style="font-family: Inter;">Active Admins</h4>
                                        <h5 class="card-title" style="font-family: Inter;">10</h5>

                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mt-3 mb-3 bg-white " style=" border-radius: 10px;">
                                <div class="row p-3">

                                    <div class="col-lg-4 col-12">
                                        <div class="AddAdminCard" style=" background-color: rgb(200, 200, 200);">
                                            <img src="./assets/img/AdminPage_IMG/bohemian-man-with-his-arms-crossed.jpg" class="card-img-top mb-2   " style="border-radius: 50%; height: 200px; width: 200px; margin: auto;">

                                            <div class="col-12 mb-2">
                                                <div class="row">
                                                    <h6 class="text-start" style="font-family: QuickSand;">Full name</h6>
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="row">
                                                    <h6 class="text-start" style="font-family: QuickSand;">Email</h6>
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="row">
                                                    <h6 class="text-start" style="font-family: QuickSand;">NIC</h6>
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="row">
                                                    <h6 class="text-start" style="font-family: QuickSand;">Mobile</h6>
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="row">
                                                    <h6 class="text-start" style="font-family: QuickSand;">Address</h6>
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                            <div class="col-12 ">
                                                <button class="form-control fw-bold AdminButton text-white" style="font-family: Inter;">Register Admin</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-block d-lg-none  mt-4">
                                        <hr class="" style=" border-width: 3px">
                                    </div>

                                    <div class="col-lg-8 col-12   ">
                                        <div class="col-12  mt-2" style="border-radius: 5px; background-color: rgb(200, 200, 200);">
                                            <div class="row">
                                                <div class="col-10 offset-1 mt-3 mb-3">
                                                    <input type="text" class="form-control" placeholder="Enter Email..">
                                                </div>
                                                <div class="col-1 mt-3 mb-3  d-none d-lg-block">
                                                    <iconify-icon icon="fluent:person-search-32-filled" class="fs-3"></iconify-icon>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 offset-lg-6 col-12  text-end mt-2 mb-2">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 180px;background-color: rgb(200, 200, 200);">
                                                    Sort By &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-12 table-responsive">
                                            <table class="table  align-middle table-hover table-striped " style="background-color: rgb(200, 200, 200); border-radius: 10px; font-family:Inter;">
                                                <thead class="thead">
                                                    <tr>
                                                        <th scope="col"  > </th>
                                                        <th scope="col " >Email</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Mobile</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="font-size: small;">
                                                        <td data-lable="">&nbsp;<i class="bi bi-person-circle fs-1"></i></td>
                                                        <td class=" ">UserUser@gmail.com</td>
                                                        <td>Ravishka Indrajith</td>
                                                        <td>+94719681816</td>
                                                        <td>
                                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                &nbsp;&nbsp;<i class="bi bi-eye-fill fs-4"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr style="font-size: small;">
                                                        <td>&nbsp;<i class="bi bi-person-circle fs-1"></i></td>
                                                        <td>User@gmail.com</td>
                                                        <td>Ottodfadfdfdfef</td>
                                                        <td>@mdo</td>
                                                        <td>
                                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                &nbsp;&nbsp;<i class="bi bi-eye-fill fs-4"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr style="font-size: small;">
                                                        <td>&nbsp;<i class="bi bi-person-circle fs-1"></i></td>
                                                        <td>User@gmail.com</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>
                                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                &nbsp;&nbsp;<i class="bi bi-eye-fill fs-4"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr style="font-size: small;">
                                                        <td>&nbsp;<i class="bi bi-person-circle fs-1"></i></td>
                                                        <td>User@gmail.com</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>
                                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                &nbsp;&nbsp;<i class="bi bi-eye-fill fs-4"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr style="font-size: small;">
                                                        <td>&nbsp;<i class="bi bi-person-circle fs-1"></i></td>
                                                        <td>User@gmail.com</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>
                                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                &nbsp;&nbsp;<i class="bi bi-eye-fill fs-4"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr style="font-size: small;">
                                                        <td>&nbsp;<i class="bi bi-person-circle fs-1"></i></td>
                                                        <td>User@gmail.com</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td>
                                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                &nbsp;&nbsp;<i class="bi bi-eye-fill fs-4"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-10 offset-1 mt-2 d-flex justify-content-center align-content-center ">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-arrow-left-circle"></i></a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-arrow-right-circle"></i></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Admins Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body  mb-4">
                                    <div class="col-12 p-3 border border-2 rounded-2" style="background-color: rgb(186, 186, 186); ">
                                        <div class="col-12 mb-2">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h6 class="text-lg-end text-start mt-2">Full Name</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control ">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h6 class="text-lg-end text-start mt-2">Email</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h6 class="text-lg-end text-start mt-2">Mobile</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h6 class="text-lg-end text-start mt-2">Address</h6>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-10 offset-1">
                                            <div class="row ">
                                                <button type="button" class="btn text-white  mb-lg-3 mb-2" style="background-color:#83E873;">Update Admin Details</button>
                                                <button type="button" class="btn text-white " style="background-color: #FB7B53;">Delete Admin Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <!-- Page Content / body content eka methanin liyanna -->

            </div>

        </div>

    </div>
    </div>

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>