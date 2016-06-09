<div class="wings index large-9 medium-8 columns content">
    <h3><?= __('Wings') ?></h3>
    <div class="information_div">
        <p>The table below shows all registered wings.</p>
    </div>
	<?= $this->Html->link(__('Add wing'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('wing_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wings as $wing): ?>
            <tr>
                <td><?= h($wing->wing_code) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wing->id)]) ?>
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
