<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Todolist Model
 *
 * @method \App\Model\Entity\Todolist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Todolist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Todolist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Todolist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Todolist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Todolist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Todolist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Todolist findOrCreate($search, callable $callback = null, $options = [])
 */
class TodolistTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('todolist');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('subject')
            ->requirePresence('subject', 'create')
            ->notEmptyString('subject');

        $validator
            ->scalar('person')
            ->maxLength('person', 20)
            ->requirePresence('person', 'create')
            ->notEmptyString('person');

        $validator
            ->scalar('state')
            ->maxLength('state', 10)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('priority')
            ->maxLength('priority', 10)
            ->requirePresence('priority', 'create')
            ->notEmptyString('priority');

        $validator
            ->date('deadtime')
            ->requirePresence('deadtime', 'create')
            ->notEmptyDate('deadtime');

        $validator
            ->date('createtime')
            ->allowEmptyDate('createtime');

        $validator
            ->integer('versionno')
            ->allowEmptyString('versionno');

        $validator
            ->integer('delflg')
            ->allowEmptyString('delflg');

        return $validator;
    }
}
