function tourOrderModel(tourId, tourName, type) {

    if (type == 'close') {
        document.getElementById("tourOrderModel").classList.add("d-none");
    } else {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                document.getElementById("tourOrderModel").classList.remove("d-none");
                document.getElementById("tourOrderFillContainer").innerHTML = req.responseText;
            }
        };

        req.open("GET", "../assets/model/tourOrderAssignModel.php?tourId=" + tourId + "&tourName=" + tourName, true);
        req.send();
    }
}

function tourTableModel(tourId, tourName, type) {

    if (type == 'close') {
        document.getElementById("tourTableModel").classList.add("d-none");
    } else {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                document.getElementById("tourTableModel").classList.remove("d-none");
                document.getElementById("tableModelFillContainer").innerHTML = req.responseText;
            }
        };

        req.open("GET", "../assets/model/tourOrderTableModel.php?tourId=" + tourId + "&tourName=" + tourName, true);
        req.send();
    }
}

function updateTourRequest(table, id) {
    var start_date = document.getElementById("unAssignTourStartDate").value;
    var guide = document.getElementById("tourOrderGuide").value;
    var end_date = document.getElementById("unAssignTourEndDate").value;
    var cost = document.getElementById("tourCost").value;
    var savingAmount = document.getElementById("savingAmount").value;
    var guide_message = document.getElementById("guideMessage").value;

    var data = new FormData();

    data.append("start_date", start_date);
    data.append("guide", guide);
    data.append("end_date", end_date);
    data.append("cost", cost);
    data.append("savingAmount", savingAmount);
    data.append("guide_message", guide_message);
    data.append("table", table);
    data.append("id", id);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            if (req.responseText == 1) {
                alert("Complete");
                window.location.reload();
            } else {
                alert(req.responseText);
            }
        }
    };

    req.open("POST", "../assets/model/updateTourRequest.php", true);
    req.send(data);

}

function updateTourPayment(table, id) {
    var savingAmount = document.getElementById("savingAmount").value;

    var data = new FormData();

    data.append("savingAmount", savingAmount);
    data.append("table", table);
    data.append("id", id);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            if (req.responseText == '1') {
                alert("Complete");
                window.location.reload();
            } else {
                alert(req.responseText);
            }
        }
    };

    req.open("POST", "../assets/model/updateTourOrderPayment.php", true);
    req.send(data);

}


function setOrderDuration() {
    var unAssignTourStartDate = document.getElementById("unAssignTourStartDate").value
    var unAssignTourEndDate = document.getElementById("unAssignTourEndDate").value

    const dateA = new Date(unAssignTourStartDate);
    const dateB = new Date(unAssignTourEndDate);

    const difference = dateDiff(dateA, dateB);
    document.getElementById("date_duration").value = difference.days;

}

function dateDiff(date1, date2) {
    const diffInMilliseconds = Math.abs(date2 - date1);
    const millisecondsInSecond = 1000;
    const millisecondsInMinute = millisecondsInSecond * 60;
    const millisecondsInHour = millisecondsInMinute * 60;
    const millisecondsInDay = millisecondsInHour * 24;

    const days = Math.floor(diffInMilliseconds / millisecondsInDay);
    const hours = Math.floor((diffInMilliseconds % millisecondsInDay) / millisecondsInHour);
    const minutes = Math.floor((diffInMilliseconds % millisecondsInHour) / millisecondsInMinute);
    const seconds = Math.floor((diffInMilliseconds % millisecondsInMinute) / millisecondsInSecond);

    return {
        days,
        hours,
        minutes,
        seconds
    };
}




function sliderMover(direction, sliderNumber) {
    console.log(sliderNumber);
    var slider = document.getElementById("slider" + sliderNumber);
    slider.style.transitionDuration = 1 + "s";
    var sliderMargin = parseFloat(slider.getAttribute("data-currentMargin"));
    var slideCount = parseFloat(slider.getAttribute("data-slideCount"));

    var slideNumber = parseInt(slider.getAttribute("data-imageNumber"));

    if (direction == "left") {
        if (slideNumber > 1) {
            slider.style.marginLeft = sliderMargin + 75 + "%";
            slider.setAttribute("data-currentMargin", sliderMargin + 75);
            slider.setAttribute("data-imageNumber", slideNumber - 1);

            document.getElementById("slide" + slideNumber + "_" + sliderNumber).classList.remove("active");
            document
                .getElementById("slide" + (slideNumber - 1) + "_" + sliderNumber)
                .classList.add("active");
        }
    } else if (direction == "right") {
        if (slideNumber < slideCount) {
            slider.style.marginLeft = sliderMargin - 75 + "%";
            slider.setAttribute("data-currentMargin", sliderMargin - 75);
            slider.setAttribute("data-imageNumber", slideNumber + 1);

            document.getElementById("slide" + slideNumber + "_" + sliderNumber).classList.remove("active");
            document
                .getElementById("slide" + (slideNumber + 1) + "_" + sliderNumber)
                .classList.add("active");
        }
    }
}


function viewTourTableModelPlaces() {
    document.getElementById("tourTablePlacesModel").classList.toggle('d-none');
}

function viewTourOrderModelPlaces() {
    document.getElementById("tourOrderPlacesModel").classList.toggle('d-none');
}