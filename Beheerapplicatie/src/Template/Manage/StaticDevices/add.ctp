<div class="staticDevices form large-9 medium-8 columns content">
	<div class="information_div">
		<p>In the fields below you can create a static device. To add a static device, it is required that the
			device exists in the tracked devices table.</p>
	</div>
    <?= $this->Form->create($staticDevice) ?>
    <fieldset>
        <legend><?= __('Add Static Device') ?></legend>
	    <?php $decoded_devices ?>
	    <div class="input select">
		    <label for="tracked_device_id">Tracked devices</label>
		    <select id="tracked_device_id" name="tracked_device_id">
		        <?php foreach($tracked_devices as $device): ?>
			        <?php $decoded_device = json_decode($device['funcgetnonstaticdevices'], false) ?>
			        <option value="<?= $decoded_device->id ?>"><?= $decoded_device->mac_address . ' - ' . $decoded_device->vendor ?></option>
		        <?php endforeach; ?>
		    </select>
	    </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
