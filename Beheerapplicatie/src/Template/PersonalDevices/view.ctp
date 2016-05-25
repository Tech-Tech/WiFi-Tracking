<div class="personalDevices view large-9 medium-8 columns content">
    <h3><?= h($personalDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($personalDevice->mac_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $personalDevice->has('person') ? $this->Html->link($personalDevice->person->name, ['controller' => 'Persons', 'action' => 'view', $personalDevice->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Device Type') ?></th>
            <td><?= h($personalDevice->device_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= h($personalDevice->vendor) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($personalDevice->name) ?></td>
        </tr>
    </table>
</div>
