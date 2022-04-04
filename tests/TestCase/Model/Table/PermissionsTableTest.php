<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissionsTable Test Case
 */
class PermissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionsTable
     */
    protected $Permissions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Permissions',
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
        $config = $this->getTableLocator()->exists('Permissions') ? [] : ['className' => PermissionsTable::class];
        $this->Permissions = $this->getTableLocator()->get('Permissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Permissions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PermissionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
