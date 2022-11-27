<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Http\ServerRequest;

/**
 * Todolist Controller
 *
 * @property \App\Model\Table\TodolistTable $Todolist
 *
 * @method \App\Model\Entity\Todolist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TodolistController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('ajax_name', 'todolist.js');

        // 担当者一覧
        $persons = [0 => '佐藤一郎', 1 => '佐藤二郎', 2 => '佐藤三郎', 3 => '佐藤四郎', 4 => '佐藤五郎'];
        $this->set('persons', $persons);

        // 状態
        $state = [0 => '未着手', 1 => '進行中', 2 => '解決', 3 => '保留'];
        $this->set('state', $state);

        // 緊急度
        $priority = [0 => '小', 1 => '中', 2 => '大', 3 => '緊急'];
        $this->set('priority', $priority);

    }

    public function add()
    {
        $data = $this->request->getData('request');
        $connection = ConnectionManager::get('default');
        $connection->insert('todolist', [ 'subject' => $data]);
    }
}
?>
