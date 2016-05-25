<div class="trackedDevices view large-9 medium-8 columns content">
    <h3><?= h($trackedDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($trackedDevice->mac_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= h($trackedDevice->vendor) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($trackedDevice->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Device Type') ?></th>
            <td><?= $this->Number->format($trackedDevice->device_type) ?></td>
        </tr>
    </table>
</div>
