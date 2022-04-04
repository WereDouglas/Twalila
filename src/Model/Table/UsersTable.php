<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\TimeZonesTable&\Cake\ORM\Association\BelongsTo $TimeZones
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 * @property \App\Model\Table\UserRatingsTable&\Cake\ORM\Association\HasMany $UserRatings
 * @property \App\Model\Table\UserRequirementsTable&\Cake\ORM\Association\HasMany $UserRequirements
 * @property \App\Model\Table\PermissionsTable&\Cake\ORM\Association\BelongsToMany $Permissions
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TimeZones', [
            'foreignKey' => 'time_zone_id',
        ]);
        $this->hasMany('Addresses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserRatings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserRequirements', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('Permissions', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'permission_id',
            'joinTable' => 'permissions_users',
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->allowEmptyString('token');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 20)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 20)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('other_name')
            ->maxLength('other_name', 20)
            ->allowEmptyString('other_name');

        $validator
            ->scalar('primary_contact')
            ->maxLength('primary_contact', 45)
            ->allowEmptyString('primary_contact');

        $validator
            ->scalar('secondary_contact')
            ->maxLength('secondary_contact', 45)
            ->allowEmptyString('secondary_contact');

        $validator
            ->scalar('type')
            ->maxLength('type', 20)
            ->allowEmptyString('type');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->scalar('ssn_four')
            ->maxLength('ssn_four', 10)
            ->allowEmptyString('ssn_four');

        $validator
            ->allowEmptyString('is_admin');

        $validator
            ->scalar('selector')
            ->allowEmptyString('selector');

        $validator
            ->scalar('expires')
            ->maxLength('expires', 255)
            ->allowEmptyString('expires');

        $validator
            ->scalar('pass_code')
            ->maxLength('pass_code', 100)
            ->allowEmptyString('pass_code');

        $validator
            ->notEmptyString('active');

        $validator
            ->notEmptyString('password_reset');

        $validator
            ->scalar('full_address')
            ->maxLength('full_address', 100)
            ->allowEmptyString('full_address');

        $validator
            ->scalar('street')
            ->maxLength('street', 50)
            ->allowEmptyString('street');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->allowEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 50)
            ->allowEmptyString('state');

        $validator
            ->scalar('zip')
            ->maxLength('zip', 50)
            ->allowEmptyString('zip');

        $validator
            ->scalar('locality')
            ->maxLength('locality', 50)
            ->allowEmptyString('locality');

        $validator
            ->scalar('access_token')
            ->maxLength('access_token', 255)
            ->allowEmptyString('access_token');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('time_zone_id', 'TimeZones'), ['errorField' => 'time_zone_id']);

        return $rules;
    }

    public function findToken(Query $query, array $options)
    {
        $token = $options['token'];
        return $query->where(['token' => $token]);
    }
}
