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

                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tour Order</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 col-lg-11 d-none d-sm-none d-lg-grid">
                                                            <div class="row p-3" style=" border: 1px solid #A29A9A; border-radius: 6px;">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-7">
                                                                            <div class="row gap-3">
                                                                                <div class="col-5">
                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Name</span>
                                                                                    <input type="text" class="input-select1" />
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Duration</span>
                                                                                    <input type="text" class="input-select1" />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Start Date</span>
                                                                                    <input type="text" class="input-select1" />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">End Date</span>
                                                                                    <input type="text" class="input-select1" />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Guide Name</span>
                                                                                    <input type="text" class="input-select1" />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tourist Members</span>
                                                                                    <input type="text" class="input-select1" style="background-color: #D9D9D9;" disabled />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Client Message</span>
                                                                            <textarea class="col-12 p-3" style="height: 24vh; border: 1px solid #C4C4C4; background-color: #D9D9D9; font-family: 'Segoe'; border-radius: 4px;" readonly>Lorem ipsum dolor sit amet consectetur. Enim phasellus nibh neque amet tortor non dui non velit. Sed arcu vitae sit elementum aliquet massa dignissim amet lectus.</textarea>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-end">
                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="row justify-content-end gap-2">
                                                                                                <div class="col-5">
                                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Cost</span>
                                                                                                    <div class="input-group">
                                                                                                        <input type="text" class="form-control" />
                                                                                                        <span class="input-group-text">$</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Discount</span>
                                                                                                    <input type="text" class="input-select1" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4 mb-3">
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <span style="font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); font-weight: 600;">Message for Guide</span>
                                                                                    <textarea class="col-12 p-3" style="height: 20vh; border: 1px solid #C4C4C4; font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); border-radius: 4px;">Lorem ipsum dolor sit amet consectetur. Enim phasellus nibh neque amet tortor non dui non velit. Sed arcu vitae sit elementum aliquet massa dignissim amet lectus.</textarea>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="col-12 mt-3">
                                                                                        <div class="row justify-content-end">
                                                                                            <div class="col-11 p-4" style="background-color: #E9E9E9; border-radius: 6px;">
                                                                                                <div class="row justify-content-center">
                                                                                                    <div class="col-10" style="background-color: #333; border-radius: 6px;">
                                                                                                        <div class="amountPic">
                                                                                                            <div class="col-12">
                                                                                                                <div class="row p-3">
                                                                                                                    <div class="col-6">
                                                                                                                        <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Payments</span>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <div class="row">
                                                                                                                            <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #ED9227;">Pending</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-6 mt-3">
                                                                                                                        <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Full Price</span>
                                                                                                                    </div>
                                                                                                                    <div class="col-6 mt-3">
                                                                                                                        <div class="row">
                                                                                                                            <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">$2700</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Paid Amount</span>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <div class="row">
                                                                                                                            <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">$1100</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Discount</span>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <div class="row">
                                                                                                                            <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">0</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Due Payment</span>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <div class="row">
                                                                                                                            <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #EA2727;">$1400</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-12">
                                                                                                                        <hr style="border: 1px solid #fff;">
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh); font-weight: 700;">Total</span>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <div class="row">
                                                                                                                            <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">$ 1400</span>
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
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row justify-content-start pt-3 pt-lg-2">
                                                                        <button class="btn col-lg-2 col-sm-3" data-bs-dismiss="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #EAEAEA; color: #656565; border: 1px solid #D2D2D2; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-grid d-sm-grid d-lg-none">
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
                                                                    <div class="row justify-content-end pt-3">
                                                                        <button class="btn col-4" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #228622; color: #fff;">Ok</button>
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
                                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Tour Order</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 d-grid d-sm-grid d-lg-none">
                                                    <div class="row p-3" style=" border: 1px solid #A29A9A; border-radius: 6px;">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row gap-3">
                                                                        <div class="col-12">
                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Name</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Duration</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Start Date</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">End Date</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Guide Name</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tourist Members</span>
                                                                            <input type="text" class="input-select1" style="background-color: #D9D9D9;" disabled />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Client Message</span>
                                                                    <textarea class="col-12 p-3" style="height: 24vh; border: 1px solid #C4C4C4; background-color: #D9D9D9; font-family: 'Segoe'; border-radius: 4px;" readonly>Lorem ipsum dolor sit amet consectetur. Enim phasellus nibh neque amet tortor non dui non velit. Sed arcu vitae sit elementum aliquet massa dignissim amet lectus.</textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="row justify-content-end gap-2">
                                                                                        <div class="col-12 mt-3">
                                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Cost</span>
                                                                                            <div class="input-group">
                                                                                                <input type="text" class="form-control" />
                                                                                                <span class="input-group-text">$</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <span style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Discount</span>
                                                                                            <input type="text" class="input-select1" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-4 mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span style="font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); font-weight: 600;">Message for Guide</span>
                                                                            <textarea class="col-12 p-3" style="height: 20vh; border: 1px solid #C4C4C4; font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); border-radius: 4px;"></textarea>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-end">
                                                                                <div class="col-12 pt-4" style="background-color: #E9E9E9; border-radius: 6px;">
                                                                                    <div class="row justify-content-center">
                                                                                        <div class="col-12" style="background-color: #333; border-radius: 6px;">
                                                                                            <div class="amountPic">
                                                                                                <div class="col-12">
                                                                                                    <div class="row p-1">
                                                                                                        <div class="col-6">
                                                                                                            <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Payments</span>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <div class="row pt-1">
                                                                                                                <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #ED9227;">Pending</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-6 mt-3">
                                                                                                            <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Full Price</span>
                                                                                                        </div>
                                                                                                        <div class="col-6 mt-3">
                                                                                                            <div class="row pt-1">
                                                                                                                <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">$2700</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Paid Amount</span>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <div class="row pt-1">
                                                                                                                <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">$1100</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Discount</span>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <div class="row pt-1">
                                                                                                                <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">0</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh);">Due Payment</span>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <div class="row pt-1">
                                                                                                                <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #EA2727;">$1400</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-12">
                                                                                                            <hr style="border: 1px solid #fff;">
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <span class="text-white" style="font-family: 'Segoe'; font-size: calc(0.56rem + 0.56vh); font-weight: 700;">Total</span>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <div class="row pt-1">
                                                                                                                <span class="text-end" style="font-size: calc(0.5rem + 0.5vh); font-family: 'Segoe'; color: #fff;">$ 1400</span>
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

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row justify-content-start pt-3">
                                                                <button class="btn col-4" data-bs-dismiss="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #EAEAEA; color: #656565; border: 1px solid #D2D2D2; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Replace -->




                                <!-- view Modal for small devices -->

                                <!-- Open modal from unassign tours -->

                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Unassigned Tour Order</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-5">
                                                            <div class="row">
                                                                <img src="./assets/img/ordersPg_IMG/tour_plan_pack.png" style="width: 100%;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-7 pt-2">
                                                            <div class="row" style="line-height: 0.28in;">
                                                                <span style="font-size: calc(0.6rem + 0.62vh); font-family: 'Segoe'; font-weight: bold; color: #000000;">Tour Plan Name</span>
                                                                <span style="color: #1197B5; font-size: calc(0.58rem + 0.61vh); font-weight: 500;">$2500</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row pt-3" style="line-height: 0.32in;">
                                                                <span style="color: #000000; font-weight: 600; font-family: 'Segoe';">Payment Status: &nbsp;&nbsp;<span style="color: #158921; font-weight: 400;">Complete</span></span>
                                                                <span style="color: #000000; font-weight: 600; font-family: 'Segoe';">Start Date: &nbsp;&nbsp;<span style="color: #000000; font-weight: 400;">26 Aug, 2023</span></span>
                                                                <span style="color: #000000; font-weight: 600; font-family: 'Segoe';">End Date: &nbsp;&nbsp;<span style="color: #000000; font-weight: 400;">26 Aug, 2023</span></span>
                                                                <span style="color: #000000; font-weight: 600; font-family: 'Segoe';">Members: &nbsp;&nbsp;<span style="color: #000000; font-weight: 400;">12</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <hr style="border: 2px solid #D7D7D7;">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-5">
                                                                    <div class="row pb-2">
                                                                        <span style="color: #000000; font-family: 'Segoe'; font-weight: 600;">Guide</span>
                                                                    </div>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select</option>
                                                                        <option value="1">Jayantha Perera</option>
                                                                        <option value="2">Sahan Perera</option>
                                                                        <option value="3">Prabath Gunawardhana</option>
                                                                    </select>
                                                                    <textarea class="col-12 mt-3 p-3" rows="10" style="background-color: #fff; font-size: calc(0.6rem + 0.62vh); border: 1px solid #C2C2C2; font-family: 'Segoe';"></textarea>
                                                                </div>
                                                                <div class="col-12 col-lg-7">
                                                                    <div class="row pb-2">
                                                                        <span style="color: #000000; font-family: 'Segoe'; font-weight: 600;">Customer Message</span>
                                                                    </div>
                                                                    <textarea readonly class="col-12 p-3" rows="8" style="background-color: #E9E9E9; height: auto; border: 1px solid #BDBDBD; color: #727272; font-weight: 400; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur. Nunc nisl ipsum odio in lectus mauris sapien. Ipsum tristique quis fringilla magna lacus sit in ultrices. Libero quis nisi tincidunt eu nunc nibh. Cras morbi eleifend justo odio tortor. Faucibus tristique id cursus in at pellentesque gravida. Morbi eget odio augue malesuada nibh aliquam nisl venenatis.</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary col-12 col-lg-2">Assign</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Open modal from unassign tours -->

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
                                <div class="col-12 mt-lg-5 mb-lg-5 mt-2 mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-lg-11 pt-5 px-5 pb-2" style="background-color: #fff;">
                                            <div class="row justify-content-center">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-5 col-lg-5 my-sm-2 mt-lg-0">
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
                                                        <div class="col-12 mt-lg-4 d-none d-lg-grid d-sm-none">
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
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
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
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
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
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
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
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center">12 Day</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 text-center">6 Day</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
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
                                                <div class="col-12 my-3 my-lg-5">
                                                    <div class="row justify-content-center gap-lg-3 gap-5 gap-sm-3">
                                                        <div class="col-12 col-lg-5" style="box-shadow: 1px 1.5px 7px 0px rgba(0, 0, 0, 0.25); border-radius: 10px; height: 28vh; overflow-y: scroll;">
                                                            <div class="row py-2">
                                                                <div class="col-12 my-2">
                                                                    <span style="font-family: 'Segoe'; font-weight: 800; font-size: calc(0.64rem + 0.63vh);">Unassigned Tours</span>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="col-12 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #EAEAEA; border-radius: 4px; cursor: pointer;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="mingcute:information-fill" style="color: #e45200;"></iconify-icon></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #EAEAEA; border-radius: 4px; cursor: pointer;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="mingcute:information-fill" style="color: #e45200;"></iconify-icon></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #EAEAEA; border-radius: 4px; cursor: pointer;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="mingcute:information-fill" style="color: #e45200;"></iconify-icon></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-5" style="box-shadow: 1px 1.5px 7px 0px rgba(0, 0, 0, 0.25); border-radius: 10px; height: 28vh; overflow-y: scroll;">
                                                            <div class="row py-2">
                                                                <div class="col-12 my-2">
                                                                    <span style="font-family: 'Segoe'; font-weight: 800; font-size: calc(0.64rem + 0.63vh);">Assigned Tours</span>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="col-12 mb-2" style="background-color: #EAEAEA; border-radius: 4px;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="fluent-mdl2:completed-solid" style="color: #158921;"></iconify-icon></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2" style="background-color: #EAEAEA; border-radius: 4px;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="fluent-mdl2:completed-solid" style="color: #158921;"></iconify-icon></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2" style="background-color: #EAEAEA; border-radius: 4px;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="fluent-mdl2:completed-solid" style="color: #158921;"></iconify-icon></span>
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