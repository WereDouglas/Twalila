<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Packages Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PackageImagesTable&\Cake\ORM\Association\HasMany $PackageImages
 *
 * @method \App\Model\Entity\Package newEmptyEntity()
 * @method \App\Model\Entity\Package newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Package[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Package get($primaryKey, $options = [])
 * @method \App\Model\Entity\Package findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Package patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Package[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Package|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Package saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Package[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Package[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Package[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Package[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PackagesTable extends Table
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

        $this->setTable('packages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'sender_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'receiver_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'traveller_id',
        ]);
        $this->hasMany('PackageImages', [
            'foreignKey' => 'package_id',
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
            ->scalar('pickup_address')
            ->maxLength('pickup_address', 45)
            ->allowEmptyString('pickup_address');

        $validator
            ->scalar('destination_address')
            ->maxLength('destination_address', 45)
            ->allowEmptyString('destination_address');

        $validator
            ->scalar('status')
            ->maxLength('status', 45)
            ->allowEmptyString('status');

        $validator
            ->scalar('pickup_location')
            ->maxLength('pickup_location', 45)
            ->allowEmptyString('pickup_location');

        $validator
            ->scalar('dropoff_location')
            ->maxLength('dropoff_location', 45)
            ->allowEmptyString('dropoff_location');

        $validator
            ->scalar('estimates_size')
            ->maxLength('estimates_size', 45)
            ->allowEmptyString('estimates_size');

        $validator
            ->scalar('actual_size')
            ->maxLength('actual_size', 45)
            ->allowEmptyString('actual_size');

        $validator
            ->scalar('estimated_weight')
            ->maxLength('estimated_weight', 45)
            ->allowEmptyString('estimated_weight');

        $validator
            ->scalar('actual_weight')
            ->maxLength('actual_weight', 45)
            ->allowEmptyString('actual_weight');

        $validator
            ->scalar('size_metric')
            ->maxLength('size_metric', 45)
            ->allowEmptyString('size_metric');

        $validator
            ->scalar('weight_metric')
            ->maxLength('weight_metric', 45)
            ->allowEmptyString('weight_metric');

        $validator
            ->scalar('estimated_cost_of_delivery')
            ->maxLength('estimated_cost_of_delivery', 45)
            ->allowEmptyString('estimated_cost_of_delivery');

        $validator
            ->scalar('final_cost_of_delivery')
            ->maxLength('final_cost_of_delivery', 45)
            ->allowEmptyString('final_cost_of_delivery');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('sender_id', 'Users'), ['errorField' => 'sender_id']);
        $rules->add($rules->existsIn('receiver_id', 'Users'), ['errorField' => 'receiver_id']);
        $rules->add($rules->existsIn('traveller_id', 'Users'), ['errorField' => 'traveller_id']);

        return $rules;
    }
}
