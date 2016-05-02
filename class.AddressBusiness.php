<?php
/**
 * Class AddressBusiness
 */
class AddressBusiness extends Address
{
    protected function _init()
    {
        $this->_setAddressTypeId(Address::ADDRESS_TYPE_BUSINESS);
    }
}