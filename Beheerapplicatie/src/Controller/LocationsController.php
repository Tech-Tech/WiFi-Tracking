<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 */
class LocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Wings', 'Floors', 'Rooms', 'Suffixes', 'Buildings' => ['Campuses']]
        ];

        $locations = $this->paginate($this->Locations);

	    $current_time = gmdate('Y-m-d H:i:s');
	    $monitoring_device_locations_table = TableRegistry::get('MonitoringDeviceLocations');
	    $monitoring_device_locations = $monitoring_device_locations_table->find('all', [
		    'contain' => ['MonitoringDevices']
	    ]);
	    $current_monitoring_device_locations = [];
	    $date_format = 'Y-m-d H:i:s';
        foreach($monitoring_device_locations as $monitoring_device_location) {
	        if($current_time > date_format($monitoring_device_location['begin_date'], $date_format)) {
			    if($monitoring_device_location['end_date'] == null ||
				    $current_time < date_format($monitoring_device_location['end_date'], $date_format)) {
				    array_push($current_monitoring_device_locations, $monitoring_device_location);
			    }
	        }
        }

        $this->set(compact('locations'));
	    $this->set(compact('current_monitoring_device_locations'));
        $this->set('_serialize', ['locations']);
    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
	    $location = $this->Locations->get($id, [
		    'contain' => ['Wings', 'Floors', 'Rooms', 'Suffixes', 'Buildings' => ['Campuses'], 'MonitoringDeviceLocations' => ['MonitoringDevices' => ['ReceivedRequests']]]
	    ]);

	    $received_requests_table = TableRegistry::get('received_requests');
	    $received_requests = $received_requests_table->find('RelatedReceivedRequests', ['id' => $id]);

        $this->set('location', $location);
	    $this->set('received_requests', $received_requests);
        $this->set('_serialize', ['location']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $location = $this->Locations->newEntity();
        if ($this->request->is('post')) {
            $location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The location could not be saved. Please, try again.'));
            }
        }
        $wings = $this->Locations->Wings->find('list', ['limit' => 200]);
        $floors = $this->Locations->Floors->find('list', ['limit' => 200]);
        $rooms = $this->Locations->Rooms->find('list', ['limit' => 200]);
        $suffixes = $this->Locations->Suffixes->find('list', ['limit' => 200]);
        $buildings = $this->Locations->Buildings->find('list', ['limit' => 200]);
        $this->set(compact('location', 'wings', 'floors', 'rooms', 'suffixes', 'buildings'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The location could not be saved. Please, try again.'));
            }
        }
        $wings = $this->Locations->Wings->find('list', ['limit' => 200]);
        $floors = $this->Locations->Floors->find('list', ['limit' => 200]);
        $rooms = $this->Locations->Rooms->find('list', ['limit' => 200]);
        $suffixes = $this->Locations->Suffixes->find('list', ['limit' => 200]);
        $buildings = $this->Locations->Buildings->find('list', ['limit' => 200]);
        $this->set(compact('location', 'wings', 'floors', 'rooms', 'suffixes', 'buildings'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Locations->get($id);
        if ($this->Locations->delete($location)) {
            $this->Flash->success(__('The location has been deleted.'));
        } else {
            $this->Flash->error(__('The location could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
