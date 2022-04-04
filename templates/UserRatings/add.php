<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRating $userRating
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Ratings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userRatings form content">
            <?= $this->Form->create($userRating) ?>
            <fieldset>
                <legend><?= __('Add User Rating') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('rated_by');
                    echo $this->Form->control('rating');
                    echo $this->Form->control('job');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
