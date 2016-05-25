<div class="staticDevices index large-9 medium-8 columns content">
	<h3><?= __('Static Devices') ?></h3>
	<?= $this->Html->link(__('Add Static Device'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('mac_address') ?></th>
	            <th><?= $this->Paginator->sort('vendor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staticDevices as $staticDevice): ?>
                <tr>
	                <td><?= $staticDevice->tracked_device->mac_address ?> </td>
                    <td><?= $staticDevice->tracked_device->vendor ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $staticDevice->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staticDevice->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staticDevice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staticDevice->id)]) ?>
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
