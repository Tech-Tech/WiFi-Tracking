<div class="wings form large-9 medium-8 columns content">
    <div class="information_div">
        <p>In the fields below you can create a wing.</p>
    </div>
    <?= $this->Form->create($wing) ?>
    <fieldset>
        <legend><?= __('Add Wing') ?></legend>
        <?php
            echo $this->Form->input('wing_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
