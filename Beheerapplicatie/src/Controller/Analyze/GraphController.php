<?php
namespace App\Controller\Analyze;

use Cake\ORM\TableRegistry;

/**
 * Graph Controller
 */
class GraphController extends AnalyzeController
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
     * View devices graph method
     *
     * @return \Cake\Network\Response|null
     * @author Albert Veldman
     */
    public function devices()
    {
        if (isset($this->request->data['begin_date'])
            && isset($this->request->data['end_date'])
            && isset($this->request->data['locations'])
            && isset($this->request->data['step'])
            && isset($this->request->data['min_signal_strength'])
            && isset($this->request->data['min_probe_requests']))
        {
            $begin_date = $this->request->data['begin_date'];
            $end_date = $this->request->data['end_date'];
            $location_id = $this->request->data['locations'];
            $step = $this->request->data['step'];
            $min_signal_strength = $this->request->data['min_signal_strength'];
            $min_probe_requests = $this->request->data['min_probe_requests'];

            $tracked_devices_table = TableRegistry::get('tracked_devices');
            $devices = $tracked_devices_table->find('DevicesInLocationByDate', [
                'location_id' => $location_id,
                'begin_date' => "'" . $begin_date . "'",
                'end_date' => "'" . $end_date . "'",
                'multiplier' => ($step/60),
                'min_signal_strength' => $min_signal_strength,
                'min_probe_requests' => $min_probe_requests
            ]);
        }

        else {
            $begin_date = null;
            $end_date = null;
            $devices = null;
            $min_signal_strength = null;
            $min_probe_requests = null;
        }

        $locations_table = TableRegistry::get('locations');
        $locations = $locations_table->find('list');
        $this->set('locations', $locations);
        $this->set('devices', $devices);
        $this->set('begin_date', $begin_date);
        $this->set('end_date', $end_date);
        $this->set('min_signal_strength', $min_signal_strength);
        $this->set('min_probe_requests', $min_probe_requests);
        $this->set('_serialize', ['devices']);
    }

    public function vendors(){
        $locations_table = TableRegistry::get('locations');
        $locations = $locations_table->find('list');
        $this->set('locations', $locations);
    }
}
