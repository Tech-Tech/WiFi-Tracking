<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

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

	/**
	 * Method to create and return a good formatted location notation.
	 *
	 * @return string
	 * @author Frank Schutte
	 */
    public function _getFullLocationName() {
	    $location_table = TableRegistry::get('Locations');
	    $location = $location_table->get($this->_properties['id'], [
		    'contain' => ['Wings', 'Floors', 'Rooms', 'Suffixes', 'Buildings' => ['Campuses'], 'MonitoringDeviceLocations']
	    ]);
	    $full_location_name =
		    $location['building']['campus']['name'] . ' ' .
		    $location['building']['name'] . ' ' .
		    $location['wing']['wing_code'] .
		    $location['floor']['floor_number'] . '.' .
	        $this->leadingZero($location['room']['room_number']) . ' ' .
	        $location['suffix']['suffix'];

        return $full_location_name;
    }

	/**
	 * Method to add a leading zero to a string value
	 *
	 * @param $value
	 * @return string
	 * @author Frank Schutte
	 */
	private function leadingZero($value) {
		if($value >= 0 && $value < 10) {
			return '0' . $value;
		}
		return $value;
	}
}
