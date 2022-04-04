<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Package Entity
 *
 * @property int $id
 * @property int|null $sender_id
 * @property int|null $receiver_id
 * @property int|null $traveller_id
 * @property string|null $pickup_address
 * @property string|null $destination_address
 * @property string|null $status
 * @property string|null $pickup_location
 * @property string|null $dropoff_location
 * @property string|null $estimates_size
 * @property string|null $actual_size
 * @property string|null $estimated_weight
 * @property string|null $actual_weight
 * @property string|null $size_metric
 * @property string|null $weight_metric
 * @property string|null $estimated_cost_of_delivery
 * @property string|null $final_cost_of_delivery
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PackageImage[] $package_images
 */
class Package extends Entity
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
        'receiver_id' => true,
        'traveller_id' => true,
        'pickup_address' => true,
        'destination_address' => true,
        'status' => true,
        'pickup_location' => true,
        'dropoff_location' => true,
        'estimates_size' => true,
        'actual_size' => true,
        'estimated_weight' => true,
        'actual_weight' => true,
        'size_metric' => true,
        'weight_metric' => true,
        'estimated_cost_of_delivery' => true,
        'final_cost_of_delivery' => true,
        'user' => true,
        'package_images' => true,
    ];
}
