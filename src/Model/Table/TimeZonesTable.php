<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimeZones Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\TimeZone newEmptyEntity()
 * @method \App\Model\Entity\TimeZone newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TimeZone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeZone get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeZone findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TimeZone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeZone[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeZone|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeZone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeZone[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TimeZone[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TimeZone[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TimeZone[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TimeZonesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('time_zones');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'time_zone_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->allowEmptyString('title');

        return $validator;
    }
}
