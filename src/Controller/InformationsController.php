<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 *
 * @method \App\Model\Entity\Information[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationsController extends AppController
{
     public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $informations = $this->paginate($this->Informations);

        $this->set(compact('informations'));
        return $this->redirect(['action' => 'add']);
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => []
        ]);

        $this->set('information', $information);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $information = $this->Informations->newEntity();
        if ($this->request->is('post')) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        //Colunas
        $cols = ['id'/*,'adress', 'twitter','instgram','facebook','youtube', 'phone','email'*/];

        if ($information = $this->Informations->find('all')->select($cols)->first()) {
             $this->set('information', $information);
             return $this->redirect(['action' => 'edit', $information->id]);
        } 
    }

    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));

                return $this->redirect(['action' => 'edit', $information->id]);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $this->set(compact('information'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $information = $this->Informations->get($id);
        if ($this->Informations->delete($information)) {
            $this->Flash->success(__('The information has been deleted.'));
        } else {
            $this->Flash->error(__('The information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }
}
