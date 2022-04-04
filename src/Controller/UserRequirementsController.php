<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserRequirements Controller
 *
 * @property \App\Model\Table\UserRequirementsTable $UserRequirements
 * @method \App\Model\Entity\UserRequirement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserRequirementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $userRequirements = $this->paginate($this->UserRequirements);

        $this->set(compact('userRequirements'));
    }

    /**
     * View method
     *
     * @param string|null $id User Requirement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRequirement = $this->UserRequirements->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userRequirement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userRequirement = $this->UserRequirements->newEmptyEntity();
        if ($this->request->is('post')) {
            $userRequirement = $this->UserRequirements->patchEntity($userRequirement, $this->request->getData());
            if ($this->UserRequirements->save($userRequirement)) {
                $this->Flash->success(__('The user requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user requirement could not be saved. Please, try again.'));
        }
        $users = $this->UserRequirements->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userRequirement', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Requirement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRequirement = $this->UserRequirements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRequirement = $this->UserRequirements->patchEntity($userRequirement, $this->request->getData());
            if ($this->UserRequirements->save($userRequirement)) {
                $this->Flash->success(__('The user requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user requirement could not be saved. Please, try again.'));
        }
        $users = $this->UserRequirements->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userRequirement', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Requirement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userRequirement = $this->UserRequirements->get($id);
        if ($this->UserRequirements->delete($userRequirement)) {
            $this->Flash->success(__('The user requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The user requirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
