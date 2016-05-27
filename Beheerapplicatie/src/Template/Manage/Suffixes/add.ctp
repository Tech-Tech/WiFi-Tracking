<div class="suffixes form large-9 medium-8 columns content">
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
