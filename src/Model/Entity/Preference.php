<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Preference Entity
 *
 * @property int $id
 * @property int|null $sender_id
 * @property int|null $traveller_id
 * @property string|null $ip
 * @property string|null $device
 *
 * @property \App\Model\Entity\User $user
 */
class Preference extends Entity
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
        'sender_id' => true,
        'traveller_id' => true,
        'ip' => true,
        'device' => true,
        'user' => true,
    ];
}
