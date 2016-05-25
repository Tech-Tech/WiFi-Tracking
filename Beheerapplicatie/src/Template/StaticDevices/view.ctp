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
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($staticDevice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tracked Device Id') ?></th>
            <td><?= $this->Number->format($staticDevice->tracked_device_id) ?></td>
        </tr>
    </table>
</div>
