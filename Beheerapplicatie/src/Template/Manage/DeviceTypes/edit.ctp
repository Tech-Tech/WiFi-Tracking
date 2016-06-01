<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deviceType->device_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deviceType->device_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Device Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="deviceTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($deviceType) ?>
    <fieldset>
        <legend><?= __('Edit Device Type') ?></legend>
        <?php
            echo $this->Form->input('device_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
