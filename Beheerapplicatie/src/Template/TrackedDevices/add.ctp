<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tracked Devices'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trackedDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($trackedDevice) ?>
    <fieldset>
        <legend><?= __('Add Tracked Device') ?></legend>
        <?php
            echo $this->Form->input('device_type');
            echo $this->Form->input('vendor');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
