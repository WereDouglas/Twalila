<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserRequirementsFixture
 */
class UserRequirementsFixture extends TestFixture
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
                'file_name' => 'Lorem ipsum dolor sit amet',
                'required' => 1,
                'created' => '2022-03-30 15:30:41',
                'modified' => '2022-03-30 15:30:41',
                'validated' => 1,
                'validated_by' => 'Lorem ipsum dolor sit amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor ',
                'size' => 'Lorem ipsum dolor ',
                'used_for' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
