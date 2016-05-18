<div class="monitoringDeviceLocations view large-9 medium-8 columns content">
    <h3><?= h($monitoringDeviceLocation->location->full_location_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $monitoringDeviceLocation->has('location') ? $this->Html->link($monitoringDeviceLocation->location->full_location_name, ['controller' => 'Locations', 'action' => 'view', $monitoringDeviceLocation->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Monitoring Device') ?></th>
            <td><?= $monitoringDeviceLocation->has('monitoring_device') ? $this->Html->link($monitoringDeviceLocation->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $monitoringDeviceLocation->monitoring_device->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Begin Date') ?></th>
            <td><?= h($monitoringDeviceLocation->begin_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($monitoringDeviceLocation->end_date) ?></td>
        </tr>
    </table>
</div>
