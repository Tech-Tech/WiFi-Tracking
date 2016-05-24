<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Address Entity.
 *
 * @property int $id
 * @property int $city_id
 * @property \App\Model\Entity\City $city
 * @property int $street_id
 * @property \App\Model\Entity\Street $street
 * @property int $house_number
 * @property string $suffix
 * @property \App\Model\Entity\Building[] $buildings
 */
class Address extends Entity
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

	/**
	 * Method to create and return a good formatted address.
	 *
	 * @return string
	 * @author Frank Schutte
	 */
    public function _getFullAddress() {
	    $address_table = TableRegistry::get('addresses');
	    $address = $address_table->get($this->_properties['id'], [
		    'contain' => ['Cities', 'Streets']
	    ]);
	    $full_address = $address['street']['name'] . ' ' . $address['house_number'] . ' ' . $address['city']['name'];

	    return $full_address;
    }
}
