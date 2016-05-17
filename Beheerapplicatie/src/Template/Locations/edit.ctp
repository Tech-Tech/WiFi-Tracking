<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $location->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li>
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
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edit Location') ?></legend>
        <?php
            echo $this->Form->input('wing_id', ['options' => $wings]);
            echo $this->Form->input('floor_id', ['options' => $floors]);
            echo $this->Form->input('room_id', ['options' => $rooms]);
            echo $this->Form->input('suffix_id', ['options' => $suffixes, 'empty' => true]);
            echo $this->Form->input('building_id', ['options' => $buildings]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
