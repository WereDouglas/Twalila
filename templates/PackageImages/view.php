<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackageImage $packageImage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Package Image'), ['action' => 'edit', $packageImage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Package Image'), ['action' => 'delete', $packageImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packageImage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Package Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Package Image'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="packageImages view content">
            <h3><?= h($packageImage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Package') ?></th>
                    <td><?= $packageImage->has('package') ? $this->Html->link($packageImage->package->id, ['controller' => 'Packages', 'action' => 'view', $packageImage->package->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($packageImage->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($packageImage->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
