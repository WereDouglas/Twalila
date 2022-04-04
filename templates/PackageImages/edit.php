<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackageImage $packageImage
 * @var string[]|\Cake\Collection\CollectionInterface $packages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $packageImage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $packageImage->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Package Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="packageImages form content">
            <?= $this->Form->create($packageImage) ?>
            <fieldset>
                <legend><?= __('Edit Package Image') ?></legend>
                <?php
                    echo $this->Form->control('package_id', ['options' => $packages]);
                    echo $this->Form->control('url');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
