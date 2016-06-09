<div class="buildings form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can create a building. A building is always in a campus.</p>
    </div>
    <?= $this->Form->create($building) ?>
    <fieldset>
        <legend><?= __('Add Building') ?></legend>
        <?php
            echo $this->Form->input('address_id', ['options' => $addresses]);
            echo $this->Form->input('campus_id', ['options' => $campuses]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
