<div class="campuses index large-9 medium-8 columns content">
    <h3><?= __('Campuses') ?></h3>
    <?= $this->Html->link(__('Add campus'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campuses as $campus): ?>
            <tr>
                <td><?= h($campus->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $campus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campus->id)]) ?>
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
