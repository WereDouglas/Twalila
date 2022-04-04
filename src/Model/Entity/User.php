<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Database\Query;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string|null $password
 * @property string|null $token
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $other_name
 * @property string|null $primary_contact
 * @property string|null $secondary_contact
 * @property int|null $time_zone_id
 * @property string|null $type
 * @property string|null $image
 * @property string|null $ssn_four
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $is_admin
 * @property string|null $selector
 * @property string|null $expires
 * @property string|null $pass_code
 * @property int $active
 * @property int $password_reset
 * @property string|null $full_address
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $locality
 * @property string|null $access_token
 *
 * @property \App\Model\Entity\TimeZone $time_zone
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Request[] $requests
 * @property \App\Model\Entity\UserRating[] $user_ratings
 * @property \App\Model\Entity\Preference[] $user_preference
 * @property \App\Model\Entity\UserRequirement[] $user_requirements
 * @property \App\Model\Entity\Permission[] $permissions
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */

    protected $_accessible = [
        'email' => true,
        'password' => true,
        'token' => true,
        'first_name' => true,
        'last_name' => true,
        'other_name' => true,
        'primary_contact' => true,
        'secondary_contact' => true,
        'time_zone_id' => true,
        'type' => true,
        'image' => true,
        'ssn_four' => true,
        'modified' => true,
        'created' => true,
        'is_admin' => true,
        'selector' => true,
        'expires' => true,
        'pass_code' => true,
        'active' => true,
        'password_reset' => true,
        'full_address' => true,
        'street' => true,
        'city' => true,
        'state' => true,
        'zip' => true,
        'locality' => true,
        'access_token' => true,
        'time_zone' => true,
        'addresses' => true,
        'requests' => true,
        'user_ratings' => true,
        'user_requirements' => true,
        'preferences' => true,
        'permissions' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token',
        'access_token',
    ];
    protected $_virtual = ['full_name', 'user_type'];


    protected function _getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
    protected function _getFullAddress()
    {
        return $this->street . ' ' . $this->city . ' ' . $this->state . ' ' . $this->zip . ' ' . $this->locality;
    }

    protected function _getPermissions()
    {
        $filter = ['Users.id' => $this->id];
        $permissionsTable = TableRegistry::getTableLocator()->get('Permissions');
        $userPermissions = $permissionsTable->find()->select('name')
            ->innerJoinWith('Users', function (Query $q) use ($filter) {
                return $q->where($filter);
            })->all()->extract('name')->toArray();

        return $userPermissions;
    }

    protected function _getPermissionIds()
    {
        $filter = ['Users.id' => $this->id];
        $permissionsTable = TableRegistry::getTableLocator()->get('Permissions');
        $userPermissions = $permissionsTable->find()->select('id')
            ->innerJoinWith('Users', function (Query $q) use ($filter) {
                return $q->where($filter);
            })->all()->extract('id')->toArray();

        return $userPermissions;
    }

    protected function _getUserType()
    {
        if ($this->is_admin ) {
            return 'admin';
        }

        return 'default';
    }
}
