<script>
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function generateRandomArray(size, minValue, maxValue) {
        const randomArray = [];
        for (let i = 0; i < size; i++) {
            const randomValue = getRandomInt(minValue, maxValue);
            randomArray.push(randomValue);
        }
        return randomArray;
    }


    function createChart(data) {
        const ctx = document.getElementById('myChart').getContext('2d');
        return new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
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
        datasets: [{
                label: "Income",
                backgroundColor: "rgba(4,20,160,0.5)",
                borderColor: "#0414A0",
                borderRadius: 0,
                borderWidth: 1,
                data: generateRandomArray(12, 1, 100),
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
                data: generateRandomArray(12, 1, 100),
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
                data: generateRandomArray(12, 1, 100),
                barPercentage: 0.6,
            },
        ],
    };

    let myChart = createChart(initialData);

    function changeValues() {
        myChart.data.datasets[0].data = generateRandomArray(12, 1, 100);
        myChart.data.datasets[1].data = generateRandomArray(12, 1, 100);
        myChart.data.datasets[2].data = generateRandomArray(12, 1, 100);
        myChart.update();
    }
</script>