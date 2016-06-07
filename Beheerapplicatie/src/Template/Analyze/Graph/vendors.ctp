<script src="https://www.gstatic.com/charts/loader.js"></script>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Select time period and vendors') ?></legend>
	<div class="information_div">
		<p>Please fill in your criteria below (* means required).</p>
	</div>
    <?= $this->Form->input('begin_date', ['type' => 'datetime-local',  'label' => 'Begin date (UTC)', 'required' => true]) ?>
    <?= $this->Form->input('end_date', ['type' => 'datetime-local', 'label' => 'End date (UTC)', 'required' => true]) ?>
    <?= $this->Form->input('min_signal_strength', ['type' => 'number', 'label' => 'Minimum signal strength', 'required' => true]) ?>
	<div class="input text required">
	<label for="vendors">Vendors</label>
	    <select required name="vendors[]" multiple="multiple" id="vendors">
	        <?php foreach($vendors as $vendor): ?>
	            <option value="<?= $vendor['vendor']?>"><?= $vendor['vendor']?></option>
	        <?php endforeach; ?>
	    </select>
	</div>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<div class="information_div">
	<p>The graph below displays all data that matches your criteria.</p>
</div>

<div id="dashboard">
    <div id="chart_div" style="width: 90%; height: 700px"></div>
</div>

<script>
    var vendor_requests = [];
    <?php if(!is_null($vendor_requests)): ?>
        <?php foreach($vendor_requests as $vendor_request): ?>
            vendor_requests.push(<?= $vendor_request['funcgetproberequestsbyvendor'] ?>);
        <?php endforeach; ?>
    <?php endif; ?>

    google.charts.load('current', {'packages': ['line', 'corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', "Vendor");
        data.addColumn('number', "Average probe requests per device");
        data.addColumn({type: 'string', role: 'tooltip'});

        if (vendor_requests.length != 0) {
            for (var i = 0; i < vendor_requests.length; i++) {
	            var average = Math.round(vendor_requests[i].total_received_requests / vendor_requests[i].total_devices);
	            if (average > 0) {
	                data.addRow([vendor_requests[i].vendor,
			            (vendor_requests[i].total_received_requests / vendor_requests[i].total_devices),
			            vendor_requests[i].vendor + "\nAverage probe requests: " +
			            average + "\nTotal devices: " +
			            vendor_requests[i].total_devices + "\nTotal requests: " +
			            vendor_requests[i].total_received_requests]);
                }
            }
        } else {
            data.addRow('0', 0);
        }

        var options = {
            title: 'Average probe requests per device per vendor',
            vAxis: {
                title: 'Vendor',
	            textStyle: {
		            fontSize: 10
	            }
            },

            hAxis: {
                title: 'Average probe requests'
            },

            animation: {
                startup: true,
                duration: 2000,
                easing: 'out'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script

