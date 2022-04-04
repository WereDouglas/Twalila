<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserRatingsFixture
 */
class UserRatingsFixture extends TestFixture
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
                'rated_by' => 1,
                'rating' => 1,
                'created' => '2022-03-30 15:30:13',
                'job' => 'Lorem ipsum dolor ',
            ],
        ];
        parent::init();
    }
}
