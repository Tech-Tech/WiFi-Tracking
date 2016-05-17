<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wing->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wing->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
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
