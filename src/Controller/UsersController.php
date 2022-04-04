<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['login', 'register',]);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TimeZones'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

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
     * login method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function login()
    {

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /home after login success
            $session = $this->getRequest()->getSession();
            $session->write('logged_in', true);
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Pages',
                'action' => 'home',
            ]);
            // Request
            $user = $result->getData();
            $session = $this->getRequest()->getSession();

            if ($user->isadmin) {
                $session->write('IsAdmin', true);
                $session->write('user_type', strtolower($user->type));
            } else {
                $session->write('IsAdmin', false);
                $session->write('user_type', strtolower($user->type));
            }

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {

            //$this->Flash->error(__($result->getStatus()));
            //  dd($result->getErrors());
            /* foreach ($result->getErrors() as $error) {
                 $this->Flash->error(__($error));
             }*/
            $this->Flash->error(__('Invalid username or password'));
        }

    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Exception
     */
    public function register()
    {
        //$this->viewBuilder()->setLayout('admin');
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        $session = $this->getRequest()->getSession();

        if ($session->read('logged_in')) {
            $this->Flash->error(__('Please log out and try again. Please, try again.'));

            return $this->redirect($this->referer());
        }

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            if ($this->accountExists($data['email'])) {
                $this->Flash->error('Email in use ');

                return $this->redirect($this->referer());
            }

            $user = $this->Users->patchEntity($user, $data);

            if (!empty($_FILES['files']['name'])) {

                $this->loadComponent('File');
                $media = $this->File->upload($_FILES['files']);

                if (null !== $media) {
                    $user->profile_image = $media->url;
                }
            }
            $user->type = 'Customer';

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->Authentication->setIdentity($user);

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }

            $errors = $user->getErrors();
            $this->Flash->error(__('Registration failed. Please, try again.'));
            $stringErrors = ' ';

            foreach ($errors as $key => $value) {
                $stringErrors .= ucfirst($key);
                foreach ($value as $key_2 => $value_2) {
                    $stringErrors .= ' ' . ucfirst($key_2) . '  ' . $value_2;
                }
            }

            $this->Flash->error(__($stringErrors));
        }

        $this->set(compact('user'));
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
            'contain' => ['TimeZones', 'Permissions', 'Addresses', 'Requests', 'UserRatings', 'UserRequirements'],
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
        $timeZones = $this->Users->TimeZones->find('list', ['limit' => 200])->all();
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'timeZones', 'permissions'));
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
        $user = $this->Users->get($id, [
            'contain' => ['Permissions'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $timeZones = $this->Users->TimeZones->find('list', ['limit' => 200])->all();
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'timeZones', 'permissions'));
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
}
