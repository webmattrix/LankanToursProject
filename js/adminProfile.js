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

function privacySwitch() {
  var privacyThumb = document.getElementById("privacyThumb");

  var privacySwitch = document.getElementById("privacySwitch");

  if (privacySwitch.dataset.switch_status == "ON") {
    privacyThumb.classList.remove("left");
    privacyThumb.classList.add("right");
    privacySwitch.dataset.switch_status = "OFF";
    privacySwitch.style.backgroundColor = "#1D59B4";
    privacyThumb.style.backgroundColor = "white";
  } else if (privacySwitch.dataset.switch_status == "OFF") {
    privacyThumb.classList.remove("right");
    privacyThumb.classList.add("left");
    privacySwitch.dataset.switch_status = "ON";
    privacySwitch.style.backgroundColor = "white";
    privacyThumb.style.backgroundColor = "#1D59B4";
  }
}

function changeImageUploader() {
  var profileImage = document.getElementById("adminProfilePicture");
  alert(profileImage.files[0]);
  document.getElementById("adminProfileViewImage").style.backgroundImage =
    "url('" + profileImage.value + "')";
}
