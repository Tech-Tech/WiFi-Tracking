<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Campuses'), ['controller' => 'Campuses', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Wings'), ['controller' => 'Wings', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Suffixes'), ['controller' => 'Suffixes', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Monitoring Devices'), ['controller' => 'MonitoringDevices', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Received Requests'), ['controller' => 'ReceivedRequests', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Tracked Devices'), ['controller' => 'TrackedDevices', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Personal Devices'), ['controller' => 'PersonalDevices', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Static Devices'), ['controller' => 'StaticDevices', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Device Types'), ['controller' => 'DeviceTypes', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
	</ul>
</nav>