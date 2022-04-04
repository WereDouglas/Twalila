<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $origin
 * @property string|null $destination
 * @property string|null $date_of_travel
 * @property string|null $date_of_arrival
 * @property string|null $preferred_contact
 * @property string $type
 *
 * @property \App\Model\Entity\User $user
 */
class Request extends Entity
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
        'origin' => true,
        'destination' => true,
        'date_of_travel' => true,
        'date_of_arrival' => true,
        'preferred_contact' => true,
        'type' => true,
        'user' => true,
    ];
}
