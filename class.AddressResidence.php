<?php
/**
 * Class AddressResidence
 */
class AddressResidence extends Address
{
    protected function _init()
    {
        $this->_setAddressTypeId(Address::ADDRESS_TYPE_RESIDENCE);
    }
}