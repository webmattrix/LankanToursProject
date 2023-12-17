
var valuesArray = [];
var table = document.getElementById("tbody");

function addPlace() {
    var place = document.getElementById("place");
    var selectedOption = place.options[place.selectedIndex];
    var selectedValue = place.value;
    var selectedText = selectedOption.textContent;

    var exists = false;

    for (var i = 0; i < table.rows.length; i++) {
        var existingValue = table.rows[i].cells[0].innerHTML;
        if (existingValue === selectedValue) {
            exists = true;
            break;
        }
    }


    if (!exists) {
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        row.classList.add("text-center");
        cell1.innerHTML = selectedValue;
        cell2.innerHTML = selectedText;
        cell3.innerHTML = '<button onclick="deleteRow(this)" class="btn px-2 px-lg-4 text-white" style="background-color: #EB4646;">Delete</button>';

        valuesArray = [];

        for (var i = 0; i < table.rows.length; i++) {
            var cell = table.rows[i].cells[0];
            valuesArray.push(cell.innerHTML);
        }

    } else {
        alert("Value already exists in the table.");
    }
}


function deleteRow(button) {
    var row = button.closest('tr');
    if (row) {
        row.remove();
    }

    var cell1 = row.cells[0];
    var deletedValue = cell1.textContent;
    var index = valuesArray.indexOf(deletedValue);
    if (index !== -1) {
        valuesArray.splice(index, 1);
    }
}


function addNewTourPlan() {

    var name = document.getElementById("tour_name").value;
    var duration = document.getElementById("duration").value;
    var description = document.getElementById("description").value;

    var form = new FormData();
    form.append("name", name);
    form.append("duration", duration);
    form.append("description", description);
    form.append("places", valuesArray);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("New Tour Added Successfuly");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "../assets/model/addNewTour.php", true);
    r.send(form);
}

var bm;

function addNewPlace() {
    var m = document.getElementById("addNewPlaceModal");
    bm = new bootstrap.Modal(m, {
        backdrop: 'static'
    });
    bm.show();
}

function createNewPlace() {
    var name = document.getElementById("place_name").value;
    var city = document.getElementById("city").value;
    var image = document.getElementById("place_image");


    if (image.files.length == 0) {

        alert("You have not selected any image.");

    } else {

        var form = new FormData();
        form.append("name", name);
        form.append("city", city);
        form.append("image", image.files[0]);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "success") {
                    bm.hide();
                } else {
                    alert("place coudn't add");
                }
            }
        }

        r.open("POST", "../assets/model/addNewPlace.php", true);
        r.send(form);
    }
}