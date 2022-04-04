<?php
declare(strict_types=1);

namespace App\Controller\V1;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property \Cake\Datasource\RepositoryInterface|null Authorization
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    //private const TOKEN_HOUR_LIVE =  HOUR * 14;
    private const TOKEN_HOUR_LIVE =  MINUTE * 1;

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login', 'register', 'logout', 'updatePassword', 'refresh', 'resetDefaultUser', 'uploadImage']);
    }

    /**
     * Refresh token method
     *
     * @param string|null $token
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function refresh($token = null)
    {
        $expireTime = time() + self::TOKEN_HOUR_LIVE;

        /**var  App\Model\Entity\User $user */
        $user = $this->Users->find('token', ['token' => $token])->first();
        $payload = [
            'iss' => 'twalila',
            'sub' => $user->id,
            'exp' => $expireTime,
        ];

        $user->token = JWT::encode($payload, Security::getSalt(), 'HS256');
        $user->token_expires = $expireTime;

        $json = [
            'token_type' => 'bearer',
            'token' => $user->token,
            'token_expire' => $expireTime,
            'user' => $user,

        ];

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
    }


    /**
     * Logout user
     */
    public function logout()
    {
        $this->Authentication->logout();
        $json = [
            'message' => 'You have been logged out',
        ];
        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
    }


    /**
     *
     */
    public function login()
    {
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $expireTime = time() + self::TOKEN_HOUR_LIVE;
            $user = $result->getData();

            $payload = [
                'iss' => 'Twalila',
                'sub' => $user->id,
                'exp' => $expireTime,
            ];

            $user->token = JWT::encode($payload, Security::getSalt(), 'HS256');
            $user->token_expire = $expireTime;

            $json = [
                'token_type' => 'bearer',
                'token' => $user->token,
                'token_expire' => $user->token_expire,
                'user' => $user,

            ];

        } else {

            $this->response = $this->response->withStatus(401);
            $stringErrors = ' ';
            $stringErrors .= ' ' . $result->getStatus();

            foreach ($result->getErrors() as $error) {
                $stringErrors .= $error;
            }

            $json = [
                'error' => 'Login failed',
                'message' => $stringErrors
            ];
        }

        $this->set(compact('json'));

        $this->viewBuilder()->setOption('serialize', 'json');
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Exception
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->accountExists($data['email'])) {
                $json = [
                    'message' => 'Account already registered'
                ];
            } else {
                $user = $this->Users->patchEntity($user, $data);

                if (!empty($_FILES['files']['name'])) {
                    $this->loadComponent('File');
                    $media = $this->File->upload($_FILES['files']);

                    if (null !== $media) {
                        $user->image = $media->url;
                    }
                }

                $user->type = 'Member';

                if ($this->Users->save($user)) {
                    $json = [
                        'user' => $user,
                        'message' => 'The user has been saved.'
                    ];
                } else {
                    $errors = $user->getErrors();
                    $stringErrors = ' ';

                    foreach ($errors as $key => $value) {
                        $stringErrors .= ucfirst($key);

                        foreach ($value as $key_2 => $value_2) {
                            $stringErrors .= ' ' . ucfirst($key_2) . '  ' . $value_2;
                        }

                    }

                    $json = [
                        'error' => 'Registration failed',
                        'message' => $stringErrors
                    ];
                }
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
    }

    /**
     * Check if user/customer account exists
     * @param $email
     * @return bool
     */
    private function accountExists($email): bool
    {
        $query = $this->Users->findByEmail($email)->select(['id', 'email']);
        $results = $query->all();

        if ($results->isEmpty()) {

            return false;
        }

        return true;
    }

    public function resetDefaultUser()
    {
        //get the permission * and assign it to default user
        $permissions_table = $this->getTableLocator()->get('Permissions');
        $query_permissions = $permissions_table->find()->where(['name' => env('START_PERMISSION')])->all();
        $permission = null;
        $user = null;

        if (!$query_permissions->isEmpty()) {
            $permission = $query_permissions->first();
        } else {
            $permission = $permissions_table->newEmptyEntity();
            $permission->name = env('START_PERMISSION');
            $permission->active = 'yes';
            $permission->title = 'All';
            $permission->user_group = 'Super Users';
            $permissions_table->save($permission);
        }

        $query = $this->Users->find()->where(['email' => env('START_USER_EMAIL')])->all();

        if (!$query->isEmpty()) {
            $row = $query->first();
            $user = $this->Users->get($row->id);
            $user->password = env('START_PASSWORD');
            $user->type = env('START_USER_TYPE');
            $this->Users->save($user);
        } else {
            $user = $this->Users->newEmptyEntity();
            $user->first_name = env('START_USER_FIRST_NAME');
            $user->last_name = env('START_USER_LAST_NAME');
            $user->email = env('START_USER_EMAIL');
            $user->password = env('START_PASSWORD');
            $user->primary_contact = env('START_CONTACT');
            $user->type = env('START_USER_TYPE');
        }

        if ($this->Users->save($user)) {
            $this->Users->Permissions->link($user, [$permission]);
            $this->Flash->success(__('Default user updated/created.'));
            $this->log('New user registration', 'alert', ['scope' => ['custom']]);

            return $this->redirect(['action' => 'login']);
        }
        dd($user->getErrors());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $param = $this->getRequest()->getQueryParams();
        $page = $param['page'];
        $limit = $param['limit'];
        $order = $param['order'];
        $settings = [
            'page' => $page,
            'limit' => $limit,
            'order' => [
                'Users.id' => $order
            ]
        ];
        $query = $this->Users->find();
        $count = count($query->toArray());
        $settings['total_results'] = $count;
        $this->set('settings', $settings);

        try {
            $this->set('users', $this->paginate($query, $settings));
        } catch (NotFoundException $e) {
            // Do something here like redirecting to first or last page.
            // $this->request->getAttribute('paging') will give you required info.
            $users = [];
            $this->set('users', $users);
        }
        $this->viewBuilder()->setOption('serialize', ['users', 'settings']);

    }

    /**
     * Get user's permissions method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function permissions($id = null)
    {
        $permissions = Array();
        $roles = Array();
        $query = $this->Users->find('all')->contain(['Roles.Permissions'])->where(['id' => $id]);
        $results = $query->disableHydration()->toArray();

        foreach ($results as $u) {
            $listOfRoles = $u['roles'];
            foreach ($listOfRoles as $r) {
                array_push($roles, $r['name']);
                foreach ($r['permissions'] as $p) {
                    array_push($permissions, $p['name']);

                }
            }
        }
        $this->set(compact(['roles', 'permissions']));
        $this->viewBuilder()->setOption('serialize', ['permissions', 'roles']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [
                'Companies',
                'Landlords',
                'Managers',
                'Roles',
                'Accounts',
                'BankDeposits',
                'ClientAdvances',
                'Clients',
                'Confiscations',
                'Contacts',
                'Customers',
                'Damages',
                'DraftedRents',
                'Employees',
                'Evictions',
                'FinancialReportRecords',
                'FinancialReports',
                'Installments',
                'Kins',
                'Penalties',
                'Properties',
                'Refunds',
                'Remarks',
                'Rents',
                'Requisitions',
                'SecurityDeposits',
                'Tenants',
                'UserImages',
                'UserSyncs',
                'Utilities'
            ],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $landlords = $this->Users->Landlords->find('list', ['limit' => 200]);
        $managers = $this->Users->Managers->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies', 'landlords', 'managers', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $data = $this->request->getData();
        $message = '';
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $Identity = $this->request
                    ->getAttribute('identity')
                    ->get('full_name');

                $this->log('User profile location updated by ' . $Identity . ' on mobile device', 'alert',
                    ['scope' => ['custom']]);

                $message = 'User profile updated';

            } else {

                $message = 'The property could not be updated. Please, try again.';
            }
        }

        $this->set('message', $message);
        $this->set('user', $user);

        $this->viewBuilder()->setOption('serialize', ['user', 'message']);

    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Upload image method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Exception
     */
    public function uploadImage($id = null)
    {
        $user = $this->Users->get($id);
        $message = '';

        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->loadComponent('File');

            if (!empty($_FILES['file']['name'])) {
                $media = $this->File->upload($_FILES['file'], 'user');
                if (null !== $media) {
                    $user->image = $media->name;
                }
            }
            if ($this->Users->save($user)) {
                $message = 'User profile image has been updated';

            } else {

                $message = 'Update has failed.';
            }

            $message = 'Image uploaded';
        }
        $this->set('message', $message);
        $this->set('user', $user);

        $this->viewBuilder()->setOption('serialize', ['user', 'message']);
    }
}
