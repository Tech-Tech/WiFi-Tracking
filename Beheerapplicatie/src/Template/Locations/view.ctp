<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wings'), ['controller' => 'Wings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wing'), ['controller' => 'Wings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor'), ['controller' => 'Floors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suffixes'), ['controller' => 'Suffixes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suffix'), ['controller' => 'Suffixes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monitoring Device Locations'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitoring Device Location'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Wing') ?></th>
            <td><?= $location->has('wing') ? $this->Html->link($location->wing->id, ['controller' => 'Wings', 'action' => 'view', $location->wing->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Floor') ?></th>
            <td><?= $location->has('floor') ? $this->Html->link($location->floor->id, ['controller' => 'Floors', 'action' => 'view', $location->floor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $location->has('room') ? $this->Html->link($location->room->id, ['controller' => 'Rooms', 'action' => 'view', $location->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Suffix') ?></th>
            <td><?= $location->has('suffix') ? $this->Html->link($location->suffix->id, ['controller' => 'Suffixes', 'action' => 'view', $location->suffix->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Building') ?></th>
            <td><?= $location->has('building') ? $this->Html->link($location->building->name, ['controller' => 'Buildings', 'action' => 'view', $location->building->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monitoring Device Locations') ?></h4>
        <?php if (!empty($location->monitoring_device_locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Monitoring Device Id') ?></th>
                <th><?= __('Begin Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->monitoring_device_locations as $monitoringDeviceLocations): ?>
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
</div>
