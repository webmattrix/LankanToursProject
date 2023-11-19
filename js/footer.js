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
