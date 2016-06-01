<?php
namespace App\Controller\Manage;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 */
class PersonsController extends ManageController
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
        $persons = $this->paginate($this->Persons);

        $this->set(compact('persons'));
        $this->set('_serialize', ['persons']);
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => ['PersonRoles', 'PersonalDevices']
        ]);

        $this->set('person', $person);
        $this->set('_serialize', ['person']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $person = $this->Persons->newEntity();
        if ($this->request->is('post')) {
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Persons->get($id);
        if ($this->Persons->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
