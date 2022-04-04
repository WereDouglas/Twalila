<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserRatings Controller
 *
 * @property \App\Model\Table\UserRatingsTable $UserRatings
 * @method \App\Model\Entity\UserRating[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserRatingsController extends AppController
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
        $userRatings = $this->paginate($this->UserRatings);

        $this->set(compact('userRatings'));
    }

    /**
     * View method
     *
     * @param string|null $id User Rating id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRating = $this->UserRatings->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userRating'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userRating = $this->UserRatings->newEmptyEntity();
        if ($this->request->is('post')) {
            $userRating = $this->UserRatings->patchEntity($userRating, $this->request->getData());
            if ($this->UserRatings->save($userRating)) {
                $this->Flash->success(__('The user rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user rating could not be saved. Please, try again.'));
        }
        $users = $this->UserRatings->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userRating', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Rating id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRating = $this->UserRatings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRating = $this->UserRatings->patchEntity($userRating, $this->request->getData());
            if ($this->UserRatings->save($userRating)) {
                $this->Flash->success(__('The user rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user rating could not be saved. Please, try again.'));
        }
        $users = $this->UserRatings->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userRating', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Rating id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userRating = $this->UserRatings->get($id);
        if ($this->UserRatings->delete($userRating)) {
            $this->Flash->success(__('The user rating has been deleted.'));
        } else {
            $this->Flash->error(__('The user rating could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
