<?php
/**
 * Autoloader
 * @param string $class_name
 */
function __autoload($class_name){
    include "class." . $class_name . ".php";
}

$Address = Address::getInstance(Address::ADDRESS_TYPE_RESIDENCE);

$Address->country_name = "Canada";
$Address->city_name = "Ottawa";
$Address->postal_code = "K2K 2K2";
$Address->street_address_1 = "Some Street";
$Address->subdivision_name = "Subdivison";

echo $Address;

$Address2 = new AddressResidence(array(
    "street_address_1" => "123 Phony Ave",
    "city_name" => "Villageland",
    "subdivision_name" => "Region",
    "country_name" => "Canada"
));

echo "<br><br>" . $Address2;

$Address3 = new AddressPark(array(
    "street_address_1" => "123 Phony Ave",
    "city_name" => "Villageland",
    "subdivision_name" => "Region",
    "country_name" => "Australia"
));

echo "<br><br>" . $Address3;

try{
    $address_db = Address::load(0);
    echo $address_db;
} catch (ExceptionAddress $e) {
    //echo $e->getMessage();
    echo $e;
}

//var_dump($address_db);
