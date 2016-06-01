<div class="rooms form large-9 medium-8 columns content">
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
