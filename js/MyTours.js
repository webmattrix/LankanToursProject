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
var F_modal;

function feedbackModal(id02) {
  // var modal01 = document.getElementById("feedbackModal");
  // F_modal = new bootstrap.Modal(modal01);
  // F_modal.show();
  alert(id02);
}
var M_modal;
function messageModal() {
  var modal01 = document.getElementById("messageModal");
  M_modal = new bootstrap.Modal(modal01);
  M_modal.show();
}


let stars = document.getElementsByClassName("star");
let output = document.getElementById("output");

function Fstar(n) {
  remove();
  for (let i = 0; i < n; i++) {
    if (n == 1) cls = "F_one";
    else if (n == 2) cls = "F_two";
    else if (n == 3) cls = "F_three";
    else if (n == 4) cls = "F_four";
    else if (n == 5) cls = "F_five";
    stars[i].className = "star " + cls;
  }
  output.innerText = n;
}
function remove() {
  let i = 0;
  while (i < 5) {
    stars[i].className = "star";
    i++;
  }
}

var D_modal;
function myTourmodal01(t_name,userId) {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      document.getElementById("viewArea01").innerHTML = txt;

      var m = document.getElementById("myTourDetails");
      D_modal = new bootstrap.Modal(m);
      D_modal.show();
    }
  };
  request.open("GET", "./assets/model/myTouDetailsrModal.php?T_name=" + t_name + "&userId=" + userId, true);
  
  request.send();
}
