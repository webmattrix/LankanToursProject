
function tourUpdate(t_id) {

  var req1 = new XMLHttpRequest();
  req1.onreadystatechange = function () {
    if (req1.readyState == 4) {
      var respData1 = req1.responseText;

      document.getElementById("tbUpdateModal").innerHTML = respData1;
      var m = document.getElementById("tbUpdateModal");
      bm = new bootstrap.Modal(m);
      bm.show();

    }
  };

  req1.open("GET", "../assets/model/tourUpdateProcess.php?tId=" + t_id, true);
  req1.send();

}

function loadPlaces() {

  var cityList = document.getElementById("selectCity").value;

  var req2 = new XMLHttpRequest();
  req2.onreadystatechange = function () {
    if (req2.readyState == 4) {
      var respData2 = req2.responseText;

      document.getElementById("selectPlace").innerHTML = respData2;

    }
  };

  req2.open("GET", "../assets/model/loadPlacesProcess.php?ctLi=" + cityList, true);
  req2.send();
}

var newArray = [];
var deleteArray = [];
var tourId;

function addToModalTab() {

  var selectedCity = document.getElementById("selectCity");
  var selectedPlace = document.getElementById("selectPlace");

  var opt_val_city = selectedCity.options[selectedCity.selectedIndex].value;
  var opt_val_place = selectedPlace.options[selectedPlace.selectedIndex].value;

  newArray.push(opt_val_place);

  var form2 = new FormData();
  form2.append("cityId", opt_val_city);
  form2.append("placeId", opt_val_place);

  var req3 = new XMLHttpRequest();
  req3.onreadystatechange = function () {
    if (req3.readyState == 4) {
      var respData3 = req3.responseText;
      var responseObj3 = JSON.parse(respData3);
<<<<<<< HEAD

=======
    
>>>>>>> main
      var table = document.getElementById("tableC&P");

      table.innerHTML += `<tr>
                              <td class="col-2 py-2 text-center fw-normal mt-modal-tab-textC">${responseObj3.cityName}</td>
                              <td class="col-4 py-2 text-center mt-modal-tab-textC">${responseObj3.placeName}</td>
                              <td ><button class="addTourBtnDel1 px-4 py-1">Delete</button></td>
                             </tr>`;
    }
  };
  req3.open("POST", "../assets/model/addct&plProcess.php", true);
  req3.send(form2);

}

function updateTour(tid) {

  var form4 = new FormData();
  form4.append("dlt", JSON.stringify(deleteArray));
  form4.append("upd", JSON.stringify(newArray));
  form4.append("t_id", tid);

  var req4 = new XMLHttpRequest();
  req4.onreadystatechange = function () {
    if (req4.readyState == 4) {
      var respData4 = req4.responseText;

      if (respData4 = "Success") {
        window.location.reload();
      } else {
        alert(respData4);
      }

    }
  }

  req4.open("POST", "../assets/model/city&placesDel&UpProcess.php", true);
  req4.send(form4);

}

function deleteNewAdded(row,plid) {

  deleteArray.push(plid);

  var deleteRow = document.getElementById(row);
  deleteRow.style.display = "none";

}