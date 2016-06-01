<?php
namespace App\Controller\Manage;

/**
 * ReceivedRequests Controller
 *
 * @property \App\Model\Table\ReceivedRequestsTable $ReceivedRequests
 */
class ReceivedRequestsController extends ManageController
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
            'contain' => ['MonitoringDevices']
        ];
        $receivedRequests = $this->paginate($this->ReceivedRequests);

        $this->set(compact('receivedRequests'));
        $this->set('_serialize', ['receivedRequests']);
    }

    /**
     * View method
     *
     * @param string|null $id Received Request id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $receivedRequest = $this->ReceivedRequests->get($id, [
            'contain' => ['MonitoringDevices']
        ]);

        $this->set('receivedRequest', $receivedRequest);
        $this->set('_serialize', ['receivedRequest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $receivedRequest = $this->ReceivedRequests->newEntity();
        if ($this->request->is('post')) {
            $receivedRequest = $this->ReceivedRequests->patchEntity($receivedRequest, $this->request->data);
            if ($this->ReceivedRequests->save($receivedRequest)) {
                $this->Flash->success(__('The received request has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The received request could not be saved. Please, try again.'));
            }
        }
        $monitoringDevices = $this->ReceivedRequests->MonitoringDevices->find('list', ['limit' => 200]);
        $this->set(compact('receivedRequest', 'monitoringDevices'));
        $this->set('_serialize', ['receivedRequest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Received Request id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $receivedRequest = $this->ReceivedRequests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receivedRequest = $this->ReceivedRequests->patchEntity($receivedRequest, $this->request->data);
            if ($this->ReceivedRequests->save($receivedRequest)) {
                $this->Flash->success(__('The received request has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The received request could not be saved. Please, try again.'));
            }
        }
        $monitoringDevices = $this->ReceivedRequests->MonitoringDevices->find('list', ['limit' => 200]);
        $this->set(compact('receivedRequest', 'monitoringDevices'));
        $this->set('_serialize', ['receivedRequest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Received Request id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receivedRequest = $this->ReceivedRequests->get($id);
        if ($this->ReceivedRequests->delete($receivedRequest)) {
            $this->Flash->success(__('The received request has been deleted.'));
        } else {
            $this->Flash->error(__('The received request could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
