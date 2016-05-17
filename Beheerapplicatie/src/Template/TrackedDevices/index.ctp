<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tracked Device'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trackedDevices index large-9 medium-8 columns content">
    <h3><?= __('Tracked Devices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('mac_address') ?></th>
                <th><?= $this->Paginator->sort('device_type') ?></th>
                <th><?= $this->Paginator->sort('vendor') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trackedDevices as $trackedDevice): ?>
            <tr>
                <td><?= h($trackedDevice->mac_address) ?></td>
                <td><?= $this->Number->format($trackedDevice->device_type) ?></td>
                <td><?= h($trackedDevice->vendor) ?></td>
                <td><?= h($trackedDevice->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trackedDevice->mac_address]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trackedDevice->mac_address]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trackedDevice->mac_address], ['confirm' => __('Are you sure you want to delete # {0}?', $trackedDevice->mac_address)]) ?>
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
