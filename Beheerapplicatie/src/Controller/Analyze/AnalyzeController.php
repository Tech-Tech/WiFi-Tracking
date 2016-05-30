<?php
namespace App\Controller\Analyze;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Manage Controller
 */
class AnalyzeController extends AppController
{

    /**
     * Initialize method
     *
     * @author Albert Veldman
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('analyze');

    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     * @author Albert Veldman
     */
    public function index()
    {
        $tracked_devices_table = TableRegistry::get('tracked_devices');
        $devices = $tracked_devices_table->find('DevicesInLocationByDate', [
            'location_id' => 1,
            'begin_date' => '\'2016-05-30 10:00:00\'',
            'end_date' => '\'2016-05-30 13:00:00\''
        ]);
        $this->set('devices', $devices);
        $this->set('_serialize', ['devices']);
    }
}
