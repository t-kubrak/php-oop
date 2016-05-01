<?php
/*
 * Physical Address
 */
class Address
{
    const ADDRESS_TYPE_RESIDENCE = 1;
    const ADDRESS_TYPE_BUSINESS = 2;
    const ADDRESS_TYPE_PARK = 3;

    static public $valid_address_types = array(
        Address::ADDRESS_TYPE_RESIDENCE => "Residence",
        Address::ADDRESS_TYPE_BUSINESS => "Business",
        Address::ADDRESS_TYPE_PARK => "Park"
    );

    // Street address
    public $street_address_1;
    public $street_address_2;

    // Name of the city
    public $city_name;

    // Name of the subdivision
    public $subdivision_name;

    // Postal Code.
    protected $_postal_code;

    // Name of the country.
    public $country_name;

    // Primary key of an Address
    protected $_address_id;

    // Address type id
    protected $address_type_id;

    protected $_time_created;
    protected $_time_updated;

    /*
     * Constructor
     * @param array $data optional array of property names and values
     */
    function __construct($data = array())
    {
        $this->_time_created = time();

        // Ensure that the Address can be populated
        if (!is_array($data)) {
            trigger_error("Unable to construct address with a " . get_class($this));
        }

        if(count($data) > 0) {
            foreach($data as $name => $value) {
                // Special case for protected properties
                if(in_array($name, array(
                    'time_created',
                    'time_updated'
                ))) {
                 $name = '_' . $name;
                }
                $this->$name = $value;
            }
        }
    }

    /*
     * @param string $name
     * @return mixed
     */
    function __get($name)
    {
        // Check postal code if unset
        if(!$this->_postal_code) {
            $this->_postal_code = $this->_postal_code_guess();
        }

        $protected_property_name = '_' . $name;
        if(property_exists($this, $protected_property_name)) {
            return $this->$protected_property_name;
        }

        // Unable to access property; trigger error
        trigger_error("Undefined property via __get: " . $name);
        return NULL;
    }

    function __set($name, $value)
    {
        if($name == "address_type_id") {
            $this->_setAddressTypeId($value);
            return;
        }

        // Allow anything to set the postal code
        if($name == 'postal_code') {
            $this->$name = $value;
            return;
        }
    }

    function __toString()
    {
        return $this->display();
    }

    /*
     * Guess the postal code given the subdivision and city name
     * @TODO Replace with a database lookup
     * @return string
     */
    protected function _postal_code_guess() {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = "SELECT postal_code FROM location ";

        $city_name = $mysqli->real_escape_string($this->city_name);
        $sql_query .= "WHERE city_name = '" . $city_name . "' ";

        $subdivision_name = $mysqli->real_escape_string($this->subdivision_name);
        $sql_query .= "AND subdivision_name = '" . $subdivision_name . "'";

        $result = $mysqli->query($sql_query);

        if($row = $result->fetch_assoc()) {
            return $row['postal_code'];
        }
    }

    function display() {
        $output = "";

        $output .= $this->street_address_1;
        if($this->street_address_2) {
            $output .= "<br>" . $this->street_address_2;
        }

        // City, Subdivision, Postal code
        $output .= '<br>';
        $output .= $this->city_name . ", " . $this->subdivision_name . " " . $this->postal_code;

        // Country
        $output .= "<br>" . $this->country_name;

        return $output;
    }

    static public function isValidAddressTypeId($address_type_id) {
        return array_key_exists($address_type_id, self::$valid_address_types);
    }

    protected function _setAddressTypeId($address_type_id) {
        if(self::isValidAddressTypeId($address_type_id)) {
            $this->address_type_id = $address_type_id;
        }
    }
}
