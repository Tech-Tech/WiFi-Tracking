<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $floor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $floor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Floors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
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
