<div class="monitoringDevices form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can create a monitoring device.</p>
    </div>
    <?= $this->Form->create($monitoringDevice) ?>
    <fieldset>
        <legend><?= __('Add Monitoring Device') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('mac_address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
