<?php
namespace App\Controller\Manage;

/**
 * Buildings Controller
 *
 * @property \App\Model\Table\BuildingsTable $Buildings
 */
class BuildingsController extends ManageController
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
            'contain' => ['Addresses', 'Campuses']
        ];
        $buildings = $this->paginate($this->Buildings);

        $this->set(compact('buildings'));
        $this->set('_serialize', ['buildings']);
    }

    /**
     * View method
     *
     * @param string|null $id Building id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function view($id = null)
    {
        $building = $this->Buildings->get($id, [
            'contain' => ['Addresses', 'Campuses', 'Locations' => ['Wings', 'Floors', 'Rooms', 'Suffixes']]
        ]);

        $this->set('building', $building);
        $this->set('_serialize', ['building']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Frank Schutte
     */
    public function add()
    {
        $building = $this->Buildings->newEntity();
        if ($this->request->is('post')) {
            $building = $this->Buildings->patchEntity($building, $this->request->data);
            if ($this->Buildings->save($building)) {
                $this->Flash->success(__('The building has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The building could not be saved. Please, try again.'));
            }
        }
        $addresses = $this->Buildings->Addresses->find('list', ['limit' => 200]);
        $campuses = $this->Buildings->Campuses->find('list', ['limit' => 200]);
        $this->set(compact('building', 'addresses', 'campuses'));
        $this->set('_serialize', ['building']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Building id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * @author Frank Schutte
     */
    public function edit($id = null)
    {
        $building = $this->Buildings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $building = $this->Buildings->patchEntity($building, $this->request->data);
            if ($this->Buildings->save($building)) {
                $this->Flash->success(__('The building has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The building could not be saved. Please, try again.'));
            }
        }
        $addresses = $this->Buildings->Addresses->find('list', ['limit' => 200]);
        $campuses = $this->Buildings->Campuses->find('list', ['limit' => 200]);
        $this->set(compact('building', 'addresses', 'campuses'));
        $this->set('_serialize', ['building']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Building id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Frank Schutte
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $building = $this->Buildings->get($id);
        if ($this->Buildings->delete($building)) {
            $this->Flash->success(__('The building has been deleted.'));
        } else {
            $this->Flash->error(__('The building could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
