<style>
    .tour-plan-slider {
        height: 250px;
        width: 500px;
        overflow: hidden;
    }

    .tour-plan-slider .slides {
        height: 250px;
        width: 100%;
    }

    .tour-plan-slider .slides .slide {
        height: 100%;
        width: 100%;
    }

    .tour-plan-slider .slides {
        position: relative;
        display: flex;
    }

    .tour-plan-slider .slides .slide {
        position: relative;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden;
        border-radius: 6px;
    }

    .tour-plan-slider .slides .slide::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.21);
        top: 0;
        left: 0;
        z-index: -0;
    }
</style>

<?php
$place_num = 5;
$ongoing_iteration = 1;
?>

<link rel="stylesheet" href="./css/bootstrap.css">

<div class="tour-plan-slider position-relative">

    <div class="position-absolute top-50 text-white w-100 px-2 fs-5 d-flex justify-content-between home_tour-plan-arrow-container" style="z-index: 3;">
        <iconify-icon icon="mingcute:left-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($ongoing_iteration); ?>,'left');"></iconify-icon>
        <iconify-icon icon="mingcute:right-line" class="text-white c-pointer" onclick="tourPlanSlideMover(<?php echo ($ongoing_iteration); ?>,'right');"></iconify-icon>
    </div>

    <div class="slides" style="width: <?php echo $place_num ?>00%;" id="slide<?php echo ($ongoing_iteration); ?>Container" data-marginLeft="0" data-maxWidth="<?php echo $place_num ?>00" ontouchstart="touchStartDetector(event);" ontouchend="touchEndDetector(event,<?php echo ($ongoing_iteration); ?>)">

        <?php
        for ($x1 = 0; $x1 < $place_num; $x1++) {
        ?>
            <div class="slide" id="sliderSlide1" style="background-image: url('./assets/img/places/Colombo/Beira Lake (1).jpg');"></div>
        <?php
        }
        ?>
    </div>

</div>
<!-- slide -->

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<script>
    function tourPlanSlideMover(slideNumber, direction) {
        var slider = document.getElementById("slide" + slideNumber + "Container");
        var sliderImageNumber = document.getElementById(
            "slide" + slideNumber + "ImageNumber"
        );

        var currentMargin = slider.getAttribute("data-marginLeft");

        slider.style.transitionDuration = 0.8 + "s";
        if (direction == "right") {
            if (currentMargin > -(slider.getAttribute("data-maxWidth") - 100)) {
                slider.style.marginLeft = parseInt(currentMargin) - 100 + "%";
                slider.setAttribute("data-marginLeft", parseInt(currentMargin) - 100);
            }
        } else if (direction == "left") {
            if (currentMargin < 0) {
                slider.style.marginLeft = parseInt(currentMargin) + 100 + "%";
                slider.setAttribute("data-marginLeft", parseInt(currentMargin) + 100);
            }
        }
    }

    var startX;
    var endX;

    function touchStartDetector(evt) {
        startX = evt.touches[0].clientX;
    }

    function touchEndDetector(evt, slideNumber) {
        endX = evt.changedTouches[0].clientX;

        if (startX > endX) {
            tourPlanSlideMover(slideNumber, "right");
        } else {
            tourPlanSlideMover(slideNumber, "left");
        }
    }
</script>