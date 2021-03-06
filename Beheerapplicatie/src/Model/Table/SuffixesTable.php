<?php
namespace App\Model\Table;

use App\Model\Entity\Suffix;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suffixes Model
 *
 * @property \Cake\ORM\Association\HasMany $Locations
 */
class SuffixesTable extends Table
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

        $this->table('suffixes');
        $this->displayField('suffix');
        $this->primaryKey('id');

        $this->hasMany('Locations', [
            'foreignKey' => 'suffix_id'
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
            ->requirePresence('suffix', 'create')
            ->notEmpty('suffix');

        return $validator;
    }
}
