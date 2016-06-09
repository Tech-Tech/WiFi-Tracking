<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MonitoringDevicesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MonitoringDevicesController Test Case
 */
class MonitoringDevicesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
