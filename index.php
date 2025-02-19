<?php
   
    $text = 'Test 123...';
    $text2 = 'Test 456'; 
    $_text3 = 'test';
    $first_sentence = 'Building castles in the sky and in the sand'; 
    $animal = "Platypus"; 

?>

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
</head>

<body>

    <h1>Debug errors</h1>

    <ul>
        <li>Debug this page so the script runs without error</li>
        <li>Print all the variables in an unordered list below:</li>
    </ul>  

    <ul>
        <li><?php echo $text; ?></li>
        <li><?php echo $text2; ?></li>
        <li><?php echo $_text3; ?></li>
        <li><?php echo $first_sentence; ?></li>
        <li><?php echo $animal; ?></li>
    </ul>

</body>
</html>
