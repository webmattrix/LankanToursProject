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
function feedbackModal(id) {
  alert(id);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;

      document.getElementById("viewArea02").innerHTML = txt;

      var modal02 = document.getElementById("feedbackModal");
      F_modal = new bootstrap.Modal(modal02);
      F_modal.show();
    }
  };
  request.open("GET", "./assets/model/myToursFeedbackOpen.php?id=" + id, true);
  // request.open("GET", "./assets/model/myToursFeedbackOpen.php?id=" + id, truee);
  request.send();
}

var M_modal;
function messageModal(id,name) {
  
var form = new FormData();
form.append("order_Id", id);
form.append("Order_name", name);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      // alert(txt);
      document.getElementById("viewArea03").innerHTML = txt;

      var m = document.getElementById("messageModal");
      M_modal = new bootstrap.Modal(m);
      M_modal.show();
    }
  };
  request.open("POST", "./assets/model/myTourViewMessage.php", true);
  request.send(form);
}

var stars = document.getElementsByClassName("star");
function Fstar(n) {
  remove();
  for (var i = 0; i < n; i++) {
    if (n == 1) cls = "F_one";
    else if (n == 2) cls = "F_two";
    else if (n == 3) cls = "F_three";
    else if (n == 4) cls = "F_four";
    else if (n == 5) cls = "F_five";
    stars[i].className = "star " + cls;
  }
  document.getElementById("output").innerText = n;
}
function remove() {
  let i = 0;
  while (i < 5) {
    stars[i].className = "star";
    i++;
  }
}

function feedbackSubmit(id) {
  var feedbackMessage = document.getElementById("feedbackMessage").value;
  var rating = document.getElementById("output").textContent;

  var form = new FormData();
  form.append("id", id);
  form.append("rating", rating);
  form.append("feedbackMessage", feedbackMessage);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "success") {
        F_modal.hide();
        location.reload();
      } else {
        alert("Please Try Again");
      }
    }
  };
  request.open("POST", "./assets/model/myTourFeedbackSend.php", true);
  // request.open("POST","../assets/model/myTourFeedbackSend.php", true);
  request.send(form);
}

var D_modal;
function myTourmodal01(t_name, userId, id) {
  var form = new FormData();
  form.append("orderId", id);
  form.append("T_name", t_name);
  form.append("userId", userId);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      // alert(txt);
      document.getElementById("viewArea01").innerHTML = txt;

      var m = document.getElementById("myTourDetails");
      D_modal = new bootstrap.Modal(m);
      D_modal.show();
    }
  };
  request.open("POST", "./assets/model/myTouDetailsrModal.php", true);
  request.send(form);
}
