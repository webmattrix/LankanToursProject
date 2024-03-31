function sendRequestMessage() {
  var email = document.getElementById("requestEmail").value;
  var message = document.getElementById("home_msg_box").value;

  var time = Intl.DateTimeFormat().resolvedOptions().timeZone;

  var messageForm = new FormData();
  messageForm.append("email", email);
  messageForm.append("message", message);

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      if (req.responseText == "Success") {
        alert("Your request has been sent.");
        document.getElementById("requestEmail").value = "";
        document.getElementById("home_msg_box").value = "";
      } else {
        alert(req.responseText);
      }
    }
  };

  req.open("POST", "./assets/model/saveRequestMessage.php", true);
  req.send(messageForm);
}


document.addEventListener('keydown', function (e) {
  // Check if the pressed key is F12 or Ctrl+Shift+I or Ctrl+Shift+J or Ctrl+Shift+C
  if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J' || e.key === 'C'))) {
    e.preventDefault(); // Prevent the default behavior
  }
});

document.addEventListener('contextmenu', function (event) {
  event.preventDefault(); // Prevent the default right-click context menu
});