<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReceivedRequestsFixture
 *
 */
class ReceivedRequestsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'monitoring_device_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'tracked_mac_address' => ['type' => 'string', 'length' => 24, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'request_timestamp' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'signal_strength' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_received_monitorin_monitori' => ['type' => 'foreign', 'columns' => ['monitoring_device_id'], 'references' => ['monitoring_devices', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_received_tracked_d_tracked_' => ['type' => 'foreign', 'columns' => ['tracked_mac_address'], 'references' => ['tracked_devices', 'mac_address'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'monitoring_device_id' => 1,
            'tracked_mac_address' => 'Lorem ipsum dolor sit ',
            'request_timestamp' => 1463476944,
            'signal_strength' => 1
        ],
    ];
}
