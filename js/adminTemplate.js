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

function viewAdminProfile() {
  window.location = "Profile";
}

function viewGuideHome() {
  window.location = "Home";
}

function viewTours() {
  window.location = "Tours";
}

function viewProfileModel() {
  document.getElementById("headerProfileModel").classList.toggle("d-none");
}

function guideLogOut() {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      if (req.responseText == "1") {
        window.location.reload();
      } else {
        alert("Something goes wrong. Please try again later");
      }
    }
  };

  req.open("GET", "../assets/model/guideLogOut.php", true);
  req.send();
}

function adminLogOut() {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      if (req.responseText == "1") {
        window.location.reload();
      } else {
        alert("Something goes wrong. Please try again later");
      }
    }
  };

  req.open("GET", "../assets/model/adminLogOut.php", true);
  req.send();
}

function openAdminDashboard() {
  window.location = "Home";
}

function openManageAdmin() {
  window.location = "Manage";
}

function openManageGuide() {
  window.location = "Guide";
}

function openManageTourist() {
  window.location = "Tourist";
}

function openManageTour() {
  window.location = "Tours";
}
function openNewTour() {
  window.location = "New-Tours";
}

function openManageOrders() {
  window.location = "Order";
}

function openTouristHome() {
  window.location = "../Home";
}
function openTouristTours() {
  window.location = "../Tours";
}
function openTouristGallery() {
  window.location = "../Gallery";
}
function openTouristContact() {
  window.location = "../Contact";
}
function openTouristLogin() {
  window.location = "../Login";
}
function openTouristRegistration() {
  window.location = "../Registration";
}


function guideRegistrationModelToggle() {
  var guideRegistrationModel = document.getElementById("guideRegistrationModel");
  guideRegistrationModel.classList.toggle("d-none");
}

function toggleTransactionModel() {
  document.getElementById("transactionHistoryModel").classList.toggle("d-none");
}

function toggleMessageModel(messageData) {
  if (messageData != false) {
    document.getElementById("preLoader").classList.remove("d-none");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
      if (req.readyState == 4) {
        document.getElementById("preLoader").classList.add("d-none");
        alert(req.responseText);
      }
    };

    req.open("GET", "../assets/model/getRequestMessages.php", true);
    req.send();

    document.getElementById("messageModel").classList.remove("d-none");
  } else {
    document.getElementById("messageModel").classList.add("d-none");
  }
}


function GuideRegister() {

 var name = document.getElementById("G_Name");
 var dob = document.getElementById("G_Dob");
 var mobile = document.getElementById("G_Mobile");
 var NIC = document.getElementById("G_Nic");
 var email = document.getElementById("G_Email");
 var password = document.getElementById("G_Password");
 var address = document.getElementById("G_Address");
 var city = document.getElementById("G_City");
 var R_date = document.getElementById("G_rDate");

 
var form = new FormData;

form.append("name", name.value);
form.append("dob", dob.value);
form.append("mobile", mobile.value);
form.append("password", password.value);
form.append("NIC", NIC.value);
form.append("email", email.value);
form.append("address", address.value);
form.append("city", city.value);
form.append("R_date", R_date.value);

var request = new XMLHttpRequest();
request.onreadystatechange = function () {
    if (request.readyState == 4) {
        var text = request.responseText;
        if (text == "success") {
           alert("success");
           location.reload();
        } else {
            alert(text);
        }
    }
};
request.open("POST", "../assets/model/registerGuide.php", true);
request.send(form);
}