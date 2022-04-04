<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preference $preference
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $preference->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $preference->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Preferences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="preferences form content">
            <?= $this->Form->create($preference) ?>
            <fieldset>
                <legend><?= __('Edit Preference') ?></legend>
                <?php
                    echo $this->Form->control('sender_id');
                    echo $this->Form->control('traveller_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('ip');
                    echo $this->Form->control('device');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
