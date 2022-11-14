<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TodolistTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TodolistTable Test Case
 */
class TodolistTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TodolistTable
     */
    public $Todolist;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Todolist',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Todolist') ? [] : ['className' => TodolistTable::class];
        $this->Todolist = TableRegistry::getTableLocator()->get('Todolist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Todolist);

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
