<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Package $package
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Package'), ['action' => 'edit', $package->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Package'), ['action' => 'delete', $package->id], ['confirm' => __('Are you sure you want to delete # {0}?', $package->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Packages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Package'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="packages view content">
            <h3><?= h($package->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $package->has('user') ? $this->Html->link($package->user->id, ['controller' => 'Users', 'action' => 'view', $package->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pickup Address') ?></th>
                    <td><?= h($package->pickup_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Destination Address') ?></th>
                    <td><?= h($package->destination_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($package->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pickup Location') ?></th>
                    <td><?= h($package->pickup_location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dropoff Location') ?></th>
                    <td><?= h($package->dropoff_location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estimates Size') ?></th>
                    <td><?= h($package->estimates_size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actual Size') ?></th>
                    <td><?= h($package->actual_size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estimated Weight') ?></th>
                    <td><?= h($package->estimated_weight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actual Weight') ?></th>
                    <td><?= h($package->actual_weight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Size Metric') ?></th>
                    <td><?= h($package->size_metric) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weight Metric') ?></th>
                    <td><?= h($package->weight_metric) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estimated Cost Of Delivery') ?></th>
                    <td><?= h($package->estimated_cost_of_delivery) ?></td>
                </tr>
                <tr>
                    <th><?= __('Final Cost Of Delivery') ?></th>
                    <td><?= h($package->final_cost_of_delivery) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($package->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sender Id') ?></th>
                    <td><?= $this->Number->format($package->sender_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Receiver Id') ?></th>
                    <td><?= $this->Number->format($package->receiver_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Package Images') ?></h4>
                <?php if (!empty($package->package_images)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Package Id') ?></th>
                            <th><?= __('Url') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($package->package_images as $packageImages) : ?>
                        <tr>
                            <td><?= h($packageImages->id) ?></td>
                            <td><?= h($packageImages->package_id) ?></td>
                            <td><?= h($packageImages->url) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PackageImages', 'action' => 'view', $packageImages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PackageImages', 'action' => 'edit', $packageImages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PackageImages', 'action' => 'delete', $packageImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packageImages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
