function adminReister() {

  var A_Name = document.getElementById("A_Name");
  var A_Email = document.getElementById("A_Email");
  var A_NIC = document.getElementById("A_NIC");
  var A_Mobile = document.getElementById("A_Mobile");
  var A_Address = document.getElementById("A_Address");

  var form = new FormData();
  form.append("A_Name", A_Name.value);
  form.append("A_Email", A_Email.value);
  form.append("A_NIC", A_NIC.value);
  form.append("A_Mobile", A_Mobile.value);
  form.append("A_Address", A_Address.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "success") {
        alert(text);
      } else {
        alert(text);
      }
    }
  };
  request.open("POST", "./assets/model/manageAdminProcess.php", true);
  // request.open("POST","../assets/model/manageAdminProcess.php", true);
  request.send(form);
}

var p;
function modalView(id) {
  var m = document.getElementById("ViewModel" + id);
  p = new bootstrap.Modal(m);
  p.show();
}

function updateAdmin(id) {
  alert(id);
}
function deleteAdmin(id) {
  alert(id);
}
