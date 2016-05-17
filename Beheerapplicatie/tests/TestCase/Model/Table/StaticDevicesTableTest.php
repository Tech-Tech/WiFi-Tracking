<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaticDevicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaticDevicesTable Test Case
 */
class StaticDevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaticDevicesTable
     */
    public $StaticDevices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.static_devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StaticDevices') ? [] : ['className' => 'App\Model\Table\StaticDevicesTable'];
        $this->StaticDevices = TableRegistry::get('StaticDevices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StaticDevices);

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
}
