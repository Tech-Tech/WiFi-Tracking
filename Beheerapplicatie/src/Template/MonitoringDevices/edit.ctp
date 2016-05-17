<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $monitoringDevice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDevice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Monitoring Devices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Monitoring Device Locations'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device Location'), ['controller' => 'MonitoringDeviceLocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Received Requests'), ['controller' => 'ReceivedRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Received Request'), ['controller' => 'ReceivedRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monitoringDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($monitoringDevice) ?>
    <fieldset>
        <legend><?= __('Edit Monitoring Device') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('mac_address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
