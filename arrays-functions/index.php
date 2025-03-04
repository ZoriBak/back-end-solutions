<?php
$animals = ["Dog", "Mouse", "Bear", "Frog", "Lion", "Giraffe"];

echo "There are " . count($animals) . " animals in the list.<br>";

$teZoekenDier = "Tiger";

if (in_array($teZoekenDier, $animals)) {
    echo "$teZoekenDier was found in the list!";
} else {
    echo "$teZoekenDier was not found in the list.";
}
?>
