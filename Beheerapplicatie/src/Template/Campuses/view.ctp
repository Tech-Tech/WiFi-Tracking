<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campus'), ['action' => 'edit', $campus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campus'), ['action' => 'delete', $campus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campus'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campuses view large-9 medium-8 columns content">
    <h3><?= h($campus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($campus->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($campus->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Buildings') ?></h4>
        <?php if (!empty($campus->buildings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Address Id') ?></th>
                <th><?= __('Campus Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($campus->buildings as $buildings): ?>
            <tr>
                <td><?= h($buildings->id) ?></td>
                <td><?= h($buildings->address_id) ?></td>
                <td><?= h($buildings->campus_id) ?></td>
                <td><?= h($buildings->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Buildings', 'action' => 'view', $buildings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Buildings', 'action' => 'edit', $buildings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Buildings', 'action' => 'delete', $buildings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
