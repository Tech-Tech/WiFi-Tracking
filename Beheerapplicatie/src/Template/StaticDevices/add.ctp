<div class="staticDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($staticDevice) ?>
    <fieldset>
        <legend><?= __('Add Static Device') ?></legend>
        <?php
            echo $this->Form->input('device_type', ['options' => $device_types]);
            echo $this->Form->input('vendor');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
