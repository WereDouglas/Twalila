<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRequirement $userRequirement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Requirement'), ['action' => 'edit', $userRequirement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Requirement'), ['action' => 'delete', $userRequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRequirement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Requirement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userRequirements view content">
            <h3><?= h($userRequirement->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userRequirement->has('user') ? $this->Html->link($userRequirement->user->full_name, ['controller' => 'Users', 'action' => 'view', $userRequirement->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('File Name') ?></th>
                    <td><?= h($userRequirement->file_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Validated By') ?></th>
                    <td><?= h($userRequirement->validated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($userRequirement->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($userRequirement->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Size') ?></th>
                    <td><?= h($userRequirement->size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Used For') ?></th>
                    <td><?= h($userRequirement->used_for) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userRequirement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Required') ?></th>
                    <td><?= $this->Number->format($userRequirement->required) ?></td>
                </tr>
                <tr>
                    <th><?= __('Validated') ?></th>
                    <td><?= $this->Number->format($userRequirement->validated) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userRequirement->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($userRequirement->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
