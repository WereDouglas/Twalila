<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preference[]|\Cake\Collection\CollectionInterface $preferences
 */
?>
<div class="preferences index content">
    <?= $this->Html->link(__('New Preference'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Preferences') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sender_id') ?></th>
                    <th><?= $this->Paginator->sort('traveller_id') ?></th>
                    <th><?= $this->Paginator->sort('ip') ?></th>
                    <th><?= $this->Paginator->sort('device') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($preferences as $preference): ?>
                <tr>
                    <td><?= $this->Number->format($preference->id) ?></td>
                    <td><?= $this->Number->format($preference->sender_id) ?></td>
                    <td><?= $preference->has('user') ? $this->Html->link($preference->user->id, ['controller' => 'Users', 'action' => 'view', $preference->user->id]) : '' ?></td>
                    <td><?= h($preference->ip) ?></td>
                    <td><?= h($preference->device) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $preference->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $preference->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $preference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preference->id)]) ?>
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
