function openSearchBox() {
  if (
    document.getElementById("homeSearchField").value == "" ||
    document.getElementById("homeSearchField").value == "Search here..."
  ) {
    document.getElementById("homeSearchField").classList.toggle("d-none");
  }
}

function setPlaceholder() {
  var searchField = document.getElementById("homeSearchField");
  if (searchField.value == "Search here...") {
    searchField.value = "";
  }
}

var homeSlider;
function homeOnloadFunction() {
  homeSlider = setInterval(homeSlider, 1000 * 25);
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

function outFocusOut() {
  var searchField = document.getElementById("homeSearchField");
  if (searchField.value == "") {
    document.getElementById("homeSearchField").value = "Search here...";
  }
}

function viewMobileMenu() {
  document.getElementById("mobileHomeMenu").classList.toggle("d-none");
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

function loginChekerModelToggle() {
  document.getElementById("loginChekerModel").classList.toggle("d-none");
}

function goToLogin() {
  window.location = "Login";
}


function viewPlace() {
  window.location = "Tour-Place";
}

function addToWatchList(id) {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      if (req.responseText == 1) {
        alert("You have to login first");
        window.location = "Login";
      } else if (req.responseText == 2) {
        alert("Something went wrong!! Please try again later.");
      } else if (req.responseText == 3) {
        alert("Tour is already addet to the watchlist");
      } else if (req.responseText == 4) {
        alert("Tour is added to the watchlist");
        window.location.reload();
      } else {
        alert("Something went Wrong!!");
        window.location.reload();
      }
    }
  };

  req.open("GET", "./assets/model/addToWatchlist.php?id=" + id, true);
  req.send();
}