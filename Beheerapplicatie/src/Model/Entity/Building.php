<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Building Entity.
 *
 * @property int $id
 * @property int $address_id
 * @property \App\Model\Entity\Address $address
 * @property int $campus_id
 * @property \App\Model\Entity\Campus $campus
 * @property string $name
 * @property \App\Model\Entity\Location[] $locations
 */
class Building extends Entity
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
