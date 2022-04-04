<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRequirement[]|\Cake\Collection\CollectionInterface $userRequirements
 */
?>
<div class="userRequirements index content">
    <?= $this->Html->link(__('New User Requirement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Requirements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('file_name') ?></th>
                    <th><?= $this->Paginator->sort('required') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('validated') ?></th>
                    <th><?= $this->Paginator->sort('validated_by') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('size') ?></th>
                    <th><?= $this->Paginator->sort('used_for') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userRequirements as $userRequirement): ?>
                <tr>
                    <td><?= $this->Number->format($userRequirement->id) ?></td>
                    <td><?= $userRequirement->has('user') ? $this->Html->link($userRequirement->user->full_name, ['controller' => 'Users', 'action' => 'view', $userRequirement->user->id]) : '' ?></td>
                    <td><?= h($userRequirement->file_name) ?></td>
                    <td><?= $this->Number->format($userRequirement->required) ?></td>
                    <td><?= h($userRequirement->created) ?></td>
                    <td><?= h($userRequirement->modified) ?></td>
                    <td><?= $this->Number->format($userRequirement->validated) ?></td>
                    <td><?= h($userRequirement->validated_by) ?></td>
                    <td><?= h($userRequirement->title) ?></td>
                    <td><?= h($userRequirement->status) ?></td>
                    <td><?= h($userRequirement->size) ?></td>
                    <td><?= h($userRequirement->used_for) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userRequirement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userRequirement->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userRequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRequirement->id)]) ?>
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
