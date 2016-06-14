<div class="monitoringDeviceLocations form large-9 medium-8 columns content">
    <?= $this->Form->create($monitoringDeviceLocation) ?>
    <fieldset>
        <legend><?= __('Add Monitoring Device to ') .$location->full_location_name ?></legend>
        <div class="input number">
            <label for="location_id">Location</label>
            <input type="text" name="location_id" id="location_id" value="<?= $location->id ?>" readonly>
        </div>
        <div class="input text">
            <label for="monitoring_device_id">Location</label>
            <input type="text" name="monitoring_device_id" id="monitoring_device_id" value="<?= $monitoringDevice->id ?>" readonly>
        </div>
        <?php
            echo $this->Form->input('begin_date', ['label' => 'Begin date (UTC)']);
            echo $this->Form->input('unknown_end_date', ['type' => 'checkbox', 'label' => 'Unknown end date']);
            echo $this->Form->input('end_date', ['label' => 'End date (UTC)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
