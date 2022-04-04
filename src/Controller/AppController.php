<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Authentication\Controller\Component\AuthenticationComponent;
use Authorization\Controller\Component\AuthorizationComponent;
use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;


/**
 * Application Controller
 * @property AuthenticationComponent $Authentication
 * @property AuthorizationComponent $Authorization
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['view', 'display', 'login','register']);
        $this->loadComponent('Authorization.Authorization');
    }

    public function beforeFilter (EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authorization->skipAuthorization();
        $this->Authentication->addUnauthenticatedActions([
            'load',
            'autoLoad',
            'autoSave',
            'addMenu',
            'filter',
            'view',
            'login',
            'logout',
            'register',
            'edit',
            'add',
            'search',
            'cookie',
            'resetPassword',
            'newPassword',
            'saveSession',
            'forgotPassword',
            'passwordCode',
            'password',
            'editProfile'
        ]);

        $app = $this->getRequest()->getParam('prefix');
        $controller = $this->getName();
        $action = $this->getRequest()->getParam('action');
        $permission = $action . ' ' . strtolower($controller);

        if ($app === 'Admin') {

            $user = $this->request->getAttribute('identity');

            if ($user !== null && !$this->isAuthorized($user, $controller, $action)) {

                $this->log('Suspicious activity, user accessing process  without the right permissions: ' . $permission . ' by ' . $user->full_name,
                    'critical');

                $this->loadComponent('Messaging');
                $this->loadModel('Users');
                $recipients = $this->Users->find()->where(['isadmin' => '1'])->select(['contact'])->extract('contact')->toArray();

                foreach ($recipients as $r) {

                    /* $this->Messaging->sms($r,
                         'Suspicious activity user trying to access:  ' . $permission . ' . by ' . $user->full_name,
                         ' UNAUTHORIZED ACCESS');*/
                }

                /* echo $this->request->is('ajax') ? 'yes' : 'no';
                // var_dump($this->request->is(['ajax']));
                 exit;*/

                if ($this->request->is('ajax')) {
                    echo 'Your activity is suspicious, am logging it and sending the admin a notification of this action !';
                    exit;
                } else {
                    $this->Flash->error('Access denied !' . ' required permission: ' . $permission . '');

                    return $this->redirect($this->referer());
                }
            }

        }
    }

    /**
     *
     * @param null $user
     * @param null $controller
     * @param null $action
     * @return bool
     */
    public function isAuthorized ($user = null, $controller = null, $action = null): bool
    {
        $permission = $action . ' ' . strtolower($controller);
        $permissionsTable = TableRegistry::getTableLocator()->get('Permissions');
        $controller = strtolower($controller);
        $query = $permissionsTable->find()->where(['name' => $permission]);
        $allowed = [
            'remove',
            'clear',
            'load',
            'autoLoad',
            'autoSave',
            'filter',
            'view',
            'login',
            'logout',
            'register',
            'search',
            'cookie',
            'resetPassword',
            'newPassword',
            'saveSession',
            'forgotPassword',
            'passwordCode',
            'password',
            'editProfile'
        ];


        if (in_array($action, $allowed, false)) {

            return true;
        }

        if (empty($user)) {

            return false;
        }

        if ($query->count() > 0) {
            $requiredPermission = $query->first()->name;

            if (!in_array($requiredPermission, $user->permissions, true)) {

                return false;
            }
        }

        $q = $permissionsTable->find()->where(['name' => '* ' . $controller]);

        if ($q->count() > 0) {
            $requiredPermission = $q->first()->name;

            if (!in_array($requiredPermission, $user->permissions, true)) {
                return false;
            }
        }

        $q = $permissionsTable->find()->where(['name' => 'all ' . $controller]);

        if ($q->count() > 0) {
            $requiredPermission = $q->first()->name;

            if (!in_array($requiredPermission, $user->permissions, true)) {
                return false;
            }
        }

        return true;
    }
}
