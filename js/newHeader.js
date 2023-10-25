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
