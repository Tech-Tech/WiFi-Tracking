<?php
namespace App\Controller\Manage;


/**
 * Suffixes Controller
 *
 * @property \App\Model\Table\SuffixesTable $Suffixes
 */
class SuffixesController extends ManageController
{
    /**
     * Initialize method
     *
     * @author Albert Veldman
     */
    public function initialize()
    {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     * @author Frank Schutte
     */
    public function index()
    {
        $suffixes = $this->paginate($this->Suffixes);

        $this->set(compact('suffixes'));
        $this->set('_serialize', ['suffixes']);
    }

    /**
     * View method
     *
     * @param string|null $id Suffix id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $suffix = $this->Suffixes->get($id, [
            'contain' => ['Locations']
        ]);

        $this->set('suffix', $suffix);
        $this->set('_serialize', ['suffix']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $suffix = $this->Suffixes->newEntity();
        if ($this->request->is('post')) {
            $suffix = $this->Suffixes->patchEntity($suffix, $this->request->data);
            if ($this->Suffixes->save($suffix)) {
                $this->Flash->success(__('The suffix has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The suffix could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('suffix'));
        $this->set('_serialize', ['suffix']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Suffix id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $suffix = $this->Suffixes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suffix = $this->Suffixes->patchEntity($suffix, $this->request->data);
            if ($this->Suffixes->save($suffix)) {
                $this->Flash->success(__('The suffix has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The suffix could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('suffix'));
        $this->set('_serialize', ['suffix']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Suffix id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suffix = $this->Suffixes->get($id);
        if ($this->Suffixes->delete($suffix)) {
            $this->Flash->success(__('The suffix has been deleted.'));
        } else {
            $this->Flash->error(__('The suffix could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
