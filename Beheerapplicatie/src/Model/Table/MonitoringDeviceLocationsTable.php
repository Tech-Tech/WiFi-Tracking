<?php
namespace App\Model\Table;

use App\Model\Entity\MonitoringDeviceLocation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MonitoringDeviceLocations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $MonitoringDevices
 */
class MonitoringDeviceLocationsTable extends Table
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

        $this->table('monitoring_device_locations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MonitoringDevices', [
            'foreignKey' => 'monitoring_device_id',
            'joinType' => 'INNER'
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
            ->dateTime('begin_date')
            ->requirePresence('begin_date', 'create')
            ->notEmpty('begin_date');

        $validator
            ->dateTime('end_date')
            ->allowEmpty('end_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['monitoring_device_id'], 'MonitoringDevices'));
        return $rules;
    }

    /**
     * Find all monitoring device locations which are currently connected to any location.
     *
     * @return array
     * @author Frank Schutte
     */
    public function findCurrent() {
        $current_time = gmdate('Y-m-d H:i:s');
        $monitoring_device_locations = $this->find('all', [
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
        return $current_monitoring_device_locations;
    }
}
