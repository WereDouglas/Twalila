<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TimeZones Controller
 *
 * @property \App\Model\Table\TimeZonesTable $TimeZones
 * @method \App\Model\Entity\TimeZone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimeZonesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $timeZones = $this->paginate($this->TimeZones);

        $this->set(compact('timeZones'));
    }

    /**
     * View method
     *
     * @param string|null $id Time Zone id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeZone = $this->TimeZones->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('timeZone'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeZone = $this->TimeZones->newEmptyEntity();
        if ($this->request->is('post')) {
            $timeZone = $this->TimeZones->patchEntity($timeZone, $this->request->getData());
            if ($this->TimeZones->save($timeZone)) {
                $this->Flash->success(__('The time zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time zone could not be saved. Please, try again.'));
        }
        $this->set(compact('timeZone'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Zone id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeZone = $this->TimeZones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeZone = $this->TimeZones->patchEntity($timeZone, $this->request->getData());
            if ($this->TimeZones->save($timeZone)) {
                $this->Flash->success(__('The time zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time zone could not be saved. Please, try again.'));
        }
        $this->set(compact('timeZone'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Zone id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeZone = $this->TimeZones->get($id);
        if ($this->TimeZones->delete($timeZone)) {
            $this->Flash->success(__('The time zone has been deleted.'));
        } else {
            $this->Flash->error(__('The time zone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
