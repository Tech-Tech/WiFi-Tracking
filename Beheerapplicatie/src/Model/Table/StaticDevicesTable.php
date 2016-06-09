<?php
namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StaticDevices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TrackedDevices
 */
class StaticDevicesTable extends Table
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

        $this->table('static_devices');
        $this->primaryKey('id');

        $this->belongsTo('TrackedDevices', [
            'foreignKey' => 'tracked_device_id',
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
		    ->notEmpty('tracked_device_id');

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
        $rules->add($rules->existsIn(['tracked_device_id'], 'TrackedDevices'));
        return $rules;
    }

    /**
     * Find all devices that are in the tracked_devices table, except the ones which are in the
     * static_devices table.
     *
     * @param Query $query
     * @param array $options
     * @return mixed
     * @author Frank Schutte
     */
    public function findNonStaticDevices(Query $query, array $options) {
        $sql = 'SELECT funcGetNonStaticDevices()';
        $connection = ConnectionManager::get('default');
        $results = $connection->execute($sql)->fetchAll('assoc');
        return $results;
    }
}
