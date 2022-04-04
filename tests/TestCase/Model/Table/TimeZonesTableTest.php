<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimeZonesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimeZonesTable Test Case
 */
class TimeZonesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TimeZonesTable
     */
    protected $TimeZones;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TimeZones',
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
        $config = $this->getTableLocator()->exists('TimeZones') ? [] : ['className' => TimeZonesTable::class];
        $this->TimeZones = $this->getTableLocator()->get('TimeZones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TimeZones);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TimeZonesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
