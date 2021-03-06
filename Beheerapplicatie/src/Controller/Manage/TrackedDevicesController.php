<?php
namespace App\Controller\Manage;

use Cake\ORM\TableRegistry;

/**
 * TrackedDevices Controller
 *
 * @property \App\Model\Table\TrackedDevicesTable $TrackedDevices
 */
class TrackedDevicesController extends ManageController
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
        $trackedDevices = $this->paginate($this->TrackedDevices->find('all', [
            'contain' => ['DeviceTypes']
        ]));

        $this->set(compact('trackedDevices'));
        $this->set('_serialize', ['trackedDevices']);
    }

    /**
     * View method
     *
     * @param string|null $id Tracked Device id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $trackedDevice = $this->TrackedDevices->get($id, [
            'contain' => []
        ]);

        $this->set('trackedDevice', $trackedDevice);
        $this->set('_serialize', ['trackedDevice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $trackedDevice = $this->TrackedDevices->newEntity();
        if ($this->request->is('post')) {
            $trackedDevice = $this->TrackedDevices->patchEntity($trackedDevice, $this->request->data);
            if ($this->TrackedDevices->save($trackedDevice)) {
                $this->Flash->success(__('The tracked device has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tracked device could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('trackedDevice'));
        $this->set('_serialize', ['trackedDevice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tracked Device id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $trackedDevice = $this->TrackedDevices->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
	        $trackedDevice = $this->TrackedDevices->patchEntity($trackedDevice, $this->request->data);
            if ($this->TrackedDevices->save($trackedDevice)) {
                $this->Flash->success(__('The tracked device has been saved.'));
                return $this->redirect(['controller' => 'StaticDevices', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The tracked device could not be saved. Please, try again.'));
            }
        }
	    $device_types_table = TableRegistry::get('device_types');
	    $device_types = $device_types_table->find('list')->all();
	    $this->set('device_types', $device_types);
        $this->set(compact('trackedDevice'));
        $this->set('_serialize', ['trackedDevice', 'device_types']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tracked Device id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trackedDevice = $this->TrackedDevices->get($id);
        if ($this->TrackedDevices->delete($trackedDevice)) {
            $this->Flash->success(__('The tracked device has been deleted.'));
        } else {
            $this->Flash->error(__('The tracked device could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
