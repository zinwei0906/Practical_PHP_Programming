<?php

$make = trim($_GET['q']);

$cars = array("Ford" => array("Escape", "Expedition", "Explorer", "Focus", "Mustang", "Thunderbird"),
    "Honda" => array("Accord", "Civic", "Element", "Ridgeline"),
    "Mazda" => array("Mazda 3", "Mazda 6", "RX-8"));
echo "<select id='model'>";
echo "<option value=''>Select model </option>";

if (array_key_exists($make, $cars)) {
    $v = $cars[$make];

    foreach ($v as $k2 => $v2) {
        echo "<option value='$v2'>$v2</option>";
    }
}
echo "</select>";
?>