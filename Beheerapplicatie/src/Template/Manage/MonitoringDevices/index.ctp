<div class="monitoringDevices index large-9 medium-8 columns content">
    <h3><?= __('Monitoring Devices') ?></h3>
    <div class="information_div">
        <p>The table below shows all monitoring devices.</p>
    </div>
    <?= $this->Html->link(__('Add monitoring device'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('mac_address') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monitoringDevices as $monitoringDevice): ?>
            <tr>
                <td><?= h($monitoringDevice->name) ?></td>
                <td><?= h($monitoringDevice->mac_address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $monitoringDevice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $monitoringDevice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitoringDevice->id)]) ?>
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
