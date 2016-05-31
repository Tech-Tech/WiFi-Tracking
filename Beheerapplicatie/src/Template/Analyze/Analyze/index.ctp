<?= $this->Form->create() ?>
<fieldset>
	<legend><?= __('Select time period') ?></legend>
		<?= $this->Form->input('begin_date', ['type' => 'datetime-local']) ?>
		<?= $this->Form->input('end_date', ['type' => 'datetime-local']) ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<script>
	var devices = [];
	<?php if(!is_null($devices)): ?>
        <?php foreach($devices as $device): ?>
            devices.push(<?= $device['funcgetdevicesinlocationbydate'] ?>);
        <?php endforeach; ?>
    <?php endif; ?>
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

        if (devices.length != 0) {
            for (var i = 0; i < devices.length; i++) {
                data.addRow([new Date(devices[i].tracked_time), devices[i].count]);
            }
        } else {
            data.addRow([new Date(1990, 1, 1), 0]);
        }

        var options = {
            chart: {
                title: 'Devices'
            },
            width: 900,
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

        var chart = new google.charts.Line(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>