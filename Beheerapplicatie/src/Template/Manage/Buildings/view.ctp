<div class="buildings view large-9 medium-8 columns content">
    <h3><?= h($building->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= $building->address->full_address ?></td>
        </tr>
        <tr>
            <th><?= __('Campus') ?></th>
            <td><?= $this->Html->link($building->campus->name, ['controller' => 'Campuses', 'action' => 'view', $building->campus->id])?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($building->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($building->locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Wing') ?></th>
                <th><?= __('Floor') ?></th>
                <th><?= __('Room') ?></th>
                <th><?= __('Suffix') ?></th>
                <th><?= __('Building') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($building->locations as $location): ?>
            <tr>
                <td><?= h($location->wing->wing_code) ?></td>
                <td><?= h($location->floor->floor_number) ?></td>
                <td><?= h($location->room->room_number) ?></td>
                <td><?= $location->has('suffix') ? h($location->suffix->suffix) : '' ?></td>
                <td><?= h($building->name) ?></td>
                <td><?= h($location->name) ?></td>
	            <td class="actions">
		            <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $location->id]) ?>
	            </td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
