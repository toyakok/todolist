<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Http\ServerRequest;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;

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

        $articles = $this->getTableLocator()->get('todolist');
        $query = $articles->find();
        $query->select(['id', 'subject', 'person', 'state', 'priority', 'deadtime', 'crdatetime'])
            ->where(['delflg' != '9']);

        $this->set('datalist', $query);
    }

    public function add()
    {
        $subject = $this->request->getData(['subject']);
        $person = $this->request->getData(['person']);
        $state = $this->request->getData(['state']);
        $priority = $this->request->getData(['priority']);
        $deadtime = $this->request->getData(['deadtime']);
        $delflg = '0';
        // $connection = ConnectionManager::get('default');
        // $connection->insert('todolist', [ 'subject' => $subject]);

        $todolistData = $this->getTableLocator()->get('todolist');
        $query = $todolistData->query();
        $query->insert(['subject', 'person', 'state', 'priority', 'deadtime', 'delflg'])
            ->values([
                'subject' => $subject,
                'person' => $person,
                'state' => $state,
                'priority' => $priority,
                'deadtime' => $deadtime,
                'delflg' => $delflg,
        ])
        ->execute();

        //getDataを呼び出し
        //$this->requestAction(["controller"=>"","action"=>"getData"]);
    }

    // public function getData()
    // {
    //     $articles = $this->getTableLocator()->get('todolist');
    //     $query = $articles->find();
    //     $query->select(['subject', 'person', 'state', 'priority', 'deadtime'])
    //         ->where(['delflg' != '9']);


    // }
}
?>
