<div class="monitoringDeviceLocations form large-9 medium-8 columns content">
    <?= $this->Form->create($monitoringDeviceLocation) ?>
    <fieldset>
        <legend><?= __('Add Monitoring Device Location') ?></legend>
        <?php
            echo $this->Form->input('location', ['default' => $location->full_location_name, 'disabled' => 'disabled']);
            echo $this->Form->input('monitoring_device_id', ['options' => $monitoringDevices]);
            echo $this->Form->input('begin_date', ['label' => 'Begin date (UTC)']);
            echo $this->Form->input('end_date', ['label' => 'End date (UTC)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
