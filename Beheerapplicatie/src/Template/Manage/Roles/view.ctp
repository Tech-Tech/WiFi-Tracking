<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Role Name') ?></th>
            <td><?= h($role->role_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Person Roles') ?></h4>
        <?php if (!empty($role->person_roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Person Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->person_roles as $personRoles): ?>
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
</div>
