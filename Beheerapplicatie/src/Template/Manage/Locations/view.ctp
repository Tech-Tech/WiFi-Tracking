<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->full_location_name) ?></h3>
	<div class="information_div">
		<p>Below all details about <?= $location->full_location_name ?> are listed.</p>
	</div>
    <table class="vertical-table">
	    <tr>
		    <th><?= __('Campus') ?></th>
		    <td><?= $this->Html->link($location->building->campus->name, ['controller' => 'Campuses', 'action' => 'view', $location->building->campus_id]) ?></td>
	    </tr>
	    <tr>
		    <th><?= __('Building') ?></th>
		    <td><?= $this->Html->link($location->building->name, ['controller' => 'Buildings', 'action' => 'view', $location->building->id]) ?></td>
	    </tr>
        <tr>
            <th><?= __('Wing') ?></th>
            <td><?= $location->wing->wing_code ?></td>
        </tr>
        <tr>
            <th><?= __('Floor') ?></th>
            <td><?= $location->floor->floor_number ?></td>
        </tr>
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $location->room->room_number ?></td>
        </tr>
        <tr>
            <th><?= __('Suffix') ?></th>
            <td><?= $location->has('suffix') ? $location->suffix->suffix : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
    </table>
    <div class="related">
	    <div class="information_div">
		    <p>Below is a list of all monitoring devices that have been , are currently, or will be connected to
			    <?= $location->full_location_name ?></p>
	    </div>
        <h4><?= __('Related Monitoring Devices') ?></h4>
	    <?= $this->Html->link(__('Add monitoring device'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'add', $location->id]) ?>
        <?php if (!empty($location->monitoring_device_locations)): ?>
	        <table cellpadding="0" cellspacing="0">
	            <tr>
	                <th><?= __('Monitoring Device') ?></th>
	                <th><?= __('Begin Date') ?></th>
	                <th><?= __('End Date') ?></th>
		            <th><?= __('Actions') ?></th>
	            </tr>
	            <?php foreach ($location->monitoring_device_locations as $monitoringDeviceLocation): ?>
	            <tr>
	                <td><?= $this->Html->link($monitoringDeviceLocation->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $monitoringDeviceLocation->monitoring_device->id]) ?></td>
	                <td><?= date_format($monitoringDeviceLocation->begin_date, 'D d M Y H:i') ?></td>
	                <td><?= (!is_null($monitoringDeviceLocation->end_date)) ? (date_format($monitoringDeviceLocation->end_date, 'D d M Y H:i')) : ('') ?></td>
		            <td class="actions">
			            <?= $this->Html->link(__('Edit'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'edit', $monitoringDeviceLocation->id]) ?>
			            <?= $this->Form->postLink(__('Delete'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'delete', $monitoringDeviceLocation->id, '?' => ['id' => $monitoringDeviceLocation->location_id]], ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDeviceLocation->id)]) ?>
		            </td>
	            </tr>
	            <?php endforeach; ?>
	        </table>
        <?php else: ?>
	        <p><?= __('This device is not connected to a location') ?></p>
        <?php endif; ?>
    </div>
</div>
