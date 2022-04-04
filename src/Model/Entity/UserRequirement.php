<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserRequirement Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $file_name
 * @property int|null $required
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $validated
 * @property string|null $validated_by
 * @property string|null $title
 * @property string|null $status
 * @property string|null $size
 * @property string|null $used_for
 *
 * @property \App\Model\Entity\User $user
 */
class UserRequirement extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'file_name' => true,
        'required' => true,
        'created' => true,
        'modified' => true,
        'validated' => true,
        'validated_by' => true,
        'title' => true,
        'status' => true,
        'size' => true,
        'used_for' => true,
        'user' => true,
    ];
}
