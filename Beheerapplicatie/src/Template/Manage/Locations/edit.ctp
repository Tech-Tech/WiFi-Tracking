<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edit Location') ?></legend>
        <?php
            echo $this->Form->input('wing_id', ['options' => $wings]);
            echo $this->Form->input('floor_id', ['options' => $floors]);
            echo $this->Form->input('room_id', ['options' => $rooms]);
            echo $this->Form->input('suffix_id', ['options' => $suffixes, 'empty' => true]);
            echo $this->Form->input('building_id', ['options' => $buildings]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
