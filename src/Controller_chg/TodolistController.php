<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $todolist = $this->paginate($this->Todolist);

        $this->set(compact('todolist'));
    }

    /**
     * View method
     *
     * @param string|null $id Todolist id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $todolist = $this->Todolist->get($id, [
            'contain' => [],
        ]);

        $this->set('todolist', $todolist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $todolist = $this->Todolist->newEntity();
        if ($this->request->is('post')) {
            $todolist = $this->Todolist->patchEntity($todolist, $this->request->getData());
            if ($this->Todolist->save($todolist)) {
                $this->Flash->success(__('The todolist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The todolist could not be saved. Please, try again.'));
        }
        $this->set(compact('todolist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Todolist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $todolist = $this->Todolist->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $todolist = $this->Todolist->patchEntity($todolist, $this->request->getData());
            if ($this->Todolist->save($todolist)) {
                $this->Flash->success(__('The todolist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The todolist could not be saved. Please, try again.'));
        }
        $this->set(compact('todolist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Todolist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $todolist = $this->Todolist->get($id);
        if ($this->Todolist->delete($todolist)) {
            $this->Flash->success(__('The todolist has been deleted.'));
        } else {
            $this->Flash->error(__('The todolist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
