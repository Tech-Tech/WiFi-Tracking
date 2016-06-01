<div class="wings form large-9 medium-8 columns content">
    <?= $this->Form->create($wing) ?>
    <fieldset>
        <legend><?= __('Edit Wing') ?></legend>
        <?php
            echo $this->Form->input('wing_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
