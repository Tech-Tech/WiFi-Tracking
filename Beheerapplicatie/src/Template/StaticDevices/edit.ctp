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
