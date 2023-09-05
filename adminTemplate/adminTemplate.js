var sideMenuStatus = 0;
function sideMenuMover() {
  var menu = document.getElementById("sideMenu");
  menu.style.transitionDuration = 0.35 + "s";

  if (sideMenuStatus == 0) {
    menu.style.width = 100 + "px";
    menu.style.minWidth = 100 + "px";
    menu.style.maxWidth = 100 + "px";
    sideMenuStatus = 1;
  } else {
    menu.style.width = 400 + "px";
    menu.style.minWidth = 400 + "px";
    menu.style.maxWidth = 400 + "px";
    sideMenuStatus = 0;
  }

  document.getElementById("mobileMode").classList.toggle("d-none");
  document.getElementById("desktopMode").classList.toggle("d-none");

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
