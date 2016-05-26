<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * StaticDevices Controller
 *
 * @property \App\Model\Table\StaticDevicesTable $StaticDevices
 */
class StaticDevicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     * @author Frank Schutte
     */
    public function index()
    {
        $staticDevices = $this->paginate(
	        $this->StaticDevices->find('all', [
		        'contain' => ['TrackedDevices' => ['DeviceTypes']]
	        ])
        );

        $this->set(compact('staticDevices'));
        $this->set('_serialize', ['staticDevices']);
    }

    /**
     * View method
     *
     * @param string|null $id Static Device id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $staticDevice = $this->StaticDevices->get($id, [
            'contain' => []
        ]);

        $this->set('staticDevice', $staticDevice);
        $this->set('_serialize', ['staticDevice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $staticDevice = $this->StaticDevices->newEntity();
        if ($this->request->is('post')) {
	        $data = $this->request->data;
	        $static_device_data = [
		        'tracked_device_id' => $data['tracked_device_id']
	        ];
            $staticDevice = $this->StaticDevices->patchEntity($staticDevice, $static_device_data);
            if ($this->StaticDevices->save($staticDevice)) {
                $this->Flash->success(__('The static device has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The static device could not be saved. Please, try again.'));
            }
        }
	    $tracked_devices = $this->StaticDevices->find('NonStaticDevices');
	    $this->set('tracked_devices', $tracked_devices);
        $this->set(compact('staticDevice'));
        $this->set('_serialize', ['staticDevice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Static Device id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $staticDevice = $this->StaticDevices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staticDevice = $this->StaticDevices->patchEntity($staticDevice, $this->request->data);
            if ($this->StaticDevices->save($staticDevice)) {
                $this->Flash->success(__('The static device has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The static device could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('staticDevice'));
        $this->set('_serialize', ['staticDevice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Static Device id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staticDevice = $this->StaticDevices->get($id);
        if ($this->StaticDevices->delete($staticDevice)) {
            $this->Flash->success(__('The static device has been deleted.'));
        } else {
            $this->Flash->error(__('The static device could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
