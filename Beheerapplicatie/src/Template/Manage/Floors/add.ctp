<div class="floors form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can create a floor.</p>
    </div>
    <?= $this->Form->create($floor) ?>
    <fieldset>
        <legend><?= __('Add Floor') ?></legend>
        <?php
            echo $this->Form->input('floor_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
