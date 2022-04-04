<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Package $package
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $package->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $package->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Packages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="packages form content">
            <?= $this->Form->create($package) ?>
            <fieldset>
                <legend><?= __('Edit Package') ?></legend>
                <?php
                    echo $this->Form->control('sender_id');
                    echo $this->Form->control('receiver_id');
                    echo $this->Form->control('traveller_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('pickup_address');
                    echo $this->Form->control('destination_address');
                    echo $this->Form->control('status');
                    echo $this->Form->control('pickup_location');
                    echo $this->Form->control('dropoff_location');
                    echo $this->Form->control('estimates_size');
                    echo $this->Form->control('actual_size');
                    echo $this->Form->control('estimated_weight');
                    echo $this->Form->control('actual_weight');
                    echo $this->Form->control('size_metric');
                    echo $this->Form->control('weight_metric');
                    echo $this->Form->control('estimated_cost_of_delivery');
                    echo $this->Form->control('final_cost_of_delivery');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
