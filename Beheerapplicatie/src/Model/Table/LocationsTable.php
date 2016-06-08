<?php
namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\RulesChecker;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Wings
 * @property \Cake\ORM\Association\BelongsTo $Floors
 * @property \Cake\ORM\Association\BelongsTo $Rooms
 * @property \Cake\ORM\Association\BelongsTo $Suffixes
 * @property \Cake\ORM\Association\BelongsTo $Buildings
 * @property \Cake\ORM\Association\HasMany $MonitoringDeviceLocations
 */
class LocationsTable extends Table
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

        $this->table('locations');
        $this->displayField('full_location_name');
        $this->primaryKey('id');

        $this->belongsTo('Wings', [
            'foreignKey' => 'wing_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Floors', [
            'foreignKey' => 'floor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Rooms', [
            'foreignKey' => 'room_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Suffixes', [
            'foreignKey' => 'suffix_id'
        ]);
        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MonitoringDeviceLocations', [
            'foreignKey' => 'location_id'
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
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['wing_id'], 'Wings'));
        $rules->add($rules->existsIn(['floor_id'], 'Floors'));
        $rules->add($rules->existsIn(['room_id'], 'Rooms'));
        $rules->add($rules->existsIn(['suffix_id'], 'Suffixes'));
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        return $rules;
    }

    public function findPersonsInLocation(Query $query, array $options) {
        $sql = sprintf('SELECT funcGetPersonsInLocationByDate(%d, %s, %s, %f, %d, %d)',
            $options['location_id'],
            $options['begin_date'],
            $options['end_date'],
            $options['multiplier'],
            $options['min_signal_strength'],
            $options['min_probe_requests']
        );
        $connection = ConnectionManager::get('default');
        $results = $connection->execute($sql)->fetchAll('assoc');
        return $results;
    }
}
