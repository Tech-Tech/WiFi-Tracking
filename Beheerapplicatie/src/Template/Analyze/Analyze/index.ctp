<div class="container clearfix">
    <?= $this->fetch('content') ?>
    <div class="description_div">
        <p>Redirects you to the chart where you can see how many devices were at a specific location.</p>
        <?= $this->Html->link("Devices in location graph", ['controller' => 'Graph','action'=> 'Devices'], ['class' => 'button']); ?>
    </div>
    <div class="description_div">
        <p>Redirects you to the chart where you can see how many probe requests per vendor.</p>
        <?= $this->Html->link("Vendor graph", ['controller' => 'Graph','action'=> 'Vendors'], ['class' => 'button']); ?>
    </div>
</div>
