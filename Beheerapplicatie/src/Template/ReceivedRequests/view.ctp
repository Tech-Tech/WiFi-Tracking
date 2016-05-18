<div class="receivedRequests view large-9 medium-8 columns content">
    <h3><?= h($receivedRequest->monitoring_device->name) ?></h3>
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
            <th><?= __('Signal Strength') ?></th>
            <td><?= $this->Number->format($receivedRequest->signal_strength) ?></td>
        </tr>
        <tr>
            <th><?= __('Request Timestamp') ?></th>
            <td><?= h($receivedRequest->request_timestamp) ?></td>
        </tr>
    </table>
</div>
