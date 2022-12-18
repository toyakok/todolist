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
            ->scalar('subject')
            ->maxLength('subject', 64)
            ->allowEmptyString('subject');

        $validator
            ->scalar('person')
            ->maxLength('person', 20)
            ->allowEmptyString('person');

        $validator
            ->scalar('state')
            ->maxLength('state', 10)
            ->allowEmptyString('state');

        $validator
            ->scalar('priority')
            ->maxLength('priority', 10)
            ->allowEmptyString('priority');

        $validator
            ->date('datetime')
            ->allowEmptyDate('datetime');

        $validator
            ->integer('delflg')
            ->allowEmptyString('delflg');

        $validator
            ->dateTime('crdatetime')
            ->allowEmptyDateTime('crdatetime');

        return $validator;
    }
}
