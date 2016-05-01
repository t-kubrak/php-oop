<?php
require "Address.php";

$Address = new Address();

$Address->country_name = "Canada";
$Address->city_name = "Ottawa";
//$Address->postal_code = "K2K 2K2";
$Address->street_address_1 = "Some Street";
$Address->street_address_2 = "Some Street 2";
$Address->subdivision_name = "Subdivison";

//var_dump($Address);

echo $Address->display();