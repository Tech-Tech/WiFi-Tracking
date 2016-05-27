<div class="monitoringDeviceLocations form large-9 medium-8 columns content">
    <?= $this->Form->create($monitoringDeviceLocation) ?>
    <fieldset>
        <legend><?= __('Edit Monitoring Device Location') ?></legend>
        <?php
            echo $this->Form->input('location_id', ['options' => $locations]);
            echo $this->Form->input('monitoring_device_id', ['options' => $monitoringDevices]);
            echo $this->Form->input('begin_date');
            echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
