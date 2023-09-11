<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Orders</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/orders_page.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto; background-color: #EAEAEA;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div>
                        <div class="col-12">
                            <div class="row m-0 p-0">

                                <!-- view Modal for small devices -->

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tours Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 col-lg-11 d-none d-sm-grid d-lg-grid">
                                                            <div class="row p-3" style="line-height: 0.4in; border: 1px solid #A29A9A; border-radius: 6px;">
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">11 Day</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Timeline of tour</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">2023/06/12 - 2023/06/14</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan ID</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">TO_001</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Rating</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">
                                                                            <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-half" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-border" style="color: #9A7C13;"></iconify-icon>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row justify-content-end pt-3 pt-lg-2">
                                                                        <button class="btn col-lg-3 col-sm-3" data-bs-dismiss="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #228622; color: #fff;">Ok</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-11 d-grid d-sm-none d-lg-none">
                                                            <div class="row p-3" style="line-height: 0.3in; border: 1px solid #A29A9A; border-radius: 6px;">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Status of Tour</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; color: #158921; display: flex; align-items: center; font-size: calc(0.56rem + 0.57vh);">Ongoing &nbsp;&nbsp;<iconify-icon icon="ic:baseline-circle" style="color: #158921;"></iconify-icon></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">11 Day</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Duration of Tour</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">2023/06/12 - 2023/06/14</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan ID</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">TO_001</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan Rating</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">
                                                                            <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-half" style="color: #9A7C13;"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-border" style="color: #9A7C13;"></iconify-icon>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour guide</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">Sahan Perera</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Members</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">11</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row justify-content-end pt-3 pt-lg-2">
                                                                        <button class="btn col-4" data-bs-dismiss="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #228622; color: #fff;">Ok</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- view Modal for small devices -->

                                <div class="col-12">
                                    <div class="row justify-content-center">
                                        <div class="col-10 mt-lg-5 mt-3">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <div class="row">
                                                        <img src="./assets/img/ordersPg_IMG/tour_plan_pack.png" style="width: 100%; height: 25vh;" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-8 py-2 px-3">
                                                    <div class="row" style="line-height: 0.4in;">
                                                        <div class="col-12">
                                                            <span style="font-family: 'Segoe'; font-weight: 700;">Tour Name :&nbsp;&nbsp;&nbsp;<span style="font-weight: 400;">Lorem ipsum dolor</span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span style="font-family: 'Segoe'; font-weight: 700;">Tour Count :&nbsp;&nbsp;&nbsp;<span style="font-weight: 400;">13</span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span style="font-family: 'Segoe'; font-weight: 700;">Total Members :&nbsp;&nbsp;&nbsp;<span style="font-weight: 400;">72</span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span style="font-family: 'Segoe'; font-weight: 700;">Worth :&nbsp;&nbsp;&nbsp;<span style="font-weight: 400;">$ 2700</span></span>
                                                        </div>
                                                        <div class="col-12 col-sm-4 col-lg-4">
                                                            <button class="ordersPg_R_moreBTN">read more <iconify-icon icon="ep:right" class="pt-1" style="color: #9D3DE9;"></iconify-icon></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-lg-5 mt-2">
                                    <div class="row justify-content-center">
                                        <div class="col-11 pt-5 px-5 pb-2" style="background-color: #fff;">
                                            <div class="row justify-content-center">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-5 col-lg-5 my-sm-2">
                                                            <span class="d-flex align-items-center"><iconify-icon icon="material-symbols:tune" class="fs-5"></iconify-icon> &nbsp;<span style="font-family: 'Segoe'; font-size: calc(0.64rem + 0.68vh);">Filter</span>
                                                                <div class="col-lg-6 col-9 col-sm-9 ps-3">
                                                                    <select class="selector_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                        <option selected>Select</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div class="col-11 col-lg-7 col-sm-7 my-sm-2 mt-3 mt-lg-0 mt-sm-0">
                                                            <div class="row justify-content-end">
                                                                <div class="col-12 col-lg-6 col-sm-8">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="search here..." style="font-family: 'Segoe'; background-color: #E3E3E3;">
                                                                        <span class="input-group-text"><a href="#" style="color: #858585;"><iconify-icon icon="fe:search"></iconify-icon></a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-lg-5 d-none d-lg-grid d-sm-none">
                                                            <div class="row">
                                                                <table class="table table-hover table-bordered" style="font-family: 'Segoe'; border: 1px solid #A29A9A;">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-2 text-center">Tour Plan</th>
                                                                                <th class="col-3 text-center">Tour Guide</th>
                                                                                <th class="col-1 text-center">Members</th>
                                                                                <th class="col-3 text-center">Date Duration</th>
                                                                                <th class="col-2 text-center">Status</th>
                                                                                <th class="col-1 text-center">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-2 text-center fw-normal">6 Day</th>
                                                                                <td class="col-3 text-center">Sahan Perera</td>
                                                                                <td class="col-1 text-center">11</td>
                                                                                <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 text-center" style="color: #158921;">Ongoing</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-2 text-center fw-normal">11 Day</th>
                                                                                <td class="col-3 text-center">Jayantha Perera</td>
                                                                                <td class="col-1 text-center">15</td>
                                                                                <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 text-center" style="color: #DB8219;">Pending</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-2 text-center fw-normal">Luxury 5 Day</th>
                                                                                <td class="col-3 text-center">Prabath Gunawardhana</td>
                                                                                <td class="col-1 text-center">15</td>
                                                                                <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 text-center" style="color: #DB8219;">Pending</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- small devices -->
                                                        <div class="col-12 mt-3 mt-lg-0 d-grid d-lg-none d-sm-grid">
                                                            <div class="row">
                                                                <table class="table table-hover table-bordered" style="font-family: 'Inter'; border: 1px solid #A29A9A;">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-4 text-center">Tour Plan Name</th>
                                                                                <th class="col-2 text-center">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center">11 Day</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center">12 Day</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center">6 Day</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- small devices -->
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 pt-1">
                                                    <div class="row">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-center">
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                </li>
                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <div class="row justify-content-center gap-3">
                                                        <div class="col-12 col-lg-5" style="box-shadow: 1px 1.5px 7px 0px rgba(0, 0, 0, 0.25);">
                                                            <div class="row py-2">
                                                                <div class="col-12 col-lg-4">
                                                                    <span style="font-family: 'Segoe'; font-weight: 800; font-size: calc(0.64rem + 0.63vh);">Unassigned Tours</span>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <hr style="border: 1px solid #D7D7D7;">
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="col-12" style="background-color: #EAEAEA;">
                                                                       <div class="row">
                                                                          <div class="col-2">
                                                                              <img src="./assets/img/ordersPg_IMG/user_icon.png" style="width: 52px; height: 52px;" alt="">
                                                                          </div>
                                                                       </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-5" style="box-shadow: 1px 1.5px 7px 0px rgba(0, 0, 0, 0.25);">
                                                            <span>sdhsdjshdkjshd sdjhsjdh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Content / body content eka methanin liyanna -->

                </div>

            </div>

        </div>
    </div>

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>