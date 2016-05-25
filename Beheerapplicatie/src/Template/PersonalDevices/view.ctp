<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Personal Device'), ['action' => 'edit', $personalDevice->mac_address]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Personal Device'), ['action' => 'delete', $personalDevice->mac_address], ['confirm' => __('Are you sure you want to delete # {0}?', $personalDevice->mac_address)]) ?> </li>
        <li><?= $this->Html->link(__('List Personal Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personal Device'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personalDevices view large-9 medium-8 columns content">
    <h3><?= h($personalDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $personalDevice->has('person') ? $this->Html->link($personalDevice->person->name, ['controller' => 'Persons', 'action' => 'view', $personalDevice->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($personalDevice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tracked Device Id') ?></th>
            <td><?= $this->Number->format($personalDevice->tracked_device_id) ?></td>
        </tr>
    </table>
</div>
