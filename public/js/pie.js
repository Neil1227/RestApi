document.addEventListener("DOMContentLoaded", function () {
    fetch("/dashboard/chart-data") // Fetch the data from the Laravel route
        .then(response => response.json())
        .then(function (data) {
            // Debugging: Check the data in the console
            console.log("Chart Data:", data);

            const ctx = document.getElementById("myPieChart").getContext("2d");

            // Create the pie chart with dynamic data
            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: Object.keys(data), // Dynamic labels from the keys of the data object
                    datasets: [{
                        data: Object.values(data), // Dynamic data from the values of the data object
                        backgroundColor: ["#E64A19", "#1565C0", "#512DA8", "#FFA000", "#00796B"],
                        hoverOffset: 4,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: "Summary Allocation",
                            font: {
                                family: "poppins, sans-serif",
                                size: 18,
                            },
                            color: "#495057",
                        },
                        legend: {
                            position: "bottom",
                        },
                    },
                },
            });
        })
        .catch(function (error) {
            console.error("Error fetching chart data:", error); // Log error if any
        });
});
