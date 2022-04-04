<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h($address->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $address->has('user') ? $this->Html->link($address->user->full_name, ['controller' => 'Users', 'action' => 'view', $address->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($address->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Line 1') ?></th>
                    <td><?= h($address->line_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Line 2') ?></th>
                    <td><?= h($address->line_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Line 3') ?></th>
                    <td><?= h($address->line_3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zip Code') ?></th>
                    <td><?= h($address->zip_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($address->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($address->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Used For') ?></th>
                    <td><?= h($address->used_for) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($address->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
