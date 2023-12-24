
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
            document.getElementById("tpCost").innerText = "$" + responseObj.tp_cost;
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

    r.open("GET", "../assets/model/orderAssignModalOpenProcess.php?tp=" + t_id, true);
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

    req.open("POST", "../assets/model/orderAssignGuideProcess.php", true);
    req.send(form);
}

function reloadModal() {
    document.getElementById("forGuideMsg").value = "";
    document.getElementById("select_guide").value = "Select";
}

function tableModalOpen(tab_tid, tab_name) {

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var tabMo = req.responseText;
            var responseObj2 = JSON.parse(tabMo);

            var date = new Date();

            var tDate = date.getDate();
            var month = date.getMonth() + 1;

            if (tDate < 10) {
                tDate = '0' + tDate;
            }

            if (month < 10) {
                month = '0' + month;
            }

            var year = date.getUTCFullYear();
            var minDate = year + "-" + month + "-" + tDate;

            document.getElementById("tourist_name2").innerText = responseObj2.tcli_name;
            document.getElementById("tour_name2").value = responseObj2.t_name;
            document.getElementById("tour_duration2").value = responseObj2.t_durat;

            if (responseObj2.t_Ov_sts == "Ongoing") {
                document.getElementById("tour_startDate2").value = responseObj2.t_stDate;
                document.getElementById("tour_endDate2").value = responseObj2.t_enDate;
                document.getElementById("tour_startDate2").setAttribute("disabled", "true");
                document.getElementById("tour_endDate2").setAttribute("disabled", "true");
                document.getElementById("tour_startDate2").style.backgroundColor = "#D9D9D9";
                document.getElementById("tour_endDate2").style.backgroundColor = "#D9D9D9";
            } else {
                document.getElementById("tour_startDate2").value = responseObj2.t_stDate;
                document.getElementById("tour_endDate2").value = responseObj2.t_enDate;
                document.getElementById("tour_startDate2").removeAttribute("disabled", "true");
                document.getElementById("tour_endDate2").removeAttribute("disabled", "true");
                document.getElementById("tour_startDate2").style.backgroundColor = "white";
                document.getElementById("tour_endDate2").style.backgroundColor = "white";
                document.getElementById("tour_startDate2").setAttribute("min", minDate);
                document.getElementById("tour_endDate2").setAttribute("min", minDate);
            }

            document.getElementById("guide_name2").value = responseObj2.t_guideN;
            document.getElementById("tour_members2").value = responseObj2.t_members;
            document.getElementById("tourIdNo").value = responseObj2.t_idNo;
            document.getElementById("tourist_msg2").value = responseObj2.tcli_msg;

            var m = document.getElementById("openModalFromTable");
            bm = new bootstrap.Modal(m);
            bm.show();
        }
    };

    req.open("GET", "../assets/model/orderTableModalOpenProcess.php?tid=" + tab_tid + "&tabnm=" + tab_name + "", true);
    req.send();
}

function selectGuide(){

   alert("ok");

}

function tableModalUpdate() {

    var toId = document.getElementById("tourIdNo").value;
    var tName = document.getElementById("tour_name2").value;
    var tDurat = document.getElementById("tour_duration2").value;
    var tStDate = document.getElementById("tour_startDate2").value;
    var tEnDate = document.getElementById("tour_endDate2").value;
    var tCost = document.getElementById("tourCost").value;
    var tSvAmount = document.getElementById("tourSaveAmount").value;
    var msgForGuide = document.getElementById("forGuideMsg").value;
    var guideId = document.getElementById("getGuideId").value;

    var form = new FormData();

    form.append("ord_id", toId);
    form.append("t_name", tName);
    form.append("t_durat", tDurat);
    form.append("t_stDate", tStDate);
    form.append("t_enDate", tEnDate);
    form.append("t_guideId", guideId);
    form.append("t_cost", tCost);
    form.append("t_svAmount", tSvAmount);
    form.append("t_guideMsg", msgForGuide);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var resData2 = req.responseText;
            alert(resData2);
        }
    };

    req.open("POST", "../assets/model/orderTableAsgUpdateProcess.php", true);
    req.send(form);
}

function searchFiltering() {

    var inpSc = document.getElementById("searchAnyInp").value;

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var inpD = req.responseText;
            alert(inpD);
        }
    };

    req.open("GET", "../assets/model/orderAsgRowsFiltering.php?inpS=" + inpSc, true);
    req.send();
}

