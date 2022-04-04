<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PackageImages Controller
 *
 * @property \App\Model\Table\PackageImagesTable $PackageImages
 * @method \App\Model\Entity\PackageImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PackageImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Packages'],
        ];
        $packageImages = $this->paginate($this->PackageImages);

        $this->set(compact('packageImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Package Image id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $packageImage = $this->PackageImages->get($id, [
            'contain' => ['Packages'],
        ]);

        $this->set(compact('packageImage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $packageImage = $this->PackageImages->newEmptyEntity();
        if ($this->request->is('post')) {
            $packageImage = $this->PackageImages->patchEntity($packageImage, $this->request->getData());
            if ($this->PackageImages->save($packageImage)) {
                $this->Flash->success(__('The package image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The package image could not be saved. Please, try again.'));
        }
        $packages = $this->PackageImages->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('packageImage', 'packages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Package Image id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $packageImage = $this->PackageImages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $packageImage = $this->PackageImages->patchEntity($packageImage, $this->request->getData());
            if ($this->PackageImages->save($packageImage)) {
                $this->Flash->success(__('The package image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The package image could not be saved. Please, try again.'));
        }
        $packages = $this->PackageImages->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('packageImage', 'packages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Package Image id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $packageImage = $this->PackageImages->get($id);
        if ($this->PackageImages->delete($packageImage)) {
            $this->Flash->success(__('The package image has been deleted.'));
        } else {
            $this->Flash->error(__('The package image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
