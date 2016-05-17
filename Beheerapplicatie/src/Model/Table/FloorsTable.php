<?php
namespace App\Model\Table;

use App\Model\Entity\Floor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Floors Model
 *
 * @property \Cake\ORM\Association\HasMany $Locations
 */
class FloorsTable extends Table
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

        $this->table('floors');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Locations', [
            'foreignKey' => 'floor_id'
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
            ->integer('floor_number')
            ->requirePresence('floor_number', 'create')
            ->notEmpty('floor_number');

        return $validator;
    }
}
