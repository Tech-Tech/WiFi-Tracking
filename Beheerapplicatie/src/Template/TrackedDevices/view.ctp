<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tracked Device'), ['action' => 'edit', $trackedDevice->mac_address]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tracked Device'), ['action' => 'delete', $trackedDevice->mac_address], ['confirm' => __('Are you sure you want to delete # {0}?', $trackedDevice->mac_address)]) ?> </li>
        <li><?= $this->Html->link(__('List Tracked Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tracked Device'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trackedDevices view large-9 medium-8 columns content">
    <h3><?= h($trackedDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($trackedDevice->mac_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= h($trackedDevice->vendor) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($trackedDevice->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Device Type') ?></th>
            <td><?= $this->Number->format($trackedDevice->device_type) ?></td>
        </tr>
    </table>
</div>
