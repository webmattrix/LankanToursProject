function searchGuide() {

  var searchText = document.getElementById("searchInput");
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text2 = request.responseText;
      document.getElementById("ViewArea").innerHTML = text2;
    }
  };
  request.open("GET", "../assets/model/guideSearch.php?text=" + searchText.value, true);

  request.send();

}