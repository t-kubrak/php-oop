<?php
require "Address.php";

$Address = new Address();

$Address->country_name = "Canada";
$Address->city_name = "Ottawa";
$Address->postal_code = "K2K 2K2";
$Address->street_address_1 = "Some Street";
$Address->subdivision_name = "Subdivison";

var_dump($Address);

echo $Address->display();

unset($Address->postal_code);
echo "<br><br>" . $Address->display();

$Address2 = new Address(array(
    "street_address_1" => "123 Phony Ave",
    "city_name" => "Villageland",
    "Subdivision_name" => "Region",
    "postal_code" => "23454",
    "country_name" => "Canada"
));
echo "<br><br>" . $Address2->display();

echo "<br><br>" . $Address2;