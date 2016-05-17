<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonitoringDeviceLocationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonitoringDeviceLocationsTable Test Case
 */
class MonitoringDeviceLocationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonitoringDeviceLocationsTable
     */
    public $MonitoringDeviceLocations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.monitoring_device_locations',
        'app.locations',
        'app.wings',
        'app.floors',
        'app.rooms',
        'app.suffixes',
        'app.buildings',
        'app.addresses',
        'app.campuses',
        'app.monitoring_devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MonitoringDeviceLocations') ? [] : ['className' => 'App\Model\Table\MonitoringDeviceLocationsTable'];
        $this->MonitoringDeviceLocations = TableRegistry::get('MonitoringDeviceLocations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MonitoringDeviceLocations);

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
