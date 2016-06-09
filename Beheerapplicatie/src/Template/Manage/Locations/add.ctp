<div class="locations form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can select the preferred properties to create a location. If a desired
        property does not exist, please navigate to that location subject to create it.</p>
    </div>
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
        <?php
            echo $this->Form->input('building_id', ['options' => $buildings]);
            echo $this->Form->input('wing_id', ['options' => $wings]);
            echo $this->Form->input('floor_id', ['options' => $floors]);
            echo $this->Form->input('room_id', ['options' => $rooms]);
            echo $this->Form->input('suffix_id', ['options' => $suffixes, 'empty' => true]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
