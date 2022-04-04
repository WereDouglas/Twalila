<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserRatingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserRatingsTable Test Case
 */
class UserRatingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserRatingsTable
     */
    protected $UserRatings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserRatings',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserRatings') ? [] : ['className' => UserRatingsTable::class];
        $this->UserRatings = $this->getTableLocator()->get('UserRatings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserRatings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserRatingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserRatingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
