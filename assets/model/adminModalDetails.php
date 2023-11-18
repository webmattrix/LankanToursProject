<?php

require "../model/sqlConnection.php";
$Email = $_GET["email"];
$rs = Database::search("SELECT * FROM `employee`INNER JOIN `admin` ON employee.id = admin.employee_id WHERE `email`='" . $Email . "' ");
$admin_data = $rs->fetch_assoc();

?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="font-family: QuickSand;">
            <h5 class="modal-title">Update Admin Deatails </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-12 p-3 border border-2 rounded-2" style="background-color: rgb(186, 186, 186);font-family: QuickSand;">
                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-lg-end text-start mt-2">Full Name</h6>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class=" form-control " value="<?php echo $admin_data["name"] ?>" id="A_name">
                        </div>

                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-lg-end text-start mt-2">Email</h6>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class=" form-control " value="<?php echo $admin_data["email"] ?>" id="A_email">
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-lg-end text-start mt-2">Mobile</h6>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class=" form-control " value="<?php echo $admin_data["mobile"] ?>" id="A_mobile">
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-lg-end text-start mt-2">NIC</h6>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class=" form-control " value="<?php echo $admin_data["nic"] ?>" readonly >
                        </div>
                    </div>
                </div>
              
                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-lg-end text-start mt-2">Address</h6>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class=" form-control " value="<?php echo $admin_data["address"] ?>" id="A_address">
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-lg-end text-start mt-2">Status</h6>
                        </div>
                        <div class="col-lg-8">
                            <?php if ($admin_data["status"] == 0) {
                            ?>
                                <input type="text" class=" form-control text-primary  " readonly value="Active">
                            <?php
                            } else {
                            ?>
                                <input type="text" class=" form-control text-danger disabled " readonly value="Unavailable">
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-10 offset-1">
                    <div class="row ">
                        <button type="button" class="btn text-white  mb-lg-3 mb-2" style="background-color:#83E873;" onclick="updateAdmin('<?php echo $admin_data['employee_id'] ?>');">Update Admin Details</button>
                        <?php if ($admin_data["status"] == 0) {
                            ?>
                                
                                <button type="button" class="btn text-white " style="background-color: #FB7B53;" onclick="deleteAdmin('<?php echo $admin_data['employee_id'] ?>');">Deacive Admin Details</button>
                            <?php
                            } else {
                            ?>
                                
                                <button type="button" class="btn text-white " style="background-color: #FB7B53;" onclick="deleteAdmin('<?php echo $admin_data['employee_id'] ?>');">Acive Admin Details</button>
                            <?php
                            }
                            ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>