<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonalDevicesFixture
 *
 */
class PersonalDevicesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'mac_address' => ['type' => 'string', 'length' => 24, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'person_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'device_type' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        'vendor' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['mac_address'], 'length' => []],
            'fk_personal_device_ro_tracked_' => ['type' => 'foreign', 'columns' => ['mac_address'], 'references' => ['tracked_devices', 'mac_address'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_personal_person_de_persons' => ['type' => 'foreign', 'columns' => ['person_id'], 'references' => ['persons', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'mac_address' => 'd0673a3d-eb10-4191-9729-a4ee1a7168bb',
            'person_id' => 1,
            'device_type' => 'Lorem ipsum dolor sit amet',
            'vendor' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
