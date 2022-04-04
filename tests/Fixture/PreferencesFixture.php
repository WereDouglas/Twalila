<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PreferencesFixture
 */
class PreferencesFixture extends TestFixture
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
                'traveller_id' => 1,
                'ip' => 'Lorem ipsum dolor sit amet',
                'device' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
