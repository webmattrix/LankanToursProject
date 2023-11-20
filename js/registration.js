function register(){

    window.location ="./login.php" ;
    // window.location ="../login.php" ;
   
}
var T_modal;
function Register() {

    var F_Name = document.getElementById("F_Name");
    var L_Name = document.getElementById("L_Name");
    var Email = document.getElementById("Email");
    var Password= document.getElementById("Password");
    var Country = document.getElementById("Country");

    var form = new FormData;
    form.append("F_Name", F_Name.value);
    form.append("L_Name", L_Name.value);
    form.append("Email", Email.value);
    form.append("Password", Password.value);
    form.append("Country", Country.value);
    
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;

            if (text == "success") {
                // document.getElementById("AlertMSG").innerHTML = text;
                // document.getElementById("AlertMSG").className = "alert alert-success";
                // document.getElementById("AlertMSG").className = "d-block";
                // window.location ="./login.php" ;
                var modal01 = document.getElementById("T_verifyModel");
                T_modal = new bootstrap.Modal(modal01);
                T_modal.show();


            } else {
                document.getElementById("AlertMSG").innerHTML = text;
                document.getElementById("AlertMSG").className = "d-block";
                document.getElementById("AlertMSG").className = "text-white";
                
            }
        }
    };
    request.open("POST","./assets/model/T_registrationProcess.php", true);
    // request.open("POST","../assets/model/T_registrationProcess.php", true);
    request.send(form);

}

function modalRegister() {
    var code = document.getElementById("modalInput");
    var email = document.getElementById("Email");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        if (t == "success") {
          T_modal.hide();
          window.location ="./login.php" ;
         
        } else alert(t);
      }
    };
    r.open(
      "GET", "./assets/model/T_modalRegistration.php?code=" + code.value + "&email=" + email.value,true);
    // r.open("GET", "./assets/model/T_modalLogin.php?email=" +email.value ,"&code=" +code.value, true);
    r.send();
  }