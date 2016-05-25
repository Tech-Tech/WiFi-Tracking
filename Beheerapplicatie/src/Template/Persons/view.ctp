<div class="persons view large-9 medium-8 columns content">
    <h3><?= h($person->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($person->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($person->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($person->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Person Roles') ?></h4>
        <?php if (!empty($person->person_roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Person Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($person->person_roles as $personRoles): ?>
            <tr>
                <td><?= h($personRoles->id) ?></td>
                <td><?= h($personRoles->role_id) ?></td>
                <td><?= h($personRoles->person_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PersonRoles', 'action' => 'view', $personRoles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PersonRoles', 'action' => 'edit', $personRoles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PersonRoles', 'action' => 'delete', $personRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personRoles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Personal Devices') ?></h4>
        <?php if (!empty($person->personal_devices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Mac Address') ?></th>
                <th><?= __('Person Id') ?></th>
                <th><?= __('Device Type') ?></th>
                <th><?= __('Vendor') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($person->personal_devices as $personalDevices): ?>
            <tr>
                <td><?= h($personalDevices->mac_address) ?></td>
                <td><?= h($personalDevices->person_id) ?></td>
                <td><?= h($personalDevices->device_type) ?></td>
                <td><?= h($personalDevices->vendor) ?></td>
                <td><?= h($personalDevices->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PersonalDevices', 'action' => 'view', $personalDevices->mac_address]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PersonalDevices', 'action' => 'edit', $personalDevices->mac_address]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PersonalDevices', 'action' => 'delete', $personalDevices->mac_address], ['confirm' => __('Are you sure you want to delete # {0}?', $personalDevices->mac_address)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
