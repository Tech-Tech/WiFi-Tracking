<div class="deviceTypes form large-9 medium-8 columns content">
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
