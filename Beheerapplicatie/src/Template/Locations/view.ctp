<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->full_location_name) ?></h3>
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
        <h4><?= __('Related Monitoring Devices') ?></h4>
        <?php if (!empty($location->monitoring_device_locations)): ?>
	        <table cellpadding="0" cellspacing="0">
	            <tr>
	                <th><?= __('Monitoring Device') ?></th>
	                <th><?= __('Begin Date') ?></th>
	                <th><?= __('End Date') ?></th>
	            </tr>
	            <?php foreach ($location->monitoring_device_locations as $monitoringDeviceLocation): ?>
	            <tr>
	                <td><?= $this->Html->link($monitoringDeviceLocation->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $monitoringDeviceLocation->monitoring_device->id]) ?></td>
	                <td><?= h($monitoringDeviceLocation->begin_date) ?></td>
	                <td><?= h($monitoringDeviceLocation->end_date) ?></td>
	            </tr>
	            <?php endforeach; ?>
	        </table>
        <?php else: ?>
	        <p><?= __('This device is not connected to a location') ?></p>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Received Requests') ?></h4>
        <?php if (!empty($monitoringDeviceLocation->monitoring_device->received_requests)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Monitoring Device') ?></th>
                    <th><?= __('Tracked Mac Address') ?></th>
                    <th><?= __('Request Timestamp') ?></th>
                    <th><?= __('Signal Strength') ?></th>
                </tr>
                <?php foreach ($monitoringDeviceLocation->monitoring_device->received_requests as $receivedRequest): ?>
                    <tr>
                        <td><?= $this->Html->link($monitoringDeviceLocation->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $monitoringDeviceLocation->monitoring_device->id]) ?></td>
                        <td><?= h($receivedRequest->tracked_mac_address) ?></td>
                        <td><?= h($receivedRequest->request_timestamp) ?></td>
                        <td><?= h($receivedRequest->signal_strength) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
	        <p><?= __('There are no measured values') ?></p>
        <?php endif; ?>
    </div>
</div>
