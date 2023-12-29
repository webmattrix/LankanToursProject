
function tourUpdate(t_id) {

  var req1 = new XMLHttpRequest();
  req1.onreadystatechange = function () {
    if (req1.readyState == 4) {
      var respData1 = req1.responseText;
      var respObj1 = JSON.parse(respData1);

      document.getElementById("nm_tour1").value = respObj1.t_name;
      document.getElementById("dur_tour1").value = respObj1.d_gap;

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

function addToModalTab() {

  var selectedCity = document.getElementById("selectCity");
  var selectedPlace = document.getElementById("selectPlace");

  var opt_val_city = selectedCity.options[selectedCity.selectedIndex].value;
  var opt_val_place = selectedPlace.options[selectedPlace.selectedIndex].value;

  var form2 = new FormData();
  form2.append("cityId", opt_val_city);
  form2.append("placeId", opt_val_place);

  var req3 = new XMLHttpRequest();
  req3.onreadystatechange = function () {
    if (req3.readyState == 4) {
      var respData3 = req3.responseText;
      var responseObj3 = JSON.parse(respData3); 
    
      var table = document.getElementById("tableC&P");
        
         table.innerHTML += `<tr>
                              <td class="col-2 py-2 text-center fw-normal mt-modal-tab-textC">${responseObj3.cityName}</td>
                              <td class="col-4 py-2 text-center mt-modal-tab-textC">${responseObj3.placeName}</td>
                              <td ><button class="addTourBtnDel1 px-4 py-1">Delete</button></td>
                             </tr>`;
    }
  };
  req3.open("POST","../assets/model/addct&plProcess.php",true);
  req3.send(form2);

}

function updateTour(){

  

}