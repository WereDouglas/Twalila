<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->full_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Other Name') ?></th>
                    <td><?= h($user->other_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Primary Contact') ?></th>
                    <td><?= h($user->primary_contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Secondary Contact') ?></th>
                    <td><?= h($user->secondary_contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time Zone') ?></th>
                    <td><?= $user->has('time_zone') ? $this->Html->link($user->time_zone->title, ['controller' => 'TimeZones', 'action' => 'view', $user->time_zone->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($user->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($user->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ssn Four') ?></th>
                    <td><?= h($user->ssn_four) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expires') ?></th>
                    <td><?= h($user->expires) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pass Code') ?></th>
                    <td><?= h($user->pass_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Full Address') ?></th>
                    <td><?= h($user->full_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($user->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($user->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($user->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zip') ?></th>
                    <td><?= h($user->zip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Locality') ?></th>
                    <td><?= h($user->locality) ?></td>
                </tr>
                <tr>
                    <th><?= __('Access Token') ?></th>
                    <td><?= h($user->access_token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Admin') ?></th>
                    <td><?= $this->Number->format($user->is_admin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $this->Number->format($user->active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password Reset') ?></th>
                    <td><?= $this->Number->format($user->password_reset) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Selector') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->selector)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Permissions') ?></h4>
                <?php if (!empty($user->permissions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('User Group') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->permissions as $permissions) : ?>
                        <tr>
                            <td><?= h($permissions->id) ?></td>
                            <td><?= h($permissions->name) ?></td>
                            <td><?= h($permissions->active) ?></td>
                            <td><?= h($permissions->title) ?></td>
                            <td><?= h($permissions->user_group) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Permissions', 'action' => 'view', $permissions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Permissions', 'action' => 'edit', $permissions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permissions', 'action' => 'delete', $permissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Addresses') ?></h4>
                <?php if (!empty($user->addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Line 1') ?></th>
                            <th><?= __('Line 2') ?></th>
                            <th><?= __('Line 3') ?></th>
                            <th><?= __('Zip Code') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Country') ?></th>
                            <th><?= __('Used For') ?></th>
                            <th><?= __('Type') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->addresses as $addresses) : ?>
                        <tr>
                            <td><?= h($addresses->id) ?></td>
                            <td><?= h($addresses->user_id) ?></td>
                            <td><?= h($addresses->name) ?></td>
                            <td><?= h($addresses->line_1) ?></td>
                            <td><?= h($addresses->line_2) ?></td>
                            <td><?= h($addresses->line_3) ?></td>
                            <td><?= h($addresses->zip_code) ?></td>
                            <td><?= h($addresses->state) ?></td>
                            <td><?= h($addresses->country) ?></td>
                            <td><?= h($addresses->used_for) ?></td>
                            <td><?= h($addresses->type) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Requests') ?></h4>
                <?php if (!empty($user->requests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Origin') ?></th>
                            <th><?= __('Destination') ?></th>
                            <th><?= __('Date Of Travel') ?></th>
                            <th><?= __('Date Of Arrival') ?></th>
                            <th><?= __('Preferred Contact') ?></th>
                            <th><?= __('Type') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->requests as $requests) : ?>
                        <tr>
                            <td><?= h($requests->id) ?></td>
                            <td><?= h($requests->user_id) ?></td>
                            <td><?= h($requests->origin) ?></td>
                            <td><?= h($requests->destination) ?></td>
                            <td><?= h($requests->date_of_travel) ?></td>
                            <td><?= h($requests->date_of_arrival) ?></td>
                            <td><?= h($requests->preferred_contact) ?></td>
                            <td><?= h($requests->type) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Ratings') ?></h4>
                <?php if (!empty($user->user_ratings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Rated By') ?></th>
                            <th><?= __('Rating') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Job') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_ratings as $userRatings) : ?>
                        <tr>
                            <td><?= h($userRatings->id) ?></td>
                            <td><?= h($userRatings->user_id) ?></td>
                            <td><?= h($userRatings->rated_by) ?></td>
                            <td><?= h($userRatings->rating) ?></td>
                            <td><?= h($userRatings->created) ?></td>
                            <td><?= h($userRatings->job) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserRatings', 'action' => 'view', $userRatings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserRatings', 'action' => 'edit', $userRatings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserRatings', 'action' => 'delete', $userRatings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRatings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Requirements') ?></h4>
                <?php if (!empty($user->user_requirements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('File Name') ?></th>
                            <th><?= __('Required') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Validated') ?></th>
                            <th><?= __('Validated By') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Size') ?></th>
                            <th><?= __('Used For') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_requirements as $userRequirements) : ?>
                        <tr>
                            <td><?= h($userRequirements->id) ?></td>
                            <td><?= h($userRequirements->user_id) ?></td>
                            <td><?= h($userRequirements->file_name) ?></td>
                            <td><?= h($userRequirements->required) ?></td>
                            <td><?= h($userRequirements->created) ?></td>
                            <td><?= h($userRequirements->modified) ?></td>
                            <td><?= h($userRequirements->validated) ?></td>
                            <td><?= h($userRequirements->validated_by) ?></td>
                            <td><?= h($userRequirements->title) ?></td>
                            <td><?= h($userRequirements->status) ?></td>
                            <td><?= h($userRequirements->size) ?></td>
                            <td><?= h($userRequirements->used_for) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserRequirements', 'action' => 'view', $userRequirements->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserRequirements', 'action' => 'edit', $userRequirements->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserRequirements', 'action' => 'delete', $userRequirements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRequirements->id)]) ?>
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
