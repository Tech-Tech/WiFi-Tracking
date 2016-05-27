<div class="trackedDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($trackedDevice) ?>
    <fieldset>
        <legend><?= __('Edit Tracked Device') ?></legend>
	    <div class="input select">
		    <label for="device_type">Device type</label>
		    <select id="device_type" name="device_type">
			    <?php foreach($device_types as $device_type): ?>
				    <option value="<?= $device_type->id ?>"><?= $device_type->device_type ?></option>
			    <?php endforeach; ?>
		    </select>
	    </div>
        <?php
            echo $this->Form->input('vendor');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
