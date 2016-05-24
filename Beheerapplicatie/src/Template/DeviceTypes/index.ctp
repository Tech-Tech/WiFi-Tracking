<div class="deviceTypes index large-9 medium-8 columns content">
    <h3><?= __('Device Types') ?></h3>
	<?= $this->Html->link(__('Add Device Type'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('device_type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deviceTypes as $deviceType): ?>
            <tr>
                <td><?= h($deviceType->device_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deviceType->device_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deviceType->device_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deviceType->device_id], ['confirm' => __('Are you sure you want to delete # {0}?', $deviceType->device_id)]) ?>
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
