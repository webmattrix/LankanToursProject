function openSearchBox() {
  if (document.getElementById("homeSearchField").value == "" || document.getElementById("homeSearchField").value == "Search here...") {
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
  homeSlider = setInterval(homeSlider, 1000 * 45);
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
  console.log(sliderNumber);
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
