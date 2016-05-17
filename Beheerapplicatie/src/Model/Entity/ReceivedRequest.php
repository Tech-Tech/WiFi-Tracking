<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReceivedRequest Entity.
 *
 * @property int $id
 * @property int $monitoring_device_id
 * @property \App\Model\Entity\MonitoringDevice $monitoring_device
 * @property string $tracked_mac_address
 * @property \Cake\I18n\Time $request_timestamp
 * @property int $signal_strength
 */
class ReceivedRequest extends Entity
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
