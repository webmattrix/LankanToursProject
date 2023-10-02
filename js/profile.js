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


