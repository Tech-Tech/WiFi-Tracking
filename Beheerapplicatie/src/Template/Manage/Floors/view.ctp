<div class="floors view large-9 medium-8 columns content">
    <h3><?= h($floor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Floor Number') ?></th>
            <td><?= $this->Number->format($floor->floor_number) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($floor->locations)): ?>
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
            <?php foreach ($floor->locations as $locations): ?>
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
