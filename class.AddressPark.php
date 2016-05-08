<?php
/**
 * Class AddressPark
 */
class AddressPark extends Address
{
    /**
     * Initialization
     */
    protected function _init()
    {
        $this->_setAddressTypeId(Address::ADDRESS_TYPE_PARK);
    }

    /*public function display()
    {
        $output = "<div style='background-color: green;'>";
        $output .= parent::display();
        $output .= "</div>";
        return $output;
    }*/
}