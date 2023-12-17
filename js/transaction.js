const allTransaction = document.getElementById('allTransaction');

function createChart(data) {
    return new Chart(allTransaction, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
                y: {
                    ticks: {
                        // Include a dollar sign in the ticks
                        callback: function (value) {
                            return "$" + value;
                        },
                    },
                },
            }
        }
    });
}

const initialData = {
    labels: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "Octomber",
        "November",
        "December",
    ],
    datasets: [
        {
            label: "Income",
            backgroundColor: "rgba(4,20,160,0.5)",
            borderColor: "#0414A0",
            borderRadius: 0,
            borderWidth: 1,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            barPercentage: 0.6,
        },
        {
            label: "Outcome",
            backgroundColor: "rgba(191,10,10,0.5)",
            borderColor: "#FF0000",
            borderRadius: 0,
            borderWidth: 1,
            tension: 20,
            width: 5,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            barPercentage: 0.6,
        },
        {
            label: "Profite",
            backgroundColor: "rgba(252, 111, 3,0.5)",
            borderColor: "#fc6f03",
            borderRadius: 0,
            borderWidth: 1,
            tension: 20,
            width: 5,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            barPercentage: 0.6,
        },
    ]
};

let myChart;

var responseObj;

myChart = createChart(initialData);
function setAllTransactionPanel(year) {

    var path;
    if (year == 0) {
        path = "../assets/model/adminPanelTransaction.php";
    } else {
        path = "../assets/model/adminPanelTransaction.php?year=" + year;
    }

    var transactionReq = new XMLHttpRequest();

    transactionReq.onreadystatechange = function () {
        if (transactionReq.readyState == 4) {

            var responseObj = JSON.parse(transactionReq.responseText);

            myChart.data.datasets[0].data = responseObj.income;
            myChart.data.datasets[1].data = responseObj.outcome;
            myChart.data.datasets[2].data = responseObj.profite;

            myChart.update();
        }
    };

    transactionReq.open("GET", path, true);
    transactionReq.send();

}

function setTransactionYear() {
    var yearSelector = document.getElementById("transactionYearSelector");
    if (yearSelector.value != 0) {
        setAllTransactionPanel(yearSelector.value);
    } else {
        setAllTransactionPanel(0);
    }
}