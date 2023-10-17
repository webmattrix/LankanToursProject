
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
            if (t == "success") {
                window.location.href = "http://localhost/LankanToursProject/LankanToursProject/guidePanel.php";
            } else {
                document.getElementById("message").innerHTML = t;
            }
        }
    }

    r.open("POST", "http://localhost/LankanToursProject/LankanToursProject/assets/model/guideSignInProcess.php", true);
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
                    backdrop: 'static'
                });
                bm.show();

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "http://localhost/LankanToursProject/LankanToursProject/assets/model/guideForgotPasswordProcess.php?e=" + email.value, true);
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
        re_new_password_btn.innerHTML = '<iconify-icon icon="mdi:eye"></iconify-icon>';

    } else {

        re_new_password.type = "password";
        re_new_password_btn.innerHTML = '<iconify-icon icon="mdi:eye"></iconify-icon>';

    }
}