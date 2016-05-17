<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitoring Device Locations'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device Location'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Received Requests'), ['controller' => 'ReceivedRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Received Request'), ['controller' => 'ReceivedRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monitoringDevices index large-9 medium-8 columns content">
    <h3><?= __('Monitoring Devices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('mac_address') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monitoringDevices as $monitoringDevice): ?>
            <tr>
                <td><?= $this->Number->format($monitoringDevice->id) ?></td>
                <td><?= h($monitoringDevice->name) ?></td>
                <td><?= h($monitoringDevice->mac_address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $monitoringDevice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $monitoringDevice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $monitoringDevice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDevice->id)]) ?>
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
