<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackageImage $packageImage
 * @var \Cake\Collection\CollectionInterface|string[] $packages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Package Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="packageImages form content">
            <?= $this->Form->create($packageImage) ?>
            <fieldset>
                <legend><?= __('Add Package Image') ?></legend>
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
