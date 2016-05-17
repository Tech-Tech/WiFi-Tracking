<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Received Request'), ['action' => 'edit', $receivedRequest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Received Request'), ['action' => 'delete', $receivedRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receivedRequest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Received Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Received Request'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monitoring Devices'), ['controller' => 'MonitoringDevices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitoring Device'), ['controller' => 'MonitoringDevices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="receivedRequests view large-9 medium-8 columns content">
    <h3><?= h($receivedRequest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Monitoring Device') ?></th>
            <td><?= $receivedRequest->has('monitoring_device') ? $this->Html->link($receivedRequest->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $receivedRequest->monitoring_device->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tracked Mac Address') ?></th>
            <td><?= h($receivedRequest->tracked_mac_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($receivedRequest->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Signal Strength') ?></th>
            <td><?= $this->Number->format($receivedRequest->signal_strength) ?></td>
        </tr>
        <tr>
            <th><?= __('Request Timestamp') ?></th>
            <td><?= h($receivedRequest->request_timestamp) ?></td>
        </tr>
    </table>
</div>
