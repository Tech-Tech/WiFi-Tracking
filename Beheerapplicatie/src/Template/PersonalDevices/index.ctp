<div class="personalDevices index large-9 medium-8 columns content">
    <h3><?= __('Personal Devices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('mac_address') ?></th>
                <th><?= $this->Paginator->sort('person_id') ?></th>
                <th><?= $this->Paginator->sort('device_type') ?></th>
                <th><?= $this->Paginator->sort('vendor') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personalDevices as $personalDevice): ?>
            <tr>
                <td><?= h($personalDevice->mac_address) ?></td>
                <td><?= $personalDevice->has('person') ? $this->Html->link($personalDevice->person->name, ['controller' => 'Persons', 'action' => 'view', $personalDevice->person->id]) : '' ?></td>
                <td><?= h($personalDevice->device_type) ?></td>
                <td><?= h($personalDevice->vendor) ?></td>
                <td><?= h($personalDevice->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $personalDevice->mac_address]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personalDevice->mac_address]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personalDevice->mac_address], ['confirm' => __('Are you sure you want to delete # {0}?', $personalDevice->mac_address)]) ?>
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
