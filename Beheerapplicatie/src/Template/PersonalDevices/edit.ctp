<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $personalDevice->mac_address],
                ['confirm' => __('Are you sure you want to delete # {0}?', $personalDevice->mac_address)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Personal Devices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personalDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($personalDevice) ?>
    <fieldset>
        <legend><?= __('Edit Personal Device') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('tracked_device_id');
            echo $this->Form->input('person_id', ['options' => $persons]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
