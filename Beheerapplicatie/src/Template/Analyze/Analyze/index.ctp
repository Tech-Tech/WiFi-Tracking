<div class="container clearfix">
    <?= $this->fetch('content') ?>
    <?= $this->Html->link("Devices in location graph", ['controller' => 'Graph','action'=> 'Devices'], ['class' => 'button']); ?>
    <?= $this->Html->link("Vendor graphs", ['controller' => 'Graph','action'=> 'Vendors'], ['class' => 'button']); ?>
</div>
