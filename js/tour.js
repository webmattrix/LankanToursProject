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

(function () {
  dataLoader();
})();

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

var custom_tour_places = [];
function addTourPlace() {
  var tourPlace = document.getElementById("addTourPlace").value;
  if (!custom_tour_places.includes(tourPlace)) {
    if (tourPlace != 0 && places_data != null) {
      custom_tour_places.push(tourPlace);
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
}

function removeTourPlace() {
  var sliderContainer = document.getElementById("slide99Container");
  var removePlace = document.getElementById("removeTourPlace").value;

  var removeIndex = custom_tour_places.indexOf(removePlace);
  custom_tour_places.splice(removeIndex, 1);

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

function viewItinerary(id) {
  window.location = "Itinerary/" + id;
}

function addToWatchlist(id) {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      if (req.responseText == 1) {
        alert("You have to login first");
        window.location = "Login";
      } else if (req.responseText == 2) {
        alert("Invalid Access! Try again later");
      } else if (req.responseText == 3) {
        alert("This tour is already added to the watchlist");
      } else if (req.responseText == 4) {
        window.location.reload();
      } else {
        alert(req.responseText);
        alert("Something went wrong please try again later");
      }
    }
  };

  req.open("GET", "./assets/model/addToWatchlist.php?id=" + id, true);
  req.send();
}

function placeCustomTourOrder() {
  var formData = new FormData();
  formData.append("tourLevel", document.getElementById("tourLevel").value);
  formData.append("places_list", JSON.stringify(custom_tour_places));
  formData.append(
    "contact_method",
    document.getElementById("contact_method").value
  );
  formData.append("memberCount", document.getElementById("memberCount").value);
  formData.append("message", document.getElementById("message").value);

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      if (req.responseText == "1") {
        alert("You have to login first");
      } else if (req.responseText == "2") {

        document.getElementById("tourLevel").value = 0;
        document.getElementById("contact_method").value = 0;
        document.getElementById("memberCount").value = "0";
        document.getElementById("message").value = "";
        document.getElementById("addTourPlace").value = 0;
        document.getElementById("customTourCity").value = 0;

        window.location = "Orders";
      } else {
        alert(req.responseText);
      }
    }
  };

  req.open("POST", "./assets/model/placeCustomOrder.php", true);
  req.send(formData);
}


function loadCustomTourPlaces() {
  var city_id = document.getElementById("customTourCity").value;
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      document.getElementById("addTourPlace").innerHTML = req.responseText;
    }
  };

  req.open("GET", "./assets/model/customTourPlaces.php?city_id=" + city_id, true);
  req.send();
}


function changeMemberCount(value) {
  if (value == 'increase') {
    memberValue = parseInt(document.getElementById("memberCount").value);
    document.getElementById("memberCount").value = memberValue + 1;
  } else if (value == 'dicrease') {
    memberValue = parseInt(document.getElementById("memberCount").value);
    if (memberValue > 1) {
      document.getElementById("memberCount").value = memberValue - 1;
    }
  }
}

function openReqTourModal(Tour_Id) {
  var req4 = new XMLHttpRequest();
  req4.onreadystatechange = function () {
    if (req4.readyState == 4) {
      var respData3 = req4.responseText;

      if (respData3 == 1) {

        window.location = "./Login";

      } else {
        var respObj = JSON.parse(respData3);

        document.getElementById("to_name").value = respObj.t_name;

        var m = document.getElementById("open1stModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      }


    }
  };

  req4.open("GET", "./assets/model/itineraryReqProcess.php?tid=" + Tour_Id, true);
  req4.send();
}

function reqProcessTour(tourId) {

  var tId = tourId;
  var tourJMembers = document.getElementById("jn_members").value;
  var starLevel = document.getElementById("star_level").value;
  var contactMethod = document.getElementById("contact_meth").value;
  var messageArea = document.getElementById("message_ovw").value;

  var form2 = new FormData();

  form2.append("t_id", tId);
  form2.append("members", tourJMembers);
  form2.append("stLevel", starLevel);
  form2.append("conMeth", contactMethod);
  form2.append("msgView", messageArea);

  var req5 = new XMLHttpRequest();
  req5.onreadystatechange = function () {
    if (req5.readyState == 4) {
      var respData4 = req5.responseText;

      if (respData4 == "Success") {

        var tourProcess = document.querySelector('.afterProcess1');
        var reqProcess = document.querySelector('.reqProcess1');

        if (reqProcess.style.display == "none") {

          tourProcess.style.display = "block";

        } else {

          tourProcess.style.display = "none";

        }

        setTimeout(() => {

          if (reqProcess.style.display == "block") {

            reqProcess.style.display = "none";

          } else if (tourProcess.style.display == "none") {

            tourProcess.style.display = "block";
            reqProcess.style.display = "none";

          }

        }, 5200);

        var m = document.getElementById("open2ndModal");
        bm = new bootstrap.Modal(m);
        bm.show();

      } else {

        alert(respData4);

      }

    }
  };

  req5.open("POST", "./assets/model/itinerarySendReqProcess.php", true);
  req5.send(form2);

}