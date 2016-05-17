<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WingsTable Test Case
 */
class WingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WingsTable
     */
    public $Wings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wings',
        'app.locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Wings') ? [] : ['className' => 'App\Model\Table\WingsTable'];
        $this->Wings = TableRegistry::get('Wings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wings);

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
