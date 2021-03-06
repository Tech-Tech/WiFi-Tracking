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
     * Method to fetch data to create a graph to display all devices in a location.
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
            && isset($this->request->data['min_probe_requests'])
            && isset($this->request->data['include_static_devices']))
        {
            $begin_date = $this->request->data['begin_date'];
            $end_date = $this->request->data['end_date'];
            $location_id = $this->request->data['locations'];
            $step = $this->request->data['step'];
            $min_signal_strength = $this->request->data['min_signal_strength'];
            $min_probe_requests = $this->request->data['min_probe_requests'];
            $include_static_devices = $this->request->data(['include_static_devices']);

            $tracked_devices_table = TableRegistry::get('tracked_devices');
            $devices = $tracked_devices_table->find('DevicesInLocationByDate', [
                'location_id' => $location_id,
                'begin_date' => '\'' . $begin_date . '\'',
                'end_date' => '\'' . $end_date . '\'',
                'multiplier' => ($step/60),
                'min_signal_strength' => $min_signal_strength,
                'min_probe_requests' => $min_probe_requests,
                'include_static_devices' => $include_static_devices
            ]);
        }

        else {
            $begin_date = null;
            $end_date = null;
            $devices = null;
            $min_signal_strength = null;
            $min_probe_requests = null;
            $include_static_devices = null;

        }

        $locations_table = TableRegistry::get('locations');
        $locations = $locations_table->find('list');
        $this->set('locations', $locations);
        $this->set('devices', $devices);
    }

    /**
     * Method to fetch data to create a graph to display vendors.
     *
     * @return \Cake\Network\Response|null
     * @author Albert Veldman
     */
    public function vendors(){
        $tracked_devices_table = TableRegistry::get('tracked_devices');
        if (isset($this->request->data['vendors'])
            && isset($this->request->data['begin_date'])
            && isset($this->request->data['end_date'])
            && isset($this->request->data['min_signal_strength']))
        {
            $begin_date = $this->request->data['begin_date'];
            $end_date = $this->request->data['end_date'];
            $min_signal_strength = $this->request->data['min_signal_strength'];
            $chosen_vendors = $this->request->data['vendors'];
            $vendor_requests = $tracked_devices_table->find('ProbeRequestsByVendor', [
                'vendors' => $chosen_vendors,
                'begin_date' => "'" . $begin_date . "'",
                'end_date' => "'" . $end_date . "'",
                'min_signal_strength' => $min_signal_strength,
            ]);
        }

        else {
            $begin_date = null;
            $end_date = null;
            $min_signal_strength = null;
            $vendor_requests = null;
        }

        $vendors = $tracked_devices_table->find('AllVendors');

        $this->set('vendors', $vendors);
        $this->set('vendor_requests', $vendor_requests);
    }

	/**
	 * Method to fetch data to create a graph to display amount of persons in a location.
	 *
	 * @return \Cake\Network\Response|null
	 * @author Frank Schutte
	 */
	public function persons() {
		$locations_table = TableRegistry::get('locations');
		if(isset($this->request->data['begin_date'])
			&& isset($this->request->data['end_date'])
			&& isset($this->request->data['locations'])
			&& isset($this->request->data['step'])
			&& isset($this->request->data['min_signal_strength'])
			&& isset($this->request->data['min_probe_requests'])) {

			$location_id = $this->request->data['locations'];
			$begin_date = $this->request->data['begin_date'];
			$end_date = $this->request->data['end_date'];
			$step = $this->request->data['step'];
			$min_signal_strength = $this->request->data['min_signal_strength'];
			$min_probe_requests = $this->request->data['min_probe_requests'];

			$persons = $locations_table->find('personsInLocation', [
				'location_id' => $location_id,
				'begin_date' => '\'' . $begin_date . '\'',
				'end_date' => '\'' . $end_date . '\'',
				'multiplier' => ($step / 60),
				'min_signal_strength' => $min_signal_strength,
				'min_probe_requests' => $min_probe_requests
			]);
		}
		else {
			$persons = null;
		}

		$locations_table = TableRegistry::get('locations');
		$locations = $locations_table->find('list');
		$this->set('locations', $locations);
		$this->set('persons', $persons);
	}
}
