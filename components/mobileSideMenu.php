<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if ($location == 'primary') {
    ?>
        <link rel="stylesheet" href="./css/mobileMenu.css" />
        <link rel="stylesheet" href="./css/bootstrap.css" />
    <?php
    } else {
    ?>
        <link rel="stylesheet" href="../css/mobileMenu.css" />
        <link rel="stylesheet" href="../css/bootstrap.css" />
    <?php
    }
    ?>
    <style>
        .mobileMenuListItems a {
            text-decoration: none;
            color: #333333;
        }
    </style>
</head>

<body>
    <div class="position-fixed top-0 start-0 d-lg-none col-12 col-md-10" style="min-height: 100vh; z-index: 999; margin-left: -100%;" id="mobileMenuContainer">
        <div class="bg-white border-end border-1 border-secondary" style="width: 80%; min-height: 100vh; max-height: 100vh; overflow-y: auto; overflow-x: hidden;">

            <div class="px-3 py-3 pt-2 d-flex justify-content-between align-items-center">
                <div class="d-flex gap-1 align-items-center w-100 justify-content-center">
                    <?php
                    if ($location == 'primary') {
                    ?>
                        <img src="./assets/img/favicon.png" style="height: 3rem; width: auto;" />
                    <?php
                    } else {
                    ?>
                        <img src="../assets/img/favicon.png" style="height: 3rem; width: auto;" />
                    <?php
                    }
                    ?>
                    <span class="segoeui-bold fs-3 c-pointer" style="letter-spacing: 1px; color: #333333;">Lankan Travel</span>
                </div>
                <iconify-icon icon="mingcute:menu-fill" class="fs-3 py-1 scale-1_1 mobileMenuIcon" style="cursor: pointer; color: #333;" onclick="mobileMenuToggle();"></iconify-icon>
            </div>
            <div class="mobileMenuListItems d-flex flex-column gap-4">
                <a href="<?php
                            if ($location == 'primary') {
                                echo ('Home');
                            } else {
                                echo ('../Home');
                            }
                            ?>" class="item item-1 d-flex align-items-center gap-3 w-75 px-3 c-pointer">
                    <div class="iconContainer d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:home-bold" class=""></iconify-icon>
                    </div>
                    <span class="bottomBorder"></span>
                    <span class="quicksand-SemiBold">Home</span>
                </a>
                <a href="<?php
                            if ($location == 'primary') {
                                echo ('Tours');
                            } else {
                                echo ('../Tours');
                            }
                            ?>" class=" item item-2 d-flex align-items-center gap-3 w-75 px-3 c-pointer">
                    <div class="iconContainer d-flex justify-content-center align-items-center">
                        <iconify-icon icon="material-symbols:travel"></iconify-icon>
                    </div>
                    <span class="bottomBorder"></span>
                    <span class="quicksand-SemiBold">Tours</span>
                </a>
                <a href="<?php
                            if ($location == 'primary') {
                                echo ('Tour-Place');
                            } else {
                                echo ('../Tour-Place');
                            }
                            ?>" class="item item-3 d-flex align-items-center gap-3 w-75 px-3 c-pointer">
                    <div class="iconContainer d-flex justify-content-center align-items-center">
                        <iconify-icon icon="material-symbols:work-history"></iconify-icon>
                    </div>
                    <span class="bottomBorder"></span>
                    <span class="quicksand-SemiBold">Places</span>
                </a>
                <!-- <a href="#" class="item item-4 d-flex align-items-center gap-3 w-75 px-3 c-pointer">
                    <div class="iconContainer d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:gallery-bold"></iconify-icon>
                    </div>
                    <span class="bottomBorder"></span>
                    <span class="quicksand-SemiBold">Gallery</span>
                </a> -->
                <a href="<?php
                            if ($location == 'primary') {
                                echo ('Contact');
                            } else {
                                echo ('../Contact');
                            }
                            ?>" class="item item-5 d-flex align-items-center gap-3 w-75 px-3 c-pointer">
                    <div class="iconContainer d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fluent:contact-card-16-filled"></iconify-icon>
                    </div>
                    <span class="bottomBorder"></span>
                    <span class="quicksand-SemiBold">Contact</span>
                </a>
                <div onclick="goWatchlist();" class="item item-6 d-flex align-items-center gap-3 w-75 px-3 c-pointer">
                    <div class="iconContainer d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:heart"></iconify-icon>
                    </div>
                    <span class="bottomBorder"></span>
                    <span class="quicksand-SemiBold">Watchlist</span>
                </div>
                <div onclick="goMyTours();" class="item item-7 d-flex align-items-center gap-3 w-75 px-3 c-pointer">
                    <div class="iconContainer d-flex justify-content-center align-items-center">
                        <iconify-icon icon="material-symbols:travel"></iconify-icon>
                    </div>
                    <span class="bottomBorder"></span>
                    <span class="quicksand-SemiBold">My Tours</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>