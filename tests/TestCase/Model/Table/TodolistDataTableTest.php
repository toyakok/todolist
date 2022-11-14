<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TodolistdataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TodolistdataTable Test Case
 */
class TodolistdataTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TodolistdataTable
     */
    public $Todolistdata;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Todolistdata',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Todolistdata') ? [] : ['className' => TodolistdataTable::class];
        $this->Todolistdata = TableRegistry::getTableLocator()->get('Todolistdata', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Todolistdata);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
