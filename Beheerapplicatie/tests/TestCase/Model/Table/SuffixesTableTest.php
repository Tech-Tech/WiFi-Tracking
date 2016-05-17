<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuffixesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuffixesTable Test Case
 */
class SuffixesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SuffixesTable
     */
    public $Suffixes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.suffixes',
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
        $config = TableRegistry::exists('Suffixes') ? [] : ['className' => 'App\Model\Table\SuffixesTable'];
        $this->Suffixes = TableRegistry::get('Suffixes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Suffixes);

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
