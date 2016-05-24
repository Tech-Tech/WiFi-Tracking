<div class="staticDevices view large-9 medium-8 columns content">
    <h3><?= h($staticDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($staticDevice->mac_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= h($staticDevice->vendor) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($staticDevice->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Device Type') ?></th>
            <td><?= $this->Number->format($staticDevice->device_type) ?></td>
        </tr>
    </table>
</div>
