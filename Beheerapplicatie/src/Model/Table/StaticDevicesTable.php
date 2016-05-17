<?php
namespace App\Model\Table;

use App\Model\Entity\StaticDevice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StaticDevices Model
 *
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
        $this->displayField('name');
        $this->primaryKey('mac_address');
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
            ->allowEmpty('mac_address', 'create');

        $validator
            ->requirePresence('device_type', 'create')
            ->notEmpty('device_type');

        $validator
            ->requirePresence('vendor', 'create')
            ->notEmpty('vendor');

        $validator
            ->allowEmpty('name');

        return $validator;
    }
}