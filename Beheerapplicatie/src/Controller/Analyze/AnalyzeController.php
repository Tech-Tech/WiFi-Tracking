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
    public function index($location_id = null, $begin_date = null, $end_date = null)
    {
        if ($begin_date != null && $end_date != null && $location_id != null) {
            $tracked_devices_table = TableRegistry::get('tracked_devices');
            $devices = $tracked_devices_table->find('DevicesInLocationByDate', [
                'location_id' => 1,
                'begin_date' => "'" . $begin_date . "'",
                'end_date' => "'" . $end_date . "'"
            ]);
        }

        else {
//            $begin_date = null;
//            $end_date = null;
//            $devices = null;

            $begin_date ='2016-05-29 00:00:00';
            $end_date = '2016-05-31 14:00:00';
            $tracked_devices_table = TableRegistry::get('tracked_devices');
            $devices = $tracked_devices_table->find('DevicesInLocationByDate', [
                'location_id' => 5,
                'begin_date' => "'" . $begin_date . "'",
                'end_date' => "'" . $end_date . "'"
            ]);
        }

        $locations_table = TableRegistry::get('locations');
        $locations = $locations_table->find('list');
        $this->set('locations', $locations);
        $this->set('devices', $devices);
        $this->set('begin_date', $begin_date);
        $this->set('end_date', $end_date);
        $this->set('_serialize', ['devices']);
    }
}
