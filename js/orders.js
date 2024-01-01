function tourOrderModel(tourId, tourName) {

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            alert(req.responseText);
            document.getElementById("tourOrderModel").classList.toggle("d-none");
        }
    };

    req.open("GET", "../assets/model/tourOrderAssignModel.php?tourId=" + tourId + "&tourName=" + tourName, true);
    req.send();

}