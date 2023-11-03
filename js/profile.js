document.getElementById("backToHome").addEventListener("mousedown", () => {
  window.location = "home";
});

document
  .getElementById("profileSettingHeader")
  .addEventListener("mousedown", () => {
    var settingContainer = document.getElementById("profileSettingBody");
    if (settingContainer.dataset.position == "down") {
      settingContainer.style.height = 0 + "Px";
      settingContainer.setAttribute("data-position", "up");
      document.getElementById("profileSettingIcon").style.rotate = 0 + "deg";
    } else {
      settingContainer.style.height = settingContainer.scrollHeight + "px";
      settingContainer.setAttribute("data-position", "down");
      document.getElementById("profileSettingIcon").style.rotate = -180 + "deg";
    }
  });

document
  .getElementById("profileChangeHeader")
  .addEventListener("mousedown", () => {
    var changeContainer = document.getElementById("profileChangeBody");
    if (changeContainer.dataset.position == "down") {
      changeContainer.style.height = 0 + "Px";
      changeContainer.setAttribute("data-position", "up");
      document.getElementById("profileChangeIcon").style.rotate = 0 + "deg";
    } else {
      changeContainer.style.height = changeContainer.scrollHeight + "px";
      changeContainer.setAttribute("data-position", "down");
      document.getElementById("profileChangeIcon").style.rotate = -180 + "deg";
    }
  });

document
  .getElementById("changeTouristProfile")
  .addEventListener("mousedown", () => {
    var form = new FormData();
    form.append("touristName", document.getElementById("touristName").value);
    form.append(
      "touristMobile",
      document.getElementById("touristMobile").value
    );
    form.append("touristDOB", document.getElementById("touristDOB").value);
    form.append(
      "touristGender",
      document.getElementById("touristGender").value
    );
    form.append(
      "touristCountry",
      document.getElementById("touristCountry").value
    );
    form.append(
      "profileImage",
      document.getElementById("profileImage").files[0]
    );
    form.append(
      "profileBackground",
      document.getElementById("profileBackground").files[0]
    );

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
      if (req.readyState == 4 && req.status == 200) {
        if (req.responseText == "1") {
          alert("Profile Updated");
          window.location.reload();
        } else {
          alert(req.responseText);
        }
      }
    };

    req.open("POST", "./assets/model/changeTouristProfile.php", true);
    req.send(form);
  });

document.getElementById("profileImage").addEventListener("change", () => {
  var file = document.getElementById("profileImage");
  var selectedFile = file.files[0];
  var fileUrl = URL.createObjectURL(selectedFile);
  document.getElementById("profileImageViewer").src = fileUrl;
});

document.getElementById("profileBackground").addEventListener("change", () => {
  var file = document.getElementById("profileBackground");
  var selectedFile = file.files[0];
  var fileUrl = URL.createObjectURL(selectedFile);
  document.getElementById("profileBackgroundImage").style.backgroundImage =
    "url(" + fileUrl + ")";
});
