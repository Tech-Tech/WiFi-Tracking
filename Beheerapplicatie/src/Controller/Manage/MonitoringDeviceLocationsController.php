<?php
namespace App\Controller\Manage;

/**
 * MonitoringDeviceLocations Controller
 *
 * @property \App\Model\Table\MonitoringDeviceLocationsTable $MonitoringDeviceLocations
 */
class MonitoringDeviceLocationsController extends ManageController
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
            'contain' => ['Locations', 'MonitoringDevices']
        ];
        $monitoringDeviceLocations = $this->paginate($this->MonitoringDeviceLocations);

        $this->set(compact('monitoringDeviceLocations'));
        $this->set('_serialize', ['monitoringDeviceLocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Monitoring Device Location id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $monitoringDeviceLocation = $this->MonitoringDeviceLocations->get($id, [
            'contain' => ['Locations', 'MonitoringDevices']
        ]);

        $this->set('monitoringDeviceLocation', $monitoringDeviceLocation);
        $this->set('_serialize', ['monitoringDeviceLocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add($id = null)
    {
        $monitoringDeviceLocation = $this->MonitoringDeviceLocations->newEntity();
        if ($this->request->is('post')) {
            if($this->request->data['unknown_end_date'] == 1) {
                $this->request->data['end_date'] = null;
            }
            $monitoringDeviceLocation = $this->MonitoringDeviceLocations->patchEntity($monitoringDeviceLocation, $this->request->data);
            if ($this->MonitoringDeviceLocations->save($monitoringDeviceLocation)) {
                $this->Flash->success(__('The monitoring device location has been saved.'));
                return $this->redirect(['controller' => 'Locations', 'action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The monitoring device location could not be saved. Please, try again.'));
            }
        }
        $location = $this->MonitoringDeviceLocations->Locations->get($id);
        $monitoringDevices = $this->MonitoringDeviceLocations->MonitoringDevices->find('list', ['limit' => 200]);
        $this->set(compact('monitoringDeviceLocation', 'location', 'monitoringDevices'));
        $this->set('_serialize', ['monitoringDeviceLocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Monitoring Device Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $monitoringDeviceLocation = $this->MonitoringDeviceLocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
	        if($this->request->data['unknown_end_date'] == 1) {
		        $this->request->data['end_date'] = null;
	        }
            $monitoringDeviceLocation = $this->MonitoringDeviceLocations->patchEntity($monitoringDeviceLocation, $this->request->data);
            if ($this->MonitoringDeviceLocations->save($monitoringDeviceLocation)) {
                $this->Flash->success(__('The monitoring device location has been saved.'));
	            return $this->redirect(['controller' => 'Locations', 'action' => 'view', $monitoringDeviceLocation->location_id]);
            } else {
                $this->Flash->error(__('The monitoring device location could not be saved. Please, try again.'));
            }
        }
	    $location = $this->MonitoringDeviceLocations->Locations->get($monitoringDeviceLocation->location_id);
	    $monitoringDevice = $this->MonitoringDeviceLocations->MonitoringDevices->get($monitoringDeviceLocation->monitoring_device_id);
	    $this->set(compact('monitoringDeviceLocation', 'location', 'monitoringDevice'));
        $this->set('_serialize', ['monitoringDeviceLocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Monitoring Device Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monitoringDeviceLocation = $this->MonitoringDeviceLocations->get($id);
        if ($this->MonitoringDeviceLocations->delete($monitoringDeviceLocation)) {
            $this->Flash->success(__('The monitoring device location has been deleted.'));
        } else {
            $this->Flash->error(__('The monitoring device location could not be deleted. Please, try again.'));
        }
	    return $this->redirect(['controller' => 'Locations', 'action' => 'index']);
    }
}
