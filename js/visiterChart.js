const ctx = document.getElementById("myChart");

var req = new XMLHttpRequest();

req.onreadystatechange = function () {
  if (req.readyState == 4) {
    
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Registered", "Non-Registered"],
        datasets: [
          {
            label: "Visiters",
            data: [75, 19],
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  }
};

req.open("GET", "../assets/model/adminPanelVisiterCalculation.php", true);
req.send();
