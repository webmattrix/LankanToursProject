function login(){
    window.location = "./registration.php";
    // window.location = "../registration.php";
}
function Login(){
    
        var Email = document.getElementById("L_Email");
        var Password = document.getElementById("L_Password");
        var RememberMe = document.getElementById("L_RememberMe");
    
        var form = new FormData();
        form.append("Email", Email.value);
        form.append("Password", Password.value);
        form.append("Remember", RememberMe.checked);
       
    
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                var text = req.responseText

                if (text == "success") {
                    document.getElementById("L_AlertMSG").innerHTML = text;
                    document.getElementById("L_AlertMSG").className = "d-block";
                    document.getElementById("L_AlertMSG").className = "text-center";
                    window.location = "./home.php";
                    // window.location = "../home.php";
                } else { 
                    document.getElementById("L_AlertMSG").innerHTML = text;
                    document.getElementById("L_AlertMSG").className = "d-block";
                    document.getElementById("L_AlertMSG").className = "text-center";
                 }
            }
        };
        req.open("POST", "./assets/model/T_loginProcess.php", true);
        // req.open("POST", "../assets/model/T_loginProcess.php", true);
        req.send(form);
}

var T_bm;
function L_ForgotPassword(){

    var Email = document.getElementById("L_Email");

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var text = req.responseText;
            if (text == "success") {
                alert("Verification code has sent to your email. Please Check your inbox");
                var modal = document.getElementById("T_forgotPasswordModel");
                T_bm = new bootstrap.Modal(modal);
                T_bm.show();
            } else {
                alert(text);
            }
        }
    };
    req.open("GET", "./assets/model/T_fogotPasswordProcess.php?Email=" + Email.value, true);
    // req.open("GET", "../assets/model/T_fogotPasswordProcess.php?E=" + Email.value, true);
    req.send();
}

function T_ShowPassword1() {
    
    var input = document.getElementById("npInput");
    var eye = document.getElementById("eye1");
    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}
function T_ShowPassword2() {
    var input = document.getElementById("rnpInput");
    var eye = document.getElementById("eye2");
    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function T_resetPW() {
    var email = document.getElementById("L_Email");
    var nPW = document.getElementById("npInput");
    var rnPW = document.getElementById("rnpInput");
    var vCode = document.getElementById("T_vcode");

    alert(email.value);
    alert(nPW.value);
    alert(rnPW.value);
    alert(vCode.value);

    var f = new FormData();
    f.append("Email", email.value);
    f.append("nPW", nPW.value);
    f.append("rnPW", rnPW.value);
    f.append("vCode", vCode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                bm.hide();
                alert("Success");
            } else (
                alert(t)
            );
        }
    };
    r.open("POST", "./assets/model/T_loginResetPassword.php", true);
    // r.open("POST", "../assets/model/T_loginResetPassword.php", true);
    r.send(f);

}