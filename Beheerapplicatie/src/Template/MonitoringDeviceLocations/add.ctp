<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Monitoring Device Locations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitoring Devices'), ['controller' => 'MonitoringDevices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device'), ['controller' => 'MonitoringDevices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monitoringDeviceLocations form large-9 medium-8 columns content">
    <?= $this->Form->create($monitoringDeviceLocation) ?>
    <fieldset>
        <legend><?= __('Add Monitoring Device Location') ?></legend>
        <?php
            echo $this->Form->input('location_id', ['options' => $locations]);
            echo $this->Form->input('monitoring_device_id', ['options' => $monitoringDevices]);
            echo $this->Form->input('begin_date');
            echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
