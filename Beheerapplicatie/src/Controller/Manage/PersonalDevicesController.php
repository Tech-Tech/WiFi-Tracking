<?php
namespace App\Controller\Manage;

/**
 * PersonalDevices Controller
 *
 * @property \App\Model\Table\PersonalDevicesTable $PersonalDevices
 */
class PersonalDevicesController extends ManageController
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
        $this->paginate = [
            'contain' => ['Persons']
        ];
        $personalDevices = $this->paginate($this->PersonalDevices);

        $this->set(compact('personalDevices'));
        $this->set('_serialize', ['personalDevices']);
    }

    /**
     * View method
     *
     * @param string|null $id Personal Device id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $personalDevice = $this->PersonalDevices->get($id, [
            'contain' => ['Persons']
        ]);

        $this->set('personalDevice', $personalDevice);
        $this->set('_serialize', ['personalDevice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $personalDevice = $this->PersonalDevices->newEntity();
        if ($this->request->is('post')) {
            $personalDevice = $this->PersonalDevices->patchEntity($personalDevice, $this->request->data);
            if ($this->PersonalDevices->save($personalDevice)) {
                $this->Flash->success(__('The personal device has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The personal device could not be saved. Please, try again.'));
            }
        }
        $persons = $this->PersonalDevices->Persons->find('list', ['limit' => 200]);
        $this->set(compact('personalDevice', 'persons'));
        $this->set('_serialize', ['personalDevice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Personal Device id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $personalDevice = $this->PersonalDevices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personalDevice = $this->PersonalDevices->patchEntity($personalDevice, $this->request->data);
            if ($this->PersonalDevices->save($personalDevice)) {
                $this->Flash->success(__('The personal device has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The personal device could not be saved. Please, try again.'));
            }
        }
        $persons = $this->PersonalDevices->Persons->find('list', ['limit' => 200]);
        $this->set(compact('personalDevice', 'persons'));
        $this->set('_serialize', ['personalDevice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Personal Device id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personalDevice = $this->PersonalDevices->get($id);
        if ($this->PersonalDevices->delete($personalDevice)) {
            $this->Flash->success(__('The personal device has been deleted.'));
        } else {
            $this->Flash->error(__('The personal device could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
