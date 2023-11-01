var sideMenuStatus = 0;
function sideMenuMover() {
  var menu = document.getElementById("sideMenu");
  menu.style.transitionDuration = 0.35 + "s";

  if (sideMenuStatus == 0) {
    // menu.style.width = 100 + "px";
    // menu.style.minWidth = 100 + "px";
    // menu.style.maxWidth = 100 + "px";
    sideMenuStatus = 1;
    menu.style.paddingRight = 0;
    document.getElementById("sideMenu").classList.add("sideMenu-disable");
    document.getElementById("sideMenu").classList.remove("sideMenu-enable");

    document.getElementById("mobileMode").classList.remove("d-block");
    document.getElementById("mobileMode").classList.remove("d-lg-block");
    document.getElementById("mobileMode").classList.remove("d-xl-none");
    // d-block d-lg-block d-none d-xl-none
  } else {
    // menu.style.width = 330 + "px";
    // menu.style.minWidth = 330 + "px";
    // menu.style.maxWidth = 330 + "px";
    sideMenuStatus = 0;
    menu.style.paddingRight = 30 + "px";
    document.getElementById("sideMenu").classList.add("sideMenu-enable");
    document.getElementById("sideMenu").classList.remove("sideMenu-disable");

    document.getElementById("mobileMode").classList.add("d-block");
    document.getElementById("mobileMode").classList.add("d-lg-block");
    document.getElementById("mobileMode").classList.add("d-xl-none");
  }

  document.getElementById("desktopMode").classList.toggle("d-none");
  document.getElementById("mobileMode").classList.toggle("d-none");

  var arrowDirection = document
    .getElementById("adminPanelSideBarIcon")
    .getAttribute("icon");

  if (arrowDirection == "icon-park-outline:double-left") {
    document
      .getElementById("adminPanelSideBarIcon")
      .setAttribute("icon", "icon-park-outline:double-right");
  } else {
    document
      .getElementById("adminPanelSideBarIcon")
      .setAttribute("icon", "icon-park-outline:double-left");
  }
}

function viewSubMenu(elementId) {
  var subMenu = document.getElementById(
    document.getElementById(elementId).dataset.value
  );

  var dashboardIcon = document.getElementById(elementId + "Icon");

  if (document.getElementById(elementId).getAttribute("statusNumber") == 0) {
    subMenu.style.height = subMenu.scrollHeight + "px";
    document.getElementById(elementId).setAttribute("statusNumber", 1);
    dashboardIcon.setAttribute("icon", "mingcute:down-fill");
  } else {
    subMenu.style.height = 0 + "px";
    document.getElementById(elementId).setAttribute("statusNumber", 0);
    dashboardIcon.setAttribute("icon", "mingcute:right-fill");
  }
}

document
  .getElementById("mobileSideBarModel")
  .addEventListener("mousedown", toggleMobileMenu);

document
  .getElementById("viewMobileMenu")
  .addEventListener("mousedown", toggleMobileMenu);

function toggleMobileMenu(evt) {
  var clickableAreaWidth = parseInt(
    getComputedStyle(document.getElementById("mobileMenu")).width
  );
  var fullAreaWidth = window.innerWidth;

  var clickOutArea = fullAreaWidth - clickableAreaWidth;

  if (clickOutArea >= evt.clientX) {
    document.getElementById("mobileSideBarModel").classList.add("d-none");
  } else {
    document.getElementById("mobileSideBarModel").classList.remove("d-none");
  }
}

document.getElementById("adminHomeBtn").addEventListener("click", () => {
  window.location = "Home";
});

function viewGuideProfile() {
  window.location = "Profile";
}

function viewGuideHome() {
  window.location = "Home";
}

function viewTours() {
  window.location = "Tours";
}

function viewProfileModel() {
  document.getElementById("guideProfileModel").classList.toggle("d-none");
}

function guideLogOut() {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      if (req.responseText == "1") {
        window.location.reload();
      }
    }
  };

  req.open("GET", "../assets/model/guideLogOut.php", true);
  req.send();
}
