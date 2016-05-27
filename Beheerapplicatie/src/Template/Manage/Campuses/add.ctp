<div class="campuses form large-9 medium-8 columns content">
    <?= $this->Form->create($campus) ?>
    <fieldset>
        <legend><?= __('Add Campus') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
