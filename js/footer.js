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
