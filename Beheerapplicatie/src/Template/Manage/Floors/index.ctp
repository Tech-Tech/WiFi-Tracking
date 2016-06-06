<div class="floors index large-9 medium-8 columns content">
    <h3><?= __('Floors') ?></h3>
    <div class="information_div">
        <p>The table below shows all registered floors.</p>
    </div>
    <?= $this->Html->link(__('Add floor'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('floor_number') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($floors as $floor): ?>
            <tr>
                <td><?= $this->Number->format($floor->floor_number) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $floor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floor->id)]) ?>
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
