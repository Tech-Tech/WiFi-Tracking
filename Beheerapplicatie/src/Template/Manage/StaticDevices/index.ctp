<div class="staticDevices index large-9 medium-8 columns content">
	<h3><?= __('Static Devices') ?></h3>
    <div class="information_div">
        <p>The table below shows all static devices. Static devices are devices which can be easily excluded when
        viewing an analytic diagram. Static devices can be network infrastructure devices, smart tv's or any other
        device which is unlike to move.</p>
    </div>
	<?= $this->Html->link(__('Add Static Device'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('device_type') ?></th>
                <th><?= $this->Paginator->sort('mac_address') ?></th>
	            <th><?= $this->Paginator->sort('vendor') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staticDevices as $staticDevice): ?>
                <tr>
                    <td><?= !is_null($staticDevice->tracked_device->device_type) ? $staticDevice->tracked_device->device_type->device_type : '' ?> </td>
	                <td><?= $staticDevice->tracked_device->mac_address ?> </td>
                    <td><?= $staticDevice->tracked_device->vendor ?></td>
                    <td><?= $staticDevice->tracked_device->name ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['controller' => 'TrackedDevices', 'action' => 'edit', $staticDevice->tracked_device->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staticDevice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staticDevice->tracked_device->id)]) ?>
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
