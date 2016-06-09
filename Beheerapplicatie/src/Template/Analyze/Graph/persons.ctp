<script src="https://www.gstatic.com/charts/loader.js"></script>

<?= $this->Form->create() ?>
<fieldset>
	<legend><?= __('Select location and time period') ?></legend>
	<div class="information_div">
		<p>Please fill in your criteria below (* means required).</p>
	</div>
	<?= $this->Form->input('locations', ['type' => 'select', 'options' => $locations, 'label' => 'Location', 'required' => true]) ?>
	<?= $this->Form->input('begin_date', ['type' => 'datetime-local',  'label' => 'Begin date (UTC)', 'required' => true]) ?>
	<?= $this->Form->input('end_date', ['type' => 'datetime-local', 'label' => 'End date (UTC)', 'required' => true]) ?>
	<?= $this->Form->input('step', ['type' => 'number', 'label' => 'Minutes per step', 'required' => true]) ?>
	<?= $this->Form->input('min_signal_strength', ['type' => 'number', 'label' => 'Minimum signal strength (Recommended: -55)', 'required' => true]) ?>
	<?= $this->Form->input('min_probe_requests', ['type' => 'number', 'label' => 'Minimum amount of probe request within step (Recommended: 4 requests in 30 minutes)', 'required' => true]) ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<div class="information_div">
	<p>The graph below shows the amount of persons that have been in the given location each step within the given timespan.
    Each data point displays the amount of persons counted during the last step.
	Only requests with a stronger signal strength than the minimal signal strength will be used in the counting process.
    A correct minimal signal strength can make sure that only persons within the location are counted.
	Only devices that send the minimal amount of probe requests within a step will be counted, this amount is checked in every step.</p>
</div>

<div id="chart_div" style="width: 90%; height: 500px;"></div>

<script>
	var persons = [];
	<?php if(!is_null($persons)): ?>
		<?php foreach($persons as $person): ?>
			persons.push(<?= $person['funcgetpersonsinlocationbydate'] ?>);
		<?php endforeach; ?>
	<?php endif; ?>
	google.charts.load('current', {'packages': ['line', 'corechart']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = new google.visualization.DataTable();
		data.addColumn('datetime', "Date");
		data.addColumn('number', "Persons");
		if (persons.length != 0) {
			for (var i = 0; i < persons.length; i++) {
				data.addRow([
					new Date(persons[i].tracked_time),
					Math.round(persons[i].count)]);
			}
		} else {
			data.addRow([new Date(1990, 1, 1), 0]);
		}
		var options = {
			title: 'Persons in location',
			vAxis: {
				title: 'Amount of persons'
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
				duration: 1500,
				easing: 'out'
			}
		};
		var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
</script>