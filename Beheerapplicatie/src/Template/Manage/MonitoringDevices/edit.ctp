<div class="monitoringDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($monitoringDevice) ?>
    <fieldset>
        <legend><?= __('Edit Monitoring Device') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('mac_address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
