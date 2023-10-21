
var bm;

function assignOpenModel(t_id) {

    // var tpName = document.getElementById("tpName").innerText;
    // var tpCost = document.getElementById("tpCost").innerText;
    // var tpOverall = document.getElementById("tpOverall").innerText;
    // var tpStartD = document.getElementById("tpStartD").innerText;
    // var tpEndD = document.getElementById("tpEndD").innerText;
    // var tpMemberC = document.getElementById("tpMemberC").innerText;
    // var cusMessage = document.getElementById("cusMessage").innerText;

    // var form = new FormData();

    // form.append("tpName", tpName);
    // form.append("tpCost", tpCost);
    // form.append("tpOverall", tpOverall);
    // form.append("tpStartD", tpStartD);
    // form.append("tpEndD", tpEndD);
    // form.append("tpMemberC", tpMemberC);
    // form.append("tourId", t_id);
    // form.append("cusMsg", cusMessage);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var data = r.responseText;
            var responseObj = JSON.parse(data);

            document.getElementById("tpName").innerText = responseObj.tp_name;
            document.getElementById("tpCost").innerText = "$"+responseObj.tp_cost;
            if (responseObj.tp_payStatus == 0) {
                document.getElementById("tpOverall").style.color = "red";
                document.getElementById("tpOverall").innerText = "Not Complete";
            } else {
                document.getElementById("tpOverall").style.color = "green";
                document.getElementById("tpOverall").innerText = "Complete";
            }
            document.getElementById("tpStartD").innerText = responseObj.tp_stDate;
            document.getElementById("tpEndD").innerText = responseObj.tp_enDate;
            document.getElementById("tpMemberC").innerText = responseObj.tp_members;
            document.getElementById("cusMessage").innerText = responseObj.tp_cusMsg;
            document.getElementById("responseTourId").value = responseObj.tp_id;

            var m = document.getElementById("openUngModel");
            bm = new bootstrap.Modal(m);
            bm.show();
        }
    }

    r.open("GET", "/tourProject/LankanToursProject/assets/model/orderAssignModalOpenProcess.php?tp=" + t_id, true);
    r.send();

}

function assignOrder() {

    var tpName = document.getElementById("tpName").innerText;
    var tpCost = document.getElementById("tpCost").innerText;
    var tpOverall = document.getElementById("tpOverall").innerText;
    var tpStartD = document.getElementById("tpStartD").innerText;
    var tpEndD = document.getElementById("tpEndD").innerText;
    var tpMemberC = document.getElementById("tpMemberC").innerText;
    var selectGuide = document.getElementById("select_guide").value;
    var guideMsg = document.getElementById("forGuideMsg").value;
    var cusMessage = document.getElementById("cusMessage").value;
    var tid = document.getElementById("responseTourId").value;

    var form = new FormData();

    form.append("tpName", tpName);
    form.append("tpCost", tpCost);
    form.append("tpOverall", tpOverall);
    form.append("tpStartD", tpStartD);
    form.append("tpEndD", tpEndD);
    form.append("tpMemberC", tpMemberC);
    form.append("guideSelect", selectGuide);
    form.append("guideMsg", guideMsg);
    form.append("cusMsg", cusMessage);
    form.append("tour_id", tid);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var asd = req.responseText;
            alert(asd);
        }
    };

    req.open("POST", "/tourProject/LankanToursProject/assets/model/orderAssignGuideProcess.php", true);
    req.send(form);
}