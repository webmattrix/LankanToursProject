<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/newHeader.css">
    <link rel="stylesheet" href="../css/font.css">
</head>

<body>

    <div class="w-100 position-sticky top-0 start-0 d-flex justify-content-between p-3 header-container align-items-center flex-row-reverse flex-md-row" style="z-index: 9;" id="headerContainer">

        <div class="d-flex align-items-center d-md-none position-relative">
            <iconify-icon icon="codicon:account" class="fs-3 mobile-account-icon scale-1_1" style="cursor: pointer;" id="accountIcon"></iconify-icon>
            <div class="position-absolute opacity-100 top-100 end-100 px-3 p-2 rounded fs-6 quicksand-Medium d-none" style="background-color: #343434; border: 1px solid #767676; width: 250px;" id="headerMorePanel1">
                <?php include "headerMore.php"; ?>
            </div>
        </div>

        <div class="site-name">
            <span class="text-white segoeui-bold fs-3 c-pointer" style="letter-spacing: 1px;">Lankan Tours</span>
        </div>
        <div class="header-menu p-0 m-0 d-none d-md-block">
            <ul class="d-flex list-unstyled gap-5 mb-0 quicksand-SemiBold" style="align-items: center;">
                <li>
                    <a href="#" class="text-decoration-none c-pointer">
                        <span class="d-lg-block d-none">Home</span>
                        <iconify-icon icon="solar:home-linear" class="d-block fs-4 d-lg-none text-white" title="Home"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="Tours" class="text-decoration-none c-pointer">
                        <span class="d-lg-block d-none">Tours</span>
                        <iconify-icon icon="carbon:plane" class="d-block fs-4 d-lg-none text-white" title="Tours"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-decoration-none c-pointer">
                        <span class="d-lg-block d-none">History</span>
                        <iconify-icon icon="ic:round-history" class="d-block fs-4 d-lg-none text-white" title="History"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-decoration-none c-pointer">
                        <span class="d-lg-block d-none">Gallery</span>
                        <iconify-icon icon="solar:gallery-outline" class="d-block fs-4 d-lg-none text-white" title="Gallery"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="contact" class="text-decoration-none c-pointer">
                        <span class="d-lg-block d-none">Contact</span>
                        <iconify-icon icon="ri:customer-service-2-line" class="d-block fs-4 d-lg-none text-white" title="Contact"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="Login" class="text-decoration-none c-pointer">
                        <span class="d-lg-block d-none">Join</span>
                        <iconify-icon icon="solar:login-outline" class="d-block fs-4 d-lg-none" title="Log In"></iconify-icon>
                    </a>
                </li>
                <li class="position-relative">
                    <a class="text-white text-decoration-none c-pointer" id="headerMoreIcon">
                        <iconify-icon icon="mingcute:more-2-fill" class="text-white pt-2"></iconify-icon>
                    </a>
                    <div class="position-absolute opacity-100 top-100 end-100 px-3 p-2 rounded fs-6 quicksand-Medium d-none" style="background-color: #343434; border: 1px solid #767676; width: 250px;" id="headerMorePanel2">
                        <?php include "headerMore.php"; ?>
                    </div>
                </li>
            </ul>

        </div>
        <div class="d-flex align-items-center d-md-none">
            <iconify-icon icon="mingcute:menu-fill" class="text-white fs-3 scale-1_1" style="cursor: pointer;"></iconify-icon>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>