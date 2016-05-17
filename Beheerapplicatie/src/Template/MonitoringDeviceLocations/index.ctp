<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device Location'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitoring Devices'), ['controller' => 'MonitoringDevices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device'), ['controller' => 'MonitoringDevices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monitoringDeviceLocations index large-9 medium-8 columns content">
    <h3><?= __('Monitoring Device Locations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('monitoring_device_id') ?></th>
                <th><?= $this->Paginator->sort('begin_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monitoringDeviceLocations as $monitoringDeviceLocation): ?>
            <tr>
                <td><?= $this->Number->format($monitoringDeviceLocation->id) ?></td>
                <td><?= $monitoringDeviceLocation->has('location') ? $this->Html->link($monitoringDeviceLocation->location->name, ['controller' => 'Locations', 'action' => 'view', $monitoringDeviceLocation->location->id]) : '' ?></td>
                <td><?= $monitoringDeviceLocation->has('monitoring_device') ? $this->Html->link($monitoringDeviceLocation->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $monitoringDeviceLocation->monitoring_device->id]) : '' ?></td>
                <td><?= h($monitoringDeviceLocation->begin_date) ?></td>
                <td><?= h($monitoringDeviceLocation->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $monitoringDeviceLocation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $monitoringDeviceLocation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $monitoringDeviceLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDeviceLocation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
