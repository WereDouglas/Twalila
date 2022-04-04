<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity
 *
 * @property int $id
 * @property string $message
 * @property string|null $level
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string|null $src
 * @property string|null $status_code
 */
class Log extends Entity
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
        'message' => true,
        'level' => true,
        'created_at' => true,
        'src' => true,
        'status_code' => true,
    ];
}
