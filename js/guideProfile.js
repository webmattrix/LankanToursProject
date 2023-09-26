function notificationSwitch() {
  var notificationThumb = document.getElementById("notificationThumb");

  var notificationSwitch = document.getElementById("notificationSwitch");

  if (notificationSwitch.dataset.switch_status == "ON") {
    notificationThumb.classList.remove("left");
    notificationThumb.classList.add("right");
    notificationSwitch.dataset.switch_status = "OFF";
    notificationSwitch.style.backgroundColor = "#1D59B4";
    notificationThumb.style.backgroundColor = "white";
  } else if (notificationSwitch.dataset.switch_status == "OFF") {
    notificationThumb.classList.remove("right");
    notificationThumb.classList.add("left");
    notificationSwitch.dataset.switch_status = "ON";
    notificationSwitch.style.backgroundColor = "white";
    notificationThumb.style.backgroundColor = "#1D59B4";
  }
}

function changeImageUploader() {
  var profileImage = document.getElementById("adminProfilePicture");
  alert(profileImage.files[0]);
  document.getElementById("adminProfileViewImage").style.backgroundImage =
    "url('" + profileImage.value + "')";
}

document.getElementById("passwordEye").addEventListener("mousedown", () => {
  if (
    document.getElementById("passwordEye").getAttribute("icon") == "el:eye-open"
  ) {
    document.getElementById("passwordEye").setAttribute("icon", "el:eye-close");
    document.getElementById("passwordField").type = "text";
  } else {
    document.getElementById("passwordEye").setAttribute("icon", "el:eye-open");
    document.getElementById("passwordField").type = "password";
  }
});

// profileSliderAnchor --> 1st slide
// detailIcon --> icon
// settingIcon --> icon
// socialIcon --> icon

function guideProfileSlider(id) {
  document.getElementById("profileSliderAnchor").style.marginLeft =
    id * -100 + "%";

  document.getElementById("slide1Icon").classList.remove("active");
  document.getElementById("slide2Icon").classList.remove("active");
  document.getElementById("slide3Icon").classList.remove("active");
  document.getElementById("slide" + (id + 1) + "Icon").classList.add("active");
}

function socialMediaSlider(id) {
  document.getElementById("socialMediaAnchor").style.marginLeft =
    -id * 100 + "%";

  document.getElementById("socialMedia0Icon").classList.remove("active");
  document.getElementById("socialMedia1Icon").classList.remove("active");
  document.getElementById("socialMedia2Icon").classList.remove("active");
  document.getElementById("socialMedia3Icon").classList.remove("active");
  document.getElementById("socialMedia" + id + "Icon").classList.add("active");
}
