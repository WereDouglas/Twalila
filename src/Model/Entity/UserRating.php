<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserRating Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $rated_by
 * @property int|null $rating
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string|null $job
 *
 * @property \App\Model\Entity\User $user
 */
class UserRating extends Entity
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
        'rated_by' => true,
        'rating' => true,
        'created' => true,
        'job' => true,
        'user' => true,
    ];
}
