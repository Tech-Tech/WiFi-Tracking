<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeviceTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeviceTypesTable Test Case
 */
class DeviceTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeviceTypesTable
     */
    public $DeviceTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.device_types',
        'app.devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeviceTypes') ? [] : ['className' => 'App\Model\Table\DeviceTypesTable'];
        $this->DeviceTypes = TableRegistry::get('DeviceTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeviceTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
