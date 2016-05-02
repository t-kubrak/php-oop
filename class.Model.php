<?php

/**
 * Interface Model
 */
interface Model
{
    /**
     * Load model
     * @param $address_id
     * @return mixed
     */
    static function load($address_id);

    /**
     * Save model
     */
    function save();
}