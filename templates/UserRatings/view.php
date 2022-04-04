<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRating $userRating
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Rating'), ['action' => 'edit', $userRating->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Rating'), ['action' => 'delete', $userRating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRating->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Ratings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Rating'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userRatings view content">
            <h3><?= h($userRating->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userRating->has('user') ? $this->Html->link($userRating->user->full_name, ['controller' => 'Users', 'action' => 'view', $userRating->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Job') ?></th>
                    <td><?= h($userRating->job) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userRating->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rated By') ?></th>
                    <td><?= $this->Number->format($userRating->rated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= $this->Number->format($userRating->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userRating->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
