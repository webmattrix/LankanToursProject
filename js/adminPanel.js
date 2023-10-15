window.onload = function () {

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      var res = req.responseText;
      var responseObj = JSON.parse(res);

      var barChartData = {
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
            data: responseObj.income,
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
            data: responseObj.outcome,
            barPercentage: 0.6,
          },
        ],
      };

      var chartOptions = {
        responsive: true,
        legend: {
          position: "top",
        },
        title: {
          display: true,
          text: "Chart.js Bar Chart",
        },
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
        },
      };

      var ctx = document.getElementById("canvas").getContext("2d");
      window.myBar = new Chart(ctx, {
        type: "bar",
        data: barChartData,
        options: chartOptions,
      });

      setInterval(() => {
        document.getElementById("myChart").style.width = 100 + "%";
      }, 10);
    }
  };

  req.open("GET", "../assets/model/adminPanelTransaction.php", true);
  req.send();
};
