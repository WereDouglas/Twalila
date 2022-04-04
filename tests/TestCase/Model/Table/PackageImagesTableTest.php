<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PackageImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PackageImagesTable Test Case
 */
class PackageImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PackageImagesTable
     */
    protected $PackageImages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PackageImages',
        'app.Packages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PackageImages') ? [] : ['className' => PackageImagesTable::class];
        $this->PackageImages = $this->getTableLocator()->get('PackageImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PackageImages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PackageImagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PackageImagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
