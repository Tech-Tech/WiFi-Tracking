<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wings'), ['controller' => 'Wings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wing'), ['controller' => 'Wings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Floor'), ['controller' => 'Floors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suffixes'), ['controller' => 'Suffixes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suffix'), ['controller' => 'Suffixes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitoring Device Locations'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device Location'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Locations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('wing_id') ?></th>
                <th><?= $this->Paginator->sort('floor_id') ?></th>
                <th><?= $this->Paginator->sort('room_id') ?></th>
                <th><?= $this->Paginator->sort('suffix_id') ?></th>
                <th><?= $this->Paginator->sort('building_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
                <td><?= $this->Number->format($location->id) ?></td>
                <td><?= $location->has('wing') ? $this->Html->link($location->wing->id, ['controller' => 'Wings', 'action' => 'view', $location->wing->id]) : '' ?></td>
                <td><?= $location->has('floor') ? $this->Html->link($location->floor->id, ['controller' => 'Floors', 'action' => 'view', $location->floor->id]) : '' ?></td>
                <td><?= $location->has('room') ? $this->Html->link($location->room->id, ['controller' => 'Rooms', 'action' => 'view', $location->room->id]) : '' ?></td>
                <td><?= $location->has('suffix') ? $this->Html->link($location->suffix->id, ['controller' => 'Suffixes', 'action' => 'view', $location->suffix->id]) : '' ?></td>
                <td><?= $location->has('building') ? $this->Html->link($location->building->name, ['controller' => 'Buildings', 'action' => 'view', $location->building->id]) : '' ?></td>
                <td><?= h($location->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
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
