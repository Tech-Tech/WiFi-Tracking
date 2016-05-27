<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Locations') ?></h3>
	<?= $this->Html->link(__('Add location'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('Location') ?></th>
	            <th><?= __('Current connected monitoring devices') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
	            <td><?= $location->full_location_name ?></td>
	            <td>
		            <?php foreach($current_monitoring_device_locations as $monitoring_device_location): ?>
		                <?php if($monitoring_device_location->location_id == $location->id): ?>
			                <?= $this->Html->link($monitoring_device_location->monitoring_device->name, ['controller' => 'MonitoringDevices', 'action' => 'view', $monitoring_device_location->monitoring_device_id]) ?>
			            <?php endif; ?>
		            <?php endforeach; ?>
	            </td>
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
