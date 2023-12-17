<?php

session_start();
if (isset($_SESSION["lt_admin"])) {

    require "assets/model/sqlConnection.php";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lankan Travel | Transaction</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/adminTemplate.css">
        <link rel="stylesheet" href="../css/adminPanel.css">
        <link rel="stylesheet" href="../css/font.css">
        <link rel="stylesheet" href="../css/scrolbar.css">
        <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="d-flex p-0">
                    <?php
                    // include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                    ?>

                    <div class="d-flex w-100 flex-column" style="max-height: 100vh; overflow-y: auto; min-height: 100vh;">
                        <?php
                        // include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                        ?>

                        <!-- Page Content / body content eka methanin liyanna -->
                        <div class="col-12 px-3 pt-2 pb-3">
                            <div class="row">

                                <button onclick="changeValues();">Change the Values</button>

                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>

                            </div>
                        </div>
                        <!-- Page Content / body content eka methanin liyanna -->

                    </div>

                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../js/transaction.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location: ../Admin");
}
