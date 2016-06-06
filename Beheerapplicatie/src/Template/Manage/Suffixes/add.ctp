<div class="suffixes form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can create a suffixes.</p>
    </div>
    <?= $this->Form->create($suffix) ?>
    <fieldset>
        <legend><?= __('Add Suffix') ?></legend>
        <?php
            echo $this->Form->input('suffix');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
