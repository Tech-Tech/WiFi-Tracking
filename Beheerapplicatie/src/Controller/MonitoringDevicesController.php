<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MonitoringDevices Controller
 *
 * @property \App\Model\Table\MonitoringDevicesTable $MonitoringDevices
 */
class MonitoringDevicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $monitoringDevices = $this->paginate($this->MonitoringDevices);

        $this->set(compact('monitoringDevices'));
        $this->set('_serialize', ['monitoringDevices']);
    }

    /**
     * View method
     *
     * @param string|null $id Monitoring Device id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monitoringDevice = $this->MonitoringDevices->get($id, [
            'contain' => ['MonitoringDeviceLocations', 'ReceivedRequests']
        ]);

        $this->set('monitoringDevice', $monitoringDevice);
        $this->set('_serialize', ['monitoringDevice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $monitoringDevice = $this->MonitoringDevices->newEntity();
        if ($this->request->is('post')) {
            $monitoringDevice = $this->MonitoringDevices->patchEntity($monitoringDevice, $this->request->data);
            if ($this->MonitoringDevices->save($monitoringDevice)) {
                $this->Flash->success(__('The monitoring device has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The monitoring device could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('monitoringDevice'));
        $this->set('_serialize', ['monitoringDevice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Monitoring Device id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $monitoringDevice = $this->MonitoringDevices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monitoringDevice = $this->MonitoringDevices->patchEntity($monitoringDevice, $this->request->data);
            if ($this->MonitoringDevices->save($monitoringDevice)) {
                $this->Flash->success(__('The monitoring device has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The monitoring device could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('monitoringDevice'));
        $this->set('_serialize', ['monitoringDevice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Monitoring Device id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monitoringDevice = $this->MonitoringDevices->get($id);
        if ($this->MonitoringDevices->delete($monitoringDevice)) {
            $this->Flash->success(__('The monitoring device has been deleted.'));
        } else {
            $this->Flash->error(__('The monitoring device could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
