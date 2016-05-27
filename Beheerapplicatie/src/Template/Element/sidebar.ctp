<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Received Requests'), ['controller' => 'ReceivedRequests', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
		<button class="accordion">Location subjects</button>
		<div class="panel">
			<li><?= $this->Html->link(__('List Campuses'), ['controller' => 'Campuses', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Wings'), ['controller' => 'Wings', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Suffixes'), ['controller' => 'Suffixes', 'action' => 'index']) ?></li>
		</div>
		<button class="accordion">Devices</button>
		<div class="panel">
			<li><?= $this->Html->link(__('List Monitoring Devices'), ['controller' => 'MonitoringDevices', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Tracked Devices'), ['controller' => 'TrackedDevices', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Personal Devices'), ['controller' => 'PersonalDevices', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Static Devices'), ['controller' => 'StaticDevices', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('List Device Types'), ['controller' => 'DeviceTypes', 'action' => 'index']) ?></li>
		</div>
		<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
	</ul>
</nav>

<script>
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].onclick = function(){
			accs = document.getElementsByClassName("accordion");
			for(var j = 0; j < accs.length; j++) {
				if(accs[j] != this) {
					accs[j].classList.remove("active");
					accs[j].nextElementSibling.classList.remove("show");
				}
			}
			this.classList.toggle("active");
			this.nextElementSibling.classList.toggle("show");
		}
	}
</script>