<?php
namespace App\Model\Table;

use App\Model\Entity\TrackedDevice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
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
        $this->hasOne('DeviceTypes', [
            'foreignKey' => 'id'
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
            ->notEmpty('device_type');

        $validator
            ->requirePresence('vendor', 'create')
            ->notEmpty('vendor');

        $validator
            ->allowEmpty('name');

        return $validator;
    }
}
