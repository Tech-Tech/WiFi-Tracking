<div class="campuses view large-9 medium-8 columns content">
    <h3><?= h($campus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($campus->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Buildings') ?></h4>
        <?php if (!empty($campus->buildings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Address') ?></th>
                <th><?= __('Name') ?></th>
            </tr>
            <?php foreach ($campus->buildings as $building): ?>
            <tr>
                <td><?= h($building->address->full_address) ?></td>
                <td><?= $this->Html->link($building->name, ['controller' => 'Buildings', 'action' => 'view', $building->id]) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
