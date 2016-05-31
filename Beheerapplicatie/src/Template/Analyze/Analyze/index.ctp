<script src="https://www.gstatic.com/charts/loader.js"></script>
<fieldset>
    <?= $this->Form->input('locations', ['type' => 'select', 'options' => $locations]) ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<div id="chart_div" style="width: 90%; height: 500px;"></div>


<script>
    var devices = [];
    <?php if(!is_null($devices)): ?>
        <?php foreach($devices as $device): ?>
            devices.push(<?= $device['funcgetdevicesinlocationbydate'] ?>);
        <?php endforeach; ?>
    <?php endif; ?>

    google.charts.load('current', {'packages': ['line', 'corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();

        data.addColumn('datetime', "Date");
        data.addColumn('number', "Devices");

        if (devices.length != 0) {
            for (var i = 0; i < devices.length; i++) {
                data.addRow([new Date(devices[i].tracked_time), devices[i].count]);
            }
        } else {
            data.addRow([new Date(1990, 1, 1), 0]);
        }

        var options = {
            title: 'Devices in location',
//            width: 100%,
//            height: 500,
            vAxis: {
                title: 'Amount of devices'
            },

            hAxis: {
                title: 'Date',
                format: 'dd/MM HH:mm',
                gridlines: {
                    count: 4
                }
            },

            animation: {
                startup: true,
                duration: 1000,
                easing: 'out'
            },

            series: {
                // Gives each series an axis name that matches the Y-axis below.
                0: {
                    axis: 'Amount'
                },
                1: {
                    axis: 'Amount'
                }
            },

            axes: {
                // Adds labels to each axis; they don't have to match the axis names.
                y: {
                    Amount: {
                        label: 'Amount'
                    },
                    all: {
                        range: {
                            min: 0
                        }
                    }
                }
            }
        };

        var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

</script>