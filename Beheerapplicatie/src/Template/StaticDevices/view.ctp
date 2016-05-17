<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Static Device'), ['action' => 'edit', $staticDevice->mac_address]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Static Device'), ['action' => 'delete', $staticDevice->mac_address], ['confirm' => __('Are you sure you want to delete # {0}?', $staticDevice->mac_address)]) ?> </li>
        <li><?= $this->Html->link(__('List Static Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Static Device'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="staticDevices view large-9 medium-8 columns content">
    <h3><?= h($staticDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($staticDevice->mac_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Device Type') ?></th>
            <td><?= h($staticDevice->device_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= h($staticDevice->vendor) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($staticDevice->name) ?></td>
        </tr>
    </table>
</div>
