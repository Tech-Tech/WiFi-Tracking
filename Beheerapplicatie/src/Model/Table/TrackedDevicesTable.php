<?php
namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrackedDevices Model
 *
 * @property \Cake\ORM\Association\HasMany $PersonalDevices
 * @property \Cake\ORM\Association\HasMany $ReceivedRequests
 * @property \Cake\ORM\Association\HasMany $StaticDevices
 */
class TrackedDevicesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tracked_devices');
        $this->displayField('mac_address');
        $this->primaryKey('id');

        $this->hasMany('PersonalDevices', [
            'foreignKey' => 'tracked_device_id'
        ]);
        $this->hasMany('ReceivedRequests', [
            'foreignKey' => 'tracked_device_id'
        ]);
        $this->hasMany('StaticDevices', [
            'foreignKey' => 'tracked_device_id'
        ]);
        $this->belongsTo('DeviceTypes', [
            'bindingKey' => 'id',
            'foreignKey' => 'device_type_id',
            'joinType' => 'LEFT OUTER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('device_type');

        $validator
            ->requirePresence('vendor', 'create')
            ->notEmpty('vendor');

        $validator
            ->allowEmpty('name');

        return $validator;
    }

    /**
     * Method to search all tracked_devices from which probe requests are received
     * in a specific location and between two specific dates.
     *
     * @param Query $query
     * @param array $options
     * @return mixed
     * @author Frank Schutte
     * @author Albert Veldman
     */
    public function findDevicesInLocationByDate(Query $query, array $options) {
        $sql = sprintf('SELECT funcGetDevicesInLocationByDate(%d, %s, %s, %f, %d, %d, %d)',
            $options['location_id'],
            $options['begin_date'],
            $options['end_date'],
            $options['multiplier'],
            $options['min_signal_strength'],
            $options['min_probe_requests'],
            $options['include_static_devices']);
        $connection = ConnectionManager::get('default');
        $results = $connection->execute($sql)->fetchAll('assoc');
        return $results;
    }

    /**
     * Method to search average probe requests send by devices per vendor within a given timespan.
     *
     * @param Query $query
     * @param array $options
     * @author Albert Veldman
     */
    public function findProbeRequestsByVendor(Query $query, array $options) {
        $vendors = 'ARRAY[';
        foreach ($options['vendors'] as $vendor) {
            $vendors .= '\'' . $vendor . '\',';
        }
        $vendors = substr($vendors, 0, -1);
        $vendors .= ']';

        $sql = sprintf('SELECT funcGetProbeRequestsByVendor(%s, %s, %s, %d)',
            $vendors,
            $options['begin_date'],
            $options['end_date'],
            $options['min_signal_strength']);

        $connection = ConnectionManager::get('default');
        $results = $connection->execute($sql)->fetchAll('assoc');
        return $results;
    }

    /**
     * Method to search distinct vendors in tracked_devices.
     *
     * @param Query $query
     * @author Albert Veldman
     */
    public function findAllVendors(Query $query) {
        $sql = 'SELECT DISTINCT vendor FROM tracked_devices WHERE vendor != \'Unknown\' ORDER BY vendor ASC';
        $connection = ConnectionManager::get('default');
        $results = $connection->execute($sql)->fetchAll('assoc');
        return $results;
    }
}
