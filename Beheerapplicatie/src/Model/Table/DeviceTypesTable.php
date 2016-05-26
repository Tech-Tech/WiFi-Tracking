<?php
namespace App\Model\Table;

use App\Model\Entity\DeviceType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeviceTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Devices
 */
class DeviceTypesTable extends Table
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

        $this->table('device_types');
	    $this->displayField('device_type');
        $this->primaryKey('id');

        $this->belongsToMany('TrackedDevices', [
            'foreignKey' => 'device_type_id',
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
            ->requirePresence('device_type', 'create')
            ->notEmpty('device_type')
            ->add('device_type', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['device_type']));
        return $rules;
    }
}
