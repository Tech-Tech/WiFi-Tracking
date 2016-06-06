<div class="rooms form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can create a room.</p>
    </div>
    <?= $this->Form->create($room) ?>
    <fieldset>
        <legend><?= __('Add Room') ?></legend>
        <?php
            echo $this->Form->input('room_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
