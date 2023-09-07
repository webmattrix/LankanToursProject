<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="adminTemplate.css">
    <link rel="stylesheet" href="css/touristPage.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body class="overflow-hidden">

    <div class="container-fluid ps-0 overflow-auto pe-0">
        <div class="d-flex" style="height: 100vh; overflow-y: auto;">

            <?php include "adminTemplate.php" ?>

            <div class="d-flex flex-column w-100 px-3 pe-1 px-lg-5 overflow-auto overflow-x-hidden">
            
                <?php include "adminHeader.php" ?>

                <!-- Page Content -->
                <div class="col-12">
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

                        <div class="col-12 p-3 mt-3" style="background-color: #F0F0F0;">
                            <div class="row">
                                <div class="col-6 text-start">
                                    <div>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    hello
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Content -->

            </div>
        </div>
    </div>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js">
    </script>
    <script src="adminTemplate.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>