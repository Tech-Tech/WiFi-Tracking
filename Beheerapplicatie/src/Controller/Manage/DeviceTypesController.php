<?php
namespace App\Controller\Manage;

/**
 * DeviceTypes Controller
 *
 * @property \App\Model\Table\DeviceTypesTable $DeviceTypes
 */
class DeviceTypesController extends ManageController
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
        $deviceTypes = $this->paginate($this->DeviceTypes);

        $this->set(compact('deviceTypes'));
        $this->set('_serialize', ['deviceTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Device Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $deviceType = $this->DeviceTypes->get($id);

        $this->set('deviceType', $deviceType);
        $this->set('_serialize', ['deviceType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $deviceType = $this->DeviceTypes->newEntity();
        if ($this->request->is('post')) {
            $deviceType = $this->DeviceTypes->patchEntity($deviceType, $this->request->data);
            if ($this->DeviceTypes->save($deviceType)) {
                $this->Flash->success(__('The device type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The device type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deviceType'));
        $this->set('_serialize', ['deviceType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Device Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $deviceType = $this->DeviceTypes->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deviceType = $this->DeviceTypes->patchEntity($deviceType, $this->request->data);
            if ($this->DeviceTypes->save($deviceType)) {
                $this->Flash->success(__('The device type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The device type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deviceType'));
        $this->set('_serialize', ['deviceType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Device Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deviceType = $this->DeviceTypes->get($id);
        if ($this->DeviceTypes->delete($deviceType)) {
            $this->Flash->success(__('The device type has been deleted.'));
        } else {
            $this->Flash->error(__('The device type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
