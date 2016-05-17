<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReceivedRequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReceivedRequestsTable Test Case
 */
class ReceivedRequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReceivedRequestsTable
     */
    public $ReceivedRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.received_requests',
        'app.monitoring_devices',
        'app.monitoring_device_locations',
        'app.locations',
        'app.wings',
        'app.floors',
        'app.rooms',
        'app.suffixes',
        'app.buildings',
        'app.addresses',
        'app.campuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReceivedRequests') ? [] : ['className' => 'App\Model\Table\ReceivedRequestsTable'];
        $this->ReceivedRequests = TableRegistry::get('ReceivedRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReceivedRequests);

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
