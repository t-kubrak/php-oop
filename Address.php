<?php
/*
 * Physical Address
 */
class Address
{
    // Street address
    public $street_address_1;
    public $street_address_2;

    // Name of the city
    public $city_name;

    // Name of the subdivision
    public $subdivision_name;

    // Postal Code.
    protected $postal_code;

    // Name of the country.
    public $country_name;

    protected $_time_created;
    protected $_time_updated;

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
}
