<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Person Roles'), ['controller' => 'PersonRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person Role'), ['controller' => 'PersonRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personal Devices'), ['controller' => 'PersonalDevices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Personal Device'), ['controller' => 'PersonalDevices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="persons form large-9 medium-8 columns content">
    <?= $this->Form->create($person) ?>
    <fieldset>
        <legend><?= __('Add Person') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
