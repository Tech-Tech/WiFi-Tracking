<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LocationsFixture
 *
 */
class LocationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'wing_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'floor_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'room_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'suffix_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'building_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_location_location__building' => ['type' => 'foreign', 'columns' => ['building_id'], 'references' => ['buildings', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_location_location__floors' => ['type' => 'foreign', 'columns' => ['floor_id'], 'references' => ['floors', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_location_location__rooms' => ['type' => 'foreign', 'columns' => ['room_id'], 'references' => ['rooms', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_location_location__suffixes' => ['type' => 'foreign', 'columns' => ['suffix_id'], 'references' => ['suffixes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_location_location__wings' => ['type' => 'foreign', 'columns' => ['wing_id'], 'references' => ['wings', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'wing_id' => 1,
            'floor_id' => 1,
            'room_id' => 1,
            'suffix_id' => 1,
            'building_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
