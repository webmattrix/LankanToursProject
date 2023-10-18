function viewDetails(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            var m = document.getElementById("viewDetailsModal");
            m.querySelector('.modal-content').innerHTML = xhr.responseText;
            bm = new bootstrap.Modal(m, {
                backdrop: 'static'
            });
            bm.show();
        }
    }

    xhr.open('GET', 'http://localhost/LankanToursProject/LankanToursProject/assets/model/viewTouristDetails.php?id=' + id, true);
    xhr.send();
}