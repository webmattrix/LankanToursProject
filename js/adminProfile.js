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

function adminProfileSlider(id) {
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

function changeAdminImageUploader() {
  var file = document.getElementById("adminProfilePicture");
  var selectedFile = file.files[0];
  var fileUrl = URL.createObjectURL(selectedFile);
  document.getElementById("adminProfileViewImage").style.backgroundImage =
    "url(" + fileUrl + ")";
}

document
  .getElementById("changeProfileBtn")
  .addEventListener("mousedown", () => {
    var form = new FormData();
    form.append("name", document.getElementById("adminName").value);
    form.append("mobile", document.getElementById("adminMobile").value);
    form.append("address", document.getElementById("adminAddress").value);
    form.append("password", document.getElementById("adminPassword").value);
    form.append(
      "profileImage",
      document.getElementById("adminProfilePicture").files[0]
    );

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
      if (req.readyState == 4) {
        var res = req.responseText;
        var responseObj = JSON.parse(res);
        if (responseObj.changeStatus == "failed") {
          alert("You haven't change anything");
        } else if (responseObj.emailStatus == "failed") {
          alert("OTP Sending failed. Please try again later");
        } else {
          toggleProfileOtp();
        }
      }
    };

    req.open("POST", "../assets/model/sendOTPAdminProfile.php", true);
    req.send(form);
  });

document
  .getElementById("profileOtpModelToggle")
  .addEventListener("mousedown", toggleProfileOtp);

function toggleProfileOtp() {
  document.getElementById("profileOtpModel").classList.toggle("d-none");
}

function changeAdminProfile() {
  var form = new FormData();
  form.append("name", document.getElementById("adminName").value);
  form.append("mobile", document.getElementById("adminMobile").value);
  form.append("address", document.getElementById("adminAddress").value);
  form.append("password", document.getElementById("adminPassword").value);
  form.append(
    "verification_code",
    document.getElementById("guideVerificationCode").value
  );
  form.append(
    "profileImage",
    document.getElementById("adminProfilePicture").files[0]
  );

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      var res = req.responseText;
      if (res == "failed") {
        alert("OTP Verification Failed");
      } else {
        alert("Profile Updated");
        window.location.reload();
      }
    }
  };

  req.open("POST", "../assets/model/changeAdminProfile.php", true);
  req.send(form);
}


