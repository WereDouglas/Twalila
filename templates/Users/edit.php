<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $timeZones
 * @var string[]|\Cake\Collection\CollectionInterface $permissions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('token');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('other_name');
                    echo $this->Form->control('primary_contact');
                    echo $this->Form->control('secondary_contact');
                    echo $this->Form->control('time_zone_id', ['options' => $timeZones, 'empty' => true]);
                    echo $this->Form->control('type');
                    echo $this->Form->control('image');
                    echo $this->Form->control('ssn_four');
                    echo $this->Form->control('is_admin');
                    echo $this->Form->control('selector');
                    echo $this->Form->control('expires');
                    echo $this->Form->control('pass_code');
                    echo $this->Form->control('active');
                    echo $this->Form->control('password_reset');
                    echo $this->Form->control('full_address');
                    echo $this->Form->control('street');
                    echo $this->Form->control('city');
                    echo $this->Form->control('state');
                    echo $this->Form->control('zip');
                    echo $this->Form->control('locality');
                    echo $this->Form->control('access_token');
                    echo $this->Form->control('permissions._ids', ['options' => $permissions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
