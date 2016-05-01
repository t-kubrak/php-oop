<?php
require "Address.php";
require "Database.php";

$Address = new Address();

$Address->country_name = "Canada";
$Address->city_name = "Ottawa";
$Address->postal_code = "K2K 2K2";
$Address->street_address_1 = "Some Street";
$Address->subdivision_name = "Subdivison";
$Address->address_type_id = 1;

echo $Address;

$Address2 = new Address(array(
    "street_address_1" => "123 Phony Ave",
    "city_name" => "Villageland",
    "subdivision_name" => "Region",
    "country_name" => "Canada"
));

echo "<br><br>" . $Address2;