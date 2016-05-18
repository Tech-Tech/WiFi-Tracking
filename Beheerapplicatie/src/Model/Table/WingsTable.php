<?php
namespace App\Model\Table;

use App\Model\Entity\Wing;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wings Model
 *
 * @property \Cake\ORM\Association\HasMany $Locations
 */
class WingsTable extends Table
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

        $this->table('wings');
        $this->displayField('wing_code');
        $this->primaryKey('id');

        $this->hasMany('Locations', [
            'foreignKey' => 'wing_id'
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
            ->requirePresence('wing_code', 'create')
            ->notEmpty('wing_code');

        return $validator;
    }
}
