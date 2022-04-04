<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserRequirementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserRequirementsTable Test Case
 */
class UserRequirementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserRequirementsTable
     */
    protected $UserRequirements;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserRequirements',
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
        $config = $this->getTableLocator()->exists('UserRequirements') ? [] : ['className' => UserRequirementsTable::class];
        $this->UserRequirements = $this->getTableLocator()->get('UserRequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserRequirements);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserRequirementsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserRequirementsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
