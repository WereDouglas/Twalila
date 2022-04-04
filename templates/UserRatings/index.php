<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRating[]|\Cake\Collection\CollectionInterface $userRatings
 */
?>
<div class="userRatings index content">
    <?= $this->Html->link(__('New User Rating'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Ratings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('rated_by') ?></th>
                    <th><?= $this->Paginator->sort('rating') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('job') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userRatings as $userRating): ?>
                <tr>
                    <td><?= $this->Number->format($userRating->id) ?></td>
                    <td><?= $userRating->has('user') ? $this->Html->link($userRating->user->full_name, ['controller' => 'Users', 'action' => 'view', $userRating->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($userRating->rated_by) ?></td>
                    <td><?= $this->Number->format($userRating->rating) ?></td>
                    <td><?= h($userRating->created) ?></td>
                    <td><?= h($userRating->job) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userRating->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userRating->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userRating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRating->id)]) ?>
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
