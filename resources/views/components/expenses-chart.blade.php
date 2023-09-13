@props(['expenseTypeTotal'])

<div class="w-75">
    <div>

        <canvas id="expense-chart"></canvas>
    </div><br>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var expenseData = @json($expenseTypeTotal);
        var expense_labels = Object.keys(expenseData);
        var expense_values = Object.values(expenseData);

        var ctx = document.getElementById("expense-chart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: expense_labels,
                datasets: [{
                    data: expense_values,
                    backgroundColor: ["#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd", "#8c564b",
                        "#e377c2", "#7f7f7f", "#bcbd22", "#17becf"
                    ]
                }]
            },
            options: {
                legend: {
                    position: "bottom"
                },
                title: {
                    display: true,
                    text: "Total Expenses by Types"
                },
                animation: {
                    animateScale: false,
                    animateRotate: true
                }
            }

        });
    </script>
</div>
