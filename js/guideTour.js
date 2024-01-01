var D_modal;
function guideTourmodal01(t_name, id) {
  var form = new FormData();
  form.append("orderId", id);
  form.append("T_name", t_name);


  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      // alert(txt);
      document.getElementById("viewArea01").innerHTML = txt;

      var m = document.getElementById("guideToursModal");
      D_modal = new bootstrap.Modal(m);
      D_modal.show();
    }
  };
  request.open("POST", "../assets/model/guideTourModal.php", true);
  request.send(form);
}

//  function searchTour(){
//     var searchText = document.getElementById("searchInput");
//   var request = new XMLHttpRequest();
//   request.onreadystatechange = function () {
//     if (request.readyState == 4) {
//       var text2 = request.responseText;
//       document.getElementById("ViewArea").innerHTML = text2;
//     }
//   };
//   request.open("GET", "../assets/model/tourSearch.php?text=" + searchText.value, true);

//   request.send();
//  }