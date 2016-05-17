<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity.
 *
 * @property int $id
 * @property int $wing_id
 * @property \App\Model\Entity\Wing $wing
 * @property int $floor_id
 * @property \App\Model\Entity\Floor $floor
 * @property int $room_id
 * @property \App\Model\Entity\Room $room
 * @property int $suffix_id
 * @property \App\Model\Entity\Suffix $suffix
 * @property int $building_id
 * @property \App\Model\Entity\Building $building
 * @property string $name
 * @property \App\Model\Entity\MonitoringDeviceLocation[] $monitoring_device_locations
 */
class Location extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
