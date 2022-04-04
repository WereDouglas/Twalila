<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Preferences Controller
 *
 * @property \App\Model\Table\PreferencesTable $Preferences
 * @method \App\Model\Entity\Preference[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreferencesController extends AppController
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
        $preferences = $this->paginate($this->Preferences);

        $this->set(compact('preferences'));
    }

    /**
     * View method
     *
     * @param string|null $id Preference id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $preference = $this->Preferences->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('preference'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $preference = $this->Preferences->newEmptyEntity();
        if ($this->request->is('post')) {
            $preference = $this->Preferences->patchEntity($preference, $this->request->getData());
            if ($this->Preferences->save($preference)) {
                $this->Flash->success(__('The preference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preference could not be saved. Please, try again.'));
        }
        $users = $this->Preferences->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('preference', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Preference id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $preference = $this->Preferences->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $preference = $this->Preferences->patchEntity($preference, $this->request->getData());
            if ($this->Preferences->save($preference)) {
                $this->Flash->success(__('The preference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preference could not be saved. Please, try again.'));
        }
        $users = $this->Preferences->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('preference', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Preference id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preference = $this->Preferences->get($id);
        if ($this->Preferences->delete($preference)) {
            $this->Flash->success(__('The preference has been deleted.'));
        } else {
            $this->Flash->error(__('The preference could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
