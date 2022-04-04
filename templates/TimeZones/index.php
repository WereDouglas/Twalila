<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeZone[]|\Cake\Collection\CollectionInterface $timeZones
 */
?>
<div class="timeZones index content">
    <?= $this->Html->link(__('New Time Zone'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Time Zones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($timeZones as $timeZone): ?>
                <tr>
                    <td><?= $this->Number->format($timeZone->id) ?></td>
                    <td><?= h($timeZone->name) ?></td>
                    <td><?= h($timeZone->title) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $timeZone->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeZone->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeZone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeZone->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
