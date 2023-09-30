<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/manageTourist.css">
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
                    <div class="col-12 px-5 py-3">
                        <div class="row mx-auto justify-content-center">
                            <div class="col-5 offset-1 py-2 px-3 rounded-3 mt-3 admin_card">
                                <span class='text-white fs-5 fw-bold'>Members</span><br>
                                <div class="text-end" style="margin-top: 100px;">
                                    <span class='text-white fw-bold'>1120</span>
                                </div>
                            </div>
                            <div class="col-5 offset-1 py-2 px-3 rounded-3 mt-3 admin_card" style="background-color: #B40583;">
                                <span class='text-white fs-5 fw-bold'>New Members</span><br>
                                <div class="text-end" style="margin-top: 100px;">
                                    <span class='text-white fw-bold'>24</span>
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
                                                        <select class="form-select">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 offset-4">
                                                <div class="row">
                                                    <input type="text" class="form-control" placeholder="type name or ID">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4 p-3">
                                            <table class="table table-striped rounded-3">
                                                <tr class="border border-secondary">
                                                    <th>Tourist ID</th>
                                                    <th>Tourist Name</th>
                                                    <th>Email Address</th>
                                                    <th>Registration Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr class="border border-secondary">
                                                    <td>TR_001</td>
                                                    <td>Sahan Perera</td>
                                                    <td>sahan@gmail.com</td>
                                                    <td>2023/08/16</td>
                                                    <td>
                                                        <div class="col-4">
                                                            <button class="btn btn-secondary btn-sm py-1 px-2 border"><iconify-icon icon="ph:eye-fill"></iconify-icon></iconify-icon></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border border-secondary">
                                                    <td>TR_001</td>
                                                    <td>Sahan Perera</td>
                                                    <td>sahan@gmail.com</td>
                                                    <td>2023/08/16</td>
                                                    <td>
                                                        <div class="col-4">
                                                            <button class="btn btn-secondary btn-sm py-1 px-2 border"><iconify-icon icon="ph:eye-fill"></iconify-icon></iconify-icon></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border border-secondary">
                                                    <td>TR_001</td>
                                                    <td>Sahan Perera</td>
                                                    <td>sahan@gmail.com</td>
                                                    <td>2023/08/16</td>
                                                    <td>
                                                        <div class="col-4">
                                                            <button class="btn btn-secondary btn-sm py-1 px-2 border"><iconify-icon icon="ph:eye-fill"></iconify-icon></iconify-icon></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Content -->

                </div>

            </div>

        </div>
    </div>

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>