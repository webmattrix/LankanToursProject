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
      sliderImageNumber.innerHTML =
        parseInt(sliderImageNumber.getAttribute("data-imageNumber")) + 1;
      sliderImageNumber.setAttribute(
        "data-imageNumber",
        parseInt(sliderImageNumber.getAttribute("data-imageNumber")) + 1
      );
    }
  } else if (direction == "left") {
    if (currentMargin < 0) {
      slider.style.marginLeft = parseInt(currentMargin) + 100 + "%";
      slider.setAttribute("data-marginLeft", parseInt(currentMargin) + 100);
      sliderImageNumber.innerHTML =
        parseInt(sliderImageNumber.getAttribute("data-imageNumber")) - 1;
      sliderImageNumber.setAttribute(
        "data-imageNumber",
        parseInt(sliderImageNumber.getAttribute("data-imageNumber")) - 1
      );
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
