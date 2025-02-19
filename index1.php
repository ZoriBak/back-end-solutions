<?php
    
    $firstName = "Zori";
    $lastName = "Bak";

  
    $fullName = $firstName . " " . $lastName;

    
    $charCount = strlen($fullName);
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
    <h1>Exercise: String Concatenation</h1>

    <p>Full Name: <?php echo $fullName; ?></p>
    <p>Character Count: <?php echo $charCount; ?></p>
</body>
</html>
