<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('other_name') ?></th>
                    <th><?= $this->Paginator->sort('primary_contact') ?></th>
                    <th><?= $this->Paginator->sort('secondary_contact') ?></th>
                    <th><?= $this->Paginator->sort('time_zone_id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('ssn_four') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('is_admin') ?></th>
                    <th><?= $this->Paginator->sort('expires') ?></th>
                    <th><?= $this->Paginator->sort('pass_code') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('password_reset') ?></th>
                    <th><?= $this->Paginator->sort('full_address') ?></th>
                    <th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('zip') ?></th>
                    <th><?= $this->Paginator->sort('locality') ?></th>
                    <th><?= $this->Paginator->sort('access_token') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->other_name) ?></td>
                    <td><?= h($user->primary_contact) ?></td>
                    <td><?= h($user->secondary_contact) ?></td>
                    <td><?= $user->has('time_zone') ? $this->Html->link($user->time_zone->title, ['controller' => 'TimeZones', 'action' => 'view', $user->time_zone->id]) : '' ?></td>
                    <td><?= h($user->type) ?></td>
                    <td><?= h($user->image) ?></td>
                    <td><?= h($user->ssn_four) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= $this->Number->format($user->is_admin) ?></td>
                    <td><?= h($user->expires) ?></td>
                    <td><?= h($user->pass_code) ?></td>
                    <td><?= $this->Number->format($user->active) ?></td>
                    <td><?= $this->Number->format($user->password_reset) ?></td>
                    <td><?= h($user->full_address) ?></td>
                    <td><?= h($user->street) ?></td>
                    <td><?= h($user->city) ?></td>
                    <td><?= h($user->state) ?></td>
                    <td><?= h($user->zip) ?></td>
                    <td><?= h($user->locality) ?></td>
                    <td><?= h($user->access_token) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
