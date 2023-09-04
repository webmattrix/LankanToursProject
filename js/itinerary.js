var homeSlider;
  function homeOnloadFunction() {
    homeSlider = setInterval(homeSlider, 1000 * 20);
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

