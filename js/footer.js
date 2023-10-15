document.getElementById("home_msg_box").addEventListener("focus", () => {
  if (document.getElementById("home_msg_box").innerHTML == "Message") {
    document.getElementById("home_msg_box").innerHTML = "";
  }
});

document.getElementById("home_msg_box").addEventListener("focusout", () => {
  if (document.getElementById("home_msg_box").innerHTML == "") {
    document.getElementById("home_msg_box").innerHTML = "Message";
  }
});

function sendRequestMessage() {
  var email = document.getElementById("requestEmail").value;
  var message = document.getElementById("home_msg_box").value;

  var time = Intl.DateTimeFormat().resolvedOptions().timeZone;

  var messageForm = new FormData();
  messageForm.append("email", email);
  messageForm.append("message", message);
  messageForm.append("timeZone", time);

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      alert(req.responseText);
    }
  };

  req.open("POST", "./assets/model/saveRequestMessage.php", true);
  req.send(messageForm);
}
