<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PackagesFixture
 */
class PackagesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'sender_id' => 1,
                'receiver_id' => 1,
                'traveller_id' => 1,
                'pickup_address' => 'Lorem ipsum dolor sit amet',
                'destination_address' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'pickup_location' => 'Lorem ipsum dolor sit amet',
                'dropoff_location' => 'Lorem ipsum dolor sit amet',
                'estimates_size' => 'Lorem ipsum dolor sit amet',
                'actual_size' => 'Lorem ipsum dolor sit amet',
                'estimated_weight' => 'Lorem ipsum dolor sit amet',
                'actual_weight' => 'Lorem ipsum dolor sit amet',
                'size_metric' => 'Lorem ipsum dolor sit amet',
                'weight_metric' => 'Lorem ipsum dolor sit amet',
                'estimated_cost_of_delivery' => 'Lorem ipsum dolor sit amet',
                'final_cost_of_delivery' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
