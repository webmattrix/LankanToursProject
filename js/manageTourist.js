function viewDetails(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {

            var res = xhr.responseText;
            var responseObj = JSON.parse(res);

            document.getElementById('name').value = responseObj.name;
            document.getElementById('mobile').value = responseObj.mobile;
            document.getElementById('email').value = responseObj.email;
            document.getElementById('country').value = responseObj.country;
            document.getElementById('gender').value = responseObj.gender;
            document.getElementById('dob').value = responseObj.dob;
            document.getElementById('user_id').value = responseObj.user_id;
            document.getElementById('created_at').value = responseObj.created_at;

            var m = document.getElementById("viewDetailsModal");
            bm = new bootstrap.Modal(m, {
                backdrop: 'static'
            });
            bm.show();
        }
    }

    xhr.open('GET', '/LankanToursProject/assets/model/viewTouristDetails.php?id=' + id, true);
    xhr.send();
}