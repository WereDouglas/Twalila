<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRequirement $userRequirement
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userRequirement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userRequirement->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userRequirements form content">
            <?= $this->Form->create($userRequirement) ?>
            <fieldset>
                <legend><?= __('Edit User Requirement') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('file_name');
                    echo $this->Form->control('required');
                    echo $this->Form->control('validated');
                    echo $this->Form->control('validated_by');
                    echo $this->Form->control('title');
                    echo $this->Form->control('status');
                    echo $this->Form->control('size');
                    echo $this->Form->control('used_for');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
