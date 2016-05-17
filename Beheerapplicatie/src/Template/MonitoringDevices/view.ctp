<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Monitoring Device'), ['action' => 'edit', $monitoringDevice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Monitoring Device'), ['action' => 'delete', $monitoringDevice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDevice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Monitoring Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitoring Device'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monitoring Device Locations'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitoring Device Location'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Received Requests'), ['controller' => 'ReceivedRequests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Received Request'), ['controller' => 'ReceivedRequests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
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
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($monitoringDevice->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monitoring Device Locations') ?></h4>
        <?php if (!empty($monitoringDevice->monitoring_device_locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Monitoring Device Id') ?></th>
                <th><?= __('Begin Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($monitoringDevice->monitoring_device_locations as $monitoringDeviceLocations): ?>
            <tr>
                <td><?= h($monitoringDeviceLocations->id) ?></td>
                <td><?= h($monitoringDeviceLocations->location_id) ?></td>
                <td><?= h($monitoringDeviceLocations->monitoring_device_id) ?></td>
                <td><?= h($monitoringDeviceLocations->begin_date) ?></td>
                <td><?= h($monitoringDeviceLocations->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'view', $monitoringDeviceLocations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'edit', $monitoringDeviceLocations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'delete', $monitoringDeviceLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDeviceLocations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Received Requests') ?></h4>
        <?php if (!empty($monitoringDevice->received_requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Monitoring Device Id') ?></th>
                <th><?= __('Tracked Mac Address') ?></th>
                <th><?= __('Request Timestamp') ?></th>
                <th><?= __('Signal Strength') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($monitoringDevice->received_requests as $receivedRequests): ?>
            <tr>
                <td><?= h($receivedRequests->id) ?></td>
                <td><?= h($receivedRequests->monitoring_device_id) ?></td>
                <td><?= h($receivedRequests->tracked_mac_address) ?></td>
                <td><?= h($receivedRequests->request_timestamp) ?></td>
                <td><?= h($receivedRequests->signal_strength) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ReceivedRequests', 'action' => 'view', $receivedRequests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ReceivedRequests', 'action' => 'edit', $receivedRequests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReceivedRequests', 'action' => 'delete', $receivedRequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receivedRequests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
