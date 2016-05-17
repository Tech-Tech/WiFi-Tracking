<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrackedDevicesFixture
 *
 */
class TrackedDevicesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'mac_address' => ['type' => 'string', 'length' => 24, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'device_type' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'vendor' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['mac_address'], 'length' => []],
            'fk_tracked__device_ty_device_t' => ['type' => 'foreign', 'columns' => ['device_type'], 'references' => ['device_types', 'device_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'mac_address' => '601d5c3b-1b4e-46a9-9801-95717f7bd369',
            'device_type' => 1,
            'vendor' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
