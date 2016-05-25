<?php
namespace App\Model\Table;

use App\Model\Entity\PersonalDevice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonalDevices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TrackedDevices
 * @property \Cake\ORM\Association\BelongsTo $Persons
 */
class PersonalDevicesTable extends Table
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

        $this->table('personal_devices');
        $this->displayField('name');
        $this->primaryKey('mac_address');

        $this->belongsTo('TrackedDevices', [
            'foreignKey' => 'tracked_device_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
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
        $rules->add($rules->existsIn(['person_id'], 'Persons'));
        return $rules;
    }
}
