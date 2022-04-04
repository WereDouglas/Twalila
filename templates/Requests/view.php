<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requests view content">
            <h3><?= h($request->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $request->has('user') ? $this->Html->link($request->user->id, ['controller' => 'Users', 'action' => 'view', $request->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Origin') ?></th>
                    <td><?= h($request->origin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Destination') ?></th>
                    <td><?= h($request->destination) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Of Travel') ?></th>
                    <td><?= h($request->date_of_travel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Of Arrival') ?></th>
                    <td><?= h($request->date_of_arrival) ?></td>
                </tr>
                <tr>
                    <th><?= __('Preferred Contact') ?></th>
                    <td><?= h($request->preferred_contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($request->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($request->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
