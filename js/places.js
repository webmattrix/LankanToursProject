var homeSlider;
function homeOnloadFunction() {
    homeSlider = setInterval(homeSlider, 1000 * 5);
}

var sliderNumber = 1;
function homeSlider() {
    document.getElementById("slide" + sliderNumber).classList.add("active");
    if (sliderNumber > 1) {
        document
            .getElementById("slide" + (sliderNumber - 1))
            .classList.remove("active");
    } else if (sliderNumber == 1) {
        document.getElementById("slide5").classList.remove("active");
    }
    sliderNumber += 1;

    if (sliderNumber == 6) {
        sliderNumber = 1;
    }
}

function tourPlanSlideMover(slideNumber, direction) {
    var slider = document.getElementById("slide" + slideNumber + "Container");
    var sliderImageNumber = document.getElementById("imageCount" + slideNumber);
    var imageNumber = parseInt(sliderImageNumber.getAttribute("data-image-view-number"));

    var currentMargin = slider.getAttribute("data-marginLeft");

    slider.style.transitionDuration = 0.8 + "s";
    if (direction == "right") {
        if (currentMargin > -(slider.getAttribute("data-maxWidth") - 100)) {
            slider.style.marginLeft = parseInt(currentMargin) - 100 + "%";
            slider.setAttribute("data-marginLeft", parseInt(currentMargin) - 100);
            sliderImageNumber.innerHTML = imageNumber + 1;
            sliderImageNumber.setAttribute("data-image-view-number", imageNumber + 1);
        }
    } else if (direction == "left") {
        if (currentMargin < 0) {
            slider.style.marginLeft = parseInt(currentMargin) + 100 + "%";
            slider.setAttribute("data-marginLeft", parseInt(currentMargin) + 100);
            sliderImageNumber.innerHTML = imageNumber - 1;
            sliderImageNumber.setAttribute("data-image-view-number", imageNumber - 1);
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