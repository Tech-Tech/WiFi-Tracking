<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Device Type'), ['action' => 'edit', $deviceType->device_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device Type'), ['action' => 'delete', $deviceType->device_id], ['confirm' => __('Are you sure you want to delete # {0}?', $deviceType->device_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Device Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deviceTypes view large-9 medium-8 columns content">
    <h3><?= h($deviceType->device_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Device Type') ?></th>
            <td><?= h($deviceType->device_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Device Id') ?></th>
            <td><?= $this->Number->format($deviceType->device_id) ?></td>
        </tr>
    </table>
</div>
