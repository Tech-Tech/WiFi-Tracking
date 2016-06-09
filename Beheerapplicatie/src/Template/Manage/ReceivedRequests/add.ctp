<div class="receivedRequests form large-9 medium-8 columns content">
    <?= $this->Form->create($receivedRequest) ?>
    <fieldset>
        <legend><?= __('Add Received Request') ?></legend>
        <?php
            echo $this->Form->input('monitoring_device_id', ['options' => $monitoringDevices]);
            echo $this->Form->input('tracked_mac_address');
            echo $this->Form->input('request_timestamp');
            echo $this->Form->input('signal_strength');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
