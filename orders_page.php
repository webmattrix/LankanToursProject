
<?php

    require "./assets/model/getOrdersList.php";
    require "./assets/model/timeZoneConverter.php";

    session_start();

    $admin = $_SESSION["lt_admin"];

    $employee_rs = Database::search("SELECT *, `employee`.`name` AS `emp_name`, `employe_type`.`name` AS `emp_type`,`employee`.`id` AS `emp_id` 
                                     FROM `employee` 
                                     INNER JOIN `admin` ON `employee`.`id`=`admin`.`employee_id` 
                                     INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id` 
                                     WHERE `employee`.`id`='".$admin["employee_id"]."'");
    
    $employee_data = $employee_rs->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Orders</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <?php
    
    if(isset($_COOKIE["lt_theme"])){
      if($_COOKIE["lt_theme"] === 'light'){
        ?>
         <link rel="stylesheet" href="./css/orders_page.css">
        <?php
      }else{
        ?>
        <link rel="stylesheet" href="./css/orderDark.css">
        <?php
      }
    }else{
        ?>
         <link rel="stylesheet" href="./css/orders_page.css">
        <?php
    }

    ?>

    <link rel="stylesheet" href="../css/adminTemplate.css">
    <link rel="stylesheet" href="../css/orders_page.css" />
    <!-- <link rel="stylesheet" href="./css/orderDark.css" /> -->
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column bg-orderP" style="max-height: 100vh; overflow-y: auto;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div>
                        <div class="col-12">
                            <div class="row m-0 p-0">

                                <!-- view Modal for small devices -->

                                <div class="modal fade" id="openModalFromTable" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content bg-ord-modal">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 ord-modal-title1" id="exampleModalLabel">Tour Order</h1>
                                                <button type="button" class="closeBtn3" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 col-lg-11 d-none d-sm-none d-lg-grid">
                                                            <div class="row p-3" style=" border: 1px solid #A29A9A; border-radius: 6px;">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC2 py-3">Tourist Name : <span class="ord-modal-textC3" id="tourist_name2">Sahan Perera</span></span>
                                                                        <div class="col-7">
                                                                            <div class="row gap-3">
                                                                                <div class="col-5">
                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Name</span>
                                                                                    <input type="text" class="input-select1" style="background-color: #D9D9D9;" id="tour_name2" disabled />
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Duration</span>
                                                                                    <input type="text" class="input-select1" id="tour_duration2" style="background-color: #D9D9D9;" disabled />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Start Date</span>
                                                                                    <input type="date" class="input-select1" id="tour_startDate2" />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">End Date</span>
                                                                                    <input type="date" class="input-select1" id="tour_endDate2" />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Guide Name</span>
                                                                                    <input type="text" class="input-select1" style="background-color: #D9D9D9;" id="guide_name2" disabled />
                                                                                </div>
                                                                                <div class="col-5 mt-3">
                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tourist Members</span>
                                                                                    <input type="text" class="input-select1" style="background-color: #D9D9D9;" id="tour_members2" disabled />
                                                                                </div>
                                                                                <input class="col-5" type="text" hidden id="tourIdNo" disabled />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Client Message</span>
                                                                            <textarea class="col-12 p-3" id="tourist_msg2" style="height: 24vh; border: 1px solid #C4C4C4; background-color: #D9D9D9; font-family: 'Segoe'; border-radius: 4px;" readonly>Lorem ipsum dolor sit amet consectetur. Enim phasellus nibh neque amet tortor non dui non velit. Sed arcu vitae sit elementum aliquet massa dignissim amet lectus.</textarea>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-start">
                                                                                <div class="col-4">

                                                                                    <?php

                                                                                    $guide_List = Database::search("SELECT *,`employee`.`name` AS `guide_name` FROM `guide` INNER JOIN `employee` ON `guide`.`employee_id`=`employee`.`id`");
                                                                                    $guide_num = $guide_List->num_rows;

                                                                                    ?>

                                                                                    <span class="ord-modal-textC1" style="font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); font-weight: 600;">Select Guide</span>
                                                                                    <select class="ord_selector_modal" style="cursor: pointer;" aria-label="Default select example">
                                                                                        <option selected>Select</option>

                                                                                        <?php

                                                                                        for ($g = 0; $g < $guide_num; $g++) {
                                                                                            $guide_data = $guide_List->fetch_assoc();
                                                                                        ?>
                                                                                            <option value="<?php echo $guide_data["id"]; ?>"><?php echo $guide_data["guide_name"]; ?></option>
                                                                                        <?php
                                                                                        }

                                                                                        ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-end">
                                                                                <div class="col-5 mt-2">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="row justify-content-end gap-2">
                                                                                                <div class="col-5">
                                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Cost</span>
                                                                                                    <div class="input-group">
                                                                                                        <input type="text" class="form-control" id="tourCost" />
                                                                                                        <span class="input-group-text">$</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Saving Amount</span>
                                                                                                    <input type="text" class="input-select1" id="tourSaveAmount" />
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

                                                                                    <span class="ord-modal-textC1" style="font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); font-weight: 600;">Message for Guide</span>
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
                                                                        <button class="btn col-lg-2 col-sm-3" data-bs-dismiss="modal" style="font-family: 'Inter'; font-size: calc(0.54rem + 0.56vh); background-color: #EAEAEA; color: #656565; border: 1px solid #D2D2D2; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);" onclick="tableModalUpdate();">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-grid d-sm-grid d-lg-none">
                                                            <div class="row p-3" style="line-height: 0.3in; border: 1px solid #A29A9A; border-radius: 6px;">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Status of Tour</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; color: #158921; display: flex; align-items: center; font-size: calc(0.56rem + 0.57vh);">Ongoing &nbsp;&nbsp;<iconify-icon icon="ic:baseline-circle" style="color: #158921;"></iconify-icon></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">11 Day</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Duration of Tour</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">2023/06/12 - 2023/06/14</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan ID</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">TO_001</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour Plan Rating</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">
                                                                            <iconify-icon icon="ic:baseline-star icon-style4"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star icon-style4"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star icon-style4"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-half icon-style4"></iconify-icon>
                                                                            <iconify-icon icon="ic:baseline-star-border icon-style4"></iconify-icon>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Tour guide</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">Sahan Perera</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh); font-weight: 600;">Members</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Inter'; font-size: calc(0.56rem + 0.57vh);">11</span>
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
                                        <div class="modal-content bg-ord-modal">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 ord-modal-title1" id="exampleModalToggleLabel2">Tour Order</h1>
                                                <button type="button" class="closeBtn3" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 d-grid d-sm-grid d-lg-none">
                                                    <div class="row p-3" style=" border: 1px solid #A29A9A; border-radius: 6px;">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row gap-3">
                                                                        <div class="col-12">
                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Name</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tour Duration</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Start Date</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">End Date</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Guide Name</span>
                                                                            <input type="text" class="input-select1" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Tourist Members</span>
                                                                            <input type="text" class="input-select1" style="background-color: #D9D9D9;" disabled />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Client Message</span>
                                                                    <textarea class="col-12 p-3" style="height: 24vh; border: 1px solid #C4C4C4; background-color: #D9D9D9; font-family: 'Segoe'; border-radius: 4px;" readonly>Lorem ipsum dolor sit amet consectetur. Enim phasellus nibh neque amet tortor non dui non velit. Sed arcu vitae sit elementum aliquet massa dignissim amet lectus.</textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="row justify-content-end gap-2">
                                                                                        <div class="col-12 mt-3">
                                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Cost</span>
                                                                                            <div class="input-group">
                                                                                                <input type="text" class="form-control" />
                                                                                                <span class="input-group-text">$</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <span class="ord-modal-textC1" style="font-size: calc(0.55rem + 0.55vh); font-weight: 600; font-family: 'Segoe';">Discount</span>
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
                                                                            <span class="ord-modal-textC1" style="font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); font-weight: 600;">Message for Guide</span>
                                                                            <textarea class="col-12 p-3" style="height: 20vh; border: 1px solid #C4C4C4; font-family: 'Segoe'; font-size: calc(0.58rem + 0.58vh); border-radius: 4px;"></textarea>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-end">
                                                                                <div class="col-12 pt-4" style="border-radius: 6px;">
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

                                <div class="modal fade" id="openUngModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content bg-ord-modal">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 ord-modal-title1" id="exampleModalLabel">Unassigned Tour Order</h1>
                                                <button type="button" class="closeBtn3" onclick="reloadModal();" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-5">
                                                            <div class="row">
                                                                <img src="../assets/img/ordersPg_IMG/tour_plan_pack.png" style="width: 100%;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-7 pt-2">
                                                            <div class="row" style="line-height: 0.28in;">
                                                                <span class="ord-modal-textC1" style="font-size: calc(0.6rem + 0.62vh); font-family: 'Segoe'; font-weight: 500;" id="tpName">Tour Plan Name</span>
                                                                <span class="unsg-ord-modal-price" style="font-size: calc(0.58rem + 0.61vh); font-weight: 500;" id="tpCost">$2500</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row pt-3" style="line-height: 0.32in;">
                                                                <span class="ord-modal-textC1" style="font-weight: 500; font-family: 'Segoe';">Payment Status: &nbsp;&nbsp;<span class="ord-modal-sts-sucs" style="font-weight: 400;" id="tpOverall">Complete</span></span>
                                                                <span class="ord-modal-textC1" style="font-weight: 500; font-family: 'Segoe';">Start Date: &nbsp;&nbsp;<span class="ord-modal-textC1" style="font-weight: 400;" id="tpStartD">26 Aug, 2023</span></span>
                                                                <span class="ord-modal-textC1" style="font-weight: 500; font-family: 'Segoe';">End Date: &nbsp;&nbsp;<span class="ord-modal-textC1" style="font-weight: 400;" id="tpEndD">26 Aug, 2023</span></span>
                                                                <span class="ord-modal-textC1" style="font-weight: 500; font-family: 'Segoe';">Members: &nbsp;&nbsp;<span class="ord-modal-textC1" style="font-weight: 400;" id="tpMemberC">12</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <hr style="border: 2px solid #D7D7D7;">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-5">
                                                                    <div class="row pb-2">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Segoe'; font-weight: 500;">Guide</span>
                                                                    </div>

                                                                    <?php

                                                                    $guide_List1 = Database::search("SELECT *,`employee`.`name` AS `guide_name` FROM `guide` INNER JOIN `employee` ON `guide`.`employee_id`=`employee`.`id`");
                                                                    $guide_num1 = $guide_List1->num_rows;

                                                                    ?>

                                                                    <select class="selector_ord" style="cursor: pointer;" aria-label="Default select example" id="select_guide">
                                                                        <option selected>Select</option>
                                                                        <?php
                                                                        for ($z = 0; $z < $guide_num1; $z++) {
                                                                            $guide_data1 = $guide_List1->fetch_assoc();
                                                                        ?>
                                                                            <option value="<?php echo $guide_data1["id"]; ?>"><?php echo $guide_data1["guide_name"]; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                    <textarea class="col-12 mt-3 p-3" rows="10" id="forGuideMsg" style="background-color: #fff; height: 20vh; overflow-y: auto; font-size: calc(0.6rem + 0.62vh); border: 1px solid #C2C2C2; font-family: 'Segoe';"></textarea>
                                                                </div>
                                                                <div class="col-12 col-lg-7">
                                                                    <div class="row pb-2">
                                                                        <span class="ord-modal-textC1" style="font-family: 'Segoe'; font-weight: 500;">Customer Message</span>
                                                                    </div>
                                                                    <textarea disabled class="col-12 p-3" rows="8" id="cusMessage" style="background-color: #E9E9E9; height: 25vh; overflow-y: auto; border: 1px solid #BDBDBD; color: #727272; font-weight: 400; font-family: 'Segoe';">Lorem ipsum dolor sit amet consectetur. Nunc nisl ipsum odio in lectus mauris sapien. Ipsum tristique quis fringilla magna lacus sit in ultrices. Libero quis nisi tincidunt eu nunc nibh. Cras morbi eleifend justo odio tortor. Faucibus tristique id cursus in at pellentesque gravida. Morbi eget odio augue malesuada nibh aliquam nisl venenatis.</textarea>
                                                                    <input type="text" id="responseTourId" hidden />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary col-12 col-lg-2" onclick="assignOrder();">Assign</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Open modal from unassign tours -->

                                <div class="col-12">
                                    <div class="row justify-content-center">
                                        <div class="col-10 mt-lg-5 mt-3">
                                            <div class="row">

                                                <?php

                                                $top_tour = Database::search("SELECT *, COUNT(`tour_id`) AS `tour_count`,`tour_id`,`tour`.`name` AS `tour_name`, SUM(`members`) AS `total_members`, SUM(`cost`) AS `worth` 
                                            FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` GROUP BY `tour_id` ORDER BY `tour_count` DESC LIMIT 1");
                                                $top_tour_data = $top_tour->fetch_assoc();

                                                ?>

                                                <div class="col-12 col-lg-4">
                                                    <div class="row">
                                                        <img src="../assets/img/ordersPg_IMG/tour_plan_pack.png" style="width: 100%; height: 25vh;" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-8 py-2 px-3">
                                                    <div class="row" style="line-height: 0.4in;">
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Tour Name :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;"><?php echo $top_tour_data["tour_name"]; ?></span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Tour Count :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;">1<?php echo $top_tour_data["tour_count"]; ?></span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Total Members :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;"><?php echo $top_tour_data["total_members"]; ?></span></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <span class="top-tour-details1" style="font-family: 'Segoe'; font-weight: 700;">Worth :&nbsp;&nbsp;&nbsp;<span class="top-tour-details1" style="font-weight: 400;">$ <?php echo $top_tour_data["worth"]; ?></span></span>
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
                                        <div class="col-12 col-lg-11 pt-5 px-5 pb-2 blog-ord-bg-cont1">
                                            <div class="row justify-content-center">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-5 col-lg-5 my-sm-2 mt-lg-0">
                                                            <span class="d-flex align-items-center"><iconify-icon icon="material-symbols:tune" class="fs-5 icon-style3"></iconify-icon> &nbsp;<span class="filter-textC2" style="font-family: 'Segoe'; font-size: calc(0.64rem + 0.68vh);">Filter</span>
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
                                                                        <!-- onkeyup="searchFiltering();" onkeypress="searchFiltering();" onkeydown="searchFiltering();" -->
                                                                        <input type="text" class="form-control" onkeyup="searchFiltering();" id="searchAnyInp" placeholder="search here..." style="font-family: 'Segoe'; background-color: #E3E3E3;">
                                                                        <span class="input-group-text"><a href="#" style="color: #858585;"><iconify-icon icon="fe:search"></iconify-icon></a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-lg-4 d-none d-lg-grid d-sm-none">
                                                            <div class="row">
                                                                <table class="table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-3 py-3 text-center tab-ord-textC">Tour Plan</th>
                                                                                <th class="col-3 py-3 text-center tab-ord-textC">Tour Guide</th>
                                                                                <th class="col-1 py-3 text-center tab-ord-textC">Members</th>
                                                                                <th class="col-3 py-3 text-center tab-ord-textC">Date Duration</th>
                                                                                <th class="col-1 py-3 text-center tab-ord-textC">Status</th>
                                                                                <th class="col-1 py-3 text-center tab-ord-textC">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php

                                                                        $date = new DateTime();
                                                                        $tz = new DateTimeZone("Asia/Colombo");
                                                                        $date->setTimezone($tz);
                                                                        $formatDate = $date->format("Y-m-d");

                                                                        // $order_details = Database::search("SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `order_st_name` FROM `order` INNER JOIN `tour` 
                                                                        // ON `order`.`tour_id`=`tour`.`id` INNER JOIN `guide` 
                                                                        // ON `order`.`guide_id`=`guide`.`id` INNER JOIN `employee` 
                                                                        // ON `guide`.`employee_id`=`employee`.`id` INNER JOIN `order_status` 
                                                                        // ON `order`.`order_status_id`=`order_status`.`id` 
                                                                        // WHERE `end_date`>='" . $formatDate . "' AND `order_status`.`name`='Assigned'");

                                                                        // $order_num = $order_details->num_rows;

                                                                        $order_rs = "SELECT *,`tour`.`name` AS `tour_name`,`order`.`id` AS `order_id`,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `order_st_name` 
                                                                        FROM `order` INNER JOIN `tour` 
                                                                        ON `order`.`tour_id`=`tour`.`id` INNER JOIN `guide` 
                                                                        ON `order`.`guide_id`=`guide`.`id` INNER JOIN `employee` 
                                                                        ON `guide`.`employee_id`=`employee`.`id` INNER JOIN `order_status` 
                                                                        ON `order`.`order_status_id`=`order_status`.`id` 
                                                                        WHERE `end_date`>='" . $formatDate . "' AND `order_status`.`name`='Assigned' ORDER BY `start_date` ASC";

                                                                        $ct_order_rs = "SELECT *,`employee`.`name` AS `guide_name`,`custom_tour`.`id` AS `order_id`,`order_status`.`name` AS `order_st_name` 
                                                                        FROM `custom_tour` INNER JOIN `guide` 
                                                                        ON `custom_tour`.`guide_id`=`guide`.`id` INNER JOIN `employee` 
                                                                        ON `guide`.`employee_id`=`employee`.`id` INNER JOIN `order_status` 
                                                                        ON `custom_tour`.`order_status_id`=`order_status`.`id` 
                                                                        WHERE `end_date`>='" . $formatDate . "' AND `order_status`.`name`='Assigned' ORDER BY `start_date` ASC";

                                                                        $orderList = getOrders::getOrderList($order_rs, $ct_order_rs);


                                                                        // $order_num = $order_rs->num_rows;
                                                                        // $ct_order_num = $ct_order_rs->num_rows;

                                                                        // $order_iteration = 0;
                                                                        // $ct_order_iteration = 0;

                                                                        // $loop = true;

                                                                        // $order_previouse = null;
                                                                        // $ct_order_previouse = null;

                                                                        // $order_data = null;
                                                                        // $ct_order_data = null;

                                                                        // $order_start = null;
                                                                        // $ct_order_start = null;

                                                                        // $tour_name;
                                                                        // $table_name;

                                                                        // while ($loop) {

                                                                        //     if ($order_previouse == null) {
                                                                        //         if ($order_iteration < $order_num) {
                                                                        //             $order_data = $order_rs->fetch_assoc();
                                                                        //             $order_start = strtotime($order_data["start_date"]);
                                                                        //             $order_iteration = $order_iteration + 1;
                                                                        //         } else {
                                                                        //             $order_start = "9999-99-99";
                                                                        //         }
                                                                        //     } else {
                                                                        //     }

                                                                        //     if ($ct_order_previouse == null) {
                                                                        //         if ($ct_order_iteration < $ct_order_num) {
                                                                        //             $ct_order_data = $ct_order_rs->fetch_assoc();
                                                                        //             $ct_order_start = strtotime($ct_order_data["start_date"]);
                                                                        //             $ct_order_iteration = $ct_order_iteration + 1;
                                                                        //         } else {
                                                                        //             $ct_order_start = "9999-99-99";
                                                                        //         }
                                                                        //     } else {
                                                                        //     }

                                                                        //     if ($order_start > $ct_order_start) {
                                                                        //         $order_previouse = $order_data;
                                                                        //         $ct_order_previouse = null;
                                                                        //         $main_data = $ct_order_data;
                                                                        //         $tour_name = "Custom Tour";
                                                                        //         $table_name = "Custom_T";
                                                                        //     } else {
                                                                        //         $ct_order_previouse = $ct_order_data;
                                                                        //         $order_previouse = null;
                                                                        //         $main_data = $order_data;
                                                                        //         $tour_name = $main_data["tour_name"];
                                                                        //         $table_name = "Company_T";
                                                                        //     }


                                                                        //     if ($order_iteration == $order_num && $ct_order_iteration == $ct_order_num) {
                                                                        //         $loop = false;
                                                                        //     }



                                                                        // echo (json_encode($main_data) . "<br>");

                                                                        // $new_tour_type;

                                                                        // if($tour_type == "custom"){
                                                                        //     $new_tour_type = "Custom_Tour";
                                                                        // }else{
                                                                        //     $new_tour_type = $main_data["tour_name"];
                                                                        // }

                                                                        // echo($new_tour_type);

                                                                        ?>
                                                                        <?php

                                                                        for ($x = 0; $x < sizeof($orderList); $x++) {

                                                                            $table_row = $orderList[$x];

                                                                            $timeSetStart = timeConverter::convert($table_row["start_date"]);
                                                                            $timeSetEnd = timeConverter::convert($table_row["end_date"]);

                                                                            $new_status;

                                                                            if ($timeSetStart < $formatDate) {
                                                                                $new_status = "Ongoing";
                                                                            } else {
                                                                                $new_status = "Pending";
                                                                            }
                                                                        ?>

                                                                            <tr>
                                                                                <div class="row">
                                                                                    <th class="col-3 py-2 text-center fw-normal tab-ord-textC"><?php echo $table_row["tour_name"]; ?></th>
                                                                                    <td class="col-3 py-2 text-center tab-ord-textC"><?php echo $table_row["guide_name"]; ?></td>
                                                                                    <td class="col-1 py-2 text-center tab-ord-textC"><?php echo $table_row["members"]; ?></td>
                                                                                    <td class="col-3 py-2 text-center tab-ord-textC"><?php echo date("d M, Y", strtotime($timeSetStart)) . " - " . (date("d M, Y", strtotime($timeSetEnd))); ?></td>
                                                                                    <td class="col-1 py-2 text-center <?php if ($new_status == "Pending") {
                                                                                                                            echo ("tab-ord-sts-pend-textC");
                                                                                                                        } else {
                                                                                                                            echo ("tab-ord-sts-ong-textC");
                                                                                                                        } ?>"><?php echo $new_status; ?></td>
                                                                                    <td class="col-1 text-center">
                                                                                        <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" onclick="tableModalOpen('<?php echo $table_row['order_id']; ?>','<?php echo $table_row['tour_name']; ?>');" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                    </td>
                                                                                </div>
                                                                            </tr>

                                                                        <?php

                                                                        }

                                                                        ?>

                                                                        <!-- <tr>
                                                                            <div class="row">
                                                                                <th class="col-2 py-2 text-center fw-normal tab-ord-textC">11 Day</th>
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">Jayantha Perera</td>
                                                                                <td class="col-1 py-2 text-center tab-ord-textC">15</td>
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 py-2 text-center tab-ord-sts-pend-textC">Pending</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-2 py-2 text-center fw-normal tab-ord-textC">Luxury 5 Day</th>
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">Prabath Gunawardhana</td>
                                                                                <td class="col-1 py-2 text-center tab-ord-textC">15</td>
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">2023/06/12 - 2023/06/14</td>
                                                                                <td class="col-2 py-2 text-center tab-ord-sts-pend-textC">Pending</td>
                                                                                <td class="col-1 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr> -->
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- small devices -->
                                                        <div class="col-12 mt-3 mt-lg-0 d-grid d-lg-none d-sm-grid">
                                                            <div class="row">
                                                                <table class="table-bordered" style="font-family: 'Inter'; border: 1px solid #858585;">
                                                                    <thead>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <th class="col-4 py-3 text-center tab-ord-textC">Tour Plan Name</th>
                                                                                <th class="col-2 py-3 text-center tab-ord-textC">View</th>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">11 Day</td>
                                                                                <td class="col-1 py-2 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">12 Day</td>
                                                                                <td class="col-1 py-2 text-center">
                                                                                    <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff;"></iconify-icon>
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="row">
                                                                                <td class="col-3 py-2 text-center tab-ord-textC">6 Day</td>
                                                                                <td class="col-1 py-2 text-center">
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
                                                    <div class="row justify-content-center gap-lg-4 gap-5 gap-sm-3">
                                                        <div class="col-12 col-lg-5 unsg-ord-blog1" style="border-radius: 10px; height: 28vh; overflow-y: scroll;">
                                                            <div class="row py-2">

                                                                <?php

                                                                $ung_tour_rs = "SELECT *, `order_status`.`name` AS `status`,`tour`.`name` AS `tour_name` FROM `order` 
                                                                INNER JOIN `order_status` ON `order`.`order_status_id`=`order_status`.`id` 
                                                                INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
                                                                WHERE `order_status`.`name`='Unassigned' ORDER BY `date_time` ASC";

                                                                $ct_ung_tour_rs = "SELECT *, `order_status`.`name` AS `status` FROM `custom_tour` 
                                                                INNER JOIN `order_status` ON `custom_tour`.`order_status_id`=`order_status`.`id` 
                                                                WHERE `order_status`.`name`='Unassigned' ORDER BY `date_time` ASC";

                                                                $orderList1 = getOrders::getOrderList($ung_tour_rs, $ct_ung_tour_rs);

                                                                ?>

                                                                <div class="col-12 my-2">
                                                                    <span class="unsg-blog-title1" style="font-family: 'Segoe'; font-weight: 800; font-size: calc(0.64rem + 0.63vh);">Unassigned Tours</span>
                                                                </div>
                                                                <div class="col-12">

                                                                    <?php

                                                                    for ($y = 0; $y < sizeof($orderList1); $y++) {

                                                                        $ung_tour_data = $orderList1[$y];

                                                                    ?>

                                                                        <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="assignOpenModel(<?php echo $ung_tour_data['id']; ?>);" style="border-radius: 4px; cursor: pointer;">
                                                                            <div class="row px-2 pb-3">
                                                                                <div class="col-2 pt-4 pt-lg-3">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <div class="row">
                                                                                        <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh);"><?php echo $ung_tour_data["date_time"]; ?></span>
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);"><?php echo $ung_tour_data["tour_name"]; ?></span>
                                                                                    </div>
                                                                                    <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-10">
                                                                                            <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);"><?php echo $ung_tour_data["request_message"]; ?></span>
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

                                                                    <?php

                                                                    }

                                                                    ?>

                                                                    <!-- <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="border-radius: 4px; cursor: pointer;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh);">2023-08-16</span>
                                                                                    <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
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
                                                                    <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="border-radius: 4px; cursor: pointer;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh);">2023-08-16</span>
                                                                                    <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="mingcute:information-fill" style="color: #e45200;"></iconify-icon></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-5 unsg-ord-blog1" style="border-radius: 10px; height: 28vh; overflow-y: scroll;">
                                                            <div class="row py-2">
                                                                <div class="col-12 my-2">
                                                                    <span class="unsg-blog-title1" style="font-family: 'Segoe'; font-weight: 800; font-size: calc(0.64rem + 0.63vh);">Assigned Tours</span>
                                                                </div>
                                                                <div class="col-12">

                                                                    <?php

                                                                    $asg_tours = Database::search("SELECT *,`tour`.`name` AS `tour_name` FROM `order` 
                                                                  INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
                                                                  INNER JOIN `order_status` ON `order`.`order_status_id`=`order_status`.`id` 
                                                                  WHERE `order_status`.`name`='Assigned' ORDER BY `date_time` DESC");

                                                                    $asg_num = $asg_tours->num_rows;

                                                                    ?>

                                                                    <?php

                                                                    for ($t = 0; $t < $asg_num; $t++) {
                                                                        $asg_data = $asg_tours->fetch_assoc();
                                                                    ?>

                                                                        <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="assignOpenModel(<?php echo $asg_data['tour_id']; ?>);" style="border-radius: 4px;">
                                                                            <div class="row px-2 pb-3">
                                                                                <div class="col-2 pt-4 pt-lg-3">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon2.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                    <img src="../assets/img/ordersPg_IMG/user_icon2.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <div class="row">
                                                                                        <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh);"><?php echo $asg_data["date_time"]; ?></span>
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);"><?php echo $asg_data["tour_name"]; ?></span>
                                                                                    </div>
                                                                                    <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-10">
                                                                                            <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);"><?php echo $asg_data["request_message"]; ?></span>
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

                                                                    <?php
                                                                    }

                                                                    ?>
                                                                    <!--                                                                     
                                                                    <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="border-radius: 4px;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
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
                                                                    <div class="col-12 mb-2 unsg-collapse-cont1" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="border-radius: 4px;">
                                                                        <div class="row px-2 pb-3">
                                                                            <div class="col-2 pt-4 pt-lg-3">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-none d-lg-grid d-sm-grid" style="width: 52px; height: 52px;" alt="">
                                                                                <img src="./assets/img/ordersPg_IMG/user_icon2.png" class="d-grid d-lg-none d-sm-none" style="width: 40px; height: 40px;" alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <span class="text-end unsg-cont-date1" style="font-family: 'Segoe'; font-size: calc(0.48rem + 0.48vh); color: #7B7B7B;">2023-08-16</span>
                                                                                    <span class="unsg-cont-tourN" style="font-weight: 700; font-family: 'Segoe'; font-size: calc(0.54rem + 0.54vh);">Tour plan name</span>
                                                                                </div>
                                                                                <div class="mt-1" style="border: 1px solid #D7D7D7;"></div>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <span class="unsg-cont-tourN" style="font-weight: 500; font-family: 'Segoe'; font-size: calc(0.5rem + 0.5vh);">request details</span>
                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <div class="row">
                                                                                            <span class="text-end mt-1"><iconify-icon icon="fluent-mdl2:completed-solid" style="color: #158921;"></iconify-icon></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
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

    <script src="../js/orders.js"></script>
    <script src="../js/adminTemplate.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>