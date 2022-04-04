<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit a',
                'password' => 'Lorem ipsum dolor sit amet',
                'token' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor ',
                'last_name' => 'Lorem ipsum dolor ',
                'other_name' => 'Lorem ipsum dolor ',
                'primary_contact' => 'Lorem ipsum dolor sit amet',
                'secondary_contact' => 'Lorem ipsum dolor sit amet',
                'time_zone_id' => 1,
                'type' => 'Lorem ipsum dolor ',
                'image' => 'Lorem ipsum dolor sit amet',
                'ssn_four' => 'Lorem ip',
                'modified' => '2022-03-30 15:26:18',
                'created' => '2022-03-30 15:26:18',
                'is_admin' => 1,
                'selector' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'expires' => 'Lorem ipsum dolor sit amet',
                'pass_code' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'password_reset' => 1,
                'full_address' => 'Lorem ipsum dolor sit amet',
                'street' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
                'zip' => 'Lorem ipsum dolor sit amet',
                'locality' => 'Lorem ipsum dolor sit amet',
                'access_token' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
