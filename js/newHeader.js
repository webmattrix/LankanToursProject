window.onscroll = () => {
  if (scrollY > 100) {
    document.getElementById("headerContainer").style.opacity = 0.8;
  } else {
    document.getElementById("headerContainer").style.opacity = 1;
  }
};

document.getElementById("headerContainer").addEventListener("mousemove", () => {
  document.getElementById("headerContainer").style.opacity = 1;
});

document
  .getElementById("headerContainer")
  .addEventListener("mouseleave", () => {
    if (scrollY > 100) {
      document.getElementById("headerContainer").style.opacity = 0.8;
    }
  });

document
  .getElementById("headerMorePanel2")
  .addEventListener("mouseout", () => { });

document.getElementById("headerMoreIcon").addEventListener("click", () => {
  document.getElementById("headerMorePanel2").classList.toggle("d-none");
});

document.getElementById("accountIcon").addEventListener("click", () => {
  document.getElementById("headerMorePanel1").classList.toggle("d-none");
});

function goProfile(location) {
  if (location == 'primary') {
    window.location = "Profile";
  } else {
    window.location = "../Profile";
  }
}

function goWatchlist(location) {
  if (location == 'primary') {
    window.location = "Watchlist";
  } else {
    window.location = "../Watchlist";
  }
}

function goMyTours(location) {
  if (location == 'primary') {
    window.location = "Orders";
  } else {
    window.location = "../Orders";
  }
}

function mobileMenuToggle() {
  var menu = document.getElementById("mobileMenuContainer");
  var menuMargin = parseInt(getComputedStyle(menu).marginLeft);
  menu.style.transitionDuration = 0.5 + "s";
  if (menuMargin == 0) {
    menu.classList.remove("bg-black");
    menu.style.marginLeft = -100 + "%";
  } else {
    menu.style.marginLeft = 0 + "%";
  }
}

function changeTheme(theme, location) {

  var theme_changer = document.getElementById("theme_changer");

  if (theme_changer.classList.contains('light')) {
    theme_changer.classList.toggle('dark');
    theme_changer.classList.toggle('light');
    // alert("Dark");
  } else {
    theme_changer.classList.toggle('light');
    theme_changer.classList.toggle('dark');
    // alert("Light");
  }

  // console.log(theme);

  if (theme == "light") {
    if (location == 'primary') {
      var requestPath = "./assets/model/changeToDark.php";
    } else {
      var requestPath = "../assets/model/changeToDark.php";
    }
  } else if (theme == "dark") {
    if (location == 'primary') {
      var requestPath = "./assets/model/changeToLight.php";
    } else {
      var requestPath = "../assets/model/changeToLight.php";
    }
  } else {
    if (location == 'primary') {
      var requestPath = "./assets/model/changeToDark.php";
    } else {
      var requestPath = "../assets/model/changeToDark.php";
    }
  }

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      window.location.reload();
    }
  };

  req.open("GET", requestPath, true);
  req.send();
}


function viewPlace() {
  window.location = "Tour-Place";
}