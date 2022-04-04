<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
 */
?>
<div class="requests index content">
    <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Requests') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('origin') ?></th>
                    <th><?= $this->Paginator->sort('destination') ?></th>
                    <th><?= $this->Paginator->sort('date_of_travel') ?></th>
                    <th><?= $this->Paginator->sort('date_of_arrival') ?></th>
                    <th><?= $this->Paginator->sort('preferred_contact') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $this->Number->format($request->id) ?></td>
                    <td><?= $request->has('user') ? $this->Html->link($request->user->id, ['controller' => 'Users', 'action' => 'view', $request->user->id]) : '' ?></td>
                    <td><?= h($request->origin) ?></td>
                    <td><?= h($request->destination) ?></td>
                    <td><?= h($request->date_of_travel) ?></td>
                    <td><?= h($request->date_of_arrival) ?></td>
                    <td><?= h($request->preferred_contact) ?></td>
                    <td><?= h($request->type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?>
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
