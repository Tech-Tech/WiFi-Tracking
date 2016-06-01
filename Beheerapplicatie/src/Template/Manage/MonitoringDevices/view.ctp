<div class="monitoringDevices view large-9 medium-8 columns content">
    <h3><?= h($monitoringDevice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($monitoringDevice->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($monitoringDevice->mac_address) ?></td>
        </tr>
    </table>
</div>
