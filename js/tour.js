var places_data;

function dataLoader() {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      places_data = JSON.parse(req.responseText);
    }
  };

  req.open("GET", "./assets/model/loadPlacesImage.php", true);
  req.send();
}

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

function addTourPlace() {
  var tourPlace = document.getElementById("addTourPlace").value;
  if (tourPlace != 0 && places_data != null) {
    document.getElementById("addTourPlaceBtn").disabled = true;

    var slide = document.createElement("div");
    slide.classList.add(
      "slide",
      "fs-4",
      "segoeui-bold",
      "d-flex",
      "justify-content-center"
    );

    var sliderContainer = document.getElementById("slide99Container");
    var maxWidth = sliderContainer.getAttribute("data-maxWidth");

    sliderContainer.setAttribute("data-maxWidth", parseInt(maxWidth) + 100);

    slide.style.backgroundImage =
      "url('./assets/img/places/" + places_data[tourPlace].path + "')";
    slide.style.textShadow = "0px 0px 4px rgba(0,0,0,0.5)";
    slide.innerHTML = places_data[tourPlace].name;
    slide.id = "ctSlide" + tourPlace;
    sliderContainer.style.width = parseInt(maxWidth) + 100 + "%";

    var sliderCountContainer = document.getElementById("ct_sliderCount");
    var sliderCount =
      parseInt(sliderCountContainer.getAttribute("data-ctSliderCount")) + 1;
    sliderCountContainer.innerHTML = "/ " + sliderCount;
    sliderCountContainer.setAttribute("data-ctSliderCount", sliderCount);

    sliderContainer.appendChild(slide);

    var newOption = document.createElement("option");
    newOption.value = tourPlace;
    newOption.innerHTML = places_data[tourPlace].name;
    newOption.className = "text-dark";
    newOption.id = "place" + tourPlace;

    var removePlaceList = document.getElementById("removeTourPlace");
    removePlaceList.appendChild(newOption);

    document.getElementById("addTourPlaceBtn").disabled = false;
  } else {
    alert("Please wait a moment and try again!");
  }
}

function removeTourPlace() {
  var sliderContainer = document.getElementById("slide99Container");
  var removePlace = document.getElementById("removeTourPlace").value;
  if (removePlace != 0 && places_data != null) {
    document.getElementById("removeTourPlaceBtn").disabled = true;

    console.log(removePlace);
    var maxWidth = sliderContainer.getAttribute("data-maxWidth");
    var sliderCountContainer = document.getElementById("ct_sliderCount");

    sliderContainer.style.width = parseInt(maxWidth) - 100 + "%";
    sliderContainer.setAttribute("data-maxWidth", parseInt(maxWidth) - 100);

    var sliderCount =
      parseInt(sliderCountContainer.getAttribute("data-ctSliderCount")) - 1;
    sliderCountContainer.innerHTML = "/ " + sliderCount;
    sliderCountContainer.setAttribute("data-ctSliderCount", sliderCount);

    var removePlaceElement = document.getElementById("ctSlide" + removePlace);

    tourPlanSlideMover(99, "left");

    sliderContainer.removeChild(removePlaceElement);
    document
      .getElementById("removeTourPlace")
      .removeChild(document.getElementById("place" + removePlace));

    document.getElementById("removeTourPlaceBtn").disabled = false;
  } else {
    alert("Please wait a moment and try again!");
  }
}
