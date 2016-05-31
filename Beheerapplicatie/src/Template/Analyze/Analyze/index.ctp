<script>
	var devices = [];
	<?php foreach($devices as $device): ?>
		devices.push(<?= json_decode($device['funcgetdevicesinlocationbydate'], false)->count ?>);
	<?php endforeach; ?>
</script>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div"></div>
<script>
    google.charts.load('current', {'packages': ['line', 'corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();

        data.addColumn('datetime', "Date");
        data.addColumn('number', "Devices");

        data.addRows([
            [new Date(2014, 1, 1, 10), 1],
            [new Date(2014, 1, 2, 11), 1],
            [new Date(2014, 1, 3, 12), 10],
            [new Date(2014, 1, 4, 13), 40],
        ]);

        var options = {
            chart: {
                title: 'Devices'
            },
            width: 1500,
            height: 500,

            series: {
                // Gives each series an axis name that matches the Y-axis below.
                0: {
                    axis: 'Amount'
                },
                1: {
                    axis: 'Amount'
                }
            },

            axes :{
                // Adds labels to each axis; they don't have to match the axis names.
                y: {
                    Amount: {
                        label: 'Amount'
                    }
                }
            }
        };
        var chart = new google.charts.Line(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>