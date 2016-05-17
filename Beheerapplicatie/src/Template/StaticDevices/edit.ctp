<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $staticDevice->mac_address],
                ['confirm' => __('Are you sure you want to delete # {0}?', $staticDevice->mac_address)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Static Devices'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="staticDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($staticDevice) ?>
    <fieldset>
        <legend><?= __('Edit Static Device') ?></legend>
        <?php
            echo $this->Form->input('device_type');
            echo $this->Form->input('vendor');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
