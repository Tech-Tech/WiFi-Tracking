<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonalDevicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonalDevicesTable Test Case
 */
class PersonalDevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonalDevicesTable
     */
    public $PersonalDevices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.personal_devices',
        'app.persons',
        'app.person_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PersonalDevices') ? [] : ['className' => 'App\Model\Table\PersonalDevicesTable'];
        $this->PersonalDevices = TableRegistry::get('PersonalDevices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PersonalDevices);

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
