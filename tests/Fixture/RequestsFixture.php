<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestsFixture
 */
class RequestsFixture extends TestFixture
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
                'user_id' => 1,
                'origin' => 'Lorem ipsum dolor sit amet',
                'destination' => 'Lorem ipsum dolor sit amet',
                'date_of_travel' => 'Lorem ipsum dolor sit amet',
                'date_of_arrival' => 'Lorem ipsum dolor sit amet',
                'preferred_contact' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
