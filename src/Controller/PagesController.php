<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
        $this->loadComponent('Upload');
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
        $page = $this->Pages->find('all')->where(['Pages.active' => 1]);
        
        $pages = $this->paginate($page);

        $this->set(compact('pages'));
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
            'conditions' => ['Pages.active' => 1],
            'contain' => ['PagesPhotos']
        ]);

        $this->set('page', $page);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {

            $data  = $this->request->getData();
            $page->title = $data['title'];
            $page->text  = $data['text'];
            $page->slug  = $data['slug'];
            //echo count($data['extra']);die();
            if(!empty($data['photo']['name'])){
                $path = '/page_pic/'; // /Webroot/public/page_pic/
                $this->Upload->setPath($path);
                $page->photo = $this->Upload->copyUploadedFile($data['photo'], '');                     
            }

            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));
                //fotos extras
                $this->loadModel('PagesPhotos');
                foreach ($data['extra'] as $photos) :
                    
                    if (count($data['extra']) > 5 ) : $this->Flash->error(__('Quantidade inadequada de imagens extras.')); break; endif;
                        
                    if (!empty($photos['name'])) :
                        $path = '/page_pic/'; 
                        $this->Upload->setPath($path);

                        $extra_photo = $this->PagesPhotos->newEntity();
                        $extra_photo->page_id = $page->id;
                        $extra_photo->photo = $this->Upload->copyUploadedFile($photos, ''); 
                        if (!$this->PagesPhotos->save($extra_photo)) {
                           $this->Flash->error(__('Algumas imagens não foram salvas. Por favor, verifique na edição da página'));
                        }
                        // print_r($this->Upload->getLog());
                    endif;
                endforeach;

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro em salvar a página. Por favor, tente novamente.'));
        }
        $this->set(compact('page'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // $page = $this->Pages->get($id, [
        //     'contain' => ['PagesPhotos']
        // ]);
        $page = $this->Pages->find('all')->contain(['PagesPhotos'])
        ->select(['id', 'title', 'text', 'slug', 'photo'])
        ->where(['Pages.id' => $id,'Pages.active' => 1])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data  = $this->request->getData();
            $page->title = $data['title'];
            $page->text  = $data['text'];
            $page->slug  = $data['slug'];

            if(!empty($data['photo']['name'])){
                $path = '/page_pic/'; // /Webroot/public/page_pic/
                $this->Upload->setPath($path);
                $page->photo = $this->Upload->copyUploadedFile($data['photo'], '');                     
            }
            
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('informações da página atualizadas.'));

                //fotos extras
                $this->loadModel('PagesPhotos');
                
                $sent  = count($data['extra']);
                
                $extra = count($page->pages_photos);

                foreach ($data['extra'] as $photos) :
                    
                    if ($sent > 5 || $extra == 5 || $extra+$sent > 5) : $this->Flash->error(__('Quantidade inadequada de imagens extras.')); break; endif;
                        
                    if (!empty($photos['name'])) :
                        $path = '/page_pic/'; 
                        $this->Upload->setPath($path);

                        $extra_photo = $this->PagesPhotos->newEntity();
                        $extra_photo->page_id = $page->id;
                        $extra_photo->photo = $this->Upload->copyUploadedFile($photos, '');

                        if ($this->Upload->verifyUpload($photos) || !$this->PagesPhotos->save($extra_photo)) {
                           $this->Flash->error(__('Algumas imagens não foram salvas. Por favor, verifique na edição da página'));
                        }
                        
                    endif;
                endforeach;

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro em salvar a página. Por favor, tente novamente.'));
        }
        $fotooooos = count($page->pages_photos);
        $this->set(compact('page'));
        $this->set(compact('fotooooos'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        $page->active = 0;
        if ($this->Pages->save($page)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
