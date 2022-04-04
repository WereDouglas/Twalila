<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeZone $timeZone
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timeZone->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timeZone->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Time Zones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="timeZones form content">
            <?= $this->Form->create($timeZone) ?>
            <fieldset>
                <legend><?= __('Edit Time Zone') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('title');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
