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
        if (isset($this->request->data['begin_date'])
            && isset($this->request->data['end_date'])
            && isset($this->request->data['locations'])
            && isset($this->request->data['step']))
        {
            $begin_date = $this->request->data['begin_date'];
            $end_date = $this->request->data['end_date'];
            $location_id = $this->request->data['locations'];
            $step = $this->request->data['step'];
            $min_signal_strength = $this->request->data['min_signal_strength'];

            $tracked_devices_table = TableRegistry::get('tracked_devices');
            $devices = $tracked_devices_table->find('DevicesInLocationByDate', [
                'location_id' => $location_id,
                'begin_date' => "'" . $begin_date . "'",
                'end_date' => "'" . $end_date . "'",
                'multiplier' => ($step/60),
                'min_signal_strength' => $min_signal_strength
            ]);
        }

        else {
            $begin_date = null;
            $end_date = null;
            $devices = null;
            $min_signal_strength = null;
        }

        $locations_table = TableRegistry::get('locations');
        $locations = $locations_table->find('list');
        $this->set('locations', $locations);
        $this->set('devices', $devices);
        $this->set('begin_date', $begin_date);
        $this->set('end_date', $end_date);
        $this->set('min_signal_strength', $min_signal_strength);
        $this->set('_serialize', ['devices']);
    }
}
