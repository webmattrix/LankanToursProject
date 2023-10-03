<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="./css/watchlist.css" />
    <link rel="stylesheet" href="./css/newHeader.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/scrolbar.css"/>
</head>

<body style="background-color: #E2E2E2;">

    <?php include "./components/newHeader.php"; ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center" style="height: auto;">
                            <div class="col-lg-7 mt-3 mt-lg-5 d-none d-lg-grid d-sm-grid">
                                <div class="col-12 search_bar1" style="background-color: #fff; border-radius: 50px; border: 1px solid #2452F2;">
                                    <div class="row">
                                        <div class="col-7">
                                            <input type="text" id="search_field" class="search_field1" placeholder="search here..." />
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <div class="col-8 selectDrop_area1">
                                                    <div class="selectDrop1" id="select_text">
                                                        <span id="textInc" style="font-family: 'Inter';">Places</span>
                                                        <iconify-icon id="iconShow" icon="mingcute:down-line" style="font-size: 20px;"></iconify-icon>
                                                    </div>
                                                    <ul id="openList" class="dropList list-unstyled">
                                                        <li class="selectItem">Places</li>
                                                        <li class="selectItem">11</li>
                                                        <li class="selectItem">22</li>
                                                        <li class="selectItem">33</li>
                                                        <li class="selectItem">44</li>
                                                        <li class="selectItem">55</li>
                                                    </ul>
                                                </div>
                                                <div class="col-4">
                                                    <iconify-icon class="icon_Sbtn1" icon="ic:round-search"></iconify-icon>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4" style="border: 1px solid #7B7B7B;" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mt-3 mb-lg-4">
                                <div class="col-12" style="background-color: #fff; border-radius: 5px; height: 72.1vh; overflow-y: auto; overflow-x: hidden;">
                                    <div class="row p-lg-4" style="row-gap: 0.3in;">
                                        <div class="col-12">
                                            <div class="col-12 py-3" style="border-radius: 6px; border: 1px solid #cecece; box-shadow: 1px 2px 4px 0px rgba(0, 0, 0, 0.50);">
                                                <div class="row">
                                                    <div class="col-5">

                                                    </div>
                                                    <div class="col-7 my-2" style="border-left: 2px solid #cecece;">
                                                        <div class="row">
                                                            <span style="font-family: 'Quicksand'; font-size: calc(0.61rem + 0.61vh); font-weight: 700; color: #333;">11 Day Tour Plan</span>
                                                            <div class="col-12">
                                                                <div class="row ms-lg-3 mt-2">
                                                                    <div class="col-7 m-0 p-0">
                                                                        <p style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 400; color: #5F5F5F;">Lorem ipsum dolor sit amet consectetur. Praesent placerat ullamcorper enim tincidunt tempus nulla consequat dolor in. Tortor eu vestibulum tortor facilisi commodo. Magna euismod leo ullamcorper id aliquam.</p>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="row gap-4">
                                                                                    <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                        <iconify-icon icon="carbon:view-filled" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">1320</span>
                                                                                    </div>
                                                                                    <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                        <iconify-icon icon="bxs:purchase-tag" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">689</span>
                                                                                    </div>
                                                                                    <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                        <iconify-icon icon="material-symbols:star" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">4.7/5</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row mt-lg-5">
                                                                    <div class="col-8">
                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.57rem + 0.57vh); font-weight: 600; color: #333;">Visiting Places</span>
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="row justify-content-center gap-3 mt-2">
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Galle</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Colombo</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Ella</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row justify-content-center gap-3 mt-2">
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Kandy</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Mirissa</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Anuradhapura</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4 d-flex align-items-end">
                                                                        <div class="row justify-content-end">
                                                                            <div class="col-8">
                                                                                <div class="row gap-3">
                                                                                    <div class="col-3 includeIconBlog1 animatedBtn1">
                                                                                        <iconify-icon class="py-2 px-3" icon="ic:baseline-location-on" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                    </div>
                                                                                    <div class="col-3 includeIconBlog1 animatedBtn2">
                                                                                        <iconify-icon class="py-2 px-3" icon="mdi:airplane" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                    </div>
                                                                                    <div class="col-3 includeIconBlog1 animatedBtn3">
                                                                                        <iconify-icon class="py-2 px-3" icon="material-symbols:delete" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
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
                                        <div class="col-12">
                                            <div class="col-12 py-3" style="border-radius: 6px; border: 1px solid #cecece; box-shadow: 1px 2px 4px 0px rgba(0, 0, 0, 0.50);">
                                                <div class="row">
                                                    <div class="col-5">

                                                    </div>
                                                    <div class="col-7 my-2" style="border-left: 2px solid #cecece;">
                                                        <div class="row">
                                                            <span style="font-family: 'Quicksand'; font-size: calc(0.61rem + 0.61vh); font-weight: 700; color: #333;">7 Day Luxury Tour Plan</span>
                                                            <div class="col-12">
                                                                <div class="row ms-lg-3 mt-2">
                                                                    <div class="col-7 m-0 p-0">
                                                                        <p style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 400; color: #5F5F5F;">Lorem ipsum dolor sit amet consectetur. Praesent placerat ullamcorper enim tincidunt tempus nulla consequat dolor in. Tortor eu vestibulum tortor facilisi commodo. Magna euismod leo ullamcorper id aliquam.</p>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="row gap-4">
                                                                                    <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                        <iconify-icon icon="carbon:view-filled" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">1020</span>
                                                                                    </div>
                                                                                    <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                        <iconify-icon icon="bxs:purchase-tag" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">429</span>
                                                                                    </div>
                                                                                    <div class="col-3 d-flex align-items-center gap-2 justify-content-center" style="background-color: #E8E8E8; border-radius: 6px;">
                                                                                        <iconify-icon icon="material-symbols:star" style="font-size: calc(0.55rem + 0.55vh);"></iconify-icon>
                                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.51rem + 0.51vh); font-weight: 600; color: #333;">4.8/5</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row mt-lg-5">
                                                                    <div class="col-8">
                                                                        <span style="font-family: 'Quicksand'; font-size: calc(0.57rem + 0.57vh); font-weight: 600; color: #333;">Visiting Places</span>
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="row justify-content-center gap-3 mt-2">
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Galle</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Colombo</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Ella</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row justify-content-center gap-3 mt-2">
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Kandy</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Mirissa</span>
                                                                                        </div>
                                                                                        <div class="col-3 includeBlog1">
                                                                                            <span class="placesText1">Anuradhapura</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4 d-flex align-items-end">
                                                                        <div class="row justify-content-end">
                                                                            <div class="col-8">
                                                                                <div class="row gap-3">
                                                                                    <div class="col-3 includeIconBlog1 animatedBtn1">
                                                                                        <iconify-icon class="py-2 px-3" icon="ic:baseline-location-on" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                    </div>
                                                                                    <div class="col-3 includeIconBlog1 animatedBtn2">
                                                                                        <iconify-icon class="py-2 px-3" icon="mdi:airplane" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
                                                                                    </div>
                                                                                    <div class="col-3 includeIconBlog1 animatedBtn3">
                                                                                        <iconify-icon class="py-2 px-3" icon="material-symbols:delete" style="font-size: calc(0.6rem + 0.6vh);"></iconify-icon>
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
            </div>

            <?php include "./components/footer.php"; ?>

        </div>
    </div>


    <script src="./js/newHeader.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="./js/watchlist.js"></script>
    <script src="./js/footer.js"></script>
</body>

</html>