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
  .addEventListener("mouseout", () => {});

document.getElementById("headerMoreIcon").addEventListener("click", () => {
  document.getElementById("headerMorePanel2").classList.toggle("d-none");
});

document.getElementById("accountIcon").addEventListener("click", () => {
  document.getElementById("headerMorePanel1").classList.toggle("d-none");
});

function goProfile() {
  window.location = "Profile";
}

function goWatchlist() {
  window.location = "Watchlist";
}

function goMyTours() {
  window.location = "Orders";
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
