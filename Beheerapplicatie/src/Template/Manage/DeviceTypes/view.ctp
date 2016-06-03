<div class="deviceTypes view large-9 medium-8 columns content">
    <h3><?= h($deviceType->device_type) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Device Type') ?></th>
            <td><?= h($deviceType->device_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Device Id') ?></th>
            <td><?= $this->Number->format($deviceType->id) ?></td>
        </tr>
    </table>
</div>
