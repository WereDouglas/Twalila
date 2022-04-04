<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRequirement $userRequirement
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userRequirements form content">
            <?= $this->Form->create($userRequirement) ?>
            <fieldset>
                <legend><?= __('Add User Requirement') ?></legend>
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
