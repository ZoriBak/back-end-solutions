<?php
for ($i = 0; $i <= 100; $i++) {
    echo $i;
    if ($i < 100) {
        echo ", ";
    }
}
echo "\n"; 

for ($i = 41; $i < 80; $i++) {
    if ($i % 3 == 0) {
        echo $i . " ";
    }
}
?>
