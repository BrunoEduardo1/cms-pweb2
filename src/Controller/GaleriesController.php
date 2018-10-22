<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Galeries Controller
 *
 * @property \App\Model\Table\GaleriesTable $Galeries
 *
 * @method \App\Model\Entity\Galery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GaleriesController extends AppController
{   
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
        // permitir apenas estas ações com  o user sem login
        //$this->Auth->allow(['logout', 'cadastro']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $galeries = $this->paginate($this->Galeries);

        $this->set(compact('galeries'));
    }

    /**
     * View method
     *
     * @param string|null $id Galery id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $galery = $this->Galeries->get($id, [
            'contain' => ['GaleriesPhotos', 'GaleriesVideos']
        ]);

        $this->set('galery', $galery);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $galery = $this->Galeries->newEntity();
        if ($this->request->is('post')) {
            $galery = $this->Galeries->patchEntity($galery, $this->request->getData());
            if ($this->Galeries->save($galery)) {
                $this->Flash->success(__('The galery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The galery could not be saved. Please, try again.'));
        }
        $this->set(compact('galery'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Galery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $galery = $this->Galeries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $galery = $this->Galeries->patchEntity($galery, $this->request->getData());
            if ($this->Galeries->save($galery)) {
                $this->Flash->success(__('The galery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The galery could not be saved. Please, try again.'));
        }
        $this->set(compact('galery'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Galery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galery = $this->Galeries->get($id);
        $galery->active = 0;
        if ($this->Galeries->save($galery)) {
            $this->Flash->success(__('The galery has been deleted.'));
        } else {
            $this->Flash->error(__('The galery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
