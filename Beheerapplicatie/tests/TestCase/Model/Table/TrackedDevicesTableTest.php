<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrackedDevicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrackedDevicesTable Test Case
 */
class TrackedDevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrackedDevicesTable
     */
    public $TrackedDevices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tracked_devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TrackedDevices') ? [] : ['className' => 'App\Model\Table\TrackedDevicesTable'];
        $this->TrackedDevices = TableRegistry::get('TrackedDevices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TrackedDevices);

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
