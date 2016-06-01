<div class="suffixes index large-9 medium-8 columns content">
    <h3><?= __('Suffixes') ?></h3>
    <?= $this->Html->link(__('Add suffix'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('suffix') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suffixes as $suffix): ?>
            <tr>
                <td><?= h($suffix->suffix) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $suffix->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suffix->id)]) ?>
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
