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
        $query->select(['id', 'subject', 'person', 'state', 'priority', 'datetime', 'crdatetime'])
            ->where(['delflg' != '9']);

        $this->set('datalist', $query);
    }

    public function add()
    {
        //$persons = [0 => '佐藤一郎', 1 => '佐藤二郎', 2 => '佐藤三郎', 3 => '佐藤四郎', 4 => '佐藤五郎'];
        //$state = [0 => '未着手', 1 => '進行中', 2 => '解決', 3 => '保留'];
        //$priority = [0 => '小', 1 => '中', 2 => '大', 3 => '緊急'];

        $subject = $this->request->getData(['subject']);
        //$personName = $persons[$this->request->getData(['person'])];
        $person = $this->request->getData(['person']);
        //$states = $state[$this->request->getData(['state'])];
        $state = $this->request->getData(['state']);
        //$prioritys = $priority[$this->request->getData(['priority'])];
        $priority = $this->request->getData(['priority']);
        $datetime = $this->request->getData(['datetime']);
        $delflg = '0';
        // $connection = ConnectionManager::get('default');
        // $connection->insert('todolist', [ 'subject' => $subject]);

        $todolistData = $this->getTableLocator()->get('todolist');
        $query = $todolistData->query();
        $query->insert(['subject', 'person', 'state', 'priority', 'datetime', 'delflg'])
            ->values([
                'subject' => $subject,
                'person' => $person,
                'state' => $state,
                'priority' => $priority,
                'datetime' => $datetime,
                'delflg' => $delflg,
        ])
        ->execute();
        $this->Flash->success(__('登録が完了しました。'));
    }

    public function edit($id = null)
    {
        $persons = [0 => '佐藤一郎', 1 => '佐藤二郎', 2 => '佐藤三郎', 3 => '佐藤四郎', 4 => '佐藤五郎'];
        $this->set('persons', $persons);
        $state = [0 => '未着手', 1 => '進行中', 2 => '解決', 3 => '保留'];
        $this->set('state', $state);
        $priority = [0 => '小', 1 => '中', 2 => '大', 3 => '緊急'];
        $this->set('priority', $priority);

        $todolist = $this->Todolist->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $todolist = $this->Todolist->patchEntity($todolist, $this->request->getData());
            if ($this->Todolist->save($todolist)) {
                $this->Flash->success(__('更新が完了しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('更新に失敗しました。'));
        }
        $this->set(compact('todolist'));
    }

    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $this->request->is(['post', 'delete']);
        $todolist = $this->Todolist->get($id);
        if ($this->Todolist->delete($todolist)) {
            $this->Flash->success(__('削除が完了しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
?>
