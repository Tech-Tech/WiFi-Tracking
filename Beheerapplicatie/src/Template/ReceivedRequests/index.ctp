<div class="receivedRequests index large-9 medium-8 columns content">
    <h3><?= __('Received Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('monitoring_device_id') ?></th>
                <th><?= $this->Paginator->sort('tracked_mac_address') ?></th>
                <th><?= $this->Paginator->sort('request_timestamp') ?></th>
                <th><?= $this->Paginator->sort('signal_strength') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($receivedRequests as $receivedRequest): ?>
            <tr>
                <td><?= $receivedRequest->has('monitoring_device') ? $this->Html->link($receivedRequest->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $receivedRequest->monitoring_device->id]) : '' ?></td>
                <td><?= h($receivedRequest->tracked_mac_address) ?></td>
                <td><?= h($receivedRequest->request_timestamp) ?></td>
                <td><?= $this->Number->format($receivedRequest->signal_strength) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $receivedRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receivedRequest->id)]) ?>
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
