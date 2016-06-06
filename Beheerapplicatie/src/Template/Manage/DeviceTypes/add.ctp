<div class="deviceTypes form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can create a device type.</p>
    </div>
    <?= $this->Form->create($deviceType) ?>
    <fieldset>
        <legend><?= __('Add Device Type') ?></legend>
        <?php
            echo $this->Form->input('device_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
