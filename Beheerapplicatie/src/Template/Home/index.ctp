<div class="description_div">
	<p>Redirects you to the main page where you can manage the database.</p>
	<?= $this->Html->link("Manage", ['controller' => 'Manage/Locations','action'=> 'index'], ['class' => 'button']); ?>
</div>
<div class="description_div">
	<p>The diagram below shows the amount of unique devices measured between a specific begin and end date
		within the given location.</p>
	<?= $this->Html->link("Analyze", ['controller' => 'Analyze','action'=> 'index'], ['class' => 'button']); ?>
</div>