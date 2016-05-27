<div class="monitoringDevices view large-9 medium-8 columns content">
    <h3><?= h($monitoringDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($monitoringDevice->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($monitoringDevice->mac_address) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monitoring Device Locations') ?></h4>
        <?php if (!empty($monitoringDevice->monitoring_device_locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Location') ?></th>
                <th><?= __('Begin Date') ?></th>
                <th><?= __('End Date') ?></th>
            </tr>
            <?php foreach ($monitoringDevice->monitoring_device_locations as $monitoringDeviceLocation): ?>
            <tr>
                <td><?= $this->Html->link($monitoringDeviceLocation->location->full_location_name, ['controller' => 'Locations', 'action' => 'view', $monitoringDeviceLocation->location_id]) ?></td>
                <td><?= h($monitoringDeviceLocation->begin_date) ?></td>
                <td><?= h($monitoringDeviceLocation->end_date) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
