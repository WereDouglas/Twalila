<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $line_1
 * @property string|null $line_2
 * @property string|null $line_3
 * @property string|null $zip_code
 * @property string|null $state
 * @property string|null $country
 * @property string|null $used_for
 * @property string|null $type
 *
 * @property \App\Model\Entity\User $user
 */
class Address extends Entity
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
        'name' => true,
        'line_1' => true,
        'line_2' => true,
        'line_3' => true,
        'zip_code' => true,
        'state' => true,
        'country' => true,
        'used_for' => true,
        'type' => true,
        'user' => true,
    ];
}
