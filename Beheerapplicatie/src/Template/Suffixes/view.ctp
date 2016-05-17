<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Suffix'), ['action' => 'edit', $suffix->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Suffix'), ['action' => 'delete', $suffix->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suffix->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suffixes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suffix'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suffixes view large-9 medium-8 columns content">
    <h3><?= h($suffix->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Suffix') ?></th>
            <td><?= h($suffix->suffix) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($suffix->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($suffix->locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Wing Id') ?></th>
                <th><?= __('Floor Id') ?></th>
                <th><?= __('Room Id') ?></th>
                <th><?= __('Suffix Id') ?></th>
                <th><?= __('Building Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suffix->locations as $locations): ?>
            <tr>
                <td><?= h($locations->id) ?></td>
                <td><?= h($locations->wing_id) ?></td>
                <td><?= h($locations->floor_id) ?></td>
                <td><?= h($locations->room_id) ?></td>
                <td><?= h($locations->suffix_id) ?></td>
                <td><?= h($locations->building_id) ?></td>
                <td><?= h($locations->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $locations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $locations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $locations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
