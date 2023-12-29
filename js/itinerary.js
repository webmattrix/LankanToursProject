var homeSlider;
function homeOnloadFunction() {
  // alert("OK");
  homeSlider = setInterval(homeSlider, 1000 * 5);
}

var sliderNumber = 1;
function homeSlider() {
  document
    .getElementById("itinerary-slide" + sliderNumber)
    .classList.add("active");
  if (sliderNumber > 1) {
    document
      .getElementById("itinerary-slide" + (sliderNumber - 1))
      .classList.remove("active");
  } else if (sliderNumber == 1) {
    document.getElementById("itinerary-slide5").classList.remove("active");
  }
  sliderNumber += 1;

  if (sliderNumber == 6) {
    sliderNumber = 1;
  }
}

function tourReqProcessing(tourId) {

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

        var m = document.getElementById("doneModal1");
        bm = new bootstrap.Modal(m);
        bm.show();

      } else {

        alert(respData4);

      }

    }
  };

  req5.open("POST", "../assets/model/itinerarySendReqProcess.php", true);
  req5.send(form2);



}

function tourRequest(tourId) {

  var req4 = new XMLHttpRequest();
  req4.onreadystatechange = function () {
    if (req4.readyState == 4) {
      var respData3 = req4.responseText;


      if (respData3 == 1) {

        window.location = "../Login";

      } else {
        var respObj = JSON.parse(respData3);

        document.getElementById("to_name").value = respObj.t_name;

        var m = document.getElementById("reqTourModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      }


    }
  };

  req4.open("GET", "../assets/model/itineraryReqProcess.php?tid=" + tourId, true);
  req4.send();
}



function viewMyTours() {
  window.location = "../Orders";
}