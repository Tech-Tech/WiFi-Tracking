<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Locations') ?></h3>
	<?= $this->Html->link(__('Add location'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('campus_id') ?></th>
	            <th><?= $this->Paginator->sort('building_id') ?></th>
                <th><?= $this->Paginator->sort('wing_id') ?></th>
                <th><?= $this->Paginator->sort('floor_id') ?></th>
                <th><?= $this->Paginator->sort('room_id') ?></th>
                <th><?= $this->Paginator->sort('suffix_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
	            <td><?= $this->Html->link($location->building->campus->name, ['controller' => 'Campuses', 'action' => 'view', $location->building->campus_id]) ?></td>
	            <td><?= $this->Html->link($location->building->name, ['controller' => 'Buildings', 'action' => 'view', $location->building->id]) ?></td>
                <td><?= $location->wing->wing_code ?></td>
                <td><?= $location->floor->floor_number ?></td>
                <td><?= $location->room->room_number ?></td>
                <td><?= $location->has('suffix') ? $location->suffix->suffix : '' ?></td>
                <td><?= h($location->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
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
