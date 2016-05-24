<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Floors Controller
 *
 * @property \App\Model\Table\FloorsTable $Floors
 */
class FloorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     * @author Frank Schutte
     */
    public function index()
    {
        $floors = $this->paginate($this->Floors);

        $this->set(compact('floors'));
        $this->set('_serialize', ['floors']);
    }

    /**
     * View method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $floor = $this->Floors->get($id, [
            'contain' => ['Locations']
        ]);

        $this->set('floor', $floor);
        $this->set('_serialize', ['floor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $floor = $this->Floors->newEntity();
        if ($this->request->is('post')) {
            $floor = $this->Floors->patchEntity($floor, $this->request->data);
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('The floor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The floor could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('floor'));
        $this->set('_serialize', ['floor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $floor = $this->Floors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $floor = $this->Floors->patchEntity($floor, $this->request->data);
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('The floor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The floor could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('floor'));
        $this->set('_serialize', ['floor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $floor = $this->Floors->get($id);
        if ($this->Floors->delete($floor)) {
            $this->Flash->success(__('The floor has been deleted.'));
        } else {
            $this->Flash->error(__('The floor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
