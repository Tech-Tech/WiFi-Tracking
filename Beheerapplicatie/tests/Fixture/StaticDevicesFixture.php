<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaticDevicesFixture
 *
 */
class StaticDevicesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'mac_address' => ['type' => 'string', 'length' => 24, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'device_type' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'vendor' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['mac_address'], 'length' => []],
            'fk_static_d_device_ro_tracked_' => ['type' => 'foreign', 'columns' => ['mac_address'], 'references' => ['tracked_devices', 'mac_address'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'mac_address' => 'e9973db5-4d11-4e3e-9bb7-7b8b34a1a712',
            'device_type' => 'Lorem ipsum dolor sit amet',
            'vendor' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
