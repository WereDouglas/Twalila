<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackageImage[]|\Cake\Collection\CollectionInterface $packageImages
 */
?>
<div class="packageImages index content">
    <?= $this->Html->link(__('New Package Image'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Package Images') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('package_id') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($packageImages as $packageImage): ?>
                <tr>
                    <td><?= $this->Number->format($packageImage->id) ?></td>
                    <td><?= $packageImage->has('package') ? $this->Html->link($packageImage->package->id, ['controller' => 'Packages', 'action' => 'view', $packageImage->package->id]) : '' ?></td>
                    <td><?= h($packageImage->url) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $packageImage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $packageImage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $packageImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packageImage->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
