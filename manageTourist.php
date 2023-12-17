<?php
require "assets/model/sqlConnection.php";

session_start();

if (isset($_SESSION["lt_admin"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lankan Travel | Manage Tourist</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/adminTemplate.css">
        <link rel="stylesheet" href="../css/manageTourist.css">
        <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="d-flex p-0">

                    <?php
                    include "./components/adminSidebar.php";
                    ?>

                    <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto;">
                        <?php
                        include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                        ?>
                        <!-- Page Content -->
                        <?php
                        $result = Database::search("SELECT * FROM `user`");
                        $user_count = $result->num_rows;
                        $users = $result->fetch_all(MYSQLI_ASSOC);

                        $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
                        $newly_added = Database::search("SELECT * FROM `user` WHERE `reg_date` >= '$sevenDaysAgo'");
                        $newly_added_count = $newly_added->num_rows;
                        ?>
                        <div class="col-12 px-5 py-3">
                            <div class="row mx-auto justify-content-center">
                                <div class="col-5 offset-1 py-2 px-3 rounded-3 mt-3 admin_card">
                                    <span class='text-white fs-5 fw-bold'>Members</span><br>
                                    <div class="text-end" style="margin-top: 100px;">
                                        <span class='text-white fw-bold'>
                                            <?php
                                            echo $user_count;
                                            ?></span>
                                    </div>
                                </div>
                                <div class="col-5 offset-1 py-2 px-3 rounded-3 mt-3 admin_card" style="background-color: #B40583;">
                                    <span class='text-white fs-5 fw-bold'>New Members</span><br>
                                    <div class="text-end" style="margin-top: 100px;">
                                        <span class='text-white fw-bold'>
                                            <?php
                                            echo $newly_added_count;
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-12 p-4 mt-3 rounded-3" style="background-color: #F0F0F0;">
                                    <div class="row">
                                        <div class="col-12 text-start">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-4 d-flex align-items-center">
                                                            <iconify-icon class="fs-3" icon="system-uicons:filter"></iconify-icon>
                                                            <span class="fs-6 mx-2">Filter</span>
                                                        </div>
                                                        <div class="col-7">
                                                            <select id="filter_tourist" onchange="filter();" class="form-select">
                                                                <option value="select">Select</option>
                                                                <option value="name">By Name</option>
                                                                <option value="email">By Email</option>
                                                                <option value="date">By Register Date</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 offset-4">
                                                    <div class="row">
                                                        <input type="text" id="search_tourist" onkeyup="search();" onkeypress="search();" class="form-control" placeholder="type name or ID">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4 p-3" id="table_container">
                                                <table class="table table-striped rounded-3">
                                                    <tr class="border border-secondary">
                                                        <th>Tourist ID</th>
                                                        <th>Tourist Name</th>
                                                        <th>Email Address</th>
                                                        <th>Registration Date</th>
                                                        <th>Action</th>
                                                    </tr>

                                                    <?php
                                                    foreach ($users as $user) {
                                                    ?>
                                                        <tr class="border border-secondary">
                                                            <td><?php
                                                                echo $user['id'];
                                                                ?></td>
                                                            <td><?php
                                                                echo $user['f_name'] . " " . $user['l_name'];
                                                                ?></td>
                                                            <td><?php
                                                                echo $user['email'];
                                                                ?></td>
                                                            <td><?php
                                                                $created_at = new DateTime($user['reg_date']);
                                                                echo $formattedDate = $created_at->format('F j, Y');;
                                                                ?></td>
                                                            <td>
                                                                <div class="col-4">
                                                                    <button class="btn btn-secondary btn-sm py-1 px-2 border" onclick="viewDetails(<?php
                                                                                                                                                    echo $user['id'];
                                                                                                                                                    ?>)"><iconify-icon icon="ph:eye-fill"></iconify-icon></iconify-icon></button>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page Content -->

                        <!-- modal -->
                        <div class="modal" tabindex="-1" id="viewDetailsModal">
                            <div class="modal-dialog" style="max-width:60%;">
                                <div class="modal-content" style="background-color: #E2E2E2;">

                                    <div class="modal-header" style="background-color: white;">
                                        <span class="fw-bold">Tourist Profile Details</span>
                                        <button type="button" class="btn btn-danger btn-sm rounded" data-bs-dismiss="modal" aria-label="Close"><iconify-icon icon="carbon:close-filled"></iconify-icon></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-6 text-start">
                                                <label class="form-label">
                                                    Name
                                                </label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" id="name" disabled />
                                                </div>
                                            </div>
                                            <div class="col-6 text-start">
                                                <label class="form-label">Mobile</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" id="mobile" disabled />
                                                </div>
                                            </div>
                                            <div class="col-6 text-start">
                                                <label class="form-label">Email</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" id="email" disabled />
                                                </div>
                                            </div>
                                            <div class="col-6 text-start">
                                                <label class="form-label">Country</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" id="country" disabled />
                                                </div>
                                            </div>
                                            <div class="col-6 text-start">
                                                <label class="form-label">Gender</label>
                                                <div class="input-group mb-1">

                                                    <input type="text" class="form-control" id="gender" disabled />
                                                </div>
                                            </div>
                                            <div class="col-6 text-start">
                                                <label class="form-label">Date of Birth</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" id="dob" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-header" style="background-color: white;">
                                        <span class="fw-bold">Registration Information</span>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-6 text-start">
                                                <label class="form-label">Tourist ID</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="user_id" disabled />
                                                </div>
                                            </div>
                                            <div class="col-6 text-start">
                                                <label class="form-label">Registration Date and Time</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="created_at" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->

                    </div>

                </div>

            </div>
        </div>

        <script src="../js/manageTourist.js"></script>
        <script src="../js/adminTemplate.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: ../Admin");
}

?>