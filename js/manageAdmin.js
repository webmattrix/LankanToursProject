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
        alert("success");
        location.reload();
      } else {
        alert("something went to wrong !");
      }
    }
  };
  request.open("POST", "../assets/model/manageAdminProcess.php", true);
  request.send(form);
}

var modal1;
function modalView(email) {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      document.getElementById("viewArea2").innerHTML = txt;

      var m = document.getElementById("ViewModel");
      modal1 = new bootstrap.Modal(m);
      modal1.show();
    }
  };
  request.open("GET", "../assets/model/adminModalDetails.php?email=" + email, true);
  request.send();
}


function updateAdmin(id) {
  
 var name = document.getElementById("A_name");
 var email = document.getElementById("A_email");
 var mobile = document.getElementById("A_mobile");
 var address = document.getElementById("A_address");

 var form = new FormData();
  form.append("name", name.value);
  form.append("email", email.value);
  form.append("mobile", mobile.value);
  form.append("address", address.value);
  form.append("id", id);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "success") {
        alert("Details Updated");
        location.reload();
      } else {
        alert("ERROR !!");
      }
    }
  };
  request.open("POST", "../assets/model/adminUpdateDetails.php", true);
  request.send(form);

}
function deleteAdmin(id) {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "success") {
        alert("Details Updated");
        location.reload();
      } else {
        
        alert("something went to wrong !");
      }
    }
  };
  request.open("GET", "../assets/model/adminDeactive.php?id=" + id, true);
  request.send();
}

function searchAdmin(){

  var searchText  = document.getElementById("searchIpnut");
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text01 = request.responseText;
      document.getElementById('viewArea1').innerHTML = text01;
    }
  };
  request.open("GET", "../assets/model/adminSearch.php?text=" + searchText.value, true);
  request.send();

}
