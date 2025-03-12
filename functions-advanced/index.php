<?php

$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

function countOccurrence1($needle) {
    global $md5HashKey;
    return substr_count($md5HashKey, $needle);
}

function countOccurrence2($needle, $hashKey) {
    return substr_count($hashKey, $needle);
}

function countOccurrence3($needle) {
    return substr_count($GLOBALS['md5HashKey'], $needle);
}

$char1 = '2';
$char2 = '8';
$char3 = 'a';

$count1 = countOccurrence1($char1);
$count2 = countOccurrence2($char2, $md5HashKey);
$count3 = countOccurrence3($char3);

echo "Function 1: The needle '$char1' occurs $count1 times in the hash key '$md5HashKey'\n";
echo "Function 2: The needle '$char2' occurs $count2 times in the hash key '$md5HashKey'\n";
echo "Function 3: The needle '$char3' occurs $count3 times in the hash key '$md5HashKey'\n";

?>
