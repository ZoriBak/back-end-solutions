<?php
function calculateSum($number1, $number2) {
    return $number1 + $number2;
}

function multiply($number1, $number2) {
    return $number1 * $number2;
}

function isEven($number) {
    return $number % 2 === 0;
}

function getStringInfo($text) {
    return [strlen($text), strtoupper($text)];
}

$num1 = 10;
$num2 = 5;
$string = "hello world";

$sum = calculateSum($num1, $num2);
$product = multiply($num1, $num2);
$evenCheck = isEven($num1);
$stringInfo = getStringInfo($string);

echo "Sum: $sum\n";
echo "Product: $product\n";
echo "$num1 is " . ($evenCheck ? "even" : "odd") . "\n";
echo "String length: {$stringInfo[0]}\n";
echo "Uppercase: {$stringInfo[1]}\n";

?>
