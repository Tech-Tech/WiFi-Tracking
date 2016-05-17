<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Monitoring Device Location'), ['action' => 'edit', $monitoringDeviceLocation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Monitoring Device Location'), ['action' => 'delete', $monitoringDeviceLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDeviceLocation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Monitoring Device Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitoring Device Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monitoring Devices'), ['controller' => 'MonitoringDevices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitoring Device'), ['controller' => 'MonitoringDevices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="monitoringDeviceLocations view large-9 medium-8 columns content">
    <h3><?= h($monitoringDeviceLocation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $monitoringDeviceLocation->has('location') ? $this->Html->link($monitoringDeviceLocation->location->name, ['controller' => 'Locations', 'action' => 'view', $monitoringDeviceLocation->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Monitoring Device') ?></th>
            <td><?= $monitoringDeviceLocation->has('monitoring_device') ? $this->Html->link($monitoringDeviceLocation->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $monitoringDeviceLocation->monitoring_device->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($monitoringDeviceLocation->id) ?></td>
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
