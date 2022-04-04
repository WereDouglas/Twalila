<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Package[]|\Cake\Collection\CollectionInterface $packages
 */
?>
<div class="packages index content">
    <?= $this->Html->link(__('New Package'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Packages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sender_id') ?></th>
                    <th><?= $this->Paginator->sort('receiver_id') ?></th>
                    <th><?= $this->Paginator->sort('traveller_id') ?></th>
                    <th><?= $this->Paginator->sort('pickup_address') ?></th>
                    <th><?= $this->Paginator->sort('destination_address') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('pickup_location') ?></th>
                    <th><?= $this->Paginator->sort('dropoff_location') ?></th>
                    <th><?= $this->Paginator->sort('estimates_size') ?></th>
                    <th><?= $this->Paginator->sort('actual_size') ?></th>
                    <th><?= $this->Paginator->sort('estimated_weight') ?></th>
                    <th><?= $this->Paginator->sort('actual_weight') ?></th>
                    <th><?= $this->Paginator->sort('size_metric') ?></th>
                    <th><?= $this->Paginator->sort('weight_metric') ?></th>
                    <th><?= $this->Paginator->sort('estimated_cost_of_delivery') ?></th>
                    <th><?= $this->Paginator->sort('final_cost_of_delivery') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($packages as $package): ?>
                <tr>
                    <td><?= $this->Number->format($package->id) ?></td>
                    <td><?= $this->Number->format($package->sender_id) ?></td>
                    <td><?= $this->Number->format($package->receiver_id) ?></td>
                    <td><?= $package->has('user') ? $this->Html->link($package->user->id, ['controller' => 'Users', 'action' => 'view', $package->user->id]) : '' ?></td>
                    <td><?= h($package->pickup_address) ?></td>
                    <td><?= h($package->destination_address) ?></td>
                    <td><?= h($package->status) ?></td>
                    <td><?= h($package->pickup_location) ?></td>
                    <td><?= h($package->dropoff_location) ?></td>
                    <td><?= h($package->estimates_size) ?></td>
                    <td><?= h($package->actual_size) ?></td>
                    <td><?= h($package->estimated_weight) ?></td>
                    <td><?= h($package->actual_weight) ?></td>
                    <td><?= h($package->size_metric) ?></td>
                    <td><?= h($package->weight_metric) ?></td>
                    <td><?= h($package->estimated_cost_of_delivery) ?></td>
                    <td><?= h($package->final_cost_of_delivery) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $package->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $package->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $package->id], ['confirm' => __('Are you sure you want to delete # {0}?', $package->id)]) ?>
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
