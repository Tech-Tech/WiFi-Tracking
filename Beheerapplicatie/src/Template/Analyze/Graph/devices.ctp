<script src="https://www.gstatic.com/charts/loader.js"></script>
<?= $this->Form->create() ?>
<fieldset>
	<legend><?= __('Select location and time period') ?></legend>
        <?= $this->Form->input('locations', ['type' => 'select', 'options' => $locations, 'label' => 'Location']) ?>
		<?= $this->Form->input('begin_date', ['type' => 'datetime-local',  'label' => 'Begin date (UTC)']) ?>
		<?= $this->Form->input('end_date', ['type' => 'datetime-local', 'label' => 'End date (UTC)']) ?>
        <?= $this->Form->input('step', ['type' => 'number', 'label' => 'Minutes per step']) ?>
        <?= $this->Form->input('min_signal_strength', ['type' => 'number', 'label' => 'Minimum signal strength']) ?>
        <?= $this->Form->input('min_probe_requests', ['type' => 'number', 'label' => 'Minimum amount of probe request within step']) ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<div id="chart_div" style="width: 90%; height: 900px;"></div>

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
                duration: 2000,
                easing: 'out'
            }
        };

        var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

</script>