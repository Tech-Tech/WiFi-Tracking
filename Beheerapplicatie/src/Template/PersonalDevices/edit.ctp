<div class="personalDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($personalDevice) ?>
    <fieldset>
        <legend><?= __('Edit Personal Device') ?></legend>
        <?php
            echo $this->Form->input('person_id', ['options' => $persons]);
            echo $this->Form->input('device_type');
            echo $this->Form->input('vendor');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
