<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GaleriesPhotos Controller
 *
 * @property \App\Model\Table\GaleriesPhotosTable $GaleriesPhotos
 *
 * @method \App\Model\Entity\GaleriesPhoto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GaleriesPhotosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Galeries']
        ];
        $galeriesPhotos = $this->paginate($this->GaleriesPhotos);

        $this->set(compact('galeriesPhotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Galeries Photo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $galeriesPhoto = $this->GaleriesPhotos->get($id, [
            'contain' => ['Galeries']
        ]);

        $this->set('galeriesPhoto', $galeriesPhoto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $galeriesPhoto = $this->GaleriesPhotos->newEntity();
        if ($this->request->is('post')) {
            $galeriesPhoto = $this->GaleriesPhotos->patchEntity($galeriesPhoto, $this->request->getData());
            if ($this->GaleriesPhotos->save($galeriesPhoto)) {
                $this->Flash->success(__('The galeries photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The galeries photo could not be saved. Please, try again.'));
        }
        $galeries = $this->GaleriesPhotos->Galeries->find('list', ['limit' => 200]);
        $this->set(compact('galeriesPhoto', 'galeries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Galeries Photo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $galeriesPhoto = $this->GaleriesPhotos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $galeriesPhoto = $this->GaleriesPhotos->patchEntity($galeriesPhoto, $this->request->getData());
            if ($this->GaleriesPhotos->save($galeriesPhoto)) {
                $this->Flash->success(__('The galeries photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The galeries photo could not be saved. Please, try again.'));
        }
        $galeries = $this->GaleriesPhotos->Galeries->find('list', ['limit' => 200]);
        $this->set(compact('galeriesPhoto', 'galeries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Galeries Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galeriesPhoto = $this->GaleriesPhotos->get($id);
        if ($this->GaleriesPhotos->delete($galeriesPhoto)) {
            $this->Flash->success(__('The galeries photo has been deleted.'));
        } else {
            $this->Flash->error(__('The galeries photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
