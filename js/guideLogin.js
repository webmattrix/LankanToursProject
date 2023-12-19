function guideSignIn() {
  var email = document.getElementById("guide_email");
  var password = document.getElementById("guide_password");
  var rememberme = document.getElementById("guide_remember");

  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);
  form.append("rememberme", rememberme.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "not verified") {
        alert("Your first time Verification Code has sent to your email!"); 
        var m = document.getElementById("verificationModal");
        bm = new bootstrap.Modal(m, {
          backdrop: "static",
        });
        bm.show();
      } else if (t == "success") {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function () {
          if (req.readyState == 4) {
            window.location.href += "/Home";
          }
        };

        req.open(
          "GET",
          "./assets/model/setTimeZoneSession.php?timeZone=" +
            Intl.DateTimeFormat().resolvedOptions().timeZone,
          true
        );
        req.send();
      } else {
        document.getElementById("message").innerHTML = t;
      }
    }
  };

  r.open("POST", "./assets/model/guideSignInProcess.php", true);
  r.send(form);
}

function verifyGuide() {
  var email = document.getElementById("guide_email").value;
  var otp = document.getElementById("otp").value;

  var form = new FormData();
  form.append("email", email);
  form.append("otp", otp);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location.href += "/Guide";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "./assets/model/guideVerification.php", true);
  r.send(form);
}

function guideForgotPassword() {
  var email = document.getElementById("guide_email");

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
    "./assets/model/guideForgotPasswordProcess.php?e=" + email.value,
    true
  );
  r.send();
}

function resetpassword() {
  var email = document.getElementById("guide_email").value;
  var vc = document.getElementById("vc").value;
  var np = document.getElementById("new_password").value;
  var rnp = document.getElementById("re_new_password").value;

  var form = new FormData();
  form.append("email", email);
  form.append("vc", vc);
  form.append("np", np);
  form.append("rnp", rnp);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("password reset success");
        window.location.href += "/Guide";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "./assets/model/guideResetPassword.php", true);
  r.send(form);
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
