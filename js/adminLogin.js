var vModal;
function adminLogin() {
  var email = document.getElementById("admin_email");
  var password = document.getElementById("admin_password");
  var rememberme = document.getElementById("admin_remember");

  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);
  form.append("rememberme", rememberme.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success01") {
        var modal = document.getElementById("verifyModel");
        vModal = new bootstrap.Modal(modal);
        vModal.show();
        
      } else if (t == "success02") {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
          if (req.readyState == 4) {
            window.location.href = "/TourpageFinal/LankanToursProject/manageAdmin.php";
          }
        };http://localhost/TourpageFinal/LankanToursProject/Orders

        req.open(
          "GET",
          "./assets/model/setTimeZoneSession.php?timeZone=" +
            Intl.DateTimeFormat().resolvedOptions().timeZone,
          true
        );
        // req.open( "GET", "../assets/model/setTimeZoneSession.php?timeZone=" + Intl.DateTimeFormat().resolvedOptions().timeZone,true);
        req.send();
      } else {
        document.getElementById("message").innerHTML = t;
      }
    }
  };

  r.open("POST", "./assets/model/adminLoginProcess.php", true);
  r.send(form);
}
function adminVerify() {
  var code = document.getElementById("adminVerificationCode");
  var email = document.getElementById("admin_email");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        vModal.hide();
        var reqest = new XMLHttpRequest();
        reqest.onreadystatechange = function () {
          if (reqest.readyState == 4) {
            window.location.href = "/lankanTours/LankanToursProject/Admin/Home";
            // window.location.href = "/lankanTours/LankanToursProject/Admin/Home";
          }
        };
        reqest.open(
          "GET",
          "./assets/model/setTimeZoneSession.php?timeZone=" +
            Intl.DateTimeFormat().resolvedOptions().timeZone,
          true
        );
        // req.open("GET", "../assets/model/setTimeZoneSession.php?timeZone=" + Intl.DateTimeFormat().resolvedOptions().timeZone,true);
        reqest.send();
      } else alert(t);
    }
  };
  r.open(
    "GET",
    "./assets/model/adminModalLogin.php?code=" + code.value + "&email=" +  email.value,
    true
  );
  // r.open("GET", "./assets/model/T_modalLogin.php?email=" +email.value ,"&code=" +code.value, true);
  r.send();
}
function adminForgotPassword() {
  var email = document.getElementById("admin_email");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Verification Code has sent to your email!");
        var m = document.getElementById("fogotPasswordModal");
        bm = new bootstrap.Modal(m, {
          backdrop: "static",
        });
        bm.show();
      } else {
        alert(t);
      }
    }
  };

  r.open(
    "GET",
    "./assets/model/adminFogotPasswordProcess.php?e=" + email.value,
    true
  );
  r.send();
}

function showpassword1() {
  var new_password = document.getElementById("new_password");
  var new_password_btn = document.getElementById("new_password_btn");

  if (new_password.type == "password") {
    new_password.type = "text";
    new_password_btn.innerHTML = '<iconify-icon icon="mdi:eye"></iconify-icon>';
  } else {
    new_password.type = "password";
    new_password_btn.innerHTML = '<iconify-icon icon="mdi:eye"></iconify-icon>';
  }
}

function showpassword2() {
  var re_new_password = document.getElementById("re_new_password");
  var re_new_password_btn = document.getElementById("re_new_password_btn");

  if (re_new_password.type == "password") {
    re_new_password.type = "text";
    re_new_password_btn.innerHTML =
      '<iconify-icon icon="mdi:eye"></iconify-icon>';
  } else {
    re_new_password.type = "password";
    re_new_password_btn.innerHTML =
      '<iconify-icon icon="mdi:eye"></iconify-icon>';
  }
}

function resetpassword() {
  var email = document.getElementById("admin_email");
  var nPW = document.getElementById("new_password");
  var rnPW = document.getElementById("re_new_password");
  var vCode = document.getElementById("vc");

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
      } else {
        alert(t);
      }
    }
  };
  r.open("POST", "./assets/model/adminResetPassword.php", true);
  // r.open("POST", "../assets/model/T_loginResetPassword.php", true);
  r.send(f);
}
