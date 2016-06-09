<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonitoringDevicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonitoringDevicesTable Test Case
 */
class MonitoringDevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonitoringDevicesTable
     */
    public $MonitoringDevices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.monitoring_devices',
        'app.monitoring_device_locations',
        'app.locations',
        'app.wings',
        'app.floors',
        'app.rooms',
        'app.suffixes',
        'app.buildings',
        'app.addresses',
        'app.campuses',
        'app.received_requests'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MonitoringDevices') ? [] : ['className' => 'App\Model\Table\MonitoringDevicesTable'];
        $this->MonitoringDevices = TableRegistry::get('MonitoringDevices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MonitoringDevices);

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
