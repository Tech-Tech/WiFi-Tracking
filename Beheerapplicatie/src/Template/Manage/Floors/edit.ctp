<div class="floors form large-9 medium-8 columns content">
    <?= $this->Form->create($floor) ?>
    <fieldset>
        <legend><?= __('Edit Floor') ?></legend>
        <?php
            echo $this->Form->input('floor_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
