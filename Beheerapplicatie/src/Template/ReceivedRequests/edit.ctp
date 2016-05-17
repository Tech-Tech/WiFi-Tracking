<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $receivedRequest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $receivedRequest->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Received Requests'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Monitoring Devices'), ['controller' => 'MonitoringDevices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitoring Device'), ['controller' => 'MonitoringDevices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="receivedRequests form large-9 medium-8 columns content">
    <?= $this->Form->create($receivedRequest) ?>
    <fieldset>
        <legend><?= __('Edit Received Request') ?></legend>
        <?php
            echo $this->Form->input('monitoring_device_id', ['options' => $monitoringDevices]);
            echo $this->Form->input('tracked_mac_address');
            echo $this->Form->input('request_timestamp');
            echo $this->Form->input('signal_strength');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
