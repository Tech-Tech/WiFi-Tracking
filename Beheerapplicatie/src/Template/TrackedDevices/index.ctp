<div class="trackedDevices index large-9 medium-8 columns content">
    <h3><?= __('Tracked Devices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('device_type') ?></th>
                <th><?= $this->Paginator->sort('mac_address') ?></th>
                <th><?= $this->Paginator->sort('vendor') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trackedDevices as $trackedDevice): ?>
            <tr>
                <td><?= !is_null($trackedDevice->device_type) ? $trackedDevice->device_type->device_type : '' ?></td>
                <td><?= h($trackedDevice->mac_address) ?></td>
                <td><?= h($trackedDevice->vendor) ?></td>
                <td><?= h($trackedDevice->name) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trackedDevice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trackedDevice->id)]) ?>
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
