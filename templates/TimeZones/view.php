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
            <?= $this->Html->link(__('Edit Time Zone'), ['action' => 'edit', $timeZone->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Time Zone'), ['action' => 'delete', $timeZone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeZone->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Time Zones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Time Zone'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="timeZones view content">
            <h3><?= h($timeZone->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($timeZone->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($timeZone->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($timeZone->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($timeZone->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Token') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Other Name') ?></th>
                            <th><?= __('Primary Contact') ?></th>
                            <th><?= __('Secondary Contact') ?></th>
                            <th><?= __('Time Zone Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Ssn Four') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Is Admin') ?></th>
                            <th><?= __('Selector') ?></th>
                            <th><?= __('Expires') ?></th>
                            <th><?= __('Pass Code') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Password Reset') ?></th>
                            <th><?= __('Full Address') ?></th>
                            <th><?= __('Street') ?></th>
                            <th><?= __('City') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Zip') ?></th>
                            <th><?= __('Locality') ?></th>
                            <th><?= __('Access Token') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($timeZone->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->token) ?></td>
                            <td><?= h($users->first_name) ?></td>
                            <td><?= h($users->last_name) ?></td>
                            <td><?= h($users->other_name) ?></td>
                            <td><?= h($users->primary_contact) ?></td>
                            <td><?= h($users->secondary_contact) ?></td>
                            <td><?= h($users->time_zone_id) ?></td>
                            <td><?= h($users->type) ?></td>
                            <td><?= h($users->image) ?></td>
                            <td><?= h($users->ssn_four) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->is_admin) ?></td>
                            <td><?= h($users->selector) ?></td>
                            <td><?= h($users->expires) ?></td>
                            <td><?= h($users->pass_code) ?></td>
                            <td><?= h($users->active) ?></td>
                            <td><?= h($users->password_reset) ?></td>
                            <td><?= h($users->full_address) ?></td>
                            <td><?= h($users->street) ?></td>
                            <td><?= h($users->city) ?></td>
                            <td><?= h($users->state) ?></td>
                            <td><?= h($users->zip) ?></td>
                            <td><?= h($users->locality) ?></td>
                            <td><?= h($users->access_token) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
