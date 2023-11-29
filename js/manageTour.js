
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